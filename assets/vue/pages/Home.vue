<template>
    <div>
        <div class="row col">
            <h1>Homepage</h1>
        </div>

        <div class="row col">
            <p>This is the homepage of our Vue.js application.</p>
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