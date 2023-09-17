<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Niveles</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#nivel-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#nivel-grid">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#nivel-add">Crear Usuario</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#nivel-update">Actualizar Usuario</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="nivel-all">
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
                        <!-- <a @click="mostrar_crear()" class="btn btn-primary mb-4" href="#Staff-add">Crear Usuario</a> -->
                        <div class="row row-deck">
                            <div class="col-xl-4 col-lg-4 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card">
                                    <a href="#"><img class="card-img-top" src="https://ceipjoseptarradellas.files.wordpress.com/2018/06/graduacion2.jpg" alt="" width="50%"></a>
                                    <div class="card-body d-flex flex-column">
                                        <h5><a href="#">{{item.niv_descripcion}}</a></h5>
                                        <!-- <div class="text-muted">Look, my liege! The Knights Who Say Ni demand a sacrifice!</div> -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-vcenter mb-0">
                                            <tbody>
                                                <!-- <tr>
                                                    <td class="w20"><i class="fa fa-calendar text-blue"></i></td>
                                                    <td class="tx-medium">Duration</td>
                                                    <td class="text-right">6 Months</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-cc-visa text-danger"></i></td>
                                                    <td class="tx-medium">Fees</td>
                                                    <td class="text-right">$1,674</td>
                                                </tr> -->
                                                <tr>
                                                    <td><i class="fa fa-users text-warning"></i></td>
                                                    <td class="tx-medium">Alumnos</td>
                                                    <td class="text-right">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-none">
                                        <div class="d-flex align-items-center mt-auto">
                                            <img class="avatar avatar-md mr-3" src="" alt="avatar">
                                            <div>
                                                <a href="#">Pro. Jane</a>
                                                <small class="d-block text-muted">Head OF Dept.</small>
                                            </div>
                                            <div class="ml-auto text-muted">
                                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i> 521</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            data: {}
        }
    },
    mounted(){
        this.listar_niveles();
    },
    methods: {
        async listar_niveles() {
            axios.get("/api/listar-niveles")
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
