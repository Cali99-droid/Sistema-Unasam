<?php

namespace Controllers;

use Classes\Email;
use Model\DatosUser;
use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
            if (empty($alertas)) {
                $usuario = Usuario::where('usuario', $auth->usuario);
                if ($usuario) {
                    if ($usuario->comprobarPassword($auth->pass)) {
                        session_start();
                        $_SESSION['username'] = $usuario->usuario;
                        $_SESSION['login'] = true;
                        $_SESSION['id'] = $usuario->id;
                        header('Location: /inicio');
                    } else {
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }

            $alertas = Usuario::getAlertas();
        }

        $router->renderLog('auth/index', ['alertas' => $alertas]);
    }

    public static function logout(Router $router)
    {
        $alertas = [];
        $_SESSION = [];
        header('Location: /');
    }
    public static function perfil(Router $router)
    {
        isAuth();
        $id =  $_SESSION['id'];
        $user = Usuario::find($id);
        $datos = $user->getDatos();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($user->comprobarPassword($_POST['pass'])) {
                $user->pass = $_POST['npass'];
                $user->token = "";
                $user->confirmado = 0;
                $alertas['exito'][] = 'La constraseña fue cambiado correctamente';
                $res = $user->guardar();
            } else {
                $alertas = Usuario::getAlertas();
            }
        }

        $router->render('perfil/index', ['user' => $user, 'datos' => $datos, 'alertas' => $alertas]);
    }

    public static function olvide(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $user = DatosUser::where('email', $email);
            if ($user) {
                if (empty($alertas)) {
                    $usu = Usuario::find($user->idUsuario);


                    //generar u ntoken
                    $usu->crearToken();
                    $usu->guardar();

                    //Enviar email
                    $email = new Email($user->email, $user->nombre, $usu->token);
                    $email->enviarInstrucciones();

                    //alerta exito
                    Usuario::setAlerta('exito', 'Revisa tu email');
                }
            } else {
                Usuario::setAlerta('error', 'No existe el usuario');
            }
        }
        $alertas = Usuario::getAlertas();
        $router->renderLog('auth/olvide-password', ['alertas' => $alertas]);
    }

    public static function recuperar(Router $router)
    {
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);

        // //buscar usuario por token
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
            $error = true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //lleer el nuevo password y guadralo
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if (empty($alertas)) {
                $usuario->pass = null;
                $usuario->pass = $password->pass;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();

                if ($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->renderLog('auth/recuperar-password', [
            'alertas' => $alertas, 'error' => $error
        ]);
    }
}
