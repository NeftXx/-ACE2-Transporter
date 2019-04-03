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
            info: null
        }
    },

    mounted () {
        axios
        .get('http://127.0.0.1:8000/api/promedios')
        .then(response => (this.info = response.data[0]))
    },

    components: {
        CardComponent
    }
}
</script>
