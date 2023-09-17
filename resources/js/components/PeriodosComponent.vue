<template>
    <div >
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Periodo Académico</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Periodo</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all-periodo" class="nav-item"><a id="link-all-periodo" class="nav-link active" data-toggle="tab" href="#Periodo-all">Ver Lista</a></li>
                        <li id="li-grid-periodo" class="nav-item d-none"><a id="link-grid-periodo" class="nav-link" data-toggle="tab" href="#Periodo-grid">Ver Cuadricula</a></li>
                        <li id="li-add-periodo" class="nav-item d-none"><a id="link-add-periodo" class="nav-link" data-toggle="tab" href="#Periodo-add">Registrar Periodo</a></li>
                        <li id="li-update-periodo" class="nav-item d-none"><a id="link-update-periodo" class="nav-link" data-toggle="tab" href="#Periodo-update">Actualizar Periodo</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Periodo-all">
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
                         <a @click="mostrar_crear()" class="btn btn-primary mb-4" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" href="#">Registrar Periodo</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-periodos" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>PERIODO</th>
                                                <th>INICIO DE MATRICULA</th>
                                                <th>FIN DE MATRICULA</th>
                                                <th>TIPO REGISTRO NOTA</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.per_id}}</td>
                                                <td>{{item.periodo}}</td>
                                                <td>{{item.per_inicio_matriculas}}</td>
                                                <td>{{item.per_final_matricula}}</td>
                                                <td>{{item.tipoNotas}}</td>
                                                <td>
                                                    <span v-if="item.per_estado==0" class="tag tag-orange">Nuevo</span>
                                                    <span v-else-if="item.per_estado==1" class="tag tag-success">Aperturado</span>
                                                    <span v-else class="tag tag-danger">Finalizado</span>
                                                </td>
                                                <td>
                                                <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit text-warning"></i></button>
                                                <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_periodo(item.per_id)"><i class="fa fa-trash-o text-danger"></i></button>
                                                <button v-if="item.per_estado==0" type="button" class="btn btn-primary btn-sm js-sweetalert" data-type="confirm" @click="aperturar_periodo(item.per_id,item.año_id)">Aperturar</button>
                                                <button v-if="item.per_estado==1" type="button" class="btn btn-secondary btn-sm js-sweetalert" data-type="confirm" @click="finalizar_periodo(item.per_id)">Finalizar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Periodo-grid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card" style="height: 350px;">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="https://img2.freepng.es/20180505/eqq/kisspng-academic-term-calendar-inset-day-time-fotolia-5aee6c4324f585.7074900315255747231514.jpg" alt="">
                                        <h5 class="mb-0">Periodo {{item.descripcion}}</h5>
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
                    <div class="tab-pane" id="Periodo-add">
                        <form class="row" @submit.prevent="agregar_periodo">
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
                                                    <label>Periodo <span class="text-danger">*</span></label>
                                                    <select v-model="periodo.año_id"  class="form-control show-tick" @change="ver_fecha(periodo.año_id)" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="a in anios" :key="a.id" v-bind:value="a.año_id">
                                                            {{a.año_descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>Estado <!-- <span class="text-danger">*</span> --></label>
                                                <select v-model="periodo.estado" class="form-control show-tick">
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Aperturado</option>
                                                    <option value="2">Finalizado</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Inicio de Matriculas <span class="text-danger">*</span></label>
                                                    <input id="fecha_inicial" type="date" v-model="periodo.inicio_matriculas" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Fin de Matriculas <span class="text-danger">*</span></label>
                                                    <input id="fecha_final" type="date" v-model="periodo.final_matricula" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha Limite para Cierre de Matriculas <span class="text-danger">*</span></label>
                                                    <input id="fecha_limite" type="date" v-model="periodo.limite_cierre" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Tipo de Registro de Notas <span class="text-danger">*</span></label>
                                                    <select v-model="periodo.tp_notas"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="t in tipos" :key="t.id" v-bind:value="t.tp_id">
                                                            {{t.tp_tipo}}
                                                        </option>
                                                    </select>
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
                    <div class="tab-pane" id="Periodo-update">
                        <form class="row" @submit.prevent="actualizar_periodo">
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
                                                    <label>Periodo <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.año_id"  class="form-control show-tick" @change="ver_fecha(periodo.año_id)" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="a in anios" :key="a.id" v-bind:value="a.año_id">
                                                            {{a.año_descripcion}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label>Estado <!-- <span class="text-danger">*</span> --></label>
                                                <select v-model="update_data.estado" class="form-control show-tick">
                                                    <option value="0" disabled>-- Selecciona --</option>
                                                    <option value="1">Aperturado</option>
                                                    <option value="2">Finalizado</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Inicio de Matriculas <span class="text-danger">*</span></label>
                                                    <input id="fecha_inicial" type="date" v-model="update_data.inicio_matriculas" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha de Fin de Matriculas <span class="text-danger">*</span></label>
                                                    <input id="fecha_final" type="date" v-model="update_data.final_matricula" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Fecha Limite para Cierre de Matriculas <span class="text-danger">*</span></label>
                                                    <input id="fecha_limite" type="date" v-model="update_data.limite_cierre" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Tipo de Registro de Notas <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.tp_notas"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="t in tipos" :key="t.id" v-bind:value="t.tp_id">
                                                            {{t.tp_tipo}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12 mt-3 d-none">
                                                <span class="text-danger">* Campos requeridos</span>
                                            </div>
                                            <div class="col-sm-12 text-right mt-4">
                                                <button v-if="!loading" type="submit" class="btn btn-primary">Actualizar</button>
                                                <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
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
            data: {},
            anios: {},
            tipos: {},
            periodo: {
                año_id: '0',
                inicio_matriculas: '',
                final_matricula: '',
                limite_cierre: '0',
                tp_notas: '0',
                estado: '0'
            },
            update_data: {
                año_id: '',
                inicio_matriculas: '',
                final_matricula: '',
                limite_cierre: '',
                tp_notas: '',
                estado: '',
                per_id: ''
            },
            loading: false,
            buscando: false,
        }
    },
    mounted(){
        this.listar_periodos();
        this.listar_anios();
        this.listar_tipo_notas();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_periodo(){
            this.loading = true;
            axios.post("/api/agregar-periodo",{
                params: {
                    periodo: this.periodo,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Periodo Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_periodos()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_periodo(periodo){
            swal({
                title: "Estas seguro de eliminar este periodo?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-periodo",{
                        params: {
                            id_periodo: periodo
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Periodo Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_periodos()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_periodo(){
            this.loading = true;
            axios.post("/api/actualizar-periodo",{
                params: {
                    data: this.update_data,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Periodo Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_periodos()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async aperturar_periodo(periodo,año){
            this.anios.forEach(e => {
                if(e.año_id == año){
                    if (e.año_estado == 1) {
                        swal({
                            title: "Estas seguro de aperturar este periodo?",
                            icon: "info",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                axios.post("/api/aperturar-periodo",{
                                    params: {
                                        id_periodo: periodo
                                    }
                                })
                                .then(response=>{
                                    setTimeout(() => {
                                        swal({
                                            title: "Periodo Aperturado !!",
                                            icon: "success",
                                        }).then((willConfirm) => {
                                            this.listar_periodos()
                                        });
                                    }, 1000);
                                })
                                .catch(error=>{
                                    console.log(error)
                                })
                            }
                        });
                    }else{
                        swal({
                            title: "El Año Escolar aun no esta habilitado !!!",
                            icon: "warning"
                        })
                    }
                }
            });

        },
        async finalizar_periodo(periodo){
            swal({
                title: "Estas seguro de finalizar este periodo?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/finalizar-periodo",{
                        params: {
                            id_periodo: periodo
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Periodo Finalizado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_periodos()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async listar_periodos() {
            this.buscando = true;
            axios.get("/api/listar-periodos")
            .then(response=>{
                $('#table-periodos').DataTable().destroy();
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
        async listar_anios() {
            axios.get("/api/listar-anios-all")
            .then(response=>{
                this.anios = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_tipo_notas() {
            axios.get("/api/listar-tipo-notas")
            .then(response=>{
                this.tipos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear(){
            const div = document.getElementById("Periodo-all").classList;
            const link = document.getElementById("link-all-periodo").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Periodo-add").classList;
            const link2 = document.getElementById("link-add-periodo").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add-periodo").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("Periodo-all").classList;
            const link = document.getElementById("link-all-periodo").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Periodo-update").classList;
            const link2 = document.getElementById("link-update-periodo").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update-periodo").classList;
            opcion_li.remove("d-none");

            this.listar_anios();
            this.update_data.año_id =  item.año_id,
            this.update_data.inicio_matriculas = item.per_inicio_matriculas,
            this.update_data.final_matricula =  item.per_final_matricula,
            this.update_data.limite_cierre =  item.per_limite_cierre,
            this.update_data.tp_notas =  item.per_tp_notas,
            this.update_data.estado =  item.per_estado,
            this.update_data.per_id =  item.per_id
        },
        async cancelar(){
            const div = document.getElementById("Periodo-add").classList;
            const link = document.getElementById("link-add-periodo").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Periodo-all").classList;
            const link2 = document.getElementById("link-all-periodo").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos();
            const opcion_li = document.getElementById("li-add-periodo").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async cancelar2(){
            const div = document.getElementById("Periodo-update").classList;
            const link = document.getElementById("link-update-periodo").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Periodo-all").classList;
            const link2 = document.getElementById("link-all-periodo").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos2();
            const opcion_li = document.getElementById("li-update-periodo").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async limpiar_campos() {
            this.periodo.año_id = "0",
            this.periodo.inicio_matriculas = "",
            this.periodo.final_matricula = "",
            this.periodo.limite_cierre = "",
            this.periodo.tp_notas = "0",
            this.periodo.estado = "0",
            document.getElementById("fecha_inicial").min = "",
            document.getElementById("fecha_inicial").max = "",
            document.getElementById("fecha_final").min = "",
            document.getElementById("fecha_final").max = "",
            document.getElementById("fecha_limite").min = "",
            document.getElementById("fecha_limite").max = ""
        },
        async limpiar_campos2() {
            this.update_data.año_id = "0",
            this.update_data.inicio_matriculas = "",
            this.update_data.final_matricula = "",
            this.update_data.limite_cierre = "",
            this.update_data.tp_notas = "0",
            this.update_data.estado = "0",
            this.update_data.per_id = ""

            document.getElementById("up_fecha_inicial").min = "",
            document.getElementById("up_fecha_inicial").max = "",
            document.getElementById("up_fecha_final").min = "",
            document.getElementById("up_fecha_final").max = "",
            document.getElementById("up_fecha_limite").min = "",
            document.getElementById("up_fecha_limite").max = ""
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-periodos').DataTable({
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
                    { "searchable": false, "targets": [6] }
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
        ver_fecha(año) {
            this.anios.forEach(e => {
                    if(e.año_id == año){
                        document.getElementById("fecha_inicial").min = e.año_fechaInicio;
                        document.getElementById("fecha_inicial").max = e.año_fechaFin;
                        document.getElementById("fecha_final").min = e.año_fechaInicio;
                        document.getElementById("fecha_final").max = e.año_fechaFin;
                        document.getElementById("fecha_limite").min = e.año_fechaInicio;
                        document.getElementById("fecha_limite").max = e.año_fechaFin;
                    }
            });
        },
        ver_fecha2(año) {
           this.anios.forEach(e => {
                if(e.año_id == año){
                    document.getElementById("up_fecha_inicial").min = e.año_fechaInicio;
                    document.getElementById("up_fecha_inicial").max = e.año_fechaFin;
                    document.getElementById("up_fecha_final").min = e.año_fechaInicio;
                    document.getElementById("up_fecha_final").max = e.año_fechaFin;
                    document.getElementById("up_fecha_limite").min = e.año_fechaInicio;
                    document.getElementById("up_fecha_limite").max = e.año_fechaFin;
                }
           });
        }

    }
}
</script>
