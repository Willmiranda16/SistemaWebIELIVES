<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Reportes Generales</h1>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-1 col-form-label">Año </label>
                                    <div class="col-md-3">
                                        <select v-model="data.año" @change="listar_niveles()"  class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in años" :key="n.id" v-bind:value="n.año_id">
                                                {{n.año_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <label class="col-md-1 col-form-label">Nivel </label>
                                    <div class="col-md-3">
                                        <select v-model="data.nivel"  class="form-control show-tick" @change="listar_grados()">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                {{n.niv_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-2 col-md-4 col-sm-6" style="display: flex;align-items: center;">
                                        <a v-if="!loading0" @click="buscar_data()" href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Cargar</a>
                                        <a v-else href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Procesando...</a>
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <label class="col-md-1 col-form-label">Grados </label>
                                    <div class="col-md-3">
                                        <select v-model="data.grado"  class="form-control show-tick" @change="listar_secciones()">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in grados" :key="n.id" v-bind:value="n.gra_id">
                                                {{n.gra_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <label class="col-md-1 col-form-label">Secciones </label>
                                    <div class="col-md-3">
                                        <select v-model="data.seccion"  class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in secciones" :key="n.id" v-bind:value="n.sec_id">
                                                {{n.sec_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-2 col-md-4 col-sm-6" style="display: flex;align-items: center;">
                                        <a v-if="!loading0" @click="buscar_data()" href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Cargar</a>
                                        <a v-else href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Procesando...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col m-2">
                                        <div class="row">
                                            <label class="col col-form-label"><b>Reporte de Matriculas </b></label>
                                        </div>
                                        <div id="div_grafico1">
                                            <span class="list-group-item">Total de alumnos por grado</span>
                                            <canvas id="grafico1"></canvas>
                                        </div>
                                        <br>
                                        <div id="div_grafico3">
                                            <span class="list-group-item">Total de alumnos por genero</span>
                                            <canvas id="grafico3"></canvas>
                                        </div>
                                    </div>
                                    <div class="col m-2">
                                        <div class="row ">
                                            <label class="col col-form-label"><b>Reporte de Personal Academico </b></label>
                                        </div>
                                        <div id="div_grafico2" >
                                            <span class="list-group-item">Total de Personal por cargos</span>
                                            <canvas id="grafico2"></canvas>
                                        </div>
                                        <br>
                                        <div id="div_grafico4" >
                                            <span class="list-group-item">Total de Docentes por cursos</span>
                                            <canvas id="grafico4"></canvas>
                                        </div>
                                    </div>
                                    <div class="col m-2 ">
                                        <div class="row">
                                            <label class="col col-form-label"><b>+ Reportes</b></label>
                                        </div>
                                        <div id="div_grafico5">
                                            <span class="list-group-item">Total de vacantes por grado</span>
                                            <canvas id="grafico5"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2 d-none">
                                    <div class="col m-2">
                                        <div class="row ">
                                            <label class="col col-form-label"><b>Reportes de Notas </b></label>
                                        </div>
                                        <div class="list-group list-group-flush row">
                                            <a href="#" class="list-group-item">Docente sin Registro de Notas.</a>
                                            <a href="#" class="list-group-item">Reporte de Notas por Docente</a>
                                            <a href="#" class="list-group-item">...</a>
                                        </div>
                                    </div>
                                    <div class="col m-2">
                                        <div class="row ">
                                            <label class="col col-form-label"><b>Reportes por Curso </b></label>
                                        </div>
                                        <div class="list-group list-group-flush row">
                                            <a href="#" class="list-group-item">Alumnos por Curso</a>
                                            <a href="#" class="list-group-item">...</a>
                                        </div>
                                    </div>
                                    <div class="col m-2">
                                        <div class="row ">
                                            <label class="col col-form-label"><b>Constancias Académicas</b></label>
                                        </div>
                                        <div class="list-group list-group-flush row">
                                            <a href="#" class="list-group-item">Orden Mérito</a>
                                            <a href="#" class="list-group-item">...</a>
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
import Chart from 'chart.js/auto'
/* import GraficoAlumnosPrimaria from './GraficoAlumnosPrimaria.vue';
import GraficoAlumnosSecundaria from './GraficoAlumnosSecundaria.vue';
import GraficoPersonalSecundaria from './GraficoPersonalSecundaria.vue';
import GraficoPersonalPrimaria from './GraficoPersonalPrimaria.vue'; */

import swal from 'sweetalert';
let user = document.head.querySelector('meta[name="user"]');
export default {
    /* components: {
        GraficoPersonalSecundaria,
        GraficoPersonalPrimaria,
        GraficoAlumnosSecundaria,
        GraficoAlumnosPrimaria
    }, */
    data() {
        return{
            años: {},
            niveles: {},
            grados: {},
            secciones: {},
            data: {
                año: '2',
                nivel: '2',
                grado: '0',
                seccion: '0'
            },
            loading0: false,

            // Graficos
            g1Grados: [],
            g1Totales: [],
            g2Cargos: [],
            g2Totales: [],
            g2Total: 0,
            g3Sexo: [],
            g3Totales: [],
            g4Cursos: [],
            g4Totales: [],
            g5Seccion: [],
            g5Totales: [],
        }
    },
    mounted(){
        this.listar_años();
        this.listar_niveles();
        this.buscar_data();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async listar_años() {
            axios.get("/api/listar-anios")
            .then(response=>{
                this.años = response.data
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
                    id: this.data.nivel
                }
            })
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_secciones() {
            axios.post("/api/listar-secciones",{
                params: {
                    id: this.data.grado
                }
            })
            .then(response=>{
                this.secciones = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscar_data(){
            this.grafico1();
            this.grafico2();
            this.grafico3();
            this.grafico4();
            this.grafico5();
        },
        grafico1(){
            axios.post("/api/reportes-alumnos-grados",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                this.g1Grados = response.data.grados;
                this.g1Totales = response.data.totales;

                var data = this.g1Totales;
                var labels = this.g1Grados;

                $('#grafico1').remove();
                $('#div_grafico1').append('<canvas id="grafico1"><canvas>');

                var ctx = document.getElementById('grafico1');
                var myChart = new Chart(ctx,{
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Alumnos'/* (this.data.nivel == 1 ? 'Nivel Primaria' : 'Nivel Secundaria') */,
                            data: data,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgb(54, 162, 235)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options:{
                        scales:{
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error=>{
                console.log(error)
            })
        },
        grafico2(){
            axios.post("/api/reportes-cargos-personal",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                this.g2Cargos = response.data.cargos;
                this.g2Totales = response.data.totales;
                this.g2Total = response.data.total;

                var data = this.g2Totales;
                var labels = this.g2Cargos;
                var total = this.g2Total;

                $('#grafico2').remove();
                $('#div_grafico2').append('<canvas id="grafico2"><canvas>');

                var ctx = document.getElementById('grafico2');

                var myChart = new Chart(ctx,{
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total'/* (this.data.nivel == 1 ? ' Total Primaria' : 'Total Secundaria') */,
                            data: data,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 191, 191)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 159, 64)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(252, 247, 104)',
                                'rgb(208, 225, 94)',
                                'rgb(255, 159, 64)'
                            ],
                            hoverOffset: total
                        }]
                    }
                });
            })
            .catch(error=>{
                console.log(error)
            })
        },
        grafico3(){
            axios.post("/api/reportes-alumnos-sexo",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                this.g3Sexo = response.data.sexos;
                this.g3Totales = response.data.totales;

                var data = this.g3Totales;
                var labels = this.g3Sexo;

                $('#grafico3').remove();
                $('#div_grafico3').append('<canvas id="grafico3"><canvas>');

                var ctx = document.getElementById('grafico3');
                var myChart = new Chart(ctx,{
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Alumnos'/* (this.data.nivel == 1 ? 'Nivel Primaria' : 'Nivel Secundaria') */,
                            data: data,
                            backgroundColor: [
                                'rgb(5, 155, 255)',
                                'rgb(255, 64, 105)'

                            ],
                            hoverOffset: 2
                        }]
                    }
                });
            })
            .catch(error=>{
                console.log(error)
            })
        },
        grafico4(){
            axios.post("/api/reportes-docentes-cursos",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                this.g4Cursos = response.data.cursos;
                this.g4Totales = response.data.totales;

                var data = this.g4Totales;
                var labels = this.g4Cursos;

                $('#grafico4').remove();
                $('#div_grafico4').append('<canvas id="grafico4"><canvas>');

                var ctx = document.getElementById('grafico4');
                var myChart = new Chart(ctx,{
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Docentes'/* (this.data.nivel == 1 ? 'Nivel Primaria' : 'Nivel Secundaria') */,
                            data: data,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgb(75, 192, 192)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options:{
                        scales:{
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error=>{
                console.log(error)
            })
        },
        grafico5(){
            axios.post("/api/reportes-vacantes-seccion",{
                params: {
                    data: this.data
                }
            })
            .then(response=>{
                this.g5Seccion = response.data.seccion;
                this.g5Totales = response.data.totales;

                var data = this.g5Totales;
                var labels = this.g5Seccion;

                $('#grafico5').remove();
                $('#div_grafico5').append('<canvas id="grafico5"><canvas>');

                var ctx = document.getElementById('grafico5');
                var myChart = new Chart(ctx,{
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            axis: 'y',
                            label: 'Vacantes'/* (this.data.nivel == 1 ? 'Nivel Primaria' : 'Nivel Secundaria') */,
                            data: data,
                            fill: false,
                            backgroundColor: [
                                'rgba(255, 159, 64, 0.2)',
                            ],
                            borderColor: [
                                'rgb(255, 159, 64)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options:{
                        indexAxis: 'y',
                        /* scales:{
                            y: {
                                beginAtZero: true
                            }
                        } */
                    }
                });
            })
            .catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>
