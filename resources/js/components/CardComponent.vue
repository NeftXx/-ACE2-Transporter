<template>
  <div class="mb-4">
    <div class="card shadow h-100 py-2" v-bind:class="[border]">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{atributo}}</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{valor}}</div>
          </div>
          <div class="col-auto">
            <i v-bind:class="[icono]"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "mycard",
  props: ["border", "atributo", "valor", "icono"]
};
</script>
