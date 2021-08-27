import VueRouter from "vue-router";
import store from "../store/index";

//Components
const Index     = () => import('../Index');
const Dashboard = () => import('../pages/Dashboard');
const Food      = () => import('../pages/Food');
const User      = () => import('../pages/User');
const Order     = () => import('../pages/Order');

//Routes
const routes = [
    {
        path: '/',
        component:Index,
        name: 'Index'
    },
    {
        path: '/dashboard',
        component:Dashboard,
        meta: { requireAuth: true }
    },
    {
        path: '/food',
        component: Food,
        meta: { requireAuth: true }
    },
    {
        path: '/user',
        component: User,
        meta: { requireAuth: true }
    },
    {
        path: '/order',
        component: Order,
    }
];

const router = new VueRouter({
    history: false,
    routes,
});

// Verificando si hay token en el estado
router.beforeEach((to, from, next)=>{
    let token = localStorage.getItem('token');

    const protectedRoute = to.matched.some(record => record.meta.requireAuth)

    //if (protectedRoute && store.state.token === null) {
    if (protectedRoute && token === null) {
        next({name: 'Index'})
    } else {
        next()
    }
})

export default router
