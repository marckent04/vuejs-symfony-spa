import Vue from "vue";
import App from "./App";
import router from "./router";
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

new Vue({
    components: { App },
    template: "<App/>",
    router
}).$mount("#app");