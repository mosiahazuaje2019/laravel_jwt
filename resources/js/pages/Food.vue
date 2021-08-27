<template>
    <div class="p-grid">
        <div class="p-col">
            <DataTable v-if="food" :value="food.food" dataKey="id" :paginator="true" :rows="10" :filters="filters" class="p-datatable-sm table table-striped">
                <template #header>
                    <h3>Lista de alimentos</h3>
                </template>
                <Column field="name" header="Nombre" :sortable="true">
                    <template #filter>
                        <InputText type="text" v-model="filters['name']" class="p-column-filter"
                                   placeholder="Buscar por nombre"/>
                    </template>
                </Column>
                <Column header="Image">
                    <template #body="slotProps">
                        <img :src="slotProps.data.uri" class="product-image" width="70" height="70" />
                    </template>
                </Column>
                <Column field="description" header="Descripción"></Column>
                <Column>
                    <template #body="slotProps">
                        <Button icon="pi pi-pencil" class="p-button-rounded p-button-success p-mr-2"  />
                        <Button icon="pi pi-check" class="p-button-rounded p-button-warning" @click="selectFood(slotProps.data.id)"  />
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>

<script>

export default {
    name: "Food",
    data () {
        return {
            food: null,
            filters: {},
            display: false,
            editId: null
        }
    },
    mounted() {
        this.$store.commit('food/getfood');
        this.food = this.$store.state.food;
    },
    methods: {
        selectFood(id) {
            alert(id);
        }
    }
}
</script>

<style scoped>

</style>
