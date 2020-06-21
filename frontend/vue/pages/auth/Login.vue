<template>
  <div>
    <div class="vw-100 vh-100 d-flex justify-content-center align-items-center">
      <div class="mx-auto col-md-4 card">
        <h1 class="text-center h3">Page de connexion</h1>
        <form @submit.prevent="loginHandler">
          <div class="form-group">
            <label for="username">username</label>
            <input
              type="text"
              class="form-control"
              name="username"
              id="username"
              required
              placeholder="entrer votre nom d'utilisateur"
              v-model="username"
            />
          </div>
          <div class="form-group">
            <label for="password">mot de passe</label>
            <input
              type="password"
              class="form-control"
              name="password"
              id="password"
              placeholder="entrer votre mot de passe"
              v-model="password"
            />
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
              Se connecter
            </button>
          </div>
        </form>
        <p>
          Vous n'avez pas encore de compte
          <router-link :to="{ name: 'register' }">Inscrivez-vous</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import AuthService from "../../services/Auth";
export default {
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    async loginHandler() {
      let payload = { username: this.username, password: this.password };
      try {
        const res = await AuthService.login(payload);
        const data = res.data;
        payload.token = data.token;
        payload.refreshToken = data.refreshToken;
        this.$store.commit("auth/updateAuthInfos", payload);
        this.$router.push({ name: "login" });
      } catch (error) {
        const errData = error.response;
        this.$toasted.error(errData.message);
      }
    },
  },
};
</script>

<style scoped></style>
