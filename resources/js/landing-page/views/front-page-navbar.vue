<template>
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="#" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>I.E.P 82857 LIVES</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a v-for="(link, index) in navLinks" :key="index" :href="`#${link.path}`" class="nav-item nav-link"
          :class="{ 'active': `#${link.path}` === currentHash }">
          {{ link.text }}
        </a>
      </div>
      <a href="/login" target="_blank" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Admin<i
          class="fa fa-arrow-right ms-3"></i></a>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      navLinks: [
        { path: 'home', text: 'Inicio' },
        { path: 'about-us', text: 'Acerca de' },
        { path: 'courses', text: 'Cursos' },
        { path: 'our-team', text: 'Nuestro Equipo' },
        { path: 'testimonial', text: 'Testimonio' },
        { path: 'contact-us', text: 'Contacto' },
      ],
      currentHash: window.location.hash,
    };
  },
  watch: {
    currentHash(newHash) {
      // Handle the hash change
      // You can add logic here to perform actions when the hash changes
    },
  },
  mounted() {
    // Listen for hash change events
    window.addEventListener('hashchange', () => {
      this.currentHash = window.location.hash;
    });
  },
};
</script>
