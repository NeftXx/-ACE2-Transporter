<template>
<div class="container" style="padding-top: 10px">
    <div class="col-lg-12 text-center">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="mb-0 text-gray-800">Dashboard</h1>
            </div>
        </div>
    <div class="row">                
        <div class="col-4">
            <h3> PROMEDIOS </h3>
            <card-component border="border-left-primary"
                    atributo="Velocidad"
                    :valor="info.velocidad_promedio"
                    icono="fas fa-bicycle" />
            <card-component border="border-left-success"
                    atributo="Distancia"
                    :valor="info.distancia_promedio"
                    icono="fas fa-road" />
            <card-component border="border-left-info"
                    atributo="Peso"
                    :valor="info.peso_promedio"
                    icono="fas fa-cube" />
            <card-component border="border-left-warning"
                    atributo="Cantidad de obstaculos"
                    :valor="info.obstaculos_promedio"
                    icono="fas fa-cubes" />
            <card-component border="border-left-danger"
                    atributo="Tiempo de espera"
                    :valor="info.espera_promedio"
                    icono="far fa-stop-circle" />
            <card-component border="border-left-success"
                    atributo="Tiempo de ida"
                    :valor="info.inicio_promedio"
                    icono="far fa-clock" />
            <card-component border="border-left-primary"
                    atributo="Tiempo de regreso"
                    :valor="info.fin_promedio"
                    icono="far fa-clock" />
        </div>        
    </div>    
</div>
</template>

<script>
import CardComponent from './CardComponent'

export default {
    data () {
        return {
            info: {
                velocidad_promedio: 0,
                distancia_promedio: 0,
                peso_promedio: 0,
                obstaculos_promedio: 0,
                espera_promedio: 0,
                inicio_promedio: 0,
                fin_promedio: 0,
            }
        }
    },

    mounted () {
        axios
        .get('/api/promedios')
        .then((response) => (this.info = response.data[0]))
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
                console.log(error.response.status);
                console.log(error.response.headers);
            } else if (error.request) {
                console.log(error.request);
            } else {
                console.log('Error', error.message);
            }
            console.log(error.config);
        });
    },

    components: {
        CardComponent
    }
}
</script>
