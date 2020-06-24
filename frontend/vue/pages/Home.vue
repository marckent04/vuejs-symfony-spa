<template>
  <div>
    <div class="row col">
      <h1>Homepage</h1>
    </div>

    <div class="row col">
      <p>Welcome {{ username }}</p>
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
    <div>
      <button class="btn btn-primary" @click="logout">Deconnexion</button>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import local from "../webservices/local-axios";
export default {
  name: "Home",
  data() {
    return {
      articles: [],
    };
  },
  computed: {
    ...mapState({
      username: (state) => state.auth.username,
    }),
  },
  mounted() {
    // local.defaults.headers.common.Authorization = `Bearer ${this.$store.state.auth.token}`;
    // local.get("articles").then((v) => {
    //   this.articles = v.data;
    // });
  },
  methods: {
    logout() {
      this.$store.commit("auth/logout");
      this.$router.push({ name: "login" });
    },
  },
};
</script>
