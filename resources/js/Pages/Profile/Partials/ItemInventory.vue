<template>
    <div class="nft_picture">
        <div class="picture">
            <img :src="this.item.nft_url">
        </div>
    </div>
    <div class="title">{{ this.item.name }}</div>
    <div class="resume">{{ this.item.summary }}</div>
    <div class="bonus">Bonus : {{ this.item.bonus }}</div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: "ItemInventory",
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
