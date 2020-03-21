<template>
    <div>
        <div class="row col">
            <h1>Homepage</h1>
        </div>

        <div class="row col">
            <p>This is the homepage of our Vue.js application.</p>
            <b-icon icon="arrow-up"></b-icon>
            <div class="text-center">
                <b-spinner label="Spinning"></b-spinner>
                <b-spinner type="grow" label="Spinning"></b-spinner>
                <b-spinner variant="primary" label="Spinning"></b-spinner>
                <b-spinner variant="primary" type="grow" label="Spinning"></b-spinner>
                <b-spinner variant="success" label="Spinning"></b-spinner>
                <b-spinner variant="success" type="grow" label="Spinning"></b-spinner>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home",
        data() {
          return {
              articles: []
          }
        },
        mounted() {
            this.axios.get('http://localhost:8000/api/articles').then(v => {
                console.log(v)
                // this.articles = []
            })
        }
    };
</script>