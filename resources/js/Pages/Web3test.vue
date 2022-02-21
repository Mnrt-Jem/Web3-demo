<template>
    <Head title="Web3test" />
    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Avax :
            <span v-if="error1">Error: {{ error1.message }}</span>
            <span v-else-if="isLoading1 && isDelayElapsed1">Loading...</span>
            <span v-else-if="!isLoading1">
                {{ balance }}
            </span>
        </div>
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Coins :
            <span v-if="error2">Error: {{ error2.message }}</span>
            <span v-else-if="isLoading2 && isDelayElapsed2">Loading...</span>
            <span v-else-if="!isLoading2">
                {{ coins }}
            </span>
        </div>
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Pending reward : {{ reward }} $
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
        isLoading1: false,
        isLoading2: false,
        isLoading3: false,
        error1: null,
        error2: null,
        error3: null,
        isDelayElapsed1: false,
        isDelayElapsed2: false,
        isDelayElapsed3: false,
        data: null,
        balance: null,
        coins: null,
        reward: null,

    }),

    methods: {
        // GET AVAX BALANCE
        async getBalance() {
            this.error1 = null
            this.isLoading1 = true
            this.isDelayElapsed1 = false
            const web3 = new Web3(window.ethereum);
            var accounts = await web3.eth.getAccounts();
            web3.eth.getBalance(accounts[0])
                .then((result) => {
                    this.balance = web3.utils.fromWei(result);
                })
                .catch((error) => {
                    this.error1 = error
                })
                .finally(() => {
                    this.isLoading1 = false
                })
            setTimeout(() => {
                this.isDelayElapsed1 = true
            }, 200)
        },

        // GET COIN BALANCE
        async getBalanceOfCoins() {
            this.error2 = null
            this.isLoading2 = true
            this.isDelayElapsed2 = false
            const web3 = new Web3(window.ethereum);
            var accounts = await web3.eth.getAccounts();
            const tokenAddresses = [{
                adresse : '0x959b88966fc5b261df8359961357d34f4ee27b4a',
                jeton : 'UNIV'
            }, {
                adresse : '0xc062368600228C308C75Ef2C02E22948297Acb89',
                jeton : 'VEGETA'
            }]
            const tokenInst = new web3.eth.Contract(tokenABI, '0x959b88966fc5b261df8359961357d34f4ee27b4a');
            const balance = await tokenInst.methods.balanceOf(accounts[0]).call();
            if (balance !== null) {
                this.isLoading2 = false;
                this.coins = web3.utils.fromWei(balance);
            }
        },
        getReward () {
            this.error3 = null;
            this.isLoading3 = true;
            this.isDelayElapsed3 = false;
            axios.defaults.headers.get['Accepts'] = 'application/json';
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
            axios.get('http://127.0.0.1:8000/user/reward').then((result) => {
                this.reward = result.data.reward_number;
            })
            .catch((error) => {
                this.error3 = error;
            })
            .finally(() => {
                this.isLoading3 = false;
            })
            setTimeout(() => {
                this.isDelayElapsed3 = true;
            }, 200);
        }
    },

    created: function () {
        this.getReward();
        this.getBalance();
        this.getBalanceOfCoins();
    }
})

</script>

<style scoped>

</style>
