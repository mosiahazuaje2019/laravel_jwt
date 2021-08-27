<template>
    <div class="vertical-container">
        <div class="p-field p-grid">
            <div class="p-col">
                <img src="https://manzanaverde.la/images/brand/logo-manzana-verde.svg" alt="">
                <h2>Login</h2>
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <InputText placeholder="Ingrese Email" v-model="user.email" class="p-inputtext-filled w-100" />
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <Password placeholder="Ingrese contraseña" v-model="user.password" />
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <Button type="submit" @click="login(user)" label="Acceder" />
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: 'Index',
    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        ...mapActions(['login'])
    }
}
</script>

<style scoped>
.vertical-container{
    margin: 0;
    text-align: center;
    padding: 20px;
}
</style>
