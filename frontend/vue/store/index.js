
import Vue from 'vue'
import Vuex from 'vuex'
// import createPersistedState from "vuex-persistedstate"
import VuexPersistence from 'vuex-persist'
import auth from './modules/auth'


Vue.use(Vuex)

const vuexLocal = new VuexPersistence({
    storage: window.localStorage
})

export default new Vuex.Store({
    modules: {
        auth
    },
    plugins: [
        vuexLocal.plugin
        // createPersistedState({ storage: window.localStorage }),
    ]
})