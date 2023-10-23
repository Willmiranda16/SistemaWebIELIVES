<template>
    <div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Reportes de Gestión</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">aula</li>
                        </ol>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center my-2">
                            <label class="col-form-label">Año </label>
                            <select v-model="params.año" @change="listar_niveles()" class="form-control show-tick ml-3">
                                <option value="0" selected disabled>-- Selecciona --</option>
                                <option v-for="n in años" :key="n.id" v-bind:value="n.año_id">
                                    {{ n.año_descripcion }}
                                </option>
                            </select>
                        </div>
                    </div>
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
                                    <div class="col-md-3">
                                        <label class="col-form-label">Nivel </label>
                                        <select v-model="params.nivel" class="form-control show-tick"
                                            @change="listar_grados()">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in niveles" :key="n.niv_id" v-bind:value="n.niv_id">
                                                {{ n.niv_descripcion }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label">Grado </label>
                                        <select v-model="params.grado" @change="listar_secciones()"
                                            class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in grados" :key="n.gra_id" v-bind:value="n.gra_id">
                                                {{ n.gra_descripcion }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label">Secciones </label>

                                        <select v-model="params.seccion" class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in secciones" :key="n.sec_id" v-bind:value="n.sec_id">
                                                {{ n.sec_descripcion }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-primary btn-block"
                                                    :disabled="isLoading" @click="fetchCoursesList()">
                                                    {{ isLoading ? 'Cargando' : 'Filtrar' }}
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        :disabled="cursosList.length === 0">
                                                        Opciones
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li> <a class="dropdown-item"
                                                                :href="`/report/courses/pdf?año=${params.año}&nivel=${params.nivel}&grado=${params.grado}&seccion=${params.seccion}`"
                                                                target="_blank">Generar PDF</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#exampleModal" @click="showChartInModal">Ver
                                                                Gráfico</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="listar-info" class="card">
                            <div class="card-header">
                                <h3 class="card-title">Reporte Por Curso</h3>
                            </div>
                            <div class="card-body col-md-12">
                                <div class="table-responsive">
                                    <table id="table-notas" class="table table-bordered"
                                        style="width:100%;text-align: center;">
                                        <thead>
                                            <tr class="table-active text-dark">
                                                <th class="dark">#</th>
                                                <th class="dark">Curso</th>
                                                <th class="dark">Alumnos Matriculados</th>
                                                <th class="dark">Aprobados(%)</th>
                                                <th class="dark">Desaprobados(%)</th>
                                                <th class="dark">Promedio General</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="cursosList.length === 0 && isFirstMounted">
                                                <td colspan="6">
                                                    <img src="/assets/images/report-search.svg" alt="Filtrar" width="20%">
                                                    <p class="mt-4">
                                                        ¡Esperando buscar!
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr v-else-if="cursosList.length === 0 && !isFirstMounted">
                                                <td colspan="6">
                                                    <img src="/assets/images/no-results.svg" alt="Filtrar" width="20%">
                                                    <p class="mt-4">
                                                        No se han encontrado resultados.
                                                    </p>
                                                </td>
                                            </tr>
                                            <template v-else>
                                                <tr v-for="(item, index) in cursosList" :key="item.cur_id">
                                                    <td>{{ index + 1 }}</td>
                                                    <td>{{ item.curso }}</td>
                                                    <td>{{ item.total_alumnos }}</td>
                                                    <td
                                                        :class="{ 'text-danger': parseFloat(item.porcentaje_aprobados) < 50 }">
                                                        {{ item.porcentaje_aprobados }}%</td>
                                                    <td>
                                                        {{ item.porcentaje_desaprobados }}%
                                                    </td>
                                                    <td :class="{ 'text-danger': parseFloat(item.promedio_notas) < 11 }">{{
                                                        item.promedio_notas }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        PROMEDIO GENERAL DEL GRADO:
                                                    </td>
                                                    <td class="font-weight-bold">
                                                        {{ calcularPromedioNotas }}
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gráfico</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="div_grafico">
                            <canvas id="grafico"></canvas>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Chart from 'chart.js/auto'
let user = document.head.querySelector('meta[name="user"]');
export default {
    data() {
        return {
            años: {},
            niveles: {},
            grados: {},
            secciones: {},
            params: {
                año: '0',
                nivel: '0',
                grado: '0',
                seccion: '0'
            },
            isLoading: false,
            isFirstMounted: true,
            cursosList: []
        }
    },
    mounted() {
        this.listar_años();
    },
    computed: {
        user() {
            return JSON.parse(user.content);
        },
        calcularPromedioNotas() {
            const totalCursos = this.cursosList.length;
            if (totalCursos === 0) {
                return 0; // Manejar el caso en que la lista está vacía
            }

            const sumaPromedios = this.cursosList.reduce((acumulador, item) => {
                return acumulador + item.promedio_notas;
            }, 0);

            return (sumaPromedios / totalCursos).toFixed(2); // Redondear a 2 decimales
        }
    },
    methods: {
        async listar_años() {
            axios.get("/api/listar-anios")
                .then(response => {
                    this.años = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async listar_niveles() {
            axios.get("/api/listar-niveles",)
                .then(response => {
                    this.niveles = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async listar_grados() {
            axios.post("/api/listar-grados", {
                params: {
                    id: this.params.nivel
                }
            })
                .then(response => {
                    this.grados = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async listar_secciones() {
            axios.post("/api/listar-secciones", {
                params: {
                    id: this.params.grado
                }
            }).then(response => {
                this.secciones = response.data
            }).catch(error => {
                console.log(error)
            })
        },

        async fetchCoursesList() {
            // Verifica si alguno de los parámetros no es igual a '0'
            if (
                this.params.año !== '0' ||
                this.params.nivel !== '0' ||
                this.params.grado !== '0' ||
                this.params.seccion !== '0'
            ) {

                this.isLoading = true;
                try {
                    const response = await axios.post("/api/report/courses/list", this.params);
                    if (this.isFirstMounted) {
                        this.isFirstMounted = false
                    }
                    this.cursosList = response.data.list;
                } catch (error) {
                    console.error(error);
                } finally {
                    this.isLoading = false;
                }
            }
        },

        showChartInModal() {
            $('#grafico').remove();
            $('#div_grafico').append('<canvas id="grafico"><canvas>');

            // Array de nombres de cursos
            const nombresCursos = this.cursosList.map(item => item.curso);

            // Array de valores de aprobados y desaprobados
            const aprobados = this.cursosList.map(item => parseInt(item.aprobados));
            const desaprobados = this.cursosList.map(item => parseInt(item.desaprobados));

            var ctx = document.getElementById('grafico');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombresCursos,
                    datasets: [{
                        label: 'Aprobados',
                        data: aprobados,
                        backgroundColor: [
                            '#26c6da',
                        ],
                        borderColor: 'transparent',
                        borderWidth: 1
                    },
                    {
                        label: 'Desaprobados',
                        data: desaprobados,
                        backgroundColor: [
                            '#ffbd1f',
                        ],
                        borderColor: 'transparent',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
}
</script>
<style scoped>
.dark {
    color: #000000;
    font-size: .875rem;
    font-weight: 400;
    text-transform: uppercase;
}
</style>