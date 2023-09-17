const Inicio = () => import("./components/HomeComponent.vue");

//importamos componentes para el Periodo
const Periodos = () => import("./components/PeriodosComponent.vue");
//importamos componentes para el Año
const Años = () => import("./components/AniosComponent.vue");
//importamos componentes para el Alumno
const Alumnos = () => import("./components/AlumnosComponent.vue");
//importamos componentes para las Matriculas
const Matriculas = () => import("./components/MatriculasComponent.vue");
//importamos componentes para los Personal Academico
const Personal = () => import("./components/PersonalComponent.vue");
//importamos componentes para las Notas
const Notas = () => import("./components/NotasComponent.vue");
//importamos componentes para la Asistencia
const Asistencia = () => import("./components/AsistenciasComponent.vue");
//importamos componentes para el Horario
const Horarios = () => import("./components/HorariosComponent.vue");
//importamos componentes para el Seguimiento
const Seguimiento = () => import("./components/SeguimientosComponent.vue");
//importamos componentes para los Reportes
const ReportesGenerales = () => import("./components/ReportesGeneralesComponent.vue");
//importamos componentes para los Reportes
const ReportesAlumno = () => import("./components/ReportesAlumnoComponent.vue");

//importamos componentes para los Niveles
const Niveles = () => import("./components/NivelesComponent.vue");
//importamos componentes para los Grados - Secciones
const GradosSecciones = () => import("./components/GradosSeccionesComponent.vue");
//importamos componentes para los Grados
const Grados = () => import("./components/GradosComponent.vue");
//importamos componentes para las Secciones
const Secciones = () => import("./components/SeccionesComponent.vue");
//importamos componentes para las Aulas
const Ambientes = () => import("./components/AmbientesComponent.vue");
//importamos componentes para los Cursos
const Cursos = () => import("./components/CursosComponent.vue");
//importamos componentes para asignar Cursos
const AsignarCursos = () => import("./components/AsignarCursosComponent.vue");
//importamos componentes para asignar Grados
const AsignarGrados = () => import("./components/AsignarGradosComponent.vue");

//importamos componentes para el Usuario
const Roles = () => import("./components/RolesComponent.vue");
//importamos componentes para el Usuario
const Usuarios = () => import("./components/UsuariosComponent.vue");
//importamos componentes para la Institucion Educativa
const InstitucionEducativa = () => import("./components/InstitucionEducativaComponent.vue");

export const routes = [
    {
        name: "inicio",
        path: "/inicio",
        component: Inicio,
    },
    {
        name: "mostrarPeriodos",
        path: "/periodos",
        component: Periodos,
    },
    {
        name: "mostrarAños",
        path: "/anios",
        component: Años,
    },
    {
        name: "mostrarAlumnos",
        path: "/alumnos",
        component: Alumnos,
    },
    {
        name: "mostrarMatriculas",
        path: "/matriculas",
        component: Matriculas,
    },
    {
        name: "mostrarPersonal",
        path: "/personal",
        component: Personal,
    },
    {
        name: "mostrarNotas",
        path: "/notas",
        component: Notas,
    },
    {
        name: "mostrarAsistencia",
        path: "/asistencia",
        component: Asistencia,
    },
    {
        name: "mostrarHorarios",
        path: "/horarios",
        component: Horarios,
    },
    {
        name: "mostrarSeguimiento",
        path: "/seguimiento",
        component: Seguimiento,
    },
    {
        name: "mostrarReportesGenerales",
        path: "/reportes-generales",
        component: ReportesGenerales,
    },
    {
        name: "mostrarReportesAlumno",
        path: "/reportes-alumno",
        component: ReportesAlumno,
    },
    {
        name: "mostrarNiveles",
        path: "/niveles",
        component: Niveles,
    },
    {
        name: "mostrarGradosSecciones",
        path: "/grados-secciones",
        component: GradosSecciones,
    },
    {
        name: "mostrarGrados",
        path: "/grados",
        component: Grados,
    },
    {
        name: "mostrarSecciones",
        path: "/secciones",
        component: Secciones,
    },
    {
        name: "mostrarAmbientes",
        path: "/ambientes",
        component: Ambientes,
    },
    {
        name: "mostrarCursos",
        path: "/cursos",
        component: Cursos,
    },
    {
        name: "mostrarAsignarCursos",
        path: "/asignar-cursos",
        component: AsignarCursos,
    },
    {
        name: "mostrarAsignarGrados",
        path: "/asignar-grados",
        component: AsignarGrados,
    },
    {
        name: "mostrarRoles",
        path: "/roles",
        component: Roles,
    },
    {
        name: "mostrarUsuarios",
        path: "/usuarios",
        component: Usuarios,
    },
    {
        name: "mostrarInstitucionEducativa",
        path: "/institucion-educativa",
        component: InstitucionEducativa,
    },
];
