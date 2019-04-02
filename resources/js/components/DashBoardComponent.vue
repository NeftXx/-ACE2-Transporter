<template>
<div class="container" style="padding-top: 10px">
    <div class="col-lg-12 text-center">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
        </div>
    <div class="row">                
        <div class="col-4">
<card-component border="border-left-primary"
              atributo="velocidad"
              valor="10"
              icono="fas fa-bicycle" />
    <card-component border="border-left-primary"
              atributo="velocidad"
              valor="10"
              icono="fas fa-bicycle" />
    <card-component border="border-left-primary"
              atributo="velocidad"
              valor="10"
              icono="fas fa-bicycle" />
        </div>        
    </div>    
</div>
</template>

<script>
import CardComponent from './CardComponent'

export default {
    components: {
        CardComponent
    }
}
</script>
