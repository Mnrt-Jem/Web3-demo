<template>
    <div class="nft_picture">
        <div class="quantity">{{ this.item.quantity }} / {{ this.item.quantity }}</div>
        <div class="picture">
            <img :src="this.item.nft_url">
        </div>
    </div>
    <div class="title">{{ this.item.name }}</div>
    <div class="resume">{{ this.item.summary }}</div>
    <div class="bonus">Bonus : {{ this.item.bonus }}</div>
    <div class="price">Price : {{ this.item.price }}</div>
    <div class="btn-buy">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Buy
        </button>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: "Item",
    components: {
        Head,
        Link,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
        item: Object,
    },

    data: () => ({
    }),

    methods: {
    },

    created: function () {
    }
})
</script>

<style scoped>

</style>
