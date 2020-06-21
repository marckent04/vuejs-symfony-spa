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
    updateAuthInfos(state, infos) {
        const { username, password, token, refreshToken } = infos;
        state.token = token
        state.refreshToken = refreshToken
        state.username = username
        state.password = password
    }

}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}