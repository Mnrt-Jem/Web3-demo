<template>
    <app-layout title="Shop">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                NFT - Shop
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="items-shop">
                        <div v-for="item in items" class="item">
                            <Item v-bind:item="item"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Item from '@/Pages/Item.vue'

export default defineComponent({
    components: {
        AppLayout,
        Item,
    },
    data: () => ({
        items: null,
    }),
    methods: {
        getItems () {
            axios.defaults.headers.get['Accepts'] = 'application/json';
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
            axios.get('http://127.0.0.1:8000/shop/items').then((result) => {
                this.items = result.data;
            });
        },
    },

    created: function () {
        this.getItems();
    }
})
</script>
<style>
    @import '../../css/shop.css';
</style>
