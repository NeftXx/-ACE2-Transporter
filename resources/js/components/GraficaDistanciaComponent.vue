<template>
  <div class="small">
    <line-chart :chart-data="datacollection" ></line-chart>
  </div>
</template>

<script>
  import LineChart from './LineChart.js'

  export default {
    components: {
      LineChart
    },
    data () {
      return {
        datacollection: null,
      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
      fillData () {
        this.datacollection = {
          labels: [1,2,3,4,5,6,7],
          datasets: [
            {
              label: 'Velocidad',
              backgroundColor: '#f87979',
              data: [40, 39, 10, 40, 39, 80, 40]
            },
          ]
        }
      },
    }
  }
</script>

<style>
  .small {
    max-width: 600px;
    margin:  150px auto;
  }
</style>