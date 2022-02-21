<template>
    <Head title="Ladderboard Stage" />
    <table>
        <thead>
        <tr>
            <th class="rank">Rank</th>
            <th class="name">Nickname</th>
            <th class="number">Stage</th>
            <th class="time">Time</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(user, index) in ladder">
            <td class="rank">{{ (index+1) }}</td>
            <td class="name">{{ user.name }}</td>
            <td class="number">{{ user.stage }}</td>
            <td class="time">{{ user.time }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: "StageLadder",
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
        ladder: null,
    }),

    methods: {
        getLadder () {
            axios.defaults.headers.get['Accepts'] = 'application/json';
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
            axios.get('http://127.0.0.1:8000/games/ladder/stage').then((result) => {
                this.ladder = result.data;
            });
        }
    },

    created: function () {
        this.getLadder();
    }
})

</script>
