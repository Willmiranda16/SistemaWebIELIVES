<template>
    <div >
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Cursos</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">curso</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all-curso" class="nav-item"><a id="link-all-curso" class="nav-link active" data-toggle="tab" href="#curso-all">Ver Lista</a></li>
                        <li id="li-grid-curso" class="nav-item d-none"><a id="link-grid-curso" class="nav-link" data-toggle="tab" href="#curso-grid">Ver Cuadricula</a></li>
                        <li id="li-add-curso" class="nav-item d-none"><a id="link-add-curso" class="nav-link" data-toggle="tab" href="#curso-add">Registrar Curso</a></li>
                        <li id="li-update-curso" class="nav-item d-none"><a id="link-update-curso" class="nav-link" data-toggle="tab" href="#curso-update">Actualizar Curso</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="curso-all">
                        <a @click="mostrar_crear()" class="btn btn-primary mb-4" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" href="#">Registrar Curso</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-cursos" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>CURSO</th>
                                                <th>NRO. CAPACIDADES</th>
                                                <th>CANT. DE HORAS</th>
                                                <th>GRADO</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.cur_id}}</td>
                                                <td>{{item.cur_nombre}}</td>
                                                <td>{{item.capacidades}}</td>
                                                <td>{{item.cur_horas}}</td>
                                                <td>{{item.grado}} de {{item.nivel}}</td>
                                                <td>
                                                    <span v-if="item.cur_estado==1" class="tag tag-success">Activo</span>
                                                    <span v-else class="tag tag-danger">Inactivo</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Ver capacidades" data-toggle="modal" data-target=".bd-capacidades-modal" @click="listar_capacidades(item.cur_id,item.cur_nombre)"><i class="fa fa-eye text-secondary"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit text-warning"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_curso(item.cur_id)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="curso-grid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card" style="height: 350px;">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="https://img2.freepng.es/20180505/eqq/kisspng-academic-term-calendar-inset-day-time-fotolia-5aee6c4324f585.7074900315255747231514.jpg" alt="">
                                        <h5 class="mb-0">curso {{item.descripcion}}</h5>
                                        <div class="text-muted mt-3">Inicio</div>
                                        <p class="mb-2">{{item.fecha_inicio}}</p>
                                        <div class="text-muted">Fin</div>
                                        <p class="mb-2">{{item.fecha_fin}}</p>
                                        <div class="text-muted mt-3">Estado</div>
                                        <p class="mb-4">
                                            <span v-if="item.estado==0" class="tag tag-orange">Nuevo</span>
                                            <span v-else-if="item.estado==1" class="tag tag-success">Aperturado</span>
                                            <span v-else class="tag tag-danger">Finalizado</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="curso-add">
                        <form class="row" @submit.prevent="agregar_curso">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Información Básica</h3>
                                        <div class="card-options ">
                                            <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Curso <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" v-model="curso.nombre" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Abreviatura <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" v-model="curso.abreviatura" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Horas <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" v-model="curso.horas" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Nivel <span class="text-danger">*</span></label>
                                                    <select @change="listar_grados()"  v-model="curso.nivel"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                            {{n.niv_descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Grado <span class="text-danger">*</span></label>
                                                    <select v-model="curso.grado"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option value="-1">Todos los grados</option>
                                                        <option v-for="g in grados" :key="g.id" v-bind:value="g.gra_id">
                                                            {{g.gra_descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-11 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Capacidad </label>
                                                    <input id="input-capacidad" type="text" class="form-control" v-model="capacidad.descripcion" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg col-md-6 col-sm-12 mt-2" style="align-items: center;display: flex;color: WHITE;cursor: pointer;justify-content: center;">
                                                <a class="btn btn-primary" @click="mostrar_capacidades()" ><i class="fa-solid fa-plus"></i></a>
                                            </div>
                                            <div id="detalleCapacidades" class="col-lg-12 col-md-6 col-sm-12 d-none">
                                                <div class="form-group">
                                                    <hr>
                                                    <label>Detalle de las capacidades</label>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Descripción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody v-for="(item, index) in capacidades" :key="index">
                                                            <tr>
                                                                <th scope="row">{{(index + 1)}}</th>
                                                                <td>{{item}}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_capacidad(item)"><i class="fa fa-trash-o text-danger"></i></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div v-if="ok" class="col invalid-feedback" style="display:block">
                                                <div class="error">
                                                    {{error}}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12 mt-3 d-none">
                                                <span class="text-danger">* Campos requeridos</span>
                                            </div>
                                            <div class="col-sm-12 text-right mt-4">
                                                <button v-if="!loading" type="submit" class="btn btn-primary">Registrar</button>
                                                <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                                <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                                <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="curso-update">
                        <form class="row" @submit.prevent="actualizar_curso">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Información Básica</h3>
                                        <div class="card-options ">
                                            <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Curso <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" v-model="update_data.nombre" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Abreviatura <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" v-model="update_data.abreviatura" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Horas <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" v-model="update_data.horas" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Nivel <span class="text-danger">*</span></label>
                                                    <select @change="listar_grados()"  v-model="update_data.nivel"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                            {{n.niv_descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Grado <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.grado"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option value="-1">Todos los grados</option>
                                                        <option v-for="g in grados" :key="g.id" v-bind:value="g.gra_id">
                                                            {{g.gra_descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Estado <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.estado"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-11 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Capacidad </label>
                                                    <input id="input-capacidad" type="text" class="form-control" v-model="update_data.descripcion" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-lg col-md-6 col-sm-12 mt-2" style="align-items: center;display: flex;color: WHITE;cursor: pointer;justify-content: center;">
                                                <a class="btn btn-primary" @click="mostrar_capacidades2()" ><i class="fa-solid fa-plus"></i></a>
                                            </div>
                                            <div id="detalleCapacidades2" class="col-lg-12 col-md-6 col-sm-12 d-none">
                                                <div class="form-group">
                                                    <hr>
                                                    <label>Detalle de las capacidades</label>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Descripción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody v-for="(item, index) in capacidades" :key="index">
                                                            <tr>
                                                                <th scope="row">{{(index + 1)}}</th>
                                                                <td>{{item}}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Editar" data-type="confirm" @click="editar_capacidad(item)"><i class="fa fa-edit text-info"></i></button>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_capacidad(item)"><i class="fa fa-trash-o text-danger"></i></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div v-if="ok" class="col invalid-feedback" style="display:block">
                                                <div class="error">
                                                    {{error}}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12 mt-3 d-none">
                                                <span class="text-danger">* Campos requeridos</span>
                                            </div>
                                            <div class="col-sm-12 text-right mt-4">
                                                <button v-if="!loading" type="submit" class="btn btn-primary">Actualizar</button>
                                                <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                                <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                                <button type="button" class="btn btn-outline-secondary" @click="cancelar2()">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-capacidades-modal" id="capacidadesVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Capacidades de {{name}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix mt-2" v-if="lists.length > 0">
                            <div class="col-lg-4 col-md-6" v-for="(item, index) in lists" :key="index">
                                <div class="card" style="color: black;background: linear-gradient(rgb(125 183 213 / 50%) 0%, rgb(175 192 223 / 50%) 100%);">
                                    <div class="card-body text-center">
                                        <h4><b>C{{index+1}}</b></h4>
                                        <hr>
                                        <h6 class="m-2">{{item.cap_descripcion}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix mt-2" v-else>
                            <div class="col-lg-12 col-md-6 text-center" >
                                <img src="https://img.freepik.com/vector-premium/ningun-concepto-ilustracion-datos_108061-573.jpg" alt="error" width="30%">
                                <h5 class="mb-3">No hay capacidades registradas...</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- <div v-else> v-if="user.id_rol == 1 || user.id_rol == 2"
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
            lists: {},
            niveles: {},
            grados: {},
            data: {},
            capacidades: [],
            anios: {},
            tipos: {},
            curso: {
                nombre: '',
                abreviatura: '',
                horas: '',
                cantidad: '',
                nivel: '0',
                grado: '0'
            },
            capacidad: {
                descripcion: ''
            },
            update_data: {
                nombre: '',
                abreviatura: '',
                horas: '',
                nivel: '0',
                grado: '0',
                estado: '',
                cur_id: '',
                descripcion: '',
                cap_id: ''
            },
            loading: false,
            buscando: false,
            ok: false,
            error: '',
            name: ''
        }
    },
    mounted(){
        this.listar_cursos();
        this.listar_niveles();
        /* this.listar_anios();
        this.listar_tipo_notas(); */
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_curso(){
            this.capacidad.descripcion = "-";
            if(this.capacidades.length != 0){
                const input = document.getElementById("input-capacidad");
                input.required = false;

                this.loading = true;
                axios.post("/api/agregar-curso",{
                    params: {
                        curso: this.curso,
                        capacidad: this.capacidades,
                    }
                })
                .then(response=>{
                    setTimeout(() => {
                        this.loading = false;
                        swal({
                            title: "Curso Registrado !!",
                            icon: "success",
                        }).then((willConfirm) => {
                            this.limpiar_campos();
                            this.listar_cursos()
                            this.cancelar();
                        });
                    }, 1000);
                })
                .catch(error=>{
                    console.log(error)
                })
            }else{
                this.ok = true;
                this.error = "El curso no tiene capacidades, por favor añada al menos 1";
            }
        },
        async eliminar_curso(curso){
            swal({
                title: "Estas seguro de eliminar este curso?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-curso",{
                        params: {
                            id_curso: curso
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Curso Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_cursos()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_curso(){
            this.update_data.descripcion = "-";
            if(this.capacidades.length != 0){
                this.loading = true;
                axios.post("/api/actualizar-curso",{
                    params: {
                        data: this.update_data,
                        capacidad: this.capacidades,
                    }
                })
                .then(response=>{
                    setTimeout(() => {
                        this.loading = false;
                        swal({
                            title: "Curso Actualizado !!",
                            icon: "success",
                        }).then((willConfirm) => {
                            this.limpiar_campos2();
                            this.listar_cursos()
                            this.cancelar2();
                        });
                    }, 1000);
                })
                .catch(error=>{
                    console.log(error)
                })
            }else{
                this.ok = true;
                this.error = "El curso no tiene capacidades, por favor añada al menos 1";
            }
        },
        async listar_cursos() {
            this.buscando = true;
            axios.get("/api/listar-cursos")
            .then(response=>{
                $('#table-cursos').DataTable().destroy();
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
        async listar_capacidades(id,name){
            axios.post("/api/listar-capacidades",{
                params: {
                    id: id,
                }
            })
            .then(response=>{
                this.lists = response.data;
                this.name = name;
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
                    id: this.curso.nivel
                }
            })
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados2() {
            axios.post("/api/listar-grados",{
                params: {
                    id: this.update_data.nivel
                }
            })
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_capacidades(){
            if(this.capacidad.descripcion != ""){
                this.ok = false;
                this.capacidades.push(this.capacidad.descripcion);
                this.capacidad.descripcion = " ";
                const div = document.getElementById("detalleCapacidades").classList;
                div.remove("d-none");
            }else{
                if(this.capacidades.length == 0){
                    const div = document.getElementById("detalleCapacidades").classList;
                    div.add("d-none");
                }
            }
        },
        async mostrar_capacidades2(){
            if(this.update_data.descripcion != ""){
                this.ok = false;
                this.capacidades.push(this.update_data.descripcion);
                this.update_data.descripcion = " ";
                const div = document.getElementById("detalleCapacidades2").classList;
                div.remove("d-none");
            }else{
                if(this.capacidades.length == 0){
                    const div = document.getElementById("detalleCapacidades2").classList;
                    div.add("d-none");
                }else{
                    const div = document.getElementById("detalleCapacidades2").classList;
                    div.remove("d-none");
                }
            }
        },
        async editar_capacidad(e){
            this.update_data.descripcion = e;
            this.capacidades = this.capacidades.filter((item) => item !== e);
        },
        async eliminar_capacidad(e){
            this.capacidades = this.capacidades.filter((item) => item !== e);
        },
        async mostrar_crear(){
            const div = document.getElementById("curso-all").classList;
            const link = document.getElementById("link-all-curso").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("curso-add").classList;
            const link2 = document.getElementById("link-add-curso").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add-curso").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("curso-all").classList;
            const link = document.getElementById("link-all-curso").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("curso-update").classList;
            const link2 = document.getElementById("link-update-curso").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update-curso").classList;
            opcion_li.remove("d-none");

            console.log(item)

            this.update_data.nombre =  item.cur_nombre;
            this.update_data.abreviatura = item.cur_abreviatura;
            this.update_data.horas =  item.cur_horas;
            if(item.capacidades > 0){
                item.listCapacidades.forEach(e => {
                    this.capacidades.push(e.cap_descripcion);
                });
                this.mostrar_capacidades2();
            }
            this.update_data.nivel =  item.niv_id;
            this.update_data.grado =  item.gra_id;
            this.update_data.estado =  item.cur_estado;
            this.update_data.cur_id =  item.cur_id;

            this.update_data.descripcion =  " ";

            this.listar_niveles();
            this.listar_grados2();
        },
        async cancelar(){
            const div = document.getElementById("curso-add").classList;
            const link = document.getElementById("link-add-curso").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("curso-all").classList;
            const link2 = document.getElementById("link-all-curso").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos();
            const opcion_li = document.getElementById("li-add-curso").classList;
            opcion_li.add("d-none");
            this.loading = false;

            const detalle = document.getElementById("detalleCapacidades").classList;
            detalle.add("d-none");
        },
        async cancelar2(){
            const div = document.getElementById("curso-update").classList;
            const link = document.getElementById("link-update-curso").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("curso-all").classList;
            const link2 = document.getElementById("link-all-curso").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos2();
            const opcion_li = document.getElementById("li-update-curso").classList;
            opcion_li.add("d-none");
            this.loading = false;

            const detalle = document.getElementById("detalleCapacidades2").classList;
            detalle.add("d-none");
        },
        async limpiar_campos() {
            this.curso.nombre = '',
            this.curso.abreviatura = '',
            this.curso.horas = '',
            this.curso.cantidad = '',
            this.curso.nivel = '0',
            this.curso.grado = '0'
            this.capacidad.descripcion = '',
            this.capacidades = []
        },
        async limpiar_campos2() {
            this.update_data.nombre = '',
            this.update_data.abreviatura = '',
            this.update_data.horas = '',
            this.update_data.cantidad = '',
            this.update_data.nivel = '0',
            this.update_data.grado = '0'
            this.update_data.descripcion = '',
            this.capacidades = []
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-cursos').DataTable({
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
        }
    }
}
</script>
