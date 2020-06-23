<template>
  <div>
    <div class="vw-100 vh-100 d-flex justify-content-center align-items-center">
      <div class="mx-auto col-md-4 card">
        <h1 class="text-center h3">Page d'inscription</h1>
        <form @submit.prevent="registerHandler">
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
            <label for="password">Choisissez un mot de passe</label>
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
            <label for="password2">confimer le mot de passe</label>
            <input
              type="password"
              class="form-control"
              name="password"
              id="password2"
              placeholder="confirmer votre mot de passe"
              v-model="p2"
            />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
              S'inscrire
            </button>
          </div>
        </form>
        <p>
          Vous avez deja un compte
          <router-link :to="{ name: 'login' }">Connectez-vous</router-link>
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
      p2: "",
    };
  },
  methods: {
    async registerHandler() {
      if (this.password === this.p2) {
        const payload = { username: this.username, password: this.password };
        let response;
        try {
          response = await AuthService.register(payload);
          this.$toasted.success("Inscription reussie");
          console.log(response);
        } catch (error) {
          this.$toasted.error("une errreur a survenu");
          console.log(error);
          console.log(response);
        }
      } else {
        this.$toasted.error("Les mots de passe ne concordent pas");
      }
    },
  },
};
</script>

<style scoped></style>
