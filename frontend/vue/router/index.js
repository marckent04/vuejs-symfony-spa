import Vue from "vue"
import VueRouter from "vue-router"
import Home from "../pages/Home"
import Login from "../pages/auth/Login"
import Signup from "../pages/auth/Signup"

Vue.use(VueRouter)

const isAuthenticated = localStorage.getItem('token')

const router = new VueRouter({
    mode: "history",
    routes: [
        { path: "/:api(\\^\/api)" },
        { path: "/home", component: Home },
        { path: "/login", component: Login, name: "login" },
        { path: "/register", component: Signup, name: "register" },
        { path: "/", redirect: '/login' },
    ]
})

router.beforeEach((to, from, next) => {
    if (to.name !== 'login' && to.name !== 'register' && !isAuthenticated) next({ name: 'login' })
    else next()
})

export default router