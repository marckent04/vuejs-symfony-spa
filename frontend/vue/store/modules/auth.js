import createPersistedState from 'vuex-persistedstate'

const state = () => ({
    username: '',
    password: '',
    email: '',
    token: '',
    refreshToken: ''
})

// getters
const getters = {}

// actions
const actions = {

}

// mutations
const mutations = {
    login(state, infos) {
        const { username, password, token, refreshToken } = infos;
        state.token = token
        state.refreshToken = refreshToken
        state.username = username
        state.password = password
    },
    logout(state) {
        state.token = ''
        state.refreshToken = ''
        state.username = ''
        state.password = ''
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}