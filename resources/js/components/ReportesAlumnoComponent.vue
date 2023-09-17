<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Reportes por Alumno</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">aula</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#aula-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#aula-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#aula-add">Registrar Aula</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#aula-update">Actualizar Aula</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="aula-all">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <div class="">
                                            <div class="input-group">
                                                <input type="text" v-model="reporte.buscar" class="form-control" placeholder="Ingresar DNI del alumno" required>
                                                <div class="input-group-append">
                                                    <button v-if="!loadingBuscar" @click="buscando_info_alumno()" class="btn btn-primary" type="button">
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                        Buscar
                                                    </button>
                                                    <button v-else id="btnfollow_recargar" class="btn btn-primary" type="button">
                                                        <i class="fa-solid fa-spinner base"></i>
                                                        Procesando...
                                                    </button>
                                                    <button @click="cancelar_busqueda()" class="btn btn-secundary" type="button">
                                                        Cancelar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="listar-info" v-if="cargarInfo">
                            <div class="row">
                                <div class="col-xl-4 col-md-12">
                                    <div class="card">
                                        <div class="card-body w_user">
                                            <div class="user_avtar">
                                                <img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Alumno">
                                            </div>
                                            <div class="wid-u-info">
                                                <h5>{{data.per_nombres}} {{data.per_apellidos}}</h5>
                                                <p class="text-muted m-b-0">{{data.per_dni}}</p>
                                                <!-- <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-0">DNI</h5>
                                                        <small>{{data.per_dni}}</small>
                                                    </li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Información Académica</h3>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-6">
                                                    <div class="font-18 font-weight-bold">Nivel</div>
                                                    <div>{{data.nivel}}</div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-6">
                                                    <div class="font-18 font-weight-bold">Grado</div>
                                                    <div>{{data.grado}}</div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-6">
                                                    <div class="font-18 font-weight-bold">Sección</div>
                                                    <div>{{data.seccion}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <h3 class="card-title">Información Personal</h3>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Dirección</b>
                                                    <div>{{data.per_direccion == null ? "Chepén" : data.per_direccion}}</div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Fecha Nacimiento </b>
                                                    <div>{{data.per_fecha_nacimiento}}</div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Sexo </b>
                                                    <div>{{data.per_sexo == "F" ? "Femenino" : "Masculino" }}</div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Correo </b>
                                                    <div>{{data.per_email == null ? "No registrado" : data.per_email }}</div>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Celular </b>
                                                    <div>{{data.per_celular == null ? "No registrado" : data.per_celular }}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Reportes</h3>
                                            <div class="card-options d-none">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                                <div class="item-action dropdown ml-2">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline_item ">
                                                <img class="tl_avatar" src="assets/images/informe.png" alt="" />
                                                <span><b>Ficha de Matricula </b></span>
                                                <div class="msg">
                                                    <a href="javascript:void(0);" @click="generar_ficha_matricula()"  class="mr-20 "><i class="fa fa-folder-plus"></i> Generar</a>
                                                    <a v-if="data.ficha_matricula" target="_blank" :href="'storage/FichaMatricula/'+data.ficha_matricula" class="mr-20"><i class="fa-solid fa-eye"></i> Ver</a>
                                                    <a v-else target="_blank" :href="'storage/FichaMatricula/'+data.ficha_matricula" class="mr-20 d-none"><i class="fa-solid fa-eye"></i> Ver</a>
                                                </div>
                                            </div>
                                            <div class="timeline_item ">
                                                <img class="tl_avatar" src="assets/images/informe.png" alt="" />
                                                <span><b>Reporte de Horario</b></span>
                                                <div class="msg">
                                                    <a href="javascript:void(0);"  class="mr-20 text-muted"><i class="fa fa-folder-plus"></i> Generar</a>
                                                    <a href="javascript:void(0);" class="mr-20 text-muted d-none"><i class="fa-solid fa-eye"></i> Ver</a>
                                                </div>
                                            </div>
                                            <div class="timeline_item ">
                                                <img class="tl_avatar" src="assets/images/informe.png" alt="" />
                                                <span><b>Libreta de Notas </b></span>
                                                <div class="msg">
                                                    <a href="javascript:void(0);" @click="generar_libreta_notas()"  class="mr-20"><i class="fa fa-folder-plus"></i> Generar</a>
                                                    <a v-if="data.libreta_notas" target="_blank" :href="'storage/LibretasNotas/'+data.libreta_notas" class="mr-20"><i class="fa-solid fa-eye"></i> Ver</a>
                                                    <a v-else target="_blank" :href="'storage/LibretasNotas/'+data.libreta_notas" class="mr-20 d-none"><i class="fa-solid fa-eye"></i> Ver</a>
                                                </div>
                                            </div>
                                            <div class="timeline_item ">
                                                <img class="tl_avatar" src="assets/images/informe.png" alt="" />
                                                <span><b>Cursos Faltantes</b></span>
                                                <div class="msg">
                                                    <a href="javascript:void(0);" class="mr-20 text-muted"><i class="fa fa-folder-plus"></i> Generar</a>
                                                    <a href="" class="mr-20 text-muted d-none"><i class="fa-solid fa-eye"></i> Ver</a>
                                                </div>
                                            </div>
                                            <div class="timeline_item ">
                                                <img class="tl_avatar" src="assets/images/informe.png" alt="" />
                                                <span><b>Certificado de Estudios</b></span>
                                                <div class="msg">
                                                    <a href="javascript:void(0);" class="mr-20 text-muted"><i class="fa fa-folder-plus"></i> Generar</a>
                                                    <a  href="javascript:void(0);" class="mr-20 text-muted d-none"><i class="fa-solid fa-eye"></i> Ver</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="listar-info" v-else>
                            <div class="card-body text-center">
                                <div class="display-1 text-muted mb-2">
                                    <img src="assets/images/NotData.png" alt="error" width="30%">
                                </div>
                                <h1 class="h3 mb-3"><!-- No hay información disponible... -->{{ mensajeError }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div v-else> v-if="user.id_rol == 1"
        <div class="card-body text-center">
            <div class="display-1 text-muted mb-4">
                <img src="assets/images/error.jpg" alt="error" width="30%">
            </div>
            <h1 class="h3 mb-3">Ups... Página no autorizada...</h1>
            <p class="h6 text-muted font-weight-normal mb-3">Lo sentimos, no tiene autorizacion para ver esta página…&hellip;</p>
            <a class="btn btn-primary" href="javascript:history.back()"><i class="fe fe-arrow-left mr-2"></i>Regresar</a>
        </div>
    </div> -->
</template>
<script>
import swal from 'sweetalert';
let user = document.head.querySelector('meta[name="user"]');
export default {
    data() {
        return{
            info: {},
            periodo: {},
            alumnos: {},
            docentes: {},
            cursos: {},
            niveles: {},
            grados: {},
            secciones: {},
            data: {},
            reporte: {
                buscar: ''
            },
            notas: {
                nivel: '0',
                grado: '0',
                seccion: '0',
                curso: '',
                docente: '0',
                persona_id: '',
                valor: '0'
            },
            notas_update: {
                id: '',
                descripcion: '',
                vacantes: '',
                tutor: '',
                gra_id: '0',
            },
            notas_registro: {
                ags_id: '',
                alumno: '',
                idAlumno: '',
                idDocente: '',
                bimestre: '',
                promedio: '',
                nota_capacidad: [],
            },
            loadingBuscar: false,
            cargarInfo: false,
            mensajeError: "No hay información disponible...",
            loading0: false,
            loading: false,
            buscando: false
        }
    },
    mounted(){
        /* this.listar_niveles(); */
        /* this.listar_cursos();
        this.buscar_data(); */
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async guardando_notas(data){
            this.notas_registro.idDocente = this.notas.docente;
            var suma = 0;
            for (let i = 1; i <= data; i++) {
                const div = document.getElementById(i).value;
                div = parseInt(div);
                suma += div;
                /*  var concatenar = 'C'+i+'>'+div; */
                this.notas_registro.nota_capacidad.push(div);/*
                if(this.notas_registro.nota_capacidad.includes(div) == false){
                    this.notas_registro.nota_capacidad.push(div);
                } */
            }
            var promedio = suma/data;
            this.notas_registro.promedio = Math.round(promedio);

            axios.post("/api/agregar-notas",{
                params: {
                    notas: this.notas_registro,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    swal({
                        title: "Nota Registrada !!",
                        icon: "success",
                    }).then(() => {
                        /* this.notas.grado = []; */
                        this.buscar_data();
                        this.cancelar_registro(data);
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async grabar_asignacion(item){
            this.notas.persona_id = item;
            axios.post("/api/agregar-asignacion2",{
                params: {
                    notas: this.notas,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    swal({
                        title: "Datos Registrados !!",
                        icon: "success",
                    }).then(() => {
                        this.notas.grado = [];
                        /* this.buscar_data(); */
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async eliminar_asignacion(item){
            swal({
                title: "Estas seguro de borrar los datos selecionados?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-asignacion2",{
                        params: {
                            notas: item,
                        }
                    })
                    .then(()=>{
                        setTimeout(() => {
                            this.buscar_data();
                            swal({
                                title: "Datos Eliminados !!",
                                icon: "success",
                            }).then(() => {
                                this.notas.grado = [];
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async agregar_notas(){
            this.loading = true;
            axios.post("/api/agregar-notases",{
                params: {
                    notas: this.notas,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "notas Registrada !!",
                        icon: "success",
                    }).then(() => {
                        this.limpiar_campos();
                        this.listar_notases()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_notas(id){
            swal({
                title: "Estas seguro de borrar los datos selecionados?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-notases",{
                        params: {
                            notas: id
                        }
                    })
                    .then(()=>{
                        setTimeout(() => {
                            swal({
                                title: "notas Eliminado !!",
                                icon: "success",
                            }).then(() => {
                                this.listar_notases()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_notas(){
            this.loading = true;
            axios.post("/api/actualizar-notases",{
                params: {
                    notas: this.notas_update,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "notas Actualizado !!",
                        icon: "success",
                    }).then(() => {
                        this.limpiar_campos2();
                        this.listar_notases()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscando_info_alumno() {
            if(!this.reporte.buscar){
                swal({
                    title: "Ingrese DNI para buscar !!",
                    icon: "info",
                })
                this.cargarInfo = false;
                this.mensajeError = "No hay información disponible...";
            }else{
                this.loadingDni = true;
                axios.post("/api/reporte-data-alumno",{
                    params: {
                        buscar: this.reporte.buscar
                    }
                })
                .then(response=>{
                    setTimeout(() => {
                        if(response.data.evaluar == 2){
                            this.data = response.data;
                            this.cargarInfo = true;
                            this.mensajeError = response.data.mensaje;
                           /*  if(response.data.libreta_notas == ""){
                                console.log(document.getElementById("ver-libreta").classList);
                                const opcion = document.getElementById("ver-libreta").classList;
                                opcion.add("d-none");
                            }else{
                                console.log(document.getElementById("ver-libreta").classList);
                                const opcion = document.getElementById("ver-libreta").classList;
                                opcion.remove("d-none");
                            } */
                        }else{
                            this.data = response.data;
                            this.cargarInfo = false;
                            this.mensajeError = response.data.mensaje;
                        }
                    }, 500);
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        },
        async cancelar_busqueda() {
            this.reporte.buscar = "";
            this.cargarInfo = false;
            this.mensajeError = "No hay información disponible...";
        },
        async generar_ficha_matricula() {
            axios.post("/api/reporte-ficha-matricula",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                if(response.data.rpta == 1){
                    swal({
                        title: "Ficha de matricula generada !!",
                        icon: "success",
                    }).then(() => {
                        this.buscando_info_alumno();
                    });
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async generar_libreta_notas() {
            axios.post("/api/reporte-libreta-notas",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                if(response.data.rpta == 1){
                    swal({
                        title: "Libreta de Notas generada !!",
                        icon: "success",
                    }).then(() => {
                        this.buscando_info_alumno();
                    });
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_niveles() {
            axios.get("/api/listar-niveles")
            .then(response=>{
                this.ocultar_lista(),
                this.niveles = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_docentes() {
            axios.post("/api/listar-docentes-all",{
                params: {
                    nivel: this.notas.nivel
                }
            })
            .then(response=>{
                this.notas.docente = '0',
                this.notas.grado = '0',
                this.notas.seccion = '0',
                this.docentes = response.data.docente,
                this.ocultar_lista()
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados() {
            axios.post("/api/listar-grados-all",{
                params: {
                    docente: this.notas.docente
                }
            })
            .then(response=>{
                this.notas.grado = '0',
                this.notas.seccion = '0',
                this.grados = response.data.grados,
                this.ocultar_lista()
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_secciones() {
            axios.post("/api/listar-secciones-all2",{
                params: {
                    docente: this.notas.docente,
                    grado: this.notas.grado
                }
            })
            .then(response=>{
                this.notas.seccion = '0',
                this.secciones = response.data.secciones,
                this.ocultar_lista()
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscar_data(){
            this.buscando = true;
            this.loading0 = true;
            axios.post("/api/buscar-info-notas",{
                params: {
                    data: this.notas
                }
            })
            .then(response=>{
                $('#table-notas').DataTable().destroy();
                setTimeout(() => {
                    this.notas.curso = response.data.info.curso;
                    this.info = response.data.info;
                    this.alumnos = response.data.alumnos;
                    this.periodo = response.data.periodo;
                    /* this.data = response.data.asignacion
                    this.grados = response.data.grados */
                    this.initDtt();
                    this.ocultar_lista();
                    this.buscando = false;
                    this.loading0 = false;
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_registro(item,bimestre){
            this.notas_registro.ags_id =  item.ags_id,
            this.notas_registro.alumno =  item.alumno,
            this.notas_registro.idAlumno =  item.idAlumno,
            this.notas_registro.bimestre =  bimestre
        },
        async mostrar_crear(item,bimestre){
            const div = document.getElementById("notas-all").classList;
            const link = document.getElementById("link-all").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("notas-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");

            this.limpiar_notas(this.info.capacidades);

            this.notas_registro.ags_id =  item.ags_id,
            this.notas_registro.alumno =  item.alumno,
            this.notas_registro.idAlumno =  item.idAlumno,
            this.notas_registro.bimestre =  bimestre
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("notas-all").classList;
            const link = document.getElementById("link-all").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("notas-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.notas_update.descripcion =  item.sec_descripcion,
            this.notas_update.tutor =  item.sec_tutor,
            this.notas_update.vacantes =  item.sec_vancantes,
            this.notas_update.gra_id = item.gra_id,
            this.notas_update.id = item.sec_id
        },
        async ocultar_lista(){
            if (this.notas.nivel == 0 && this.notas.docente == 0 && this.notas.grado == 0 && this.notas.seccion == 0) {
                const div = document.getElementById("listar-info").classList;
                div.add("d-none");
            }else if (this.notas.nivel != 0 && this.notas.docente == 0 && this.notas.grado == 0 && this.notas.seccion == 0) {
                const div = document.getElementById("listar-info").classList;
                div.add("d-none");
            }else if (this.notas.nivel != 0 && this.notas.docente != 0 && this.notas.grado == 0 && this.notas.seccion == 0) {
                const div = document.getElementById("listar-info").classList;
                div.add("d-none");
            }else if (this.notas.nivel != 0 && this.notas.docente != 0 && this.notas.grado != 0 && this.notas.seccion == 0) {
                const div = document.getElementById("listar-info").classList;
                div.add("d-none");
            }else{
                const div = document.getElementById("listar-info").classList;
                div.remove("d-none");
            }
        },
        async cancelar_registro(data){
            const div = document.getElementById("notas-add").classList;
            const link = document.getElementById("link-add").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("notas-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_notas(data);
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async limpiar_notas(data){
            this.notas_registro.promedio = ''
            this.notas_registro.nota_capacidad = []
            for (let i = 1; i <= data; i++) {
                document.getElementById(i).value = '0';
            }
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-notas').DataTable({
                    dom: '<lf<t>ip>',
                    responsive: true,
                    scrollX: false,
                    /* scrollY: "200px",
                    scrollCollapse: true, */
                    "order": [[ 1, "asc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar alumno...",
                        "infoFiltered": "",
                        "sLengthMenu": "Paginación :  _MENU_",
                        "sLoadingRecords": "Cargando...",
                        "sZeroRecords": "No hay registros"
                    },
                    "columnDefs": [
                    { "searchable": false, "targets": [1] }
                    ],
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 10,
                    exportOptions: {
                        format: {
                            body: function ( data, row, column ) {
                                // Strip $ from salary column to make it numeric
                                return column === 6 ?' ': '-';
                            }
                        }
                    }
                });
            });
        }
    }
}
</script>
