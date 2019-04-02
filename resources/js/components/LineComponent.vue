<template>
<div>
    <area-chart
        id="linea"
        :data="lineData"
        :bar-colors="arrayColors" 
        xkeys="year"
        ykeys='["car"]'
        grid="true"
        resize="true"
        grid-text-weight="bold">
    </area-chart>
</div>
</template>

<script>
import { AreaChart } from 'vue-morris'

export default {
    data(){
        return {
            lineData: [
                { year: '2012', car: 40 },
                { year: '2013', car: 150},
                { year: '2014', car: 100},
                { year: '2015', car: 100}
            ],
            arrayColors: ["#5859f9"],
        }
  },
  
  components: {
        AreaChart
  }
}
</script>