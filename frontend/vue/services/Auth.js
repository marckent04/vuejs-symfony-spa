import local from '../webservices/local-axios'

class Auth {

    static async login(payload) {
        return await local.post('login_check', payload)
    }

    static async register(payload) {
        return await local.post('register', payload)
    }

    static async refreshToken(payload) {
    }
}

export default Auth