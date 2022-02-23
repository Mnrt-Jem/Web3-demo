<template>
    <Head title="Web3test" />
    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Balance Avax :
            <span v-if="error1">Error: {{ error1.message }}</span>
            <span v-else-if="isLoading1 && isDelayElapsed1">Loading...</span>
            <span v-else-if="!isLoading1">
                {{ balance }}
            </span>
        </div>
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Balance Coins :
            <span v-if="error2">Error: {{ error2.message }}</span>
            <span v-else-if="isLoading2 && isDelayElapsed2">Loading...</span>
            <span v-else-if="!isLoading2">
                {{ coins }}
            </span>
        </div>
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Pending reward : {{ reward }} $
        </div>
        <div v-if="waiting_rewards < 24" class="mt-2">
            <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                Wait {{ (24 - waiting_rewards) }} hours for claiming your rewards
            </div>
            <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <jet-button disabled>
                    Claim your rewards
                </jet-button>
            </div>
        </div>
        <div v-else class="mt-2">
            <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                You can claim your rewards
            </div>
            <form @submit="claimReward">
                <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <jet-button>
                        Claim your rewards
                    </jet-button>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-center">
            <p class="error" v-if="errorRewards.length">
                <b v-for="error in errorRewards">{{ error }}</b>
            </p>
            <p class="success" v-if="sucessRewards.length">
                <b v-for="sucess in sucessRewards">{{ sucess }}</b>
            </p>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Web3 from 'web3/dist/web3.min.js';
import tokenABI from './erc20abi.json';
import JetButton from '@/Jetstream/Button.vue';
import { useForm } from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: "Web3test",
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
    },

    data: () => ({
        isLoading1: false,
        isLoading2: false,
        isLoading3: false,
        error1: null,
        error2: null,
        error3: null,
        errorRewards: [],
        sucessRewards: [],
        isDelayElapsed1: false,
        isDelayElapsed2: false,
        isDelayElapsed3: false,
        data: null,
        balance: null,
        coins: null,
        reward: null,
        waiting_rewards: null,

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
                this.waiting_rewards = result.data.created_at;
                var dt1 = new Date(result.data.created_at);
                var dt2 = new Date(result.data.date_now);
                this.waiting_rewards = this.diff_hours(dt1, dt2);
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
        },
        diff_hours(dt2, dt1) {
            var diff =(dt2.getTime() - dt1.getTime()) / 1000;
            diff /= (60 * 60);
            return Math.abs(Math.round(diff));
        },
        claimReward: function (e) {
            this.sucessRewards = [];
            this.errorRewards = [];
            // Request web3

            // User delete rewards
                useForm().post('/user-rewards');
                this.sucessRewards.push('Your rewards as been send.');
            // End request web3
            // e.preventDefault()
        },
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
