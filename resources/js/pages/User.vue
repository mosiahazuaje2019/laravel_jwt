<template>
    <div>
        <p>Hi! {{user && user.users ? user.users.name : null}}</p>
        <p>{{user && user.users ? user.users.email : null}}</p>
        <p>{{user && user.users ? user.users.id : null}}</p>
    </div>
</template>

<script>
export default {
    name: "User",
    data () {
        return {
            user: null,
        }
    },
    mounted() {
        this.$store.commit('users/getUser');
        this.user = this.$store.state.users;
    }
}
</script>

<style scoped>

</style>
