import Vue from "vue";
import Vuex from "vuex";
import router from "../router";

//modules
import food from "./modules/food";
import users from "./modules/users";
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: null,
        user_id:null,
        user: {
            id: ''
        }
    },
    mutations: {
        setToken(state, payload) {
            state.token = payload
        },
        setUser(state, payload) {
            state.user.id = payload.id
        }
    },

    actions: {
        async login({commit}, user) {
            try {
                const res = await axios.post('/api/login', user, {
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                const userDB = res.data
                commit('setToken', userDB.access_token)
                localStorage.setItem('token', userDB.access_token)
                localStorage.setItem('user_id', userDB.id)
                await router.push('dashboard');
            } catch (error) {
                console.log('Error', error)
            }
        },
        getToken({commit}) {
            if (localStorage.getItem('token')) {
                commit('setToken', localStorage.getItem('token'))
            } else {
                commit('setToken', null)
            }
        },
        async dashboard({commit}, auth_token) {
            try {
                const res = await axios.get('/api/v1/auth/me', {
                    headers: {
                        'Content-Type': 'application/json',
                        'auth_token': auth_token
                    },
                })
                const userDB = res.data
                commit('setUser', {name: userDB.user.id})

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
