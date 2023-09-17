<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Horarios</h1>
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
                    <div class="tab-pane active" id="horario-all">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-1 col-form-label">Año </label>
                                    <div class="col-md-3">
                                        <select v-model="horario.año" @change="listar_niveles()"  class="form-control show-tick">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in años" :key="n.id" v-bind:value="n.año_id">
                                                {{n.año_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <label class="col-md-1 col-form-label">Nivel </label>
                                    <div class="col-md-3">
                                        <select v-model="horario.nivel"  class="form-control show-tick" @change="listar_grados()">
                                            <option value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                {{n.niv_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-1 col-form-label">Grado </label>
                                    <div class="col-md-3">
                                        <select v-model="horario.grado"  class="form-control show-tick" @change="listar_secciones()">
                                            <option v-if="grados.length == 0" value="0" selected disabled > No hay grados registrados </option>
                                            <option v-else value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in grados" :key="n.id" v-bind:value="n.gra_id">
                                                {{n.gra_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <label class="col-md-1 col-form-label">Sección </label>
                                    <div class="col-md">
                                        <select v-model="horario.seccion"  class="form-control show-tick">
                                            <option v-if="secciones.length == 0" selected disabled value="0"> No hay secciones registrados </option>
                                            <option v-else value="0" selected disabled>-- Selecciona --</option>
                                            <option v-for="n in secciones" :key="n.id" v-bind:value="n.sec_id">
                                                {{n.sec_descripcion}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-lg-2 col-md-4 col-sm-6" style="display: flex;align-items: center;">
                                        <a v-if="!loading" @click="buscar_horarios()" href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Cargar Información</a>
                                        <a v-else href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Procesando...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-none" id="mostrar-info">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-3 p-4" >
                                        <form class="card p-3" @submit.prevent="agregar_horario">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-6 col-sm-12">
                                                    <div class="form-group"><label>Curso</label>
                                                        <select v-model="horario.curso"  class="form-control show-tick">
                                                            <option value="0" selected disabled>-- Selecciona --</option>
                                                            <option v-for="c in cursos" :key="c.id" v-bind:value="c.cur_id">
                                                                {{c.cur_abreviatura}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12">
                                                    <div class="form-group"><label>Fecha</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form-control" v-model="horario.fecha" autofocus required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12">
                                                    <div class="form-group"><label>Hora Inicio</label>
                                                        <div class="input-group mb-3">
                                                            <input type="time" class="form-control" v-model="horario.hora_inicio" autofocus required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12">
                                                    <div class="form-group"><label>Hora Fin</label>
                                                        <div class="input-group mb-3">
                                                            <input type="time" class="form-control" v-model="horario.hora_fin" autofocus required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12">
                                                    <div class="form-group"><label>Color</label>
                                                        <div class="input-group mb-3">
                                                            <select v-model="horario.color"  class="form-control show-tick" required>
                                                                <option value="0" selected disabled>-- Selecciona --</option>
                                                                <option value="red">Rojo</option>
                                                                <option value="blue">Azul</option>
                                                                <option value="green">Verde</option>
                                                                <option value="purple">Morado</option>
                                                                <option value="orange">Naranja</option>
                                                                <option value="turquiose">Turquesa</option>
                                                                <option value="brown">Marrón</option>
                                                                <option value="black">Negro</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12" style="display: flex;align-items: center;justify-content: center;">
                                                    <button v-if="!loading1" type="submit" class="btn btn-primary">Registrar</button>
                                                    <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md p-4" >
                                        <div v-if="horario.nivel == 1" class="col" style="display: flex;align-items: center;justify-content: center;">
                                            <FullCalendar :options="calendarOptionsPrimaria" style="width: 100%;" id="horario">
                                                <template v-slot:eventContent='arg'>
                                                <b>{{ arg.event.title }}</b>
                                                </template>
                                            </FullCalendar>
                                        </div>
                                        <div v-else class="col" style="display: flex;align-items: center;justify-content: center;">
                                            <FullCalendar :options="calendarOptionsSecundaria" style="width: 100%;" id="horario">
                                                <template v-slot:eventContent='arg'>
                                                <b>{{ arg.event.title }}</b>
                                                </template>
                                            </FullCalendar>
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
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction'
import listPlugin  from '@fullcalendar/list'

let user = document.head.querySelector('meta[name="user"]');
export default {
    components: {
        FullCalendar
    },
    data() {
        return{
            info: {},
            periodo: {},
            años: {},
            alumnos: {},
            docentes: {},
            cursos: {},
            niveles: {},
            grados: {},
            secciones: {},
            data: [],
            horarios: {},
            cursos: {},
            horario: {
                año: '0',
                nivel: '0',
                grado: '0',
                seccion: '0',
                curso: '0',
                fecha: '',
                hora_inicio: '',
                hora_fin: '',
                color: '0',
                editable: 'false',
            },
            calendarOptionsPrimaria : {
                plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin ],
                headerToolbar: {
                    left: "prev,next today",
                    center: "",
                    /* right: "dayGridMonth,timeGridWeek,timeGridDay", */
                    right: "timeGridWeek",
                },
                buttonText: {
                    today:    'Hoy',
                    month:    'Mes',
                    week:     'Semana',
                    day:      'Dia'
                },
                initialView: 'timeGridWeek',
                allDaySlot: false,
                slotMinTime: "07:00:00",
                slotMaxTime: "13:00:00",
                slotDuration: "00:15",
                dayHeaderFormat: { weekday: 'long' },
                weekends: false,
                locale:'es',
                events: [],
                eventClick: function print(info) {
                    axios.post("/api/actualizar-horarios",{
                        params: {
                            horario: {
                                id: info.event.id,
                                start: info.event.start.toLocaleDateString(),
                                end: info.event.end.toLocaleDateString(),
                                time_start: info.event.start.toLocaleTimeString(),
                                time_end: info.event.end.toLocaleTimeString(),
                            },
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Actualizado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.buscar_horarios();
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            },
            calendarOptionsSecundaria : {
                plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin ],
                headerToolbar: {
                    left: "prev,next today",
                    center: "",
                   /*  right: "dayGridMonth,timeGridWeek,timeGridDay", */
                   right: "timeGridWeek",
                },
                buttonText: {
                    today:    'Hoy',
                    month:    'Mes',
                    week:     'Semana',
                    day:      'Dia'
                },
                initialView: 'timeGridWeek',
                allDaySlot: false,
                slotMinTime: "13:00:00",
                slotMaxTime: "19:00:00",
                slotDuration: "00:15",
                dayHeaderFormat: { weekday: 'long' },
                weekends: false,
                locale:'es',
                events: [],
                eventClick: function print(info) {
                    axios.post("/api/actualizar-horarios",{
                        params: {
                            horario: {
                                id: info.event.id,
                                start: info.event.start.toLocaleDateString(),
                                end: info.event.end.toLocaleDateString(),
                                time_start: info.event.start.toLocaleTimeString(),
                                time_end: info.event.end.toLocaleTimeString(),
                            },
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Actualizado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.buscar_horarios();
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }

            },
            loading: false,
            loading1: false,
            buscando: false
        }
    },
    mounted(){
        this.listar_años();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_horario(){
            this.loading1 = true;
            axios.post("/api/agregar-horarios",{
                params: {
                    horario: this.horario,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading1 = false;
                    swal({
                        title: "Agredado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.buscar_horarios();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async actualizar_horario(info){
            console.log(info);
            this.loading1 = true;
            axios.post("/api/agregar-horarios",{
                params: {
                    horario: this.horario,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading1 = false;
                    swal({
                        title: "Agredado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.buscar_horarios();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
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
                this.ocultar_lista(),
                this.niveles = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_docentes() {
            axios.post("/api/listar-docentes-all",{
                params: {
                    nivel: this.horario.nivel
                }
            })
            .then(response=>{
                this.horario.docente = '0',
                this.horario.grado = '0',
                this.horario.seccion = '0',
                this.docentes = response.data.docente,
                this.ocultar_lista()
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados() {
            axios.post("/api/listar-grados",{
                params: {
                    id: this.horario.nivel
                }
            })
            .then(response=>{
                this.horario.grado = '0',
                this.horario.seccion = '0',
                this.grados = response.data,
                this.ocultar_lista()
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_secciones() {
            axios.post("/api/listar-secciones",{
                params: {
                    id: this.horario.grado
                }
            })
            .then(response=>{
                this.horario.seccion = '0',
                this.secciones = response.data,
                this.ocultar_lista()
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscar_horarios(){
            this.buscando = true;
            this.loading = true;
            axios.post("/api/listar-horarios",{
                params: {
                    horario: this.horario
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.horarios = response.data.horarios;
                    this.cursos = response.data.cursos;
                    this.data = [];
                    response.data.horarios.forEach(e => {
                        var object = {
                            id: e.hor_id,
                            title: e.curso,
                            /* ff_start: e.fecha,
                            hh_start: e.hora_inicio,
                            hh_end: e.hora_fin, */
                            start: e.hora_inicio,
                            end: e.hora_fin,
                            color: e.color,
                            textColor: "white",
                            editable: e.editable
                        };
                        this.data.push(object)
                    });
                    /* this.data = response.data.asignacion
                    this.grados = response.data.grados */
                    this.ocultar_lista();
                    this.mostrar();
                    this.buscando = false;
                    this.loading = false;
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async ocultar_lista(){
            if (this.horario.nivel == 0 && this.horario.grado == 0 && this.horario.seccion == 0) {
                const div = document.getElementById("mostrar-info").classList;
                div.add("d-none");
            }else if (this.horario.nivel != 0 && this.horario.grado == 0 && this.horario.seccion == 0) {
                const div = document.getElementById("mostrar-info").classList;
                div.add("d-none");
            }else if (this.horario.nivel != 0 && this.horario.grado == 0 && this.horario.seccion == 0) {
                const div = document.getElementById("mostrar-info").classList;
                div.add("d-none");
            }else if (this.horario.nivel != 0 && this.horario.grado != 0 && this.horario.seccion == 0) {
                const div = document.getElementById("mostrar-info").classList;
                div.add("d-none");
            }else{
                const div = document.getElementById("mostrar-info").classList;
                div.remove("d-none");
            }
        },
        async limpiar_campos() {
            this.horario.fecha = '',
            this.horario.hora_inicio = '',
            this.horario.hora_fin = '',
            this.horario.color = '0',
            this.horario.curso = '0'
        },
        mostrar() {
            if(this.horario.nivel == 1){
                this.calendarOptionsPrimaria.events = this.data;
            }else{
                this.calendarOptionsSecundaria.events = this.data;
            }

        },
        handleDateClick(e){
            console.log(e);
        },
        handleSelect(e){
            console.log(e);
        }

    }
}
</script>
