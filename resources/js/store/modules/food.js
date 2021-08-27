import axios from 'axios/index';

// initial state
const state = () => ({
    food: null
});

// getters
const getters = {
    listFood: state => {
        return state.food
    }
};

// actions
const actions = {};

// mutations
const mutations = {
    getfood(state) {
        let token = localStorage.getItem('token');
        axios.get('/api/v1/auth/food', {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
            .then((res) => {
                state.food = res.data;
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
