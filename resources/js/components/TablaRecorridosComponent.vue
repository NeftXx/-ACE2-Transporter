<template>
  <div class="overflow-auto">    
    <div class="d-flex justify-content-center">
        <h3 class="mt-3">Pagina No. {{ currentPage }}</h3>
    </div>
    <div class="mt-3">
      <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="my-table"
         align="fill"
      ></b-pagination>
    </div>
    <hr/>
    <b-table
      id="my-table"
      :items="items"
      :per-page="perPage"
      :current-page="currentPage"
      striped
      hover
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      perPage: 20,
      currentPage: 1,
      items: []
    };
  },

  mounted() {
    axios
      .get("/api/bitacora")
      .then(response => {
        this.items = response.data;
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

  computed: {
    rows() {
      return this.items.length;
    }
  }
};
</script>