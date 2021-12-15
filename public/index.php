<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use MVC\Router;
use Controllers\LoginController;
use Controllers\GrupoController;
use Controllers\BeneficioController;
use Controllers\EventoController;
use Controllers\InicioController;
use Controllers\ReporteController;
use Controllers\PaginasController;
use Controllers\DesercionController;

$router = new Router();

//iniciar session
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);
/** Area privada   **/
//Inicio
$router->get('/inicio', [InicioController::class, 'index']);

//perfil
$router->get('/perfil', [LoginController::class, 'perfil']);
$router->post('/perfil', [LoginController::class, 'perfil']);

//Grupos
$router->get('/grupos', [GrupoController::class, 'index']);
$router->post('/grupos', [GrupoController::class, 'index']);
$router->get('/grupo', [GrupoController::class, 'grupo']);
$router->post('/grupo', [GrupoController::class, 'grupo']);

$router->post('/integrante/getParticipaciones', [GrupoController::class, 'getParticipaciones']);
$router->get('/integrante', [GrupoController::class, 'integrante']);
$router->post('/integrante-eliminar', [GrupoController::class, 'eliminarIntegrante']);
$router->post('/integrante/setAsistencia', [GrupoController::class, 'setAsistencia']);
$router->post('/integrante/deleteAsistencia', [GrupoController::class, 'deleteAsistencia']);
$router->post('/integrante/setBeneficio', [GrupoController::class, 'setBeneficio']);
$router->post('/integrante/getBeneficio', [GrupoController::class, 'getBeneficio']);
$router->post('/integrante/updBeneficioEst', [GrupoController::class, 'updBeneficioEst']);
$router->get('/rendimiento', [GrupoController::class, 'rendimiento']);
$router->post('/rendimiento', [GrupoController::class, 'setRendimiento']);
$router->post('/rendimiento/eliminar', [GrupoController::class, 'delRendimiento']);
//crear en caso no haya api
$router->post('/integrante/crearIntegrante', [GrupoController::class, 'crearIntegrante']);

$router->post('/api/getIntegrante', [GrupoController::class, 'getIntegrante']);
$router->post('/api/setTntegrante', [GrupoController::class, 'setIntegrante']);


//beneficios
$router->get('/beneficios', [BeneficioController::class, 'index']);
$router->get('/beneficiosTipo', [BeneficioController::class, 'verBeneficiosTipo']);
$router->post('/beneficios/getBeneficio', [BeneficioController::class, 'getBeneficio']);
$router->post('/beneficios', [BeneficioController::class, 'index']);
$router->post('/beneficios/asignar', [BeneficioController::class, 'asignarBeneficio']);
$router->post('/beneficios/crear', [BeneficioController::class, 'crear']);
$router->post('/tipoBeneficios/eliminar', [BeneficioController::class, 'eliminarBenTipo']);
$router->post('/beneficios-eliminar', [BeneficioController::class, 'eliminarBeneficio']);
//Eventos
$router->get('/eventos', [EventoController::class, 'index']);
$router->post('/eventos', [EventoController::class, 'index']);
$router->post('/eventos-eliminar', [EventoController::class, 'eliminarEvento']);
$router->get('/nuevo-evento', [EventoController::class, 'v_crear']);
$router->get('/actualizar-evento', [EventoController::class, 'v_actualizar']);
$router->post('/crear-evento', [EventoController::class, 'crear']);
$router->post('/crear-org', [EventoController::class, 'crearOrg']);
$router->post('/eventos/invitar-grupo', [EventoController::class, 'invitar']);
$router->get('/evento/orgs', [EventoController::class, 'getOrgs']);
$router->get('/evento-invitacion', [EventoController::class, 'verInvitacion']);
$router->post('/invitacion-eliminar', [EventoController::class, 'eliminarInvitacion']);
//Reportes
$router->get('/reporte', [ReporteController::class, 'index']);
$router->post('/reporte', [ReporteController::class, 'index']);
//Desercion
$router->get('/desercion', [DesercionController::class, 'index']);
$router->post('/desercion', [DesercionController::class, 'setDesercion']); //desercion-eliminar
$router->post('/desercion', [DesercionController::class, 'setDesercion']);
$router->post('/desercion-eliminar', [DesercionController::class, 'desercion_eliminar']); //AGREGADO RECIENTEMENTE
//admin
$router->get('/tipos', [AdminController::class, 'tipos']);
$router->get('/usuarios', [AdminController::class, 'users']);
$router->post('/usuarios-eliminar', [AdminController::class, 'eliminarUser']);
$router->post('admin/usuarios', [AdminController::class, 'index']);
$router->get('/roles', [AdminController::class, 'roles']);
$router->post('/crear-rol', [AdminController::class, 'crearRol']);
$router->post('/get-rol', [AdminController::class, 'getRol']);
$router->post('/crear-user', [AdminController::class, 'crearUser']);
$router->post('/get-user', [AdminController::class, 'getUser']);
//admin:semestres
$router->get('/semestres', [AdminController::class, 'semestres']);
$router->post('/semestres', [AdminController::class, 'setSemestre']);
$router->post('/semestres-eliminar', [AdminController::class, 'eliminarSemestre']);
//API
$router->post('/api/tipos', [APIController::class, 'guardarTipo']);
$router->post('/api/tipos-eliminar', [APIController::class, 'eliminarTipo']);
$router->get('/api/tipos', [APIController::class, 'getTipos']);
$router->post('/api/alumno',  [APIController::class, 'getAlumno']);
$router->post('/api/crearAlumno',  [APIController::class, 'setAlumno']);


//no validos
$router->get('/docs/noExiste', [PaginasController::class, 'noExiste']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
