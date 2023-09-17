<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Asignar Cursos</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">asignar</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#asignar-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#asignar-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#asignar-add">Registrar asignar</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#asignar-update">Actualizar asignar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="asignar-all">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-md-1 col-form-label">Nivel </label>
                                    <div class="col-md-8">
                                        <select v-model="asignar.nivel"  class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                {{n.niv_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg col-md-4 col-sm-6" style="display: flex;align-items: center;">
                                        <a v-if="!loading0" @click="buscar_data()" href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Cargar Información</a>
                                        <a v-else href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Procesando...</a>
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <div class="col-lg-5 col-md-4 col-sm-6">
                                        <!-- <label>Nivel </label> -->
                                        <select @change="listar_grados()"  v-model="asignar.nivel"  class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona un nivel --</option>
                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                {{n.niv_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-6">
                                        <label>Grado </label>
                                        <select v-model="asignar.grado"  class="form-control show-tick" required>
                                            <option value="0" selected>-- Selecciona un grado--</option>
                                            <option value="-1">Todos los grados</option>
                                            <option v-for="g in grados" :key="g.id" v-bind:value="g.gra_id">
                                                {{g.gra_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <label>Sección </label>
                                        <select class="form-control show-tick" required disabled>
                                            <option value="0" selected>-- Selecciona --</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label>Docentes </label>
                                        <select class="form-control show-tick" required disabled>
                                            <option value="0" selected>-- Selecciona --</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Admission Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a @click="buscar_data()" href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Buscar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="listar-info" class="card d-none">
                            <div class="card-body col-md-12">
                                <div class="table-responsive">
                                    <table id="table-asignar" class="display" style="width:100%;text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th></th>
                                                <th class="d-none">DNI</th>
                                                <th>DOCENTE</th>
                                                <th v-for="(item, index) in cursos" :key="index">
                                                    {{item.cur_abreviatura}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.pa_id}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Registrar" @click="grabar_asignacion(item.pa_id)"><i class="fa fa-save text-info"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Limpiar" @click="eliminar_asignacion(item.pa_id)"><i class="fa fa-trash text-danger"></i></button>
                                                </td>
                                                <td class="d-none">{{item.dni}}</td>
                                                <td>{{item.nombres}} {{item.apellidos}}</td>
                                                <td v-for="(i, index) in cursos" :key="index">
                                                    <input v-if="i.cur_nombre == item.checked" class="" type="checkbox" @click="guardando_cursos(item.checked,i.cur_nombre)" checked>
                                                    <input v-else class="" type="checkbox" @click="guardando_cursos(item.checked,i.cur_nombre)">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane active" id="asignar-all">
                        <div class="card d-none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Roll No.">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Admission Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a @click="mostrar_crear()" class="btn btn-primary mb-4" href="#asignar-add">Registrar asignar</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-asignars" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>DNI</th>
                                                <th>NOMBRES</th>
                                                <th>APELLIDOS</th>
                                                <th>EMAIL</th>
                                                <th>ROL</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td>{{item.id_persona}}</td>
                                                <td>{{item.dni}}</td>
                                                <td>{{item.nombres}}</td>
                                                <td>{{item.apellidos}}</td>
                                                <td>{{item.email}}</td>
                                                <td>{{item.rol}}</td>
                                                <td>
                                                    <span v-if="item.estado==1" class="tag tag-success">Habilitado</span>
                                                    <span v-else class="tag tag-danger">Deshabilitado</span>
                                                </td>
                                                <td>
                                                <button type="button" class="btn btn-icon btn-sm d-none" title="View"><i class="fa fa-eye"></i></button>
                                                <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon btn-sm js-sweetalert d-none" title="Eliminar" data-type="confirm" @click="eliminar_asignar(item.id,item.id_persona)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-pane" id="asignar-grid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card" v-if="item.estado==1" style="height: 350px;">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box green" data-toggle="tooltip" title="Habilitado"></div>
                                        <img class="card-profile-img" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                                        <h5 class="mb-0">{{item.nombres}} <br> {{item.apellidos}}</h5>
                                        <div class="text-muted mt-3">Email</div>
                                        <p class="mb-4 ">{{item.email}}</p>
                                        <div class="text-muted mt-3">Rol</div>
                                        <p class="mb-4 ">{{item.rol}}</p>
                                    </div>
                                </div>
                                 <div class="card" v-else style="height: 350px;">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box orange" data-toggle="tooltip" title="Deshabilitado"></div>
                                        <img class="card-profile-img" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                                        <h5 class="mb-0">{{item.nombres}} <br> {{item.apellidos}}</h5>
                                        <div class="text-muted mt-3">Email</div>
                                        <p class="mb-4 ">{{item.email}}</p>
                                        <div class="text-muted mt-3">Rol</div>
                                        <p class="mb-4 ">{{item.rol}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="asignar-add">
                        <div class="card">
                            <form class="card-body" @submit.prevent="agregar_asignar">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="asignar 1, asignar 2, asignar 3 ..." class="form-control" v-model="asignar.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nro Vacantes <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="0" class="form-control" v-model="asignar.vacantes" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="asignar.gra_id"  class="form-control show-tick" required>
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
                                        <button v-if="!loading" type="submit" class="btn btn-primary">Registrar</button>
                                        <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                        <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                        <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="asignar-update">
                        <div class="card">
                            <form class="card-body" @submit.prevent="actualizar_asignar">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="asignar 1, asignar 2, asignar 3 ..." class="form-control" v-model="asignar_update.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nro Vacantes <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="0" class="form-control" v-model="asignar_update.vacantes" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="asignar_update.gra_id"  class="form-control show-tick" required>
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
                                        <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                    </div>
                                </div>
                            </form>
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
            grados: {},
            data: {},
            asignar: {
                nivel: '2',
                grado: '0',
                curso: [],
                persona_id: ''
            },
            asignar_update: {
                id: '',
                descripcion: '',
                vacantes: '',
                tutor: '',
                gra_id: '0',
            },
            loading0: false,
            loading: false,
            buscando: false
        }
    },
    mounted(){
        this.listar_niveles();
        this.buscar_data();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async guardando_cursos(valor,e){
            if(this.asignar.curso.includes(e) == false){
                this.asignar.curso.push(e);
            }else{
                this.asignar.curso = this.asignar.curso.filter((item) => item !== e);
            }
            console.log(this.asignar.curso);
            /* this.asignar.curso.push(item); */
        },
        async grabar_asignacion(item){
            this.asignar.persona_id = item;
            axios.post("/api/agregar-asignacion",{
                params: {
                    asignar: this.asignar,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    swal({
                        title: "Datos Registrados !!",
                        icon: "success",
                    }).then(() => {
                        this.asignar.curso = [];
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
                    axios.post("/api/eliminar-asignacion",{
                        params: {
                            asignar: item,
                        }
                    })
                    .then(()=>{
                        setTimeout(() => {
                            this.buscar_data();
                            swal({
                                title: "Datos Eliminados !!",
                                icon: "success",
                            }).then(() => {
                                this.asignar.curso = [];
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async agregar_asignar(){
            this.loading = true;
            axios.post("/api/agregar-asignares",{
                params: {
                    asignar: this.asignar,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "asignar Registrada !!",
                        icon: "success",
                    }).then(() => {
                        this.limpiar_campos();
                        this.listar_asignares()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_asignar(id){
            swal({
                title: "Estas seguro de eliminar este asignar?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-asignares",{
                        params: {
                            id_asignar: id
                        }
                    })
                    .then(()=>{
                        setTimeout(() => {
                            swal({
                                title: "asignar Eliminado !!",
                                icon: "success",
                            }).then(() => {
                                this.listar_asignares()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_asignar(){
            this.loading = true;
            axios.post("/api/actualizar-asignares",{
                params: {
                    asignar: this.asignar_update,
                }
            })
            .then(()=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "asignar Actualizado !!",
                        icon: "success",
                    }).then(() => {
                        this.limpiar_campos2();
                        this.listar_asignares()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_asignares() {
            axios.get("/api/listar-asignares-all")
            .then(response=>{
                this.data = response.data
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
        async listar_grados() {
            axios.post("/api/listar-grados",{
                params: {
                    id: this.asignar.nivel
                }
            })
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscar_data(){
            this.buscando = true;
            this.loading0 = true;
            axios.post("/api/buscar-info",{
                params: {
                    nivel: this.asignar.nivel
                }
            })
            .then(response=>{
                $('#table-asignar').DataTable().destroy();
                setTimeout(() => {
                    this.data = response.data.docente
                    this.cursos = response.data.cursos
                    this.initDtt();
                    const div = document.getElementById("listar-info").classList;
                    div.remove("d-none");
                    this.buscando = false;
                    this.loading0 = false;
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear(){
            const div = document.getElementById("asignar-all").classList;
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
            const div2 = document.getElementById("asignar-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("asignar-all").classList;
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
            const div2 = document.getElementById("asignar-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.asignar_update.descripcion =  item.sec_descripcion,
            this.asignar_update.tutor =  item.sec_tutor,
            this.asignar_update.vacantes =  item.sec_vancantes,
            this.asignar_update.gra_id = item.gra_id,
            this.asignar_update.id = item.sec_id
        },
        async cancelar(){
            const div = document.getElementById("asignar-add").classList;
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
            const div2 = document.getElementById("asignar-all").classList;
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
            const div = document.getElementById("asignar-update").classList;
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
            const div2 = document.getElementById("asignar-all").classList;
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
            this.asignar.descripcion = "",
            this.asignar.vacantes = "",
            this.asignar.tutor = "",
            this.asignar.gra_id = "0"
        },
        async limpiar_campos2() {
            this.asignar_update.descripcion = "",
            this.asignar_update.vacantes = "",
            this.asignar_update.tutor = "",
            this.asignar_update.gra_id = "0"
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-asignar').DataTable({
                    dom: '<lf<t>ip>',
                    responsive: true,
                    scrollX: false,
                    /* scrollY: "200px",
                    scrollCollapse: true, */
                    "order": [[ 3, "asc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar docente...",
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
                    "pageLength": 5,
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
