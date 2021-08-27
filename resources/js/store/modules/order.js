import axios from 'axios/index';

// initial state
const state = () => ({
    order: null
});

// getters
const getters = {};

// actions
const actions = {};

// mutations
const mutations = {
    getorder(state, user_id) {
        let token = localStorage.getItem('token');
        axios.get(`/api/v1/auth/getorder/${user_id}`, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
            .then((res) => {
                state.order = res.data;
                console.log(res.data);
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
