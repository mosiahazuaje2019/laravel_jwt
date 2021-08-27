import Vue from "vue";
import Vuex from "vuex";
import router from "../router";

//modules
import food from "./modules/food";
import users from "./modules/users";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: null,
        user: {
            name: ''
        }
    },
    mutations: {
        setToken(state, payload) {
            state.token = payload
        },
        setUser(state, payload) {
            state.user.name = payload.name,
            state.user.email = payload.email
        }
    },
    actions: {
        async login({ commit }, user) {
            try {
                const res = await fetch('/api/v1/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(user)
                })
                const userDB = await res.json()
                commit('setToken', userDB.access_token)
                localStorage.setItem('token', userDB.access_token)
                await router.push('dashboard');
            } catch (error) {
                console.log('Error', error)
            }
        },
        getToken({commit}) {
            if(localStorage.getItem('token')) {
                commit('setToken', localStorage.getItem('token'))
            } else {
                commit('setToken', null)
            }
        },
        async dashboard({commit}, auth_token) {
            try {
                const res = await fetch('/api/v1/auth/me', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'auth_token': auth_token
                    },
                })
                const userDB = await res.json()
                commit('setUser', { name: userDB.user.name })
            } catch (error) {
                console.log('Error', error)
            }
        }
    },
    modules: {
        food,
        users,
    }
})
