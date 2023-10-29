<template>
  <!-- Inicio del Equipo -->
  <div id="our-team" class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Instructores</h6>
        <h1 class="mb-5">Instructores Expertos</h1>
      </div>
      <div class="row g-4">
        <div v-for="(instructor, index) in instructors" :key="index" class="col-lg-3 col-md-6 wow fadeInUp"
          :data-wow-delay="instructor.delay">
          <div class="team-item bg-light">
            <div class="overflow-hidden">
              <img class="img-fluid" :src="instructor.image" :alt="instructor.name">
            </div>
            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
              <div class="bg-light d-flex justify-content-center pt-2 px-1">
                <a class="btn btn-sm-square btn-primary mx-1" :href="instructor.facebookLink"><i
                    class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square btn-primary mx-1" :href="instructor.twitterLink"><i
                    class="fab fa-twitter"></i></a>
                <a class="btn btn-sm-square btn-primary mx-1" :href="instructor.instagramLink"><i
                    class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="text-center p-4">
              <h5 class="mb-0">{{ instructor.name }}</h5>
              <small>{{ instructor.designation }}</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin del Equipo -->
</template>

<script>
export default {
  data() {
    return {
      instructors: [
        {
          name: 'Luis Gonzales',
          designation: 'Maestro de Matemáticas',
          image: 'landing-page/img/team-1.jpg',
          facebookLink: '#',
          twitterLink: '#',
          instagramLink: '#',
          delay: '0.1s',
        },
        {
          name: 'Carmen Pérez',
          designation: 'Maestra de Ciencias',
          image: 'landing-page/img/team-2.jpg',
          facebookLink: '#',
          twitterLink: '#',
          instagramLink: '#',
          delay: '0.3s',
        },
        {
          name: 'Jorge Rodriguez',
          designation: 'Maestro de Arte',
          image: 'landing-page/img/team-3.jpg',
          facebookLink: '#',
          twitterLink: '#',
          instagramLink: '#',
          delay: '0.5s',
        },
        {
          name: 'Luz Martínez',
          designation: 'Maestra de Educación Física',
          image: 'landing-page/img/team-4.jpg',
          facebookLink: '#',
          twitterLink: '#',
          instagramLink: '#',
          delay: '0.7s',
        },
      ],
    };
  },
};
</script>
