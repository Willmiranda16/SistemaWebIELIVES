<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Ambientes</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">aula</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#aula-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#aula-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#aula-add">Registrar Ambiente</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#aula-update">Actualizar Ambiente</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="aula-all">
                        <a @click="mostrar_crear()" class="btn mb-4 text-white" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" href="#">Registrar Ambiente</a>
                        <!-- <div class="row row-deck" v-if="data.length > 0">
                            <div class="col-xl-3 col-lg-3 col-md-4" v-for="(item, index) in data" :key="index">
                                <div class="card">
                                    <div style="position: relative;display: inline-block;">
                                        <img class="card-img-top" src="https://www.compartirpalabramaestra.org/sites/default/files/styles/articulos/public/field/image/el-aula-vacia.jpg?itok=BoQ5B1_c" alt="" width="50%">
                                        <button type="button" style="position: absolute;bottom: 6em;right: 1em;border-radius: 1.5em;" class="btn btn-icon btn-sm btn-danger js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_aula(item.ala_id)"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5><a href="javascript:void(0);" @click="mostrar_actualizar(item)">{{item.ala_abreviatura}}</a></h5>
                                        <div class="text-muted">
                                            <b>Ubicación: </b>{{item.ala_ubicacion}}
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-vcenter mb-0">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-users text-info"></i></td>
                                                    <td class="tx-medium">Capacidad</td>
                                                    <td class="text-right">{{item.ala_aforo}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w20" v-if="item.ala_estado == '1'"><i class="fa-sharp fa-solid fa-door-open text-success"></i></td>
                                                    <td class="w20" v-else-if="item.ala_estado == '2'"><i class="fa-solid fa-door-closed text-warning"></i></td>
                                                    <td class="w20" v-else><i class="fa-solid fa-door-closed text-secondary"></i></td>
                                                    <td class="tx-medium">Estado</td>
                                                    <td class="text-right">
                                                        <span class="badge badge-pill badge-success" v-if="item.ala_estado == '1'">Bueno</span>
                                                        <span class="badge badge-pill badge-warning" v-else-if="item.ala_estado == '2'">Regular</span>
                                                        <span class="badge badge-pill badge-secondary" v-else>Malo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center" v-else>
                            <div class="h3 post-title text-center">
                                <h4>No ha registrado aulas</h4>
                            </div>
                            <img src="https://img.freepik.com/vector-premium/ningun-concepto-ilustracion-datos_108061-573.jpg" class="img-bottom" alt="" width="50%">
                        </div> -->
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-aulas" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>DESCRIPCION</th>
                                                <th>TIPO AMBIENTE</th>
                                                <th>UBICACION</th>
                                                <th>CAPACIDAD</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.ala_id}}</td>
                                                <td>{{item.ala_descripcion}}</td>
                                                <td>{{item.ala_tipo}}</td>
                                                <td>{{item.ala_ubicacion}}</td>
                                                <td>{{item.ala_aforo}}</td>
                                                <td>
                                                    <!-- <span v-if="item.ala_estado==1" class="tag tag-success">Habilitado</span>
                                                    <span v-else class="tag tag-danger">Deshabilitado</span> -->
                                                    <span class="tag tag-success" v-if="item.ala_estado == '1'">Bueno</span>
                                                    <span class="tag tag-warning" v-else-if="item.ala_estado == '2'">Regular</span>
                                                    <span class="tag tag-secondary" v-else>Malo</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm d-none" title="View"><i class="fa fa-eye"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit text-warning"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_aula(item.ala_id)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <label class="col-md-3 col-form-label">Descripción del aula <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Ingrese descripción 1, descripción 2, ..." class="form-control" v-model="aula.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Tipo Ambiente <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="aula.tipo"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option value="Oficina">Oficina</option>
                                                <option value="Aula de Clases">Aula de Clases</option>
                                                <option value="Extra">Extra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Capacidad <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="Ingrese capacidad del aula" class="form-control" v-model="aula.capacidad" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ubicación <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Ingese ubicacion del aula" class="form-control" v-model="aula.ubicacion" autofocus required>
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
                                    <label class="col-md-3 col-form-label">Descripción del aula <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Ingrese abreviatura del aula" class="form-control" v-model="aula_update.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Tipo Ambiente <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="aula_update.tipo"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option value="Oficina">Oficina</option>
                                                <option value="Aula de Clases">Aula de Clases</option>
                                                <option value="Extra">Extra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Capacidad <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="number" placeholder="Ingrese capacidad del aula" class="form-control" v-model="aula_update.capacidad" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ubicación <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Ingese ubicacion del aula" class="form-control" v-model="aula_update.ubicacion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Estado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="aula_update.estado"  class="form-control show-tick" required>
                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                <option value="1">Bueno</option>
                                                <option value="2">Regular</option>
                                                <option value="3">Malo</option>
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
            data: {},
            aula: {
                descripcion: '',
                tipo: '0',
                capacidad: '',
                ubicacion: ''
            },
            aula_update: {
                id: '',
                descripcion: '',
                tipo: '',
                capacidad: '',
                ubicacion: '',
                estado: ''
            },
            loading: false,
            buscando: false,
            buscar: '0'
        }
    },
    mounted(){
        this.listar_aulas();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_aula(){
            this.loading = true;
            axios.post("/api/agregar-aulas",{
                params: {
                    aula: this.aula,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Ambiente Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_aulas()
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
                title: "Estas seguro de eliminar este ambiente?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-aulas",{
                        params: {
                            id_aula: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Ambiente Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_aulas()
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
            axios.post("/api/actualizar-aulas",{
                params: {
                    aula: this.aula_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Ambiente Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_aulas()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_aulas() {
            this.buscando = true;
            axios.get("/api/listar-aulas-all")
            .then(response=>{
                $('#table-aulas').DataTable().destroy();
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

            this.aula_update.descripcion =  item.ala_descripcion,
            this.aula_update.tipo =  item.ala_tipo,
            this.aula_update.capacidad =  item.ala_aforo,
            this.aula_update.ubicacion =  item.ala_ubicacion,
            this.aula_update.estado = item.ala_estado,
            this.aula_update.id = item.ala_id
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
            this.aula.tipo = "0",
            this.aula.capacidad = "",
            this.aula.ubicacion = ""
        },
        async limpiar_campos2() {
            this.aula_update.descripcion = "",
            this.aula_update.tipo = "0",
            this.aula_update.capacidad = "",
            this.aula_update.ubicacion = "",
            this.aula_update.estado = ""
            this.aula_update.id = ""
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-aulas').DataTable({
                    dom: '<lf<t>ip>',
                    responsive: true,
                    scrollX: false,
                    "order": [[ 0, "desc" ]],
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
