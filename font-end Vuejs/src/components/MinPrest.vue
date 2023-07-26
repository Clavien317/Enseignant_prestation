<template>
    <div>
Minumum de prestation : {{ minPrest }}
    </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      minPrest:null
    };
  },
  mounted() {
    this.getMinPrestation();
  },
  methods: {
    getMinPrestation() {
      axios.get('http://localhost:8000/api/minprestation')
        .then(response => {
          // console.log(response.data);
          this.minPrest = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>

<style lang="scss" scoped>

</style>