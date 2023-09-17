<template>
    <div>
       <canvas id="docente"></canvas>
    </div>
</template>
<script>
import Chart from 'chart.js/auto'

export default {
    data() {
        return{
            cargos: [],
            totales: [],
            total: 0
        }
    },
    mounted(){
        this.grafico();
    },
    methods: {
        grafico(){
            axios.get("/api/reportes-cargos-personal-primaria")
            .then(response=>{
                this.cargos = response.data.cargos,
                this.totales = response.data.totales,
                this.total = response.data.total

                var data = this.totales;
                var labels = this.cargos;
                var total = this.total;

                var ctx = document.getElementById('docente');

                var myChart = new Chart(ctx,{
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total',
                            data: data,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 191, 191)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 159, 64)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)',
                                'rgb(252, 247, 104)',
                                'rgb(208, 225, 94)',
                                'rgb(255, 159, 64)'
                            ],
                            hoverOffset: total
                        }]
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
