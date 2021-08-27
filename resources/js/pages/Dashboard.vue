<template>
    <div class="p-grid">
        <div class="p-col-12 p-md-4 p-lg-3">
            <Card>
                <template #header>
                </template>
                <template #title>
                    <h6><User></User></h6>
                </template>
                <template #content></template>
                <template #footer></template>
            </Card>
        </div>
        <div class="p-col-12 p-md-8 p-lg-9">
            <Order></Order>
        </div>
    </div>
</template>

<script>
import {mapState, mapActions} from 'vuex'
import Order from './Order';
import User from './User';

export default {
    name: "Dashboard",
    components: {
        Order,
        User
    },
    computed:{
        ...mapState(['token'])
    },
    methods: {
        ...mapActions(['dashboard','getToken'])
    },
    created() {
        if(this.token === null) {
            this.getToken()
        }
    }
}
</script>

<style scoped>

</style>
