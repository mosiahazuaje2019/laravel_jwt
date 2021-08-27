<template>
    <div class="p-fluid">
        <Dropdown
            v-model="food_id"
            :options="food"
            optionLabel="name"
            optionValue="id"
            :filter="true"
            placeholder="Selecciona un alimento"
            :showClear="true"
            append-to="body"
            class="p-dropdown"
        >
        </Dropdown>
        <div class="p-col">
            <Button label="Save" icon="pi pi-save" @click="saveFood" />
        </div>

    </div>
</template>

<script>
import {mapGetters, mapMutations} from "vuex";
import axios from "axios";
import EventBus from '../bus'
import Swal from "sweetalert2";

export default {
    name: "OrderAdd",
    data () {
      return {
          food_id: null,
          user_id: null,
      }
    },
    computed: {
        ...mapGetters({
            food:'food/listFood'
        }),
    },
    methods: {
        ...mapMutations({
            getFood: 'food/getfood'
        }),
        saveFood() {
            axios.post(`/api/v1/auth/orders`, {user_id: this.user_id, food_id: this.food_id}, {
                headers: {
                    'Authorization': `Bearer ${this.token}`
                }
            })
                .then((res) => {
                    console.log(res.data)
                    if(res.data === 'false') {
                        Swal.fire("Este alimento ya fue seleccionado intente con otro");
                    }else {
                        return EventBus.$emit('food_reload')
                    }
                });
        }
    },
    mounted() {
        this.token = localStorage.getItem('token');
        this.user_id = localStorage.getItem('user_id');
        this.getFood();
    }
}
</script>

<style scoped>

</style>
