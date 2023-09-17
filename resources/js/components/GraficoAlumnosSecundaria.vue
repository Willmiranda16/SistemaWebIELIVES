<template>
    <div>
       <canvas id="secundaria"></canvas>
    </div>
</template>
<script>
import Chart from 'chart.js/auto'

export default {
    data() {
        return{
            grados: [],
            totales: []
        }
    },
    mounted(){
        this.grafico();
    },
    methods: {
        grafico(){
            axios.get("/api/reportes-alumnos-secundaria")
            .then(response=>{
                this.grados = response.data.grados,
                this.totales = response.data.totales

                var data = this.totales;
                var labels = this.grados;

                var ctx = document.getElementById('secundaria');

                var myChart = new Chart(ctx,{
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Nivel Secundaria',
                            data: data,
                            borderWidth: 1
                        }]
                    },
                    options:{
                        scales:{
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}

</script>
