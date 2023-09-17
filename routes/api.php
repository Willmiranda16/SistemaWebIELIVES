<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignarCursoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\InstitucionEducativaController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PersonalAcademicoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SeccionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/inicio', [HomeController::class, 'index'])->name('home');

Route::get('/listar-datos', [InicioController::class, 'index']);

Route::get('/listar-rol', [RolController::class, 'show']);
Route::get('/listar-roles-all', [RolController::class, 'showRoles']);
Route::post('/agregar-roles', [RolController::class, 'store']);
Route::post('/actualizar-roles', [RolController::class, 'update']);
Route::post('/eliminar-roles', [RolController::class, 'destroy']);

Route::post('/buscar-dni', [UsuarioController::class, 'showDni']);
Route::get('/listar-departamentos', [UsuarioController::class, 'showDepartamentos']);
Route::post('/listar-provincias', [UsuarioController::class, 'showProvincias']);
Route::post('/listar-distritos', [UsuarioController::class, 'showDistritos']);

Route::get('/listar-usuarios', [UsuarioController::class, 'show']);
Route::post('/agregar-usuario', [UsuarioController::class, 'store']);
Route::post('/actualizar-usuario', [UsuarioController::class, 'update']);
Route::post('/eliminar-usuario', [UsuarioController::class, 'destroy']);

Route::get('/listar-ie', [InstitucionEducativaController::class, 'show']);
Route::post('/agregar-ie', [InstitucionEducativaController::class, 'store']);
Route::get('/buscar-director', [InstitucionEducativaController::class, 'showDirector']);

Route::get('/listar-anios-all', [PeriodoController::class, 'showAño']);
Route::post('/agregar-anios', [PeriodoController::class, 'storeAño']);
Route::post('/actualizar-anios', [PeriodoController::class, 'updateAño']);
Route::post('/eliminar-anios', [PeriodoController::class, 'destroyAño']);
Route::post('/activar-anios', [PeriodoController::class, 'activarAño']);
Route::post('/desactivar-anios', [PeriodoController::class, 'desactivarAño']);

Route::get('/listar-tipo-notas', [PeriodoController::class, 'showTipoNotas']);
Route::post('/buscar-periodo', [PeriodoController::class, 'buscarPeriodo']);

Route::get('/listar-periodos', [PeriodoController::class, 'show']);
Route::post('/agregar-periodo', [PeriodoController::class, 'store']);
Route::post('/actualizar-periodo', [PeriodoController::class, 'update']);
Route::post('/eliminar-periodo', [PeriodoController::class, 'destroy']);
Route::post('/aperturar-periodo', [PeriodoController::class, 'aperturarPeriodo']);
Route::post('/finalizar-periodo', [PeriodoController::class, 'finalizarPeriodo']);

Route::post('/listar-capacidades', [CursoController::class, 'showCapacidades']);
Route::post('/listar-cursos-all', [CursoController::class, 'showAll']);
Route::get('/listar-cursos', [CursoController::class, 'show']);
Route::post('/agregar-curso', [CursoController::class, 'store']);
Route::post('/actualizar-curso', [CursoController::class, 'update']);
Route::post('/eliminar-curso', [CursoController::class, 'destroy']);

Route::get('/listar-anios', [NotaController::class, 'showAño']);
Route::post('/listar-docentes-all', [NotaController::class, 'buscar']);
Route::post('/listar-grados-all', [NotaController::class, 'buscarGrados']);
Route::post('/listar-secciones-all2', [NotaController::class, 'buscarSeccion']);
Route::post('/buscar-info-notas', [NotaController::class, 'buscarInfoNotas']);
Route::post('/agregar-notas', [NotaController::class, 'store']);

Route::post('/buscar-info', [AsignarCursoController::class, 'buscar']);
Route::post('/agregar-asignacion', [AsignarCursoController::class, 'store']);
Route::post('/eliminar-asignacion', [AsignarCursoController::class, 'destroy']);

