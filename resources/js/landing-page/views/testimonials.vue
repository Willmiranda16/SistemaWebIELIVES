<template>
  <!-- Testimonio Inicio -->
  <div id="testimonial" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="text-center">
        <h6 class="section-title bg-white text-center text-primary px-3">Testimonios</h6>
        <h1 class="mb-5">¡Nuestros Estudiantes Dicen!</h1>
      </div>
      <div class="owl-carousel testimonial-carousel position-relative">
        <div v-for="(testimonial, index) in testimonials" :key="index" class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" :src="testimonial.image"
            style="width: 80px; height: 80px;" />
          <h5 class="mb-0">{{ testimonial.name }}</h5>
          <p>{{ testimonial.profession }}</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">{{ testimonial.comment }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonio Fin -->
</template>

<script>
export default {
  data() {
    return {
      testimonials: [
        {
          name: 'María García',
          profession: 'Estudiante de Matemáticas',
          image: '/landing-page/img/testimonial-1.jpg',
          comment: 'Mi experiencia en este colegio ha sido excepcional. Aprendí mucho y hice amigos maravillosos.',
        },
        {
          name: 'Angel Pérez',
          profession: 'Estudiante de Ciencias',
          image: '/landing-page/img/testimonial-2.jpg',
          comment: 'La educación aquí es de alta calidad. Los maestros son increíbles y nos brindan un ambiente de aprendizaje positivo.',
        },
        {
          name: 'Pedro Rodríguez',
          profession: 'Estudiante de Arte',
          image: '/landing-page/img/testimonial-3.jpg',
          comment: 'Me encanta expresarme a través del arte y este colegio me brinda la oportunidad de desarrollar mi creatividad.',
        },
        {
          name: 'Sofía Martínez',
          profession: 'Estudiante de Educación Física',
          image: '/landing-page/img/testimonial-4.jpg',
          comment: 'La educación física es divertida aquí. Aprendemos a mantenernos activos y saludables mientras nos divertimos.',
        },
      ],
    };
  },
};
</script>
