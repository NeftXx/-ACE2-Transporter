<template>
<div id="barra">
    <h1>Bar chart</h1>
    <bar-chart
        id="bar"
        :data="barData"
        :bar-colors="arrayColors" 
        xkeys="year"
        :ykeys="ykeys"
        grid="true"
        resize="true"
        grid-text-weight="bold">
    </bar-chart>
</div>
</template>

<script>
import { BarChart } from 'vue-morris'

export default {
    data(){
        return {
            barData: [
                { year: '2012', car: 40 , motorcycle:300, airplane:60},
                { year: '2013', car: 150, motorcycle:280, airplane:70},
                { year: '2014', car: 100, motorcycle:150, airplane:30},
                { year: '2015', car: 100, motorcycle:390, airplane:90}
            ],
            
            xkeys: "year",

            arrayColors: ["#5859f9", "#73c000", "#cc45ff"],
      
            ykeys: ["car", "motorcycle", "airplane"]
        }
  },
  
  components: {
      BarChart
  }
}
</script>

