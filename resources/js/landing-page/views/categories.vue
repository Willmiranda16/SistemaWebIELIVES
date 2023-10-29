<template>
  <!-- Categorías de Cursos -->
  <div id="categories" class="container-xxl py-5 category">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">{{ categoryTitle }}</h6>
        <h1 class="mb-5">{{ categoryHeading }}</h1>
      </div>
      <div class="row g-3">
        <div class="col-lg-7 col-md-6">
          <div class="row g-3">
            <div v-for="(category, index) in categories" :key="index" class="col-lg-12 col-md-12 wow zoomIn" :data-wow-delay="category.delay">
              <a class="position-relative d-block overflow-hidden" :href="category.link">
                <img class="img-fluid" :src="category.image" :alt="category.name">
                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                  style="margin: 1px;">
                  <h5 class="m-0">{{ category.name }}</h5>
                  <small class="text-primary">{{ category.courseCount }}</small>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
          <a class="position-relative d-block h-100 overflow-hidden" :href="specialCategory.link">
            <img class="img-fluid position-absolute w-100 h-100" :src="specialCategory.image" :alt="specialCategory.name"
              style="object-fit: cover;">
            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
              style="margin:  1px;">
              <h5 class="m-0">{{ specialCategory.name }}</h5>
              <small class="text-primary">{{ specialCategory.courseCount }}</small>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Categorías de Cursos -->
</template>

<script>
export default {
  data() {
    return {
      categoryTitle: 'Categorías',
      categoryHeading: 'Categorías de Cursos',
      categories: [
        {
          name: 'Diseño Web',
          image: 'landing-page/img/cat-1.jpg',
          courseCount: '49 Cursos',
          link: '/cursos/diseno-web',
          delay: '0.1s',
        },
        {
          name: 'Diseño Gráfico',
          image: 'landing-page/img/cat-2.jpg',
          courseCount: '49 Cursos',
          link: '/cursos/diseno-grafico',
          delay: '0.3s',
        },
        {
          name: 'Edición de Video',
          image: 'landing-page/img/cat-3.jpg',
          courseCount: '49 Cursos',
          link: '/cursos/edicion-video',
          delay: '0.5s',
        },
      ],
      specialCategory: {
        name: 'Marketing en Línea',
        image: 'landing-page/img/cat-4.jpg',
        courseCount: '49 Cursos',
        link: '/cursos/marketing-en-linea',
      },
    };
  },
};
</script>
