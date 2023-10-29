<template>
  <!-- Inicio de Cursos -->
  <div id="courses" class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Cursos</h6>
        <h1 class="mb-5">Cursos Populares</h1>
      </div>
      <div class="row g-4 justify-content-center">
        <div v-for="(course, index) in courses" :key="index" class="col-lg-4 col-md-6 wow fadeInUp" :data-wow-delay="course.delay">
          <div class="course-item bg-light">
            <div class="position-relative overflow-hidden">
              <img class="img-fluid" :src="course.image" :alt="course.name">
              <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Leer Más</a>
                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Unirse Ahora</a>
              </div>
            </div>
            <div class="text-center p-4 pb-0">
              <h3 class="mb-0">{{ course.price }}</h3>
              <div class="mb-3">
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small class="fa fa-star text-primary"></small>
                <small>({{ course.students }})</small>
              </div>
              <h5 class="mb-4">{{ course.title }}</h5>
            </div>
            <div class="d-flex border-top">
              <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{ course.instructor }}</small>
              <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{ course.duration }}</small>
              <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{ course.students }} Estudiantes</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin de Cursos -->
</template>

<script>
export default {
  data() {
    return {
      courses: [
        {
          title: 'Curso de Diseño y Desarrollo Web para Principiantes',
          price: 'S/. 49.00',
          students: 123,
          instructor: 'John Doe',
          duration: '1.49 Hrs',
          image: 'landing-page/img/course-1.jpg',
          delay: '0.1s',
        },
        {
          title: 'Curso de Desarrollo Frontend Avanzado',
          price: 'S/. 49.00',
          students: 123,
          instructor: 'Jane Smith',
          duration: '2.15 Hrs',
          image: 'landing-page/img/course-2.jpg',
          delay: '0.3s',
        },
        {
          title: 'Curso de Diseño Gráfico Creativo',
          price: 'S/. 49.00',
          students: 123,
          instructor: 'Eduardo Pérez',
          duration: '1.30 Hrs',
          image: 'landing-page/img/course-3.jpg',
          delay: '0.5s',
        },
      ],
    };
  },
};
</script>
