<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Grados y Secciones</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">grado</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#">Registrar Grado</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#">Actualizar Grado</a></li>

                        <li id="li-add-seccion" class="nav-item d-none"><a id="link-add-seccion" class="nav-link" data-toggle="tab" href="#">Registrar Sección</a></li>
                        <li id="li-update-seccion" class="nav-item d-none"><a id="link-update-seccion" class="nav-link" data-toggle="tab" href="#">Actualizar Sección</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="grado-all">
                        <a @click="mostrar_crear()" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" class="btn btn-primary mb-4" href="#">Registrar Grado</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-grados-secciones" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>NIVEL</th>
                                                <th>GRADO</th>
                                                <th>SECCIONES</th>
                                                <th>CURSOS</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.gra_id}}</td>
                                                <td>{{item.nivel}}</td>
                                                <td>{{item.gra_descripcion}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Ver Secciones" data-toggle="modal" data-target=".bd-secciones-modal" @click="listar_secciones(item,item.nivel,item.gra_descripcion)"><i class="fa fa-eye text-secondary"></i></button>
                                                    {{item.secciones}}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Ver cursos" data-toggle="modal" data-target=".bd-cursos-modal" @click="listar_cursos(item,item.nivel,item.gra_descripcion)"><i class="fa-solid fa-list text-secondary"></i></button>
                                                    {{item.cursos}}
                                                </td>
                                                <td>
                                                    <span v-if="item.gra_estado==1" class="tag tag-success">Activo</span>
                                                    <span v-else class="tag tag-danger">Inactivo</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Añadir Secciones" @click="mostrar_crear_seccion(item.gra_id)"><i class="fa-solid fa-plus text-primary"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Editar Grado" @click="mostrar_actualizar(item)"><i class="fa fa-edit text-warning"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert d-none" title="Eliminar Grado" data-type="confirm" @click="eliminar_grado(item.gra_id)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="grado-add">
                        <div class="card">
                            <form class="card-body" @submit.prevent="agregar_grado">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" placeholder="Grado 1, Grado 2, Grado 3 ..." v-model="grado.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nivel <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="grado.niv_id"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                    {{n.niv_descripcion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-7 text-right mt-4">
                                        <button v-if="!loading" type="submit" class="btn btn-primary">Registrar</button>
                                        <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                        <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                        <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="grado-update">
                        <div class="card">
                            <form class="card-body" @submit.prevent="actualizar_grado">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control"  v-model="grado_update.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nivel <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="grado_update.niv_id"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                    {{n.niv_descripcion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-7 text-right mt-4">
                                        <button v-if="!loading" type="submit" class="btn btn-primary">Actualizar</button>
                                        <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                        <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                        <button type="button" class="btn btn-outline-secondary" @click="cancelar2()">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="seccion-add">
                        <div class="card">
                            <form class="card-body" @submit.prevent="agregar_seccion">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Periodo <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="seccion.periodo"  class="form-control show-tick" required >
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="p in periodos" :key="p.id" v-bind:value="p.per_id">
                                                    {{p.periodo}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Seccion 1, Seccion 2, Seccion 3 ..." class="form-control" v-model="seccion.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="seccion.gra_id"  class="form-control show-tick" required disabled>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="g in grados" :key="g.id" v-bind:value="g.gra_id">
                                                    {{g.gra_descripcion}} de {{g.nivel}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Tutor </label>
                                    <div class="col-md-7">
                                        <select v-model="seccion.tutor"  class="form-control show-tick" >
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="t in tutores" :key="t.id" v-bind:value="t.gra_id">
                                                    {{t.nombres}} {{t.apellidos}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Aula <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="seccion.aula"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="a in aulas" :key="a.id" v-bind:value="a.ala_id">
                                                    {{a.ala_descripcion}} - {{a.ala_ubicacion}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nro Vacantes <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="0" class="form-control" v-model="seccion.vacantes" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-7 text-right mt-4">
                                        <button v-if="!loading" type="submit" class="btn btn-primary">Registrar</button>
                                        <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                        <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                        <button type="button" class="btn btn-outline-secondary" @click="cancelar_seccion()">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="seccion-update">
                        <div class="card">
                            <form class="card-body" @submit.prevent="actualizar_seccion">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Seccion 1, Seccion 2, Seccion 3 ..." class="form-control" v-model="seccion_update.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nro Vacantes <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="0" class="form-control" v-model="seccion_update.vacantes" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="seccion_update.gra_id"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option v-for="g in grados" :key="g.id" v-bind:value="g.gra_id">
                                                    {{g.gra_descripcion}} de {{g.niv_id = 1 ? 'Primaria':'Secundaria'}}
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-7 text-right mt-4">
                                        <button v-if="!loading" type="submit" class="btn btn-primary">Actualizar</button>
                                        <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                        <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                        <button type="button" class="btn btn-outline-secondary" @click="cancelar2_seccion()">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-secciones-modal" id="seccionesVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Secciones de {{name_grado}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix mt-2" v-if="secciones.length > 0">
                            <div class="col-lg-4 col-md-6" v-for="(item, index) in secciones" :key="index">
                                <div class="card" style="color: black;background: linear-gradient(rgb(125 183 213 / 50%) 0%, rgb(175 192 223 / 50%) 100%);">
                                    <div class="card-body text-center">
                                        <h4><b>{{item.sec_descripcion}}</b></h4>
                                        <hr>
                                        <h6 class="m-2"><b>Vacantes:</b> {{item.sec_vacantes}}</h6>
                                        <h6 class="mt-3"><b>Aula:</b> {{item.aula}}</h6>
                                        <h6 class="mt-3"><b>Ubicación:</b></h6>
                                        <h6 class="">{{item.ubicacion}}</h6>
                                        <h6 class="mt-3"><b>Tutor:</b></h6>
                                        <h6 class="">{{item.tutor}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix mt-2" v-else>
                            <div class="col-lg-12 col-md-6 text-center" >
                                <img src="https://img.freepik.com/vector-premium/ningun-concepto-ilustracion-datos_108061-573.jpg" alt="error" width="30%">
                                <h5 class="mb-3">No hay secciones registradas...</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-cursos-modal" id="cursosVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Cursos de {{name_grado}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix mt-2" v-if="cursos.length > 0">
                            <div class="col-lg-4 col-md-6 mb-2" v-for="(item, index) in cursos" :key="index">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <i class="fa-solid fa-book"></i>
                                        <!-- {{item.cur_nombre}} -->
                                        {{item.cur_abreviatura}}
                                        <span class="badge badge-primary badge-pill">
                                            Capacidades: {{item.capacidades}}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row clearfix mt-2" v-else>
                            <div class="col-lg-12 col-md-6 text-center" >
                                <img src="https://img.freepik.com/vector-premium/ningun-concepto-ilustracion-datos_108061-573.jpg" alt="error" width="30%">
                                <h5 class="mb-3">No hay cursos registrados...</h5>
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
            cursos: {},
            niveles: {},
            data: {},
            secciones: {},
            grados: {},
            aulas: {},
            tutores: {},
            periodos: {},
            grado: {
                descripcion: '',
                niv_id: '0',
                estado: '0'
            },
            grado_update: {
                id: '',
                descripcion: '',
                estado: '0',
                niv_id: '0'
            },
            seccion: {
                descripcion: '',
                tutor: '0',
                aula: '0',
                gra_id: '0',
                periodo: '0',
                vacantes: ''
            },
            seccion_update: {
                id: '',
                descripcion: '',
                tutor: '0',
                aula: '0',
                gra_id: '0',
                periodo: '0',
                vancantes: ''
            },
            loading: false,
            buscando: false,
            name_grado: '',
        }
    },
    mounted(){
        this.listar_grados();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_grado(){
            this.loading = true;
            axios.post("/api/agregar-grado",{
                params: {
                    grado: this.grado,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Grado Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_grados()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_grado(id){
            swal({
                title: "Estas seguro de eliminar este grado?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-grado",{
                        params: {
                            id_grado: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Grado Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_grados()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_grado(){
            this.loading = true;
            axios.post("/api/actualizar-grado",{
                params: {
                    grado: this.grado_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Grado Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_grados()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados() {
            this.buscando = true;
            axios.get("/api/listar-grados-all")
            .then(response=>{
                $('#table-grados-secciones').DataTable().destroy();
                this.data = response.data
                this.initDtt();
                setTimeout(() => {
                    this.buscando = false;
                }, 500);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados2() {
            axios.get("/api/listar-grados-all")
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_niveles() {
            axios.get("/api/listar-niveles")
            .then(response=>{
                this.niveles = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_aulas() {
            axios.get("/api/listar-aulas-clases")
            .then(response=>{
                this.aulas = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_tutores() {
            axios.get("/api/listar-tutores-all")
            .then(response=>{
                this.tutores = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_periodos() {
            axios.get("/api/listar-periodos")
            .then(response=>{
                this.periodos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear(){
            this.listar_niveles();
            const div = document.getElementById("grado-all").classList;
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
            const div2 = document.getElementById("grado-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            this.listar_niveles();
            const div = document.getElementById("grado-all").classList;
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
            const div2 = document.getElementById("grado-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.grado_update.descripcion =  item.gra_descripcion,
            this.grado_update.niv_id = item.niv_id,
            this.grado_update.id = item.gra_id
        },
        async listar_secciones(item,nivel,grado){
            axios.post("/api/listar-secciones-all",{
                params: {
                    grado: item.gra_id,
                }
            })
            .then(response=>{
                this.secciones = response.data;
                this.name_grado = grado + ' de ' + nivel;
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_cursos(item,nivel,grado){
            axios.post("/api/listar-cursos-all",{
                params: {
                    grado: item.gra_id,
                    nivel: item.niv_id
                }
            })
            .then(response=>{
                this.cursos = response.data;
                this.name_grado = grado + ' de ' + nivel;
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear_seccion(grado){
            this.listar_grados2();
            this.listar_aulas();
            this.listar_tutores();
            this.listar_periodos();
            const div = document.getElementById("grado-all").classList;
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
            const div2 = document.getElementById("seccion-add").classList;
            const link2 = document.getElementById("link-add-seccion").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add-seccion").classList;
            opcion_li.remove("d-none");

            this.seccion.gra_id =  grado
        },
        async mostrar_actualizar_seccion(item){
            const div = document.getElementById("seccion-all").classList;
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
            const div2 = document.getElementById("seccion-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.seccion_update.descripcion =  item.sec_descripcion,
            this.seccion_update.tutor =  item.sec_tutor,
            this.seccion_update.vacantes =  item.sec_vancantes,
            this.seccion_update.gra_id = item.gra_id,
            this.seccion_update.id = item.sec_id
        },
        async agregar_seccion(){
            this.loading = true;
            axios.post("/api/agregar-secciones",{
                params: {
                    seccion: this.seccion,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Sección Registrada !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos_seccion();
                        this.listar_grados()
                        this.cancelar_seccion();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_seccion(id){
            swal({
                title: "Estas seguro de eliminar este seccion?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-secciones",{
                        params: {
                            id_seccion: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Seccion Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_secciones()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_seccion(){
            this.loading = true;
            axios.post("/api/actualizar-secciones",{
                params: {
                    seccion: this.seccion_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "seccion Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_secciones()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async cancelar(){
            const div = document.getElementById("grado-add").classList;
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
            const div2 = document.getElementById("grado-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos();
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async cancelar2(){
            const div = document.getElementById("grado-update").classList;
            const link = document.getElementById("link-update").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("grado-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos2();
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async limpiar_campos() {
            this.grado.descripcion = "",
            this.grado.niv_id = "0"
        },
        async limpiar_campos2() {
            this.grado_update.descripcion = "",
            this.grado_update.niv_id = "0"
        },
        async cancelar_seccion(){
            const div = document.getElementById("seccion-add").classList;
            const link = document.getElementById("link-add-seccion").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("grado-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos_seccion();
            const opcion_li = document.getElementById("li-add-seccion").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async cancelar2_seccion(){
            const div = document.getElementById("seccion-update").classList;
            const link = document.getElementById("link-update").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("seccion-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos2();
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async limpiar_campos_seccion() {
            this.seccion.descripcion = "",
            this.seccion.tutor = "0",
            this.seccion.aula = "0",
            this.seccion.gra_id = "0",
            this.seccion.vacantes = "",
            this.seccion.periodo = "0"
        },
        async limpiar_campos2_seccion() {
            this.seccion_update.descripcion = "",
            this.seccion_update.vacantes = "",
            this.seccion_update.tutor = "",
            this.seccion_update.gra_id = "0"
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-grados-secciones').DataTable({
                    dom: '<lf<t>ip>',
                    responsive: true,
                    scrollX: false,
                    "order": [[ 0, "desc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar...",
                        "infoFiltered": "",
                        "sLengthMenu": "Paginación :  _MENU_",
                        "sLoadingRecords": "Cargando...",
                        "sZeroRecords": "No hay registros"
                    },
                    "columnDefs": [
                    { "searchable": false, "targets": [5] }
                    ],
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 10,
                    exportOptions: {
                        format: {
                            body: function ( data, row, column, node ) {
                                // Strip $ from salary column to make it numeric
                                return column === 6 ?' ': '-';
                            }
                        }
                    }
                });
            });
        },
        initDtt2() {
            $(document).ready(() => {
                $('#ver-table-secciones').DataTable({
                    dom: '<f<t>ip>',
                    responsive: true,
                    scrollX: false,
                    "order": [[ 0, "asc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar...",
                        "infoFiltered": "",
                        "sLengthMenu": "Paginación :  _MENU_",
                        "sLoadingRecords": "Cargando...",
                        "sZeroRecords": "No hay registros"
                    },
                    "columnDefs": [
                        { "searchable": false, "targets": [5] }
                    ],
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 5,
                    exportOptions: {
                        format: {
                            body: function ( data, row, column, node ) {
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
