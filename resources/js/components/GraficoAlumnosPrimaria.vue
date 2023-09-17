<template>
    <div>
       <canvas id="primaria"></canvas>
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
            axios.get("/api/reportes-alumnos-primaria")
            .then(response=>{
                this.grados = response.data.grados,
                this.totales = response.data.totales

                var data = this.totales;
                var labels = this.grados;

                var ctx = document.getElementById('primaria');

                var myChart = new Chart(ctx,{
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Nivel Primaria',
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
