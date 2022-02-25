<template>
    <div class="nft_picture">
        <div class="picture">
            <div class="quantity">{{ this.itemAvailable }} / {{ this.item.quantity }}</div>
            <img :src="this.item.nft_url" :alt="this.item.name">
        </div>
    </div>
    <div class="item-info">
        <div class="item-title">{{ this.item.name }}</div>
        <div class="item-resume">{{ this.item.summary }}</div>
        <div class="item-bonus">Bonus : {{ this.item.bonus }}</div>
        <div class="item-price">Price : {{ this.item.price }}</div>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue'

export default defineComponent({
    name: "LastestItem",
    components: {
        Head,
        Link,
        JetButton,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
        item: Object,
    },

    data: () => ({
        errors: [],
        sucess: [],
        itemAvailable: null,
    }),

    methods: {
        getItemAvailable () {
            axios.defaults.headers.get['Accepts'] = 'application/json';
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
            axios.get('http://127.0.0.1:8000/shop/available/'+this.item.id).then((result) => {
                this.itemAvailable = result.data.available;
            });
        }
    },

    created: function () {
        this.getItemAvailable();
    }
})
</script>

<style scoped>

</style>
