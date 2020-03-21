import Vue from "vue";
import App from "./App";
import router from "./router";
import axios from 'axios'
import VueAxios from 'vue-axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueAxios, axios)

new Vue({
    components: { App },
    template: "<App/>",
    router
}).$mount("#app");