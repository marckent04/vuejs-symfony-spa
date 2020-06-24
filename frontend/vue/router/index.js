import Vue from "vue"
import VueRouter from "vue-router"
import Home from "../pages/Home"
import Login from "../pages/auth/Login"
import Register from "../pages/auth/Register"
import store from '../store/index'

Vue.use(VueRouter)


const router = new VueRouter({
    mode: "history",
    routes: [
        { path: "/:api(\\^\/api)" },
        { path: "/home", component: Home, name: "home" },
        { path: "/login", component: Login, name: "login" },
        { path: "/register", component: Register, name: "register" },
    ]
})

router.beforeEach((to, from, next) => {
    if (store.state.auth.token && (to.name === "login" || to.name === "register"))
        next({ name: "home" })
    else if (!store.state.auth.token && (to.name !== "login" && to.name !== "register"))
        next({ name: "login" })
    else
        next()
})

export default router


/**
 * auth one
 */
    // router.beforeEach((to, from, next) => {
    //     if ((to.name != 'login' && to.name != 'register') && !isAuthenticated) next({ name: 'login' })
    //     else next()
    // })
/**
 * auth two
 */
    // router.beforeEach((to, from, next) => {
    //     if (isAuthenticated && (to.name == 'login' || to.name == 'register')) next({ name: 'home' })
    //     else next()
    // })
