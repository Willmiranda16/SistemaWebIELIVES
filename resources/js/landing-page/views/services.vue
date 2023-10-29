<template>
  <!-- Servicios -->
  <div id="services" class="container-xxl py-5">
    <div class="container">
      <div class="row g-4">
        <div v-for="(service, index) in services" :key="index" class="col-lg-3 col-sm-6 wow fadeInUp"
          :data-wow-delay="service.delay">
          <div class="service-item text-center pt-3">
            <div class="p-4">
              <i :class="service.iconClass" class="fa-3x text-primary mb-4"></i>
              <h5 class="mb-3">{{ service.title }}</h5>
              <p>{{ service.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Servicios -->
</template>
  
<script>
export default {
  data() {
    return {
      services: [
        {
          iconClass: 'fa fa-graduation-cap',
          title: 'Instructores Calificados',
          description: 'Nuestros instructores altamente capacitados te guiarán hacia el éxito académico.',
          delay: '0.1s',
        },
        {
          iconClass: 'fa fa-globe',
          title: 'Clases presenciales',
          description: 'Disfruta de experiencias de aprendizaje en persona para un mayor compromiso.',
          delay: '0.3s',
        },
        {
          iconClass: 'fa fa-home',
          title: 'Proyectos en Casa',
          description: 'Realiza proyectos desde la comodidad de tu hogar, aplicando lo que has aprendido.',
          delay: '0.5s',
        },
        {
          iconClass: 'fa fa-book-open',
          title: 'Biblioteca de Libros',
          description: 'Accede a una amplia gama de recursos de lectura en nuestra biblioteca virtual.',
          delay: '0.7s',
        },
      ],
    };
  },
};
</script>
  