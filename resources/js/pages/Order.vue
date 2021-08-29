<template>
    <div>
        <DataTable v-if="order" :value="order" dataKey="id" :paginator="true" :rows="10" :filters="filters" class="p-datatable-sm table table-striped">
            <template #header>
                <h3>Lista de alimentos</h3>
                <Button label="Nuevo" icon="pi pi-plus" @click="openForm"></Button>
            </template>
            <Column field="food.name" header="Nombre" :sortable="true"></Column>
            <Column header="Image">
                <template #body="slotProps">
                    <img :src="slotProps.data.food.uri" class="product-image" width="70" height="70" />
                </template>
            </Column>
            <Column field="food.description" header="Descripcion"></Column>
            <Column>
                <template #body="slotProps">
                    <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="deleteOrder(slotProps.data.id)"  />
                </template>
            </Column>
        </DataTable>
        <Dialog :visible.sync="displayForm":style="{width: '50vw'}">
            <template #header><h3>Nuevo</h3></template>
                <OrderAdd></OrderAdd>
        </Dialog>
    </div>
</template>

<script>
import axios from "axios";
import OrderAdd from "../components/OrderAdd";
import EventBus from "../bus";
import Swal from "sweetalert2";

export default {
    name: "Order",
    components: {
      OrderAdd
    },
    data () {
        return {
            order: null,
            filters: {},
            display: false,
            editId: null,
            user: null,
            token: null,
            user_id: null,
            displayForm: false,
        }
    },
    mounted() {
        this.token = localStorage.getItem('token');
        this.user_id = localStorage.getItem('user_id');

        this.getList();

        EventBus.$root.$on('food_reload', () => {
            this.getList()
            this.displayForm = false

            this.$toast.add({
                severity:'success', summary: 'SUCCESS!',
                detail: `Operación realizada con éxito!`, life:3000,
            })
        })
    },
    methods: {
        async getList() {
            await axios.get(`/api/v1/auth/getorder/${this.user_id}`, {
                headers: {
                    'Authorization': `Bearer ${this.token}`
                }
            })
                .then((res) => {
                    this.order = res.data;
                });
        },
        deleteOrder(id) {
            Swal.fire({
              title: 'Seguro que va a borrar ?',
              showDenyButton: true,
              confirmButtonText: `Borrar`,
              denyButtonText: `No borrar`,
            }) .then((result) => {
                if(result.isConfirmed) {
                    axios.delete(`/api/v1/auth/orders/${id}`, {
                        headers: {
                            'Authorozation': `Bearer ${this.token}`
                        }
                    }).then((res) => {
                        EventBus.$emit('food_reload')
                    }).catch(() => {
                        Swal.fire('No hay info')
                    })
                }else if(result.isDenied) {
                    Swal.fire('La acción fue cancelada', '', 'info')
                }
            })
        },
        openForm() {
            this.displayForm = true
        }
    }
}
</script>

<style scoped>

</style>
