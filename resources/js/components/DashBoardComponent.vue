<template>
  <div class="container" style="padding-top: 10px">
    <div class="col-lg-12 text-center">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0 text-gray-800">Dashboard</h1>
      </div>
    </div>

    <div style="padding-top: 10px; padding-bottom: 30px">
      <div class="card shadow">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ultimo Recorrido</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <card-component
                border="border-left-primary"
                atributo="Velocidad"
                dimensional="cm/s"
                :valor="recorrido_actual.velocidad"
                icono="fas fa-bicycle"
              />
            </div>

            <div class="col">
              <card-component
                border="border-left-success"
                atributo="Distancia"
                dimensional="cm"
                :valor="recorrido_actual.distancia"
                icono="fas fa-road"
              />
            </div>

            <div class="col">
              <card-component
                border="border-left-info"
                atributo="Peso"
                dimensional="libras"
                :valor="recorrido_actual.peso"
                icono="fas fa-cube"
              />
            </div>

            <div class="col-5">
              <card-component
                border="border-left-warning"
                atributo="Cantidad de obstaculos"
                dimensional="objetos"
                :valor="recorrido_actual.obstaculos"
                icono="fas fa-cubes"
              />
            </div>
          </div>
          <div class="row">
            <div class="col">
              <card-component
                border="border-left-danger"
                atributo="Tiempo de espera"
                dimensional="seg"
                :valor="recorrido_actual.tiempo_espera_obs"
                icono="far fa-stop-circle"
              />
            </div>

            <div class="col">
              <card-component
                border="border-left-success"
                atributo="Tiempo de ida"
                dimensional="seg"
                :valor="recorrido_actual.tiempo_inicio"
                icono="far fa-clock"
              />
            </div>

            <div class="col">
              <card-component
                border="border-left-primary"
                atributo="Tiempo de regreso"
                dimensional="seg"
                :valor="recorrido_actual.tiempo_fin"
                icono="far fa-clock"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row" style="padding-top: 30px;">
      <div class="col-4">
        <h3>PROMEDIOS</h3>

        <card-component
          border="border-left-primary"
          atributo="Velocidad"
          dimensional="cm/s"
          :valor="info.velocidad_promedio"
          icono="fas fa-bicycle"
        />

        <card-component
          border="border-left-success"
          atributo="Distancia"
          dimensional="cm"
          :valor="info.distancia_promedio"
          icono="fas fa-road"
        />

        <card-component
          border="border-left-info"
          atributo="Peso"
          dimensional="libras"
          :valor="info.peso_promedio"
          icono="fas fa-cube"
        />

        <card-component
          border="border-left-warning"
          atributo="Cantidad de obstaculos"
          dimensional="objetos"
          :valor="info.obstaculos_promedio"
          icono="fas fa-cubes"
        />

        <card-component
          border="border-left-danger"
          atributo="Tiempo de espera"
          dimensional="seg"
          :valor="info.espera_promedio"
          icono="far fa-stop-circle"
        />

        <card-component
          border="border-left-success"
          atributo="Tiempo de ida"
          dimensional="seg"
          :valor="info.inicio_promedio"
          icono="far fa-clock"
        />
        <card-component
          border="border-left-primary"
          atributo="Tiempo de regreso"
          dimensional="seg"
          :valor="info.fin_promedion"
          icono="far fa-clock"
        />
      </div>

      <div class="col-8">
        <card-component
          border="border-left-success"
          atributo="Distancia total recorrida"
          dimensional="cm"
          :valor="distancia"
          icono="far fa-clock"
        />
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tiempo de regreso de los ultimos 15 recorridos</h6>
          </div>
          <div class="card-body">
            <div>
              <tiempos-component></tiempos-component>
            </div>
            <hr>
            <code></code>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grafica de velocidades de los ultimos 15 recorridos</h6>
      </div>
      <div class="card-body">
        <div>
          <velocidad-component></velocidad-component>
        </div>
        <hr>
        <code></code>
      </div>
    </div>
  </div>
</template>

<script>
import CardComponent from "./CardComponent";
import GraficaDistanciaComponent from "./GraficaDistanciaComponent";

export default {
  data() {
    return {
      info: {
        velocidad_promedio: 0,
        distancia_promedio: 0,
        peso_promedio: 0,
        obstaculos_promedio: 0,
        espera_promedio: 0,
        inicio_promedio: 0,
        fin_promedion: 0
      },

      recorrido_actual: {
        velocidad: 0,
        distancia: 0,
        peso: 0,
        obstaculos: 0,
        tiempo_espera_obs: 0,
        tiempo_inicio: 0,
        tiempo_fin: 0
      },

      distancia: 0,

    };
  },

  mounted() {
    this.llenarInfo();
    this.llenarRecorridoActual();
    this.calcularDistancia();
  },

  methods: {
    llenarInfo() {
      axios
        .get("/api/promedios")
        .then(response => {
          this.info = response.data[0];
          console.log(this.info);
        })
        .catch(error => {
          if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            console.log(error.request);
          } else {
            console.log("Error", error.message);
          }
          console.log(error.config);
        });
    },

    llenarRecorridoActual() {
      axios
        .get("/api/recorrido-actual")
        .then(response => {
          this.recorrido_actual = response.data;
          console.log(this.recorrido_actual);
        })
        .catch(error => {
          if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            console.log(error.request);
          } else {
            console.log("Error", error.message);
          }
          console.log(error.config);
        });
    },

    calcularDistancia() {
      axios.get("/api/distancia-total").then(response => {
        this.distancia = response.data[0].Distancia
      });
    }
  },

  components: {
    CardComponent,
    GraficaDistanciaComponent
  }
};
</script>
