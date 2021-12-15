<?php

use Model\Opcion_x_tipo;
use Model\DatosUser;
use Model\Opciones;

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
define('CARPETA_DOCS', $_SERVER['DOCUMENT_ROOT'] . '/docs/');

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarORedireccionar(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }
    return $id;
}

function validarORedireccionarDNI(string $url)
{
    $dni = $_GET['dni'];
    $dni = filter_var($dni, FILTER_VALIDATE_INT);

    if (!$dni) {
        header("Location: ${url}");
    }
    return $dni;
}


function isAuth(): void
{
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}


function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarPermisos($permiso)
{

    //rutas como permisos
    $libre = ['/inicio', '/perfil', '/reporte', '/', '/logout', '/olvide', '/recuperar', '/desercion', '/desercion-eliminar', '/docs/noExiste'];

    $permisosGrupo = ['/grupos', '/grupo', '/integrante/getParticipaciones',  '/integrante', '/integrante/setAsistencia', '/integrante/deleteAsistencia', '/integrante/setBeneficio',   '/integrante/getBeneficio', '/integrante/updBeneficioEst', '/api/getIntegrante', '/api/setTntegrante', '/rendimiento', '/rendimiento/eliminar', '/integrante-eliminar'];

    $permisosBeneficio = ['/beneficios', '/beneficios/getBeneficio', '/beneficios', '/beneficios/asignar', '/beneficios/crear', '/beneficiosTipo', '/tipoBeneficios/eliminar', '/beneficios-eliminar'];

    $permisosEvento = ['/eventos', '/eventos', '/nuevo-evento', '/actualizar-evento', '/crear-evento', '/crear-org', '/eventos/invitar-grupo', '/evento/orgs', '/evento-invitacion', '/invitacion-eliminar', '/eventos-eliminar'];

    $permisosAdmin = ['/tipos', '/usuarios', 'admin/usuarios', '/roles', '/crear-rol', '/get-rol',  '/crear-user', '/get-user', '/semestres', '/api/tipos', '/api/tipos-eliminar', '/api/alumno', '/api/crearAlumno', '/usuarios-eliminar', '/semestres-eliminar'];

    if (in_array($permiso, $libre)) {

        return  $bandera = true;
    }
    isAuth();
    $id = $_SESSION['id'];
    $user = DatosUser::where('idUsuario', $id);

    $permisos = Opcion_x_tipo::getPermisos($user->idTipoUsu);
    // $opcion = Opciones::where('nombre', $permiso);
    $bandera = false;

    if (in_array($permiso, $permisosGrupo)) {

        foreach ($permisos as $permiso) {

            if ($permiso->opciones_id == 1) {
                $bandera = true;
            }
        }
    }

    if (in_array($permiso, $permisosEvento)) {
        foreach ($permisos as $permiso) {

            if ($permiso->opciones_id  == 2) {
                $bandera = true;
            }
        }
    }

    if (in_array($permiso, $permisosBeneficio)) {
        foreach ($permisos as $permiso) {

            if ($permiso->opciones_id  == 4) {
                $bandera = true;
            }
        }
    }
    if (in_array($permiso, $permisosAdmin)) {
        foreach ($permisos as $permiso) {

            if ($permiso->opciones_id  == 5) {
                $bandera = true;
            }
        }
    }

    if (in_array($permiso, $libre)) {

        $bandera = true;
    }

    return $bandera;
}


function getPath()
{
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($path, '?');
    if ($position === false) {
        return $path;
    }
    return substr($path, 0, $position);
}
