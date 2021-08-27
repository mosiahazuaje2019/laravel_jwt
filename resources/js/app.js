import Vue from 'vue'
import VueRouter from "vue-router";
import store from "./store";
import router from "./router";


//PrimeVue
import PrimeVue from 'primevue/config'
import Textarea from 'primevue/textarea'
import InputText from 'primevue/inputtext'
import InputNumber from 'primevue/inputnumber'
import Password from 'primevue/password';
import Button from 'primevue/button'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Dropdown from 'primevue/dropdown'
import Dialog from 'primevue/dialog'
import Card from 'primevue/card'
import ToastService from 'primevue/toastservice';
import Toast from 'primevue/toast'

// load PrimeVue
Vue.use(PrimeVue, {
    locale: {
        choose: 'Seleccionar',
        upload: 'Crear',
        cancel: 'Cancelar',
    },
})

// import styles
import 'primevue/resources/themes/saga-blue/theme.css' //theme
import 'primevue/resources/primevue.min.css' //core css
import 'primeicons/primeicons.css' //icons
import 'primeflex/primeflex.css'; //flex

//import SweetAlert
import VueSweetalert2 from 'vue-sweetalert2';

//components PrimeVue
Vue.component('Textarea', Textarea)
Vue.component('InputText', InputText)
Vue.component('InputNumber', InputNumber)
Vue.component('Button', Button)
Vue.component('DataTable', DataTable)
Vue.component('Column', Column)
Vue.component('Dropdown', Dropdown)
Vue.component('InputNumber', InputNumber)
Vue.component('Dialog', Dialog)
Vue.component('Card', Card)
Vue.component('Toast', Toast)
Vue.component('Password', Password)

//load
window.Vue = Vue

Vue.use(VueRouter)
Vue.use(ToastService)

Vue.use(VueSweetalert2);

const app = new Vue({
    el: '#app',
    store,
    router
})
