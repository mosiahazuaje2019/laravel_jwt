<template>
    <div class="vertical-container">
        <div class="p-field p-grid">
            <div class="p-col">
                <img src="https://manzanaverde.la/images/brand/logo-manzana-verde.svg" alt="">
                <h2>Registrarse</h2>
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <InputText placeholder="Ingrese Nombre" v-model="user.name" class="p-inputtext-filled w-100"/>
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <InputText placeholder="Ingrese Apellido" v-model="user.lastname" class="p-inputtext-filled w-100"/>
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <InputText placeholder="Ingrese Email" v-model="user.email" class="p-inputtext-filled w-100"/>
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <Password placeholder="Ingrese contraseña" v-model="user.password"/>
            </div>
        </div>
        <div class="p-field p-grid">
            <div class="p-col">
                <Button type="submit" @click="register(user)" label="Registrar"/>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Register",
    data() {
        return {
            user: {
                name: null,
                lastname: null,
                email: null,
                password: null
            }
        }
    },
    methods: {
        async register() {
            try {
                const res = await axios.post('/api/register', this.user)
                await this.$router.push('/');
            } catch (e) {
                console.log(e)
            }

        }
    }
}
</script>

<style scoped>

</style>
