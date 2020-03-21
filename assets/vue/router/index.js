import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../pages/Home";
import Index from "../pages/Index"
import Error404 from "../pages/Error404";
Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/home", component: Home },
        { path: "", component: Index },
    ]
});