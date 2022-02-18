<template>
    <Head title="Web3test" />
    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Avax :
            <span v-if="error">Error: {{ error.message }}</span>
            <span v-else-if="isLoading && isDelayElapsed">Loading...</span>
            <span v-else-if="!isLoading">
                {{ balance }}
            </span>
        </div>
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Coins :
            <span v-if="error">Error: {{ error.message }}</span>
            <span v-else-if="isLoading && isDelayElapsed">Loading...</span>
            <span v-else-if="!isLoading">
                {{ coins }}
            </span>
        </div>
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Pending Reward : 100$
        </div>
        <div class="mt-2">
            <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Claim your rewards
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Web3 from 'web3/dist/web3.min.js';
import tokenABI from './erc20abi.json';

export default defineComponent({
    name: "Web3test",
    components: {
        Head,
        Link,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },

    data: () => ({
        isLoading: false,
        error: null,
        data: null,
        balance: null,
        coins: null,
        isDelayElapsed: false,
    }),

    methods: {
        // GET AVAX BALANCE
        async getBalance() {
            this.error = null
            this.isLoading = true
            this.isDelayElapsed = false
            const web3 = new Web3(window.ethereum);
            var accounts = await web3.eth.getAccounts();
            web3.eth.getBalance(accounts[0])
                .then((result) => {
                    this.balance = web3.utils.fromWei(result);
                })
                .catch((error) => {
                    this.error = error
                })
                .finally(() => {
                    this.isLoading = false
                })
            setTimeout(() => {
                this.isDelayElapsed = true
            }, 200)
        },

        // GET COIN BALANCE
        async getBalanceOfCoins() {
            this.error = null
            this.isLoading = true
            this.isDelayElapsed = false
            const web3 = new Web3(window.ethereum);
            var accounts = await web3.eth.getAccounts();
            const tokenAddresses = [{
                adresse : '0x959b88966fc5b261df8359961357d34f4ee27b4a',
                jeton : 'UNIV'
            }, {
                adresse : '0xc062368600228C308C75Ef2C02E22948297Acb89',
                jeton : 'VEGETA'
            }]
            console.log(tokenABI);
            const tokenInst = new web3.eth.Contract(tokenABI, '0x959b88966fc5b261df8359961357d34f4ee27b4a');
            console.log(tokenInst);
            const balance = await tokenInst.methods.balanceOf(accounts[0]).call();
            console.log(balance);
            this.coins = web3.utils.fromWei(balance);
        },
    },

    created: function () {
        this.getBalance();
        this.getBalanceOfCoins();
    }
})

</script>

<style scoped>

</style>
