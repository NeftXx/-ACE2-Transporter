<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,

  data() {
    return {
      datacollection: null,
      labels: null,
      data: null,
      options: null
    };
  },

  mounted() {
    axios.get("/api/ultimos-tiempos").then(response => {
      this.labels = response.data.map(list => {
        return "Recorrido " + list.Recorrido;
      });

      this.data = response.data.map(list => {
        return list.Tiempo_Fin;
      });

    console.log(this.data);
      this.datacollection = {
        labels: this.labels,
        datasets: [
          {
            label: "Segundos",
            backgroundColor: "#6492EA",
            data: this.data
          }
        ]
      };
      this.options = {
        responsive: true,
        maintainAspectRatio: false
      };
      this.renderChart(this.datacollection, this.options);
    });    
  }
};
</script>

<style>
.small {
  max-width: 600px;
  margin: 150px auto;
}
</style>