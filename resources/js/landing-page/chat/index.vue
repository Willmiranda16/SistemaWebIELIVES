<template>
    <div class="float-top">
        <!-- Default dropup button -->
        <div class="btn-group dropup">
            <button type="button" class="btn btn-lg btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                data-bs-auto-close="false" aria-expanded="false">
                <i class="fa fa-comments"></i>
            </button>
            <div class="dropdown-menu shadow" style="min-width: 430px;border-radius: 10px;">
                <section style="background-color: #eee;">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">

                                <div class="card" id="chat2">
                                    <div class="card-header d-flex justify-content-between align-items-center p-3">
                                        <h5 class="mb-0">Chat</h5>
                                        <button type="button" class="btn btn-primary btn-sm"
                                            data-mdb-ripple-color="dark">Edu Bot</button>
                                    </div>
                                    <div class="card-body scrolling-div" data-mdb-perfect-scrollbar="true"
                                        ref="messageContainer">
                                        <div v-for="(message, index) in conversation" :key="index"
                                            :class="{ 'd-flex flex-row justify-content-start': !message.user, 'd-flex flex-row justify-content-end': message.user }">
                                            <img v-if="!message.user"
                                                src="https://play-lh.googleusercontent.com/cF_oWC9Io_I9smEBhjhUHkOO6vX5wMbZJgFpGny4MkMMtz25iIJEh2wASdbbEN7jseAx"
                                                alt="avatar 1" style="width: 35px; height: 100%;">
                                            <div>
                                                <div v-if="isArray(message.message)" class="p-2"
                                                    :style="message.user ? 'background-color: #f5f6f7;' : 'background-color: #e5f8e7;'">
                                                    <ul>
                                                        <li class="small mb-1" v-for="item in message.message" :key="item">
                                                            {{
                                                                item }}</li>
                                                    </ul>
                                                </div>
                                                <p v-else class="small p-2 ms-3 mb-1 rounded-3"
                                                    :style="message.user ? 'background-color: #f5f6f7;' : 'background-color: #e5f8e7;'">
                                                    {{ message.message }}
                                                </p>

                                                <div class="mt-2 d-flex flex-wrap gap-1" v-if="index === 0">
                                                    <button v-for="(suggestion, i) in suggestionButtons" :key="i"
                                                        type="button" class="btn btn-outline-success btn-sm mb-2"
                                                        @click="addResponse(suggestion)">
                                                        {{ suggestion }}
                                                    </button>
                                                </div>
                                                <p class="small ms-3 mb-3 rounded-3 text-muted">{{ message.time }}</p>
                                            </div>
                                            <img v-if="message.user"
                                                src="https://cdn-icons-png.flaticon.com/256/6596/6596121.png" alt="avatar 1"
                                                style="width: 35px; height: 100%;">
                                        </div>
                                        <div v-if="isBotThinking" class="d-flex flex-row justify-content-start mb-4">
                                            <img src="https://play-lh.googleusercontent.com/cF_oWC9Io_I9smEBhjhUHkOO6vX5wMbZJgFpGny4MkMMtz25iIJEh2wASdbbEN7jseAx"
                                                alt="Bot Avatar" style="width: 35px; height: 100%;" />
                                            <div>
                                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #e5f8e7;">
                                                    Procesando...
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Escribe aqui..." v-model="userInput" @keyup.enter="sendMessage">
                                        <a class="ms-3" href="#!" @click="sendMessage"><i
                                                class="fas fa-paper-plane"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            userInput: '',
            isBotThinking: false,
            conversation: [
                {
                    user: false,
                    message: "¡Hola! 😀 Soy tu asistente académico personal. Estoy aquí para guiarte en tu viaje educativo y brindarte información relevante. Algunos de los temas con los que puedo ayudarle incluyen:",
                    time: "12.03 pm",
                },
            ],
            suggestionButtons: [
                "Consultas Frecuentes",
                "Búsqueda de Cursos",
                "Calendario Académico",
                "Recursos Académicos",
                "Solicitudes y Trámites",
                "Asesoría Académica",
                "Inicio de Matrículas",
            ],
            dataBase: [
                {
                    category: "Consultas Frecuentes",
                    content: [
                        "Horario Escolar: El horario escolar en el Colegio '82857 LIVES' es de lunes a viernes de 8:00 a.m. a 3:00 p.m. Los estudiantes tienen un descanso de 15 minutos por la mañana y un almuerzo de 45 minutos.",
                        "Uniformes Escolares: Los estudiantes deben usar el uniforme escolar de lunes a jueves, que consta de camisa blanca, pantalón o falda azul marino y zapatos negros. Los viernes son días de 'Ropa Casual.'"
                    ]
                },
                {
                    category: "Búsqueda de Cursos",
                    content: [
                        "En el Colegio, ofrecemos una variedad de cursos diseñados para enriquecer la educación de los estudiantes. Algunas de nuestras asignaturas incluyen Matemáticas, Lengua y Literatura, Ciencias Naturales, Estudios Sociales, Educación Física y Música. Además, ofrecemos clases de refuerzo para estudiantes que necesitan apoyo adicional en áreas específicas."
                    ]
                },
                {
                    category: "Calendario Académico",
                    content: [
                        "El calendario académico del Colegio '82857 LIVES' para el próximo año escolar (2023) es el siguiente:",
                        "Inicio del año escolar: 15 de febrero de 2023",
                        "Vacaciones de verano: del 1 al 30 de julio de 2023",
                        "Día del Padre y Madre: 10 de mayo de 2023",
                        "Reunión de Padres y Maestros: 20 de septiembre de 2023",
                        "Fin del año escolar: 30 de noviembre de 2023"
                    ]
                },
                {
                    category: "Recursos Académicos",
                    content: [
                        "Nuestro colegio está equipado con recursos académicos que apoyan el aprendizaje de los estudiantes, incluyendo:",
                        "Biblioteca escolar con una amplia colección de libros infantiles y materiales educativos.",
                        "Laboratorio de Ciencias para experimentos y proyectos relacionados con las ciencias naturales.",
                        "Aulas bien equipadas con tecnología interactiva y recursos visuales."
                    ]
                },
                {
                    category: "Solicitudes y Trámites",
                    content: [
                        "En el Colegio '82857 LIVES', los padres y tutores pueden encontrar información sobre los siguientes procesos de solicitud y trámites:",
                        "Inscripción de Nuevos Estudiantes: Para inscribir a un nuevo estudiante, los padres deben completar un formulario de inscripción, proporcionar el certificado de nacimiento y registros de vacunación, y asistir a una reunión de orientación.",
                        "Solicitud de Ausencia por Enfermedad: Si un estudiante está enfermo y no puede asistir a la escuela, los padres deben notificar a la escuela por teléfono o correo electrónico antes de la hora de inicio de clases.",
                        "Cambios de Información de Contacto: Si hay cambios en la información de contacto de los padres, como números de teléfono o direcciones de correo electrónico, los padres deben informar a la escuela de inmediato."
                    ]
                },
                {
                    category: "Asesoría Académica",
                    content: [
                        "En '82857 LIVES', ofrecemos asesoría académica para ayudar a los estudiantes a alcanzar su máximo potencial. Los consejeros escolares están disponibles para:",
                        "Asesorar a los estudiantes en la elección de cursos y actividades extracurriculares.",
                        "Brindar apoyo emocional y consejería en casos de situaciones personales o académicas difíciles.",
                        "Colaborar con los maestros y padres para garantizar el éxito académico de los estudiantes."
                    ]
                },
                {
                    category: "Número de Teléfono",
                    content: "El número de teléfono principal del Colegio '82857 LIVES' es (123) 456-7890. Para contactarnos telefónicamente, puedes llamar al (123) 456-7890."
                },
                {
                    category: "Dirección",
                    content: "La dirección del Colegio '82857 LIVES' es 123 Calle de la Felicidad, Ciudad Feliz, Código Postal 12345."
                },
                {
                    category: "Inicio de Matrículas",
                    content: "El período de matrículas para el próximo año escolar (2023-2024) comenzará el 1 de enero de 2023."
                },
                {
                    category: "Mensualidad en el Colegio",
                    content: "La mensualidad en el Colegio se establece en $500 por estudiante. Los pagos se realizan mensualmente y se pueden efectuar en la oficina de administración o a través de transferencia bancaria. Se proporciona asistencia financiera a familias que califican para reducción de costos de matrícula."
                },
                {
                    category: "Notas Aprobatorias",
                    content: "Las notas aprobatorias en el Colegio son del 70% o superior. Los estudiantes deben mantener un promedio de calificación de al menos 70 puntos para aprobar sus asignaturas. En caso de no alcanzar esta calificación, se ofrecen oportunidades de recuperación."
                },
                {
                    category: "Entrega de Libretas",
                    content: "La entrega de libretas se realiza al final de cada trimestre académico. Los padres y tutores pueden recoger las libretas de calificaciones en una reunión programada con los maestros. Las libretas contienen información detallada sobre el desempeño académico y las observaciones del maestro."
                },
                {
                    category: "Actividades Extracurriculares",
                    content: "El Colegio ofrece una variedad de actividades extracurriculares, que incluyen clubes de arte, deportes, música y ciencias. Los estudiantes pueden inscribirse en estas actividades para enriquecer su experiencia escolar y desarrollar sus habilidades e intereses."
                },
                {
                    category: "Políticas de Uniformes",
                    content: "Los estudiantes deben cumplir con las políticas de uniformes que incluyen el uso de camisa blanca, pantalón o falda azul marino y zapatos negros de lunes a jueves. Los viernes son días de 'Ropa Casual' en los que los estudiantes pueden vestir de manera más relajada, pero dentro de las pautas de vestimenta adecuada."
                },
                {
                    category: "Eventos Especiales",
                    content: "El Colegio organiza eventos especiales a lo largo del año, como ferias culturales, competencias deportivas, excursiones educativas y festivales escolares. Estos eventos ofrecen oportunidades para que los estudiantes, padres y personal escolar se involucren y celebren juntos."
                },
                {
                    category: "Política de Uniformes",
                    content: "Los estudiantes deben usar el uniforme escolar de lunes a jueves, que consta de camisa blanca, pantalón o falda azul marino y zapatos negros. Los viernes son días de 'Ropa Casual', y los estudiantes pueden vestir de manera más informal."
                },
                {
                    category: "Transporte Escolar",
                    content: "Ofrecemos servicios de transporte escolar para estudiantes que viven a cierta distancia de la escuela. Los autobuses escolares recogen a los estudiantes en puntos designados y los llevan de regreso al final del día escolar."
                },
                {
                    category: "Recursos para Padres",
                    content: "Ofrecemos recursos para padres, como reuniones informativas, talleres y oportunidades para involucrarse en la educación de sus hijos. Los padres pueden comunicarse con nuestro personal de asesoría para obtener orientación y apoyo."
                }
            ]
        };
    },
    methods: {
        isArray(value) {
            return Array.isArray(value);
        },
        addResponse(question) {
            const result = this.searchInDatabase(question);

            // Agregar la pregunta del usuario al chat
            this.conversation.push({
                user: true,
                message: question,
                time: this.getCurrentTime(),
            });
            this.$nextTick(() => {
                const messageContainer = this.$refs.messageContainer;
                if (messageContainer) {
                    messageContainer.scrollTop = messageContainer.scrollHeight;
                }
            });

            // Simular que el bot está "pensando" durante 2 segundos
            this.isBotThinking = true;
            setTimeout(() => {
                // Después de 2 segundos, agregar la respuesta del bot al chat
                this.conversation.push({
                    user: false,
                    message: result,
                    time: this.getCurrentTime(),
                });
                // Finalizar la simulación de "pensamiento"
                this.isBotThinking = false;
                // Desplázate hacia abajo para mostrar el nuevo mensaje
                this.$nextTick(() => {
                    const messageContainer = this.$refs.messageContainer;
                    if (messageContainer) {
                        messageContainer.scrollTop = messageContainer.scrollHeight;
                    }
                });
            }, 1000);

        },
        sendMessage() {
            const userMessage = this.userInput;
            if (userMessage) {
                // Agregar el mensaje del usuario al chat
                this.addResponse(userMessage)

                // Limpia el campo de entrada después de enviar el mensaje
                this.userInput = "";
            }
        },

        searchInDatabase(question) {
            const query = question.toLowerCase(); // Convertimos la búsqueda a minúsculas para hacer una búsqueda sin distinción entre mayúsculas y minúsculas.

            for (const item of this.dataBase) {
                if (item.category.toLowerCase() === query) {
                    return item.content;
                }
            }

            for (const item of this.dataBase) {
                if (item.category.toLowerCase().includes(query)) {
                    return item.content;
                }
            }

            return "Lo siento, no encontré información relacionada.";
        },

        getCurrentTime() {
            const now = new Date();
            return `${now.getHours()}:${(now.getMinutes() < 10 ? '0' : '') + now.getMinutes()}`;
        },
    },
};
</script>
<style scoped>
.float-top {
    position: fixed;
    right: 15px;
    bottom: 15px;
    z-index: 99;
}

.scrolling-div {
    max-height: 430px;
    height: auto;
    overflow-y: auto;
}

#chat2 .form-control {
    border-color: transparent;
}

#chat2 .form-control:focus {
    border-color: transparent;
    box-shadow: inset 0px 0px 0px 1px transparent;
}

.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}
</style>