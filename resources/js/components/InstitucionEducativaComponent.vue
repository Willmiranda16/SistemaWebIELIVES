<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Institución Educativa</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ie</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#ie-all">Ver Info</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#ie-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#ie-add">Registrar ie</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#ie-update">Actualizar ie</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane" id="ie-all">
                        <a  class="btn btn-primary mb-4" href="#">Registrar IE</a>
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
                                        <button type="button" class="btn btn-icon btn-sm btn-danger js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_ie(item.sec_id)"><i class="fa fa-trash-o"></i></button>
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
                                            <button type="button" class="btn btn-icon btn-sm btn-danger js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_ie(item.gra_id)"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                    <!-- <div class="tab-pane active" id="ie-all">
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

                        <a @click="mostrar_crear()" class="btn btn-primary mb-4" href="#ie-add">Registrar ie</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-ies" class="display " style="width:100%">
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
                                                <button type="button" class="btn btn-icon btn-sm js-sweetalert d-none" title="Eliminar" data-type="confirm" @click="eliminar_ie(item.id,item.id_persona)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-pane" id="ie-grid">
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
                    <div class="tab-pane active" id="ie-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Información de la IE</h3>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="agregar_ie">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Código Modular </label>
                                                <input class="form-control" v-model="ie.ie_codigo_modular" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Anexo </label>
                                                <input class="form-control" v-model="ie.ie_anexo" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Gestión </label>
                                                <input class="form-control" v-model="ie.ie_gestion" value="+1 882-635-7531" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Nombre </label>
                                                <input class="form-control" v-model="ie.ie_nombre" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Director </label>
                                                <input class="form-control" v-model="ie.ie_director" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Departamento </label>
                                                <select v-model="ie.ie_departamento" class="form-control show-tick" required @change="listar_provincias()">
                                                    <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="d in departamentos" :key="d.id" v-bind:value="d.idDepa">
                                                        {{ d.departamento }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Provincia </label>
                                                <select v-model="ie.ie_provincia" class="form-control show-tick" required @change="listar_distritos()">
                                                    <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="p in provincias" :key="p.id" v-bind:value="p.idProv">
                                                        {{ p.provincia }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Distrito </label>
                                                <select v-model="ie.ie_distrito" class="form-control show-tick" required>
                                                    <option value="0" selected disabled>-- Selecciona --</option>
                                                        <option v-for="d in distritos" :key="d.id" v-bind:value="d.idDist">
                                                        {{ d.distrito }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <textarea class="form-control" v-model="ie.ie_direccion" placeholder="44 Shirley Ave. West Chicago, IL 60185" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>DRE </label>
                                                <input class="form-control" v-model="ie.ie_dre" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>UGEL </label>
                                                <input class="form-control" v-model="ie.ie_ugel" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Nivel </label>
                                                <input class="form-control" v-model="ie.ie_nivel" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Género </label>
                                                <input class="form-control" v-model="ie.ie_genero" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Turno </label>
                                                <input class="form-control" v-model="ie.ie_turno"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Dias Laborales </label>
                                                <input class="form-control" v-model="ie.ie_dias_laborales" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label>Teléfono </label>
                                                <input class="form-control" v-model="ie.ie_telefono" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label>Correo </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-envelope"></i></span>
                                                    </div>
                                                    <input type="text" v-model="ie.ie_email" class="form-control" value="LouisPierce@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label>Página Web</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-globe"></i></span>
                                                    </div>
                                                    <input type="text" v-model="ie.ie_web" class="form-control" placeholder="http://">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <div class="col-md-7 text-right mt-4">
                                                <button v-if="ie.ie_id == 0" type="submit" class="btn btn-primary">Registrar</button>
                                                <button v-else type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
            grados: {},
            data: {},
            departamentos: {},
            provincias: {},
            distritos: {},
            ie: {
                ie_codigo_modular: '',
                ie_anexo: '',
                ie_nivel: '',
                ie_nombre: '',
                ie_gestion: '',
                ie_departamento: '',
                ie_provincia: '',
                ie_distrito: '',
                ie_direccion: '',
                ie_dre: '',
                ie_ugel: '',
                ie_genero: '',
                ie_turno: '',
                ie_dias_laborales: '',
                ie_director: '',
                ie_telefono: '',
                ie_email: '',
                ie_web: '',
                ie_id: ''
            },
            loading: false,
            buscando: false,
        }
    },
    mounted(){
        this.listar_ie();
        this.listar_departamentos();
        this.buscando_director();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_ie(){
            this.loading = true;
            axios.post("/api/agregar-ie",{
                params: {
                    ie: this.ie,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    if(response.data.status == 1){
                        swal({
                            title: "Datos Registrados !!",
                            icon: "success",
                        }).then((willConfirm) => {
                            this.listar_ie()
                        });
                    }else{
                        swal({
                            title: "Datos Actualizados !!",
                            icon: "success",
                        }).then((willConfirm) => {
                            this.listar_ie()
                        });
                    }

                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async listar_ie() {
            axios.get("/api/listar-ie")
            .then(response=>{
                this.listar_prov_dist(response.data.ie_departamento,response.data.ie_provincia);

                this.ie.ie_id= response.data.ie_id,
                this.ie.ie_codigo_modular= response.data.ie_codigo_modular,
                this.ie.ie_anexo= response.data.ie_anexo,
                this.ie.ie_nivel= response.data.ie_nivel,
                this.ie.ie_nombre= response.data.ie_nombre,
                this.ie.ie_gestion= response.data.ie_gestion,
                this.ie.ie_departamento= response.data.ie_departamento == null ? '0' : response.data.ie_departamento,
                this.ie.ie_provincia= response.data.ie_provincia == null ? '0' : response.data.ie_provincia,
                this.ie.ie_distrito= response.data.ie_distrito == null ? '0' : response.data.ie_distrito,
                this.ie.ie_direccion= response.data.ie_direccion,
                this.ie.ie_dre= response.data.ie_dre,
                this.ie.ie_ugel= response.data.ie_ugel,
                this.ie.ie_genero= response.data.ie_genero,
                this.ie.ie_turno= response.data.ie_turno,
                this.ie.ie_dias_laborales= response.data.ie_dias_laborales,
                this.ie.ie_director= response.data.ie_director,
                this.ie.ie_telefono= response.data.ie_telefono,
                this.ie.ie_email= response.data.ie_email
                this.ie.ie_web= response.data.ie_web
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_departamentos() {
            axios.get("/api/listar-departamentos")
            .then(response=>{
                this.departamentos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_provincias() {
            axios.post("/api/listar-provincias",{
                params: {
                    departamento: this.ie.ie_departamento
                }
            })
            .then(response=>{
                this.provincias = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_distritos() {
            axios.post("/api/listar-distritos",{
                params: {
                    provincia: this.ie.ie_provincia
                }
            })
            .then(response=>{
                this.distritos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_prov_dist(depa,prov) {
            axios.post("/api/listar-provincias",{
                params: {
                    departamento: depa
                }
            })
            .then(response=>{
                this.provincias = response.data
            })
            .catch(error=>{
                console.log(error)
            })

            axios.post("/api/listar-distritos",{
                params: {
                    provincia: prov
                }
            })
            .then(response=>{
                this.distritos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscando_director() {
            axios.get("/api/buscar-director")
            .then(response=>{
                setTimeout(() => {
                    this.ie.ie_director = response.data.per_nombres + ' ' + response.data.per_apellidos;
                }, 500);
            })
            .catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>
