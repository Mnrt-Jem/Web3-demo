<template>
    <jet-action-section>
        <template #title>
            Inventory
        </template>

        <template #description>
            Your NFT inventory
        </template>

        <template #content>
            <div class="items-profile">
                <div v-for="item in items" class="item">
                    <item-inventory v-bind:item="item"/>
                </div>
            </div>
            <div class="max-w-xl text-sm text-gray-600">
                its your NFT inventory, you can't delete your NFT, in the future you can trade your NFT on marketplace.
            </div>
        </template>

    </jet-action-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetActionSection from '@/Jetstream/ActionSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import ItemInventory from '@/Pages/Profile/Partials/ItemInventory.vue'

export default defineComponent({
    components: {
        JetActionSection,
        JetInput,
        JetInputError,
        JetSecondaryButton,
        ItemInventory,
    },

    data: () => ({
        items: null,
    }),

    methods: {
        getUserInventory () {
            axios.defaults.headers.get['Accepts'] = 'application/json';
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
            axios.get('http://127.0.0.1:8000/user/items').then((result) => {
                this.items = result.data;
            });
        }
    },

    created: function () {
        this.getUserInventory();
    }
})
</script>
<style>
    @import '../../../../css/profile-inventory.css';
</style>
