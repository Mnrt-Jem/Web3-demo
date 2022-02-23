<template>
    <div v-if="this.itemAvailable > 0">
        <form @submit="buyItem">
            <div class="nft_picture">
                <div class="quantity">{{ this.itemAvailable }} / {{ this.item.quantity }}</div>
                <div class="picture">
                    <img :src="this.item.nft_url" :alt="this.item.name">
                </div>
            </div>
            <div class="title">{{ this.item.name }}</div>
            <div class="resume">{{ this.item.summary }}</div>
            <div class="bonus">Bonus : {{ this.item.bonus }}</div>
            <div class="price">Price : {{ this.item.price }}</div>
            <p class="error" v-if="errors.length">
                <b v-for="error in errors">{{ error }}</b>
            </p>
            <p class="success" v-if="sucess.length">
                <b v-for="suces in sucess">{{ suces }}</b>
            </p>
            <div class="btn-buy">
                <jet-button>
                    Buy
                </jet-button>
            </div>
        </form>
    </div>
    <div v-else>
        <div class="nft_picture">
            <div class="picture">
                <img src="img/outofstock.jpg" :alt="this.item.name">
            </div>
        </div>
        <div class="title">{{ this.item.name }}</div>
        <div class="resume">{{ this.item.summary }}</div>
        <div class="bonus">Bonus : {{ this.item.bonus }}</div>
        <div class="price">Price : {{ this.item.price }}</div>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import { useForm } from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: "Item",
    components: {
        Head,
        Link,
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
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
        buyItem: function (e) {
            this.sucess = [];
            this.errors = [];
            const itemId = this.item.id;
            if (!itemId) {
                this.errors.push('you can not buy this item.');
            }

            // Request web3

                // User set item
                // useForm({ itemId }).post('/shop-buy')
                this.sucess.push('As soon as we receive your transaction your item will be credited to your account.');
            // End request web3
            e.preventDefault()
        },
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
        this.getItemAvailable()
    }
})
</script>

<style scoped>

</style>