Route::post('/listar-cursos2', [AsignarCursoController::class, 'showCursos']);
Route::post('/buscar-info2', [AsignarCursoController::class, 'buscar2']);
Route::post('/agregar-asignacion2', [AsignarCursoController::class, 'store2']);
Route::post('/eliminar-asignacion2', [AsignarCursoController::class, 'destroy2']);

Route::get('/listar-personal-all', [PersonalAcademicoController::class, 'show']);
Route::post('/agregar-personal', [PersonalAcademicoController::class, 'store']);
Route::post('/actualizar-personal', [PersonalAcademicoController::class, 'update']);
Route::post('/eliminar-personal', [PersonalAcademicoController::class, 'destroy']);

Route::get('/listar-apoderados', [AlumnoController::class, 'showapoderado']);
Route::post('/agregar-apoderado', [AlumnoController::class, 'storeapoderado']);

Route::get('/listar-alumnos', [AlumnoController::class, 'show']);
Route::post('/agregar-alumno', [AlumnoController::class, 'store']);
Route::post('/actualizar-alumno', [AlumnoController::class, 'update']);
Route::post('/eliminar-alumno', [AlumnoController::class, 'destroy']);
Route::get('/buscar-alumno', [AlumnoController::class, 'buscar']);

Route::post('/buscar-data-alumno', [MatriculaController::class, 'buscarAlumno']);
Route::get('/listar-matriculas', [MatriculaController::class, 'show']);
Route::post('/agregar-matricula', [MatriculaController::class, 'store']);
Route::post('/actualizar-matricula', [MatriculaController::class, 'update']);
Route::post('/eliminar-matricula', [MatriculaController::class, 'destroy']);

Route::post('/reporte-data-alumno', [ReporteController::class, 'buscarInfoAlumno']);
Route::post('/reporte-ficha-matricula', [ReporteController::class, 'generarFichaMatricula']);
Route::post('/reporte-libreta-notas', [ReporteController::class, 'generarLibretaNotas']);
Route::post('/reportes-alumnos-grados', [ReporteController::class, 'showAlumnosGrados']);
Route::post('/reportes-cargos-personal', [ReporteController::class, 'showPersonalCargos']);
Route::post('/reportes-alumnos-sexo', [ReporteController::class, 'showAlumnoSexo']);
Route::post('/reportes-docentes-cursos', [ReporteController::class, 'showDocenteCurso']);
Route::post('/reportes-vacantes-seccion', [ReporteController::class, 'showVacantesSeccion']);

Route::post('/listar-grados', [MatriculaController::class, 'showGrados']);
Route::post('/listar-secciones', [MatriculaController::class, 'showSecciones']);
Route::post('/info-secciones', [MatriculaController::class, 'infoSecciones']);

Route::get('/listar-niveles', [NivelController::class, 'show']);

Route::get('/listar-grados-all', [GradoController::class, 'show']);
Route::post('/agregar-grado', [GradoController::class, 'store']);
Route::post('/actualizar-grado', [GradoController::class, 'update']);
Route::post('/eliminar-grado', [GradoController::class, 'destroy']);

Route::get('/listar-tutores-all', [SeccionController::class, 'showTutores']);
Route::post('/listar-secciones-all', [SeccionController::class, 'show']);
Route::post('/agregar-secciones', [SeccionController::class, 'store']);
Route::post('/actualizar-secciones', [SeccionController::class, 'update']);
Route::post('/eliminar-secciones', [SeccionController::class, 'destroy']);

Route::get('/listar-aulas-all', [AulaController::class, 'show']);
Route::get('/listar-aulas-clases', [AulaController::class, 'showAulas']);
Route::post('/agregar-aulas', [AulaController::class, 'store']);
Route::post('/actualizar-aulas', [AulaController::class, 'update']);
Route::post('/eliminar-aulas', [AulaController::class, 'destroy']);

Route::post('/listar-horarios', [HorarioController::class, 'show']);
Route::post('/agregar-horarios', [HorarioController::class, 'store']);
Route::post('/actualizar-horarios', [HorarioController::class, 'update']);
