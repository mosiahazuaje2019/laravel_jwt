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
                <InputText placeholder="Ingrese Email" autocomplete="email" v-model="user.email" class="p-inputtext-filled w-100" />
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <InputText v-on:keyup.enter="login(user)" type="password" placeholder="Ingrese contraseña" v-model="user.password" />
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <Button type="submit" @click="login(user)" label="Acceder" />
                <Button type="button" @click="register()" label="Registrarse" />
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
        ...mapActions(['login']),
        register() {
            this.$router.push('/register');
        }
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
