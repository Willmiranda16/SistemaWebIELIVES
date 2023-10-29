<template>
  <!-- Acerca de Nosotros Inicio -->
  <div id="about-us" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
          <div class="position-relative h-100">
            <img class="img-fluid position-absolute w-100 h-100" :src="aboutImage" alt="" style="object-fit: cover;">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
          <h6 class="section-title bg-white text-start text-primary pe-3">{{ aboutTitle }}</h6>
          <h1 class="mb-4">{{ welcomeTitle }}</h1>
          <p class="mb-4">{{ welcomeText }}</p>
          <div class="row gy-2 gx-4 mb-4">
            <div v-for="(feature, index) in features" :key="index" class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ feature }}</p>
            </div>
          </div>
          <a class="btn btn-primary py-3 px-5 mt-2" :href="readMoreLink">{{ readMoreText }}</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Acerca de Nosotros Fin -->
</template>

<script>
export default {
  data() {
    return {
      aboutImage: 'landing-page/img/about.jpg',
      aboutTitle: 'Acerca de Nosotros',
      welcomeTitle: 'Bienvenido a I.E.P 82857 LIVES',
      welcomeText: 'Somos una institución educativa comprometida con la excelencia académica. Brindamos una educación de calidad para un futuro brillante.',
      features: [
        'Instructores Cualificados',
        'Clases Interactivas',
        'Diplomas de reconocimineto',
        'Enfoque Personalizado',
        'Programas Extracurriculares',
        'Instalaciones Modernas y Seguras',
      ],
      readMoreText: 'Leer Más',
      readMoreLink: '/leer-mas',
    }
  },
};
</script>
