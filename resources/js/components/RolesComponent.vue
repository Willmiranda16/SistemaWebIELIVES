<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Roles</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">rol</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#rol-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#rol-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#rol-add">Registrar Rol</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#rol-update">Actualizar Rol</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="rol-all">
                        <a @click="mostrar_crear()" class="btn mb-4 text-white" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" href="#">Registrar Rol</a>
                        <div class="row row-deck">
                            <div class="col-xl-4 col-lg-3 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card">
                                    <div class="card-body d-flex flex-column">
                                        <h6><a href="javascript:void(0);" @click="mostrar_actualizar(item)">{{item.rol_descripcion}}</a></h6>
                                    </div>
                                    <div style="position: relative;display: inline-block;">
                                        <!-- <img class="card-img-top" src="https://mec.gov.py/talento/cms/wp-content/uploads/2021/10/Mantenimiento.png" alt="" style="width: 80%;"> -->
                                        <button type="button" style="position: absolute;bottom: 1em;right: 1em;border-radius: 1.5em;" class="btn btn-icon btn-sm btn-danger js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_rol(item.rol_id)"><i class="fa fa-trash-o"></i></button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-vcenter mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="w20" v-if="item.rol_estado == '1'"><i class="fa-sharp fa-solid fa-door-open text-success"></i></td>
                                                    <td class="w20" v-else><i class="fa-solid fa-door-closed text-secondary"></i></td>
                                                    <td class="tx-medium">Estado</td>
                                                    <td class="text-right">
                                                        <span class="badge badge-pill badge-success" v-if="item.rol_estado == '1'">Disponible</span>
                                                        <span class="badge badge-pill badge-secondary" v-else>No disponible</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="rol-grid">
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
                    <div class="tab-pane" id="rol-add">
                        <div class="card">
                            <form class="card-body" @submit.prevent="agregar_rol">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripcion <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Ingrese descripcion del rol" class="form-control" v-model="rol.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Estado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="rol.estado" class="form-control show-tick" required>
                                            <option value="" disabled>-- Selecciona --</option>
                                            <option value="1">Habilitado</option>
                                            <option value="0">Deshabilitado</option>
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
                    <div class="tab-pane" id="rol-update">
                        <div class="card">
                            <form class="card-body" @submit.prevent="actualizar_rol">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Descripcion <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Ingrese descripcion del rol" class="form-control" v-model="rol_update.descripcion" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Estado <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <select v-model="rol_update.estado" class="form-control show-tick" required>
                                            <option value="" disabled>-- Selecciona --</option>
                                            <option value="1">Habilitado</option>
                                            <option value="0">Deshabilitado</option>
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
            grados: {},
            data: {},
            rol: {
                descripcion: '',
                estado: ''
            },
            rol_update: {
                id: '',
                descripcion: '',
                estado: ''
            },
            loading: false,
            buscando: false,
        }
    },
    mounted(){
        this.listar_roles();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_rol(){
            this.loading = true;
            axios.post("/api/agregar-roles",{
                params: {
                    rol: this.rol,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Rol Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_roles()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_rol(id){
            swal({
                title: "Estas seguro de eliminar este rol?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-roles",{
                        params: {
                            id_rol: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Rol Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_roles()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_rol(){
            this.loading = true;
            axios.post("/api/actualizar-roles",{
                params: {
                    data: this.rol_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Rol Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_roles()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_roles() {
            axios.get("/api/listar-roles-all")
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear(){
            const div = document.getElementById("rol-all").classList;
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
            const div2 = document.getElementById("rol-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("rol-all").classList;
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
            const div2 = document.getElementById("rol-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.rol_update.descripcion =  item.rol_descripcion,
            this.rol_update.estado = item.rol_estado,
            this.rol_update.id = item.rol_id
        },
        async cancelar(){
            const div = document.getElementById("rol-add").classList;
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
            const div2 = document.getElementById("rol-all").classList;
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
            const div = document.getElementById("rol-update").classList;
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
            const div2 = document.getElementById("rol-all").classList;
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
            this.rol.descripcion = "",
            this.rol.estado = ""
        },
        async limpiar_campos2() {
            this.rol_update.descripcion = "",
            this.rol_update.estado = "",
            this.rol_update.id = ""
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-rols').DataTable({
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
