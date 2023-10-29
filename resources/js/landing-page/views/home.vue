<template>
  <!-- Carrusel de Inicio -->
  <div id="home" class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
      <div v-for="(carouselItem, index) in carouselItems" :key="index" class="owl-carousel-item position-relative">
        <img class="img-fluid" :src="carouselItem.image" alt="">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
          style="background: rgba(24, 29, 56, .7);">
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-sm-10 col-lg-8">
                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{ carouselItem.title }}</h5>
                <h1 class="display-3 text-white animated slideInDown">{{ carouselItem.subtitle }}</h1>
                <p class="fs-5 text-white mb-4 pb-2">{{ carouselItem.description }}</p>
                <a :href="carouselItem.readMoreLink" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                  {{ carouselItem.readMoreText }}
                </a>
                <a :href="carouselItem.joinNowLink" class="btn btn-light py-md-3 px-md-5 animated slideInRight">
                  {{ carouselItem.joinNowText }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carrusel de Fin -->
</template>

<script>
export default {
  data() {
    return {
      carouselItems: [
        {
          image: './landing-page/img/carousel-1.png',
          title: 'Nuestra Excelencia Académica',
          subtitle: 'Destacando en la educación',
          description: 'Ofrecemos programas educativos de alta calidad para preparar a nuestros estudiantes para un futuro brillante y exitoso.',
          readMoreText: 'Leer Más',
          readMoreLink: '#',
          joinNowText: 'Únete Ahora',
          joinNowLink: '#',
        },
        {
          image: './landing-page/img/carousel-2.png',
          title: 'Creciendo Juntos',
          subtitle: 'Un ambiente de aprendizaje inclusivo',
          description: 'Fomentamos un entorno de aprendizaje inclusivo donde cada estudiante puede desarrollar su potencial al máximo.',
          readMoreText: 'Leer Más',
          readMoreLink: '#',
          joinNowText: 'Únete Ahora',
          joinNowLink: '#',
        },
      ],
    };
  },
};
</script>
