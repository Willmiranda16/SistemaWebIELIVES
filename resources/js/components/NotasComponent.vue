<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Notas</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">notas</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#notas-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#notas-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#notas-add">Registrar Nota</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#notas-update">Actualizar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="notas-all">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4" style="display: flex;justify-content: flex-end;">
                                    <label class="col-md-1 col-form-label">Año </label>
                                    <div class="col-md-3">
                                        <select v-model="notas.año" @change="listar_niveles()"  class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in años" :key="n.id" v-bind:value="n.año_id">
                                                {{n.año_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-1 col-form-label">Nivel </label>
                                    <div class="col-md-3">
                                        <select v-model="notas.nivel"  class="form-control show-tick" @change="listar_docentes()">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                {{n.niv_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <label class="col-md-1 col-form-label">Docente </label>
                                    <div class="col-md">
                                        <select v-model="notas.docente" @change="listar_grados()"  class="form-control show-tick">
                                            <option v-if="docentes.length == 0" selected disabled value="0"> No hay docentes registrados </option>
                                            <option v-else value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in docentes" :key="n.id" v-bind:value="n.pa_id">
                                                {{n.nombres}} {{n.apellidos}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label">Grado </label>
                                    <div class="col-md-3">
                                        <select v-model="notas.grado"  class="form-control show-tick" @change="listar_secciones()">
                                            <option v-if="grados.length == 0" value="0" selected disabled > No hay grados registrados </option>
                                            <option v-else value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in grados" :key="n.id" v-bind:value="n.gra_id">
                                                {{n.gra_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <label class="col-md-1 col-form-label">Sección </label>
                                    <div class="col-md">
                                        <select v-model="notas.seccion"  class="form-control show-tick">
                                            <option v-if="secciones.length == 0" selected disabled value="0"> No hay secciones registrados </option>
                                            <option v-else value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in secciones" :key="n.id" v-bind:value="n.sec_id">
                                                {{n.sec_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-2 col-md-4 col-sm-6" style="display: flex;align-items: center;">
                                        <a v-if="!loading0" @click="buscar_data()" href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Cargar Información</a>
                                        <a v-else href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Procesando...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="listar-info" class="card d-none">
                            <div class="card-header">
                                <h3 class="card-title">Curso: {{notas.curso}}</h3>
                            </div>
                            <div class="card-body col-md-12">
                                <div class="table-responsive">
                                    <table id="table-notas" class="display" style="width:100%;text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>DNI</th>
                                                <th>Alumno</th>
                                                <th v-for="(item, index) in periodo.cantidad" :key="index">
                                                    {{periodo.name}} {{item}}
                                                </th>
                                                <th>Promedio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in alumnos" :key="index">
                                                <td class="d-none">{{item.ags_id}}</td>
                                                <td >{{item.dni}}</td>
                                                <td>{{item.alumno}}</td>
                                                <td v-for="(g, index2) in periodo.cantidad" :key="index2">
                                                    <div v-if="item.notas[g-1]">
                                                        {{ item.notas[g-1]["nt_nota"] }}
                                                    </div>
                                                    <div v-else>
                                                        0
                                                        <button type="button" class="btn btn-icon btn-sm" title="Registrar" @click="mostrar_crear(item,g)"><i class="fa fa-edit text-secondary"></i></button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="tag tag-success" v-if="item.promedio > 11">{{item.promedio}}</span>
                                                    <span class="tag tag-danger" v-else-if="item.promedio > 0">{{item.promedio}}</span>
                                                    <span class="tag tag-primary" v-else>0</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="notas-add">
                        <div class="card-header" style="justify-content: center;">
                            <h4 class="card-title" style="font-size: 20px;">
                                <b>REGISTRO DE NOTAS:</b>
                                {{ notas_registro.alumno }}
                            </h4>
                        </div>
                        <div class="card col-6" style="margin: 0 auto;margin-top: 5%;margin-bottom: 5%;">
                            <div class="card-header">
                                <h3 class="card-title">Bimestre {{ notas_registro.bimestre }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row" v-for="(item, index) in info.capacidades" :key="index">
                                    <label class="col-md-3 col-form-label">C{{item}}</label>
                                    <div class="col-md-7">
                                        <input v-bind:id="item" type="text" placeholder="0" class="form-control" autofocus >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="align-items: center;display: flex;justify-content: center;">
                            <button @click="guardando_notas(info.capacidades)" class="btn btn-primary m-3">Registrar</button>
                            <button @click="limpiar_notas(info.capacidades)" class="btn btn-secondary m-3" >Limpiar</button>
                            <button @click="cancelar_registro()" class="btn btn-outline-secondary m-3">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-notas-modal" id="notasVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><b>REGISTRO DE NOTAS: </b> {{ notas_registro.alumno }}</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="card col-6" >
                            <div class="card-header">
                                <h3 class="card-title">Bimestre {{ notas_registro.bimestre }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row" v-for="(item, index) in info.capacidades" :key="index">
                                    <label class="col-md-3 col-form-label">C{{item}}</label>
                                    <div class="col-md-7">
                                        <input v-bind:id="item" type="text" placeholder="-" class="form-control" autofocus >
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer">
                                <h3 class="card-title">Promedio Bimestral: -</h3>
                            </div> -->
                        </div>
                        <div class="col" style="align-items: center;display: flex;justify-content: center;">
                            <button @click="guardando_notas(info.capacidades)" class="btn btn-primary m-3">Registrar</button>
                            <button @click="limpiar_notas(info.capacidades)" class="btn btn-secondary m-3" >Limpiar</button>
                            <!-- <button @click="cancelar_registro()" class="btn btn-outline-secondary m-3">Cancelar</button> -->
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
            años: {},
            alumnos: {},
            docentes: {},
            cursos: {},
            niveles: {},
            grados: {},
            secciones: {},
            data: {},
            notas: {
                año: '0',
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
                año_id: '',
                ags_id: '',
                alumno: '',
                idAlumno: '',
                idDocente: '',
                bimestre: '',
                promedio: '',
                nota_capacidad: [],
            },
            loading0: false,
            loading: false,
            buscando: false
        }
    },
    mounted(){
        this.listar_años();
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
            this.notas_registro.año_id = this.notas.año;
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
        async listar_años() {
            axios.get("/api/listar-anios")
            .then(response=>{
                this.años = response.data
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
                    "order": [[ 2, "asc" ]]
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
