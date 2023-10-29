<template>
    <div>
        <Navbar />

        <!-- 👉 Home  -->
        <Home />

        <!-- 👉 Services  -->
        <Services />

        <!-- 👉 AboutUs  -->
        <AboutUs />

        <!-- 👉 Categories  -->
        <Categories />

        <!-- 👉 Courses  -->
        <Courses />

        <!-- 👉 Our Team -->
        <OurTeam />

        <!-- 👉 Customers Review -->
        <Testimonials />

        <!-- 👉 Contact Us  -->
        <ContactUs />

        <!-- 👉 Footer -->
        <Footer />

        <!-- ChatBox -->
        <ChatBox />
    </div>
</template>
<script>
import Footer from './views/front-page-footer.vue'
import Navbar from './views/front-page-navbar.vue'
import Home from './views/home.vue'
import AboutUs from './views/about-us.vue'
import ContactUs from './views/contact-us.vue'
import Testimonials from './views/testimonials.vue'
import Courses from './views/courses.vue'
import Services from './views/services.vue'
import Categories from './views/categories.vue'
import OurTeam from './views/our-team.vue'
import ChatBox from './chat/index.vue'

export default {
    components: {
        Footer,
        Navbar,
        Home,
        AboutUs,
        ContactUs,
        Testimonials,
        Courses,
        Services,
        Categories,
        OurTeam,
        ChatBox
    }
}
</script>