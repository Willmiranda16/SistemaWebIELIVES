<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Asistencia</h1>
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
                        <a  class="btn btn-primary mb-4" href="#">Registrar Asistencia</a>
                        <div class="row clearfix mt-2">
                            <div class="col-lg-3 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4><b>{{item.sec_descripcion}}</b></h4>
                                        <hr>
                                        <h6 class="m-2"><b>Grado:</b></h6>
                                        <span class="tag tag-blue" v-if="item.nivel == 'Primaria'">{{item.grado}} de {{item.nivel}}</span>
                                        <span class="tag tag-orange" v-else>{{item.grado}} de {{item.nivel}}</span>
                                        <h6 class="m-2"><b>Vacantes:</b></h6>
                                        <h6 class="m-2">{{item.sec_vancantes}}</h6>
                                        <h6 class="m-2"><b>Opciones:</b></h6>
                                        <button type="button" class="btn btn-icon btn-sm btn-success" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-sm btn-danger js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_aula(item.sec_id)"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="table-responsive">
                            <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descripción</th>
                                        <th>Nivel</th>
                                        <th>Opciones</th>
                                        <th class="w200"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in data" :key="index">
                                        <td>{{item.gra_id}}</td>
                                        <td>
                                            <h6 class="mb-0">{{item.gra_descripcion}}</h6>
                                        </td>
                                        <td>
                                            <span class="tag tag-blue" v-if="item.niv_id == 1">Primaria</span>
                                            <span class="tag tag-orange" v-else>Secundaria</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Detalle"><i class="fa fa-eye"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm btn-success" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm btn-danger js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_aula(item.gra_id)"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                    <!-- <div class="tab-pane active" id="aula-all">
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

                        <a @click="mostrar_crear()" class="btn btn-primary mb-4" href="#aula-add">Registrar aula</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-aulas" class="display " style="width:100%">
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
                                                <button type="button" class="btn btn-icon btn-sm js-sweetalert d-none" title="Eliminar" data-type="confirm" @click="eliminar_aula(item.id,item.id_persona)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-pane" id="aula-grid">
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
                    <div class="tab-pane" id="aula-add">
                        <div class="card">
                            <form class="card-body" @submit.prevent="agregar_aula">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="aula 1, aula 2, aula 3 ..." class="form-control" v-model="aula.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nro Vacantes <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="0" class="form-control" v-model="aula.vacantes" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="aula.gra_id"  class="form-control show-tick" required>
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
                    <div class="tab-pane" id="aula-update">
                        <div class="card">
                            <form class="card-body" @submit.prevent="actualizar_aula">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripción <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="aula 1, aula 2, aula 3 ..." class="form-control" v-model="aula_update.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nro Vacantes <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="0" class="form-control" v-model="aula_update.vacantes" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Grado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="aula_update.gra_id"  class="form-control show-tick" required>
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
            grados: {},
            data: {},
            aula: {
                descripcion: '',
                vacantes: '',
                tutor: '',
                gra_id: '0',
            },
            aula_update: {
                id: '',
                descripcion: '',
                vacantes: '',
                tutor: '',
                gra_id: '0',
            },
            loading: false,
            buscando: false,
        }
    },
    mounted(){
        this.listar_grados();
        this.listar_aulaes();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_aula(){
            this.loading = true;
            axios.post("/api/agregar-aulaes",{
                params: {
                    aula: this.aula,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "aula Registrada !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_aulaes()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_aula(id){
            swal({
                title: "Estas seguro de eliminar este aula?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-aulaes",{
                        params: {
                            id_aula: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "aula Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_aulaes()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_aula(){
            this.loading = true;
            axios.post("/api/actualizar-aulaes",{
                params: {
                    aula: this.aula_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "aula Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_aulaes()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_aulaes() {
            axios.get("/api/listar-aulaes-all")
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados() {
            axios.get("/api/listar-grados-all")
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear(){
            const div = document.getElementById("aula-all").classList;
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
            const div2 = document.getElementById("aula-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("aula-all").classList;
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
            const div2 = document.getElementById("aula-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.aula_update.descripcion =  item.sec_descripcion,
            this.aula_update.tutor =  item.sec_tutor,
            this.aula_update.vacantes =  item.sec_vancantes,
            this.aula_update.gra_id = item.gra_id,
            this.aula_update.id = item.sec_id
        },
        async cancelar(){
            const div = document.getElementById("aula-add").classList;
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
            const div2 = document.getElementById("aula-all").classList;
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
            const div = document.getElementById("aula-update").classList;
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
            const div2 = document.getElementById("aula-all").classList;
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
            this.aula.descripcion = "",
            this.aula.vacantes = "",
            this.aula.tutor = "",
            this.aula.gra_id = "0"
        },
        async limpiar_campos2() {
            this.aula_update.descripcion = "",
            this.aula_update.vacantes = "",
            this.aula_update.tutor = "",
            this.aula_update.gra_id = "0"
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-aulas').DataTable({
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
                    { "searchable": false, "targets": [0,4,6] }
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
