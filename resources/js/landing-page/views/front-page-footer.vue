<template>
  <!-- Inicio del Footer -->
  <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Enlaces Rápidos</h4>
          <a v-for="(link, index) in quickLinks" :key="index" class="btn btn-link" :href="link.url">{{ link.text }}</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Contacto</h4>
          <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ contact.address }}</p>
          <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ contact.phone }}</p>
          <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ contact.email }}</p>
          <div class="d-flex pt-2">
            <a v-for="(social, index) in socialLinks" :key="index" class="btn btn-outline-light btn-social"
              :href="social.url">
              <i :class="social.icon"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Galería</h4>
          <div class="row g-2 pt-2">
            <div class="col-4" v-for="(image, index) in galleryImages" :key="index">
              <img class="img-fluid bg-light p-1" :src="image.src" :alt="image.alt">
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Boletín</h4>
          <p>{{ newsletterText }}</p>
          <div class="position-relative mx-auto" style="max-width: 400px;">
            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Tu correo electrónico">
            <button type="button"
              class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Suscribirse</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a class="border-bottom" :href="siteUrl">{{ siteName }}</a>, Todos los derechos reservados.
            Diseñado por <a class="border-bottom" :href="designedBy.url">{{ designedBy.name }}</a>
          </div>
          <div class="col-md-6 text-center text-md-end">
            <div class="footer-menu">
              <a v-for="(menuItem, index) in footerMenu" :key="index" :href="menuItem.url">{{ menuItem.text }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin del Footer -->
</template>

<script>
export default {
  data() {
    return {
      quickLinks: [
        { text: 'Acerca de nosotros', url: '#about-us' },
        { text: 'Contáctanos', url: '#contact-us' },
        { text: 'Política de privacidad', url: '#' },
        { text: 'Términos y condiciones', url: '#' },
        { text: 'Preguntas frecuentes', url: '#' },
      ],
      contact: {
        address: '123 Street, San Miguel, Cajamarca, PERÚ.',
        phone: '+51 963258758',
        email: 'livescontacto@gmail.com'
      },
      socialLinks: [
        { icon: 'fab fa-twitter', url: 'https://twitter.com/' },
        { icon: 'fab fa-facebook-f', url: 'https://www.facebook.com/' },
        { icon: 'fab fa-youtube', url: 'https://www.youtube.com/' },
        { icon: 'fab fa-linkedin-in', url: 'https://www.linkedin.com/' },
      ],
      galleryImages: [
        { src: 'landing-page/img/course-1.jpg', alt: 'Curso 1' },
        { src: 'landing-page/img/course-2.jpg', alt: 'Curso 2' },
        { src: 'landing-page/img/course-3.jpg', alt: 'Curso 3' },
        // Agrega más imágenes según sea necesario
      ],
      newsletterText: 'Suscríbete a nuestro boletín para recibir las últimas actualizaciones.',
      siteName: 'I.E PERUANA',
      siteUrl: '/',
      designedBy: {
        name: 'Developer System',
        url: '#',
      },
      footerMenu: [
        { text: 'Inicio', url: '/' },
        { text: 'Cookies', url: '/' },
        { text: 'Ayuda', url: '/' },
        { text: 'Preguntas frecuentes', url: '/' },
      ],
    };
  },
};
</script>
