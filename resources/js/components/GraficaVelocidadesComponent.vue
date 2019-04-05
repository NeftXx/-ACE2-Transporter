<template>
  <div class="small">
    <line-chart :chart-data="datacollection"></line-chart>
  </div>
</template>

<script>
import LineChart from "./LineChart.js";

export default {
  components: {
    LineChart
  },
  data() {
    return {
      datacollection: null,
      labels: null,
      data: null,
    };
  },
  mounted() {
    this.fillData();
  },
  methods: {
    fillData() {
      axios.get("/api/velocidades").then(response => {

          this.labels = response.data.map(list => {
            return "Recorrido " + list.Recorrido;
          });

          this.data = response.data.map(list => {
            return list.Velocidad;
          });

        this.datacollection = {
          labels: this.labels,
          datasets: [
            {
              label: "Velocidad",
              backgroundColor: "#64EA8D",
              data: this.data
            }
          ]
        };

      });
    }
  }
};
</script>

<style scoped>
.small {
  max-width: 800px;
  margin: 10px auto;
}
</style>