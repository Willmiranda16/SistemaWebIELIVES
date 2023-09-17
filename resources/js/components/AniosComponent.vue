<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Año Escolar</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">anio</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#anio-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#anio-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#anio-add">Registrar Año</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#anio-update">Actualizar Año</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="anio-all">
                        <a @click="mostrar_crear()" class="btn mb-4 text-white" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" href="#">Registrar Año</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-anios" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>AÑO</th>
                                                <th>FECHA DE INICIO</th>
                                                <th>FECHA DE FIN</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.ala_id}}</td>
                                                <td>{{item.año_descripcion}}</td>
                                                <td>{{item.año_fechaInicio}}</td>
                                                <td>{{item.año_fechaFin}}</td>
                                                <td>
                                                    <!-- <span v-if="item.ala_estado==1" class="tag tag-success">Habilitado</span>
                                                    <span v-else class="tag tag-danger">Deshabilitado</span> -->
                                                    <span class="tag tag-success" v-if="item.año_estado == '1'">Activo</span>
                                                    <span class="tag tag-secondary" v-else>Inactivo</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm d-none" title="View"><i class="fa fa-eye text-warning"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit text-warning"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_anio(item.año_id)"><i class="fa fa-trash-o text-danger"></i></button>

                                                    <button v-if="item.año_estado == 1"  type="button" class="btn btn-icon btn-sm js-sweetalert" data-type="confirm" @click="desactivar_anio(item.año_id)"><i class="fa-solid fa-power-off text-secondary" style="color: #6c757d!important;"></i></button>
                                                    <button v-else type="button" class="btn btn-icon btn-sm js-sweetalert" title="Activar" data-type="confirm" @click="activar_anio(item.año_id)"><i class="fa-solid fa-power-off text-info"></i></button>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="anio-add">
                        <form class="row" @submit.prevent="agregar_anio">
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
                                                    <label>Año <span class="text-danger">*</span></label>
                                                    <select name="" v-model="anio.descripcion" id="select-anios" class="form-control show-tick" required>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>Estado <!-- <span class="text-danger">*</span> --></label>
                                                <select v-model="anio.estado" class="form-control show-tick" required>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Inicio <span class="text-danger">*</span></label>
                                                    <input type="date" v-model="anio.fechaInicio" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Fin <span class="text-danger">*</span></label>
                                                    <input type="date" v-model="anio.fechaFin" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Duración Hora Académica <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="anio.duracionHoraAcademica" placeholder="0 min" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Duración Hora Libre <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="anio.duracionHoraLibre" placeholder="0 min" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Cantidad de Personal en la IE <span class="text-danger">*</span></label>
                                                    <input type="number" v-model="anio.cantidadPersonal" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>¿Habra Talleres?  <span class="text-danger">*</span></label>
                                                <select v-model="anio.tallerSeleccionable" class="form-control show-tick" required>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Si</option>
                                                    <option value="2">No</option>
                                                </select>
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
                    <div class="tab-pane" id="anio-update">
                        <form class="row" @submit.prevent="actualizar_anio">
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
                                                    <label>Año <span class="text-danger">*</span></label>
                                                    <select name="" v-model="anio_update.descripcion" id="update-anios" class="form-control show-tick" required>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>Estado <!-- <span class="text-danger">*</span> --></label>
                                                <select v-model="anio_update.estado" class="form-control show-tick" required v-if="anio_update.estado == 1" disabled>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
                                                </select>
                                                <select v-model="anio_update.estado" class="form-control show-tick" required v-else>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Inicio <span class="text-danger">*</span></label>
                                                    <input type="date" v-model="anio_update.fechaInicio" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Fin <span class="text-danger">*</span></label>
                                                    <input type="date" v-model="anio_update.fechaFin" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Duración Hora Académica <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="anio_update.duracionHoraAcademica" placeholder="0 min" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Duración Hora Libre <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="anio_update.duracionHoraLibre" placeholder="0 min" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Cantidad de Personal en la IE <span class="text-danger">*</span></label>
                                                    <input type="number" v-model="anio_update.cantidadPersonal" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>¿Habra Talleres?  <span class="text-danger">*</span></label>
                                                <select v-model="anio_update.tallerSeleccionable" class="form-control show-tick" required>
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Si</option>
                                                    <option value="2">No</option>
                                                </select>
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
            anio: {
                descripcion: '0',
                fechaInicio: '',
                fechaFin: '',
                duracionHoraAcademica: '',
                duracionHoraLibre: '',
                cantidadPersonal: '',
                tallerSeleccionable: '0',
                estado: '0'
            },
            anio_update: {
                id: '',
                descripcion: '',
                fechaInicio: '',
                fechaFin: '',
                duracionHoraAcademica: '',
                duracionHoraLibre: '',
                cantidadPersonal: '',
                tallerSeleccionable: '',
                estado: ''
            },
            loading: false,
            buscando: false,
            buscar: '0'
        }
    },
    mounted(){
        this.listar_anios();
        this.ComboPeriodo();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_anio(){
            this.loading = true;
            axios.post("/api/agregar-anios",{
                params: {
                    anio: this.anio,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Año Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_anios()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_anio(id){
            swal({
                title: "Estas seguro de eliminar este año?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-anios",{
                        params: {
                            id_anio: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Año Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_anios()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async activar_anio(id){
            swal({
                title: "Estas seguro de activar este año?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/activar-anios",{
                        params: {
                            id_anio: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Año Activado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_anios()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async desactivar_anio(id){
            swal({
                title: "Estas seguro de desactivar este año?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/desactivar-anios",{
                        params: {
                            id_anio: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Año Desactivado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_anios()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_anio(){
            this.loading = true;
            axios.post("/api/actualizar-anios",{
                params: {
                    anio: this.anio_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Año Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_anios()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_anios() {
            this.buscando = true;
            axios.get("/api/listar-anios-all")
            .then(response=>{
                $('#table-anios').DataTable().destroy();
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
            const div = document.getElementById("anio-all").classList;
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
            const div2 = document.getElementById("anio-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("anio-all").classList;
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
            const div2 = document.getElementById("anio-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.UpdateComboPeriodo();
            this.anio_update.descripcion =  item.año_descripcion,
            this.anio_update.fechaInicio =  item.año_fechaInicio,
            this.anio_update.fechaFin =  item.año_fechaFin,
            this.anio_update.duracionHoraAcademica =  item.año_duracionHoraAcademica,
            this.anio_update.duracionHoraLibre = item.año_duracionHoraLibre,
            this.anio_update.cantidadPersonal = item.año_cantidadPersonal,
            this.anio_update.tallerSeleccionable = item.año_tallerSeleccionable,
            this.anio_update.estado = item.año_estado,
            this.anio_update.id = item.año_id
        },
        async cancelar(){
            const div = document.getElementById("anio-add").classList;
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
            const div2 = document.getElementById("anio-all").classList;
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
            const div = document.getElementById("anio-update").classList;
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
            const div2 = document.getElementById("anio-all").classList;
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
            this.anio.descripcion = "0",
            this.anio.fechaInicio = "",
            this.anio.fechaFin = "",
            this.anio.duracionHoraAcademica = "",
            this.anio.duracionHoraLibre = "",
            this.anio.cantidadPersonal = "",
            this.anio.tallerSeleccionable = "0",
            this.anio.estado = "0"
        },
        async limpiar_campos2() {
            this.anio_update.descripcion = "0",
            this.anio_update.fechaInicio = "",
            this.anio_update.fechaFin = "",
            this.anio_update.duracionHoraAcademica = "",
            this.anio_update.duracionHoraLibre = "",
            this.anio_update.cantidadPersonal = "",
            this.anio_update.tallerSeleccionable = "0",
            this.anio_updateanio.estado = "0",
            this.anio_update.id = ""
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-anios').DataTable({
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
                    { "searchable": false, "targets": [4] }
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
        ComboPeriodo(){
            var d = new Date();
            var n = d.getFullYear()+1;
            var select = document.getElementById("select-anios");
            for(var i = n; i>=2010; i--){
                var opc = document.createElement("option");
                opc.text = i;
                opc.value = i;
                select.add(opc)
            }
        },
        UpdateComboPeriodo(){
            var d = new Date();
            var n = d.getFullYear()+1;
            var select = document.getElementById("update-anios");
            for(var i = n; i>=2010; i--){
                var opc = document.createElement("option");
                opc.text = i;
                opc.value = i;
                select.add(opc)
            }
        }
    }
}
</script>
