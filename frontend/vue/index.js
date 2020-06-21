import Vue from "vue";
import App from "./pages/App";
import router from "./router";
import axios from 'axios'
import VueAxios from 'vue-axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import Vuex from 'vuex'
import Toasted from 'vue-toasted';
import store from './store/index'


// Mpdules
Vue.use(Vuex)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueAxios, axios)
Vue.use(Toasted)


new Vue({
    el: "#app",
    components: { App },
    template: "<App/>",
    store,
    router
})
