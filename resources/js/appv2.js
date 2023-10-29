import Vue from "vue";
import App from "./landing-page/index.vue";
import axios from "axios";

// Configuración de Axios
axios.defaults.baseURL = "https://api.example.com"; // Reemplaza con la URL de tu API

const app = new Vue({
    el: "#app",
    render: h => h(App),
});
