import axios from 'axios/index';

// initial state
const state = () => ({
    users: null,
    user_id: null,
});

// getters
const getters = {};

// actions
const actions = {};

// mutations
const mutations = {
    getUser(state) {
        let token = localStorage.getItem('token');
        axios.get('/api/v1/auth/me', {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
            .then((res) => {
                state.users = res.data;
                localStorage.setItem('user_id', res.data.id)
            });
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
