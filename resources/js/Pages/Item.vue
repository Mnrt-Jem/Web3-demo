<template>
    <form @submit="buyItem">
        <div class="nft_picture">
            <div class="quantity">{{ this.item.quantity }} / {{ this.item.quantity }}</div>
            <div class="picture">
                <img :src="this.item.nft_url" :alt="this.item.name">
            </div>
        </div>
        <div class="title">{{ this.item.name }}</div>
        <div class="resume">{{ this.item.summary }}</div>
        <div class="bonus">Bonus : {{ this.item.bonus }}</div>
        <div class="price">Price : {{ this.item.price }}</div>
        <div class="btn-buy">
            <jet-button>
                Buy
            </jet-button>
        </div>
    </form>
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
    }),

    methods: {
        buyItem: function (e) {
            const itemId = this.item.id;
            // Request web3

                // User set item
                useForm({ itemId }).post('/shop-buy')
            // End request web3
        },
    },

    created: function () {
    }
})
</script>

<style scoped>

</style>
