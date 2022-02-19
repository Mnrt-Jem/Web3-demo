<template>
    <app-layout title="Ladder">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ladderboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="leaderboard">
                        <header>
                            <nav>
                                <a href="" class="active">Stage</a>
                                <a href="">Coins</a>
                                <a href="">Kill</a>
                            </nav>
                        </header>
                        <table>
                            <thead>
                            <tr>
                                <th class="rank">Rank</th>
                                <th class="name">Nickname</th>
                                <th class="number">Ammount</th>
                                <th class="time">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="rank">1</td>
                                <td class="name">Tuubz</td>
                                <td class="number">100</td>
                                <td class="time">25:10</td>
                            </tr>
                            <tr>
                                <td class="rank">2</td>
                                <td class="name">MortaL</td>
                                <td class="number">78</td>
                                <td class="time">15:30</td>
                            </tr>
                            <tr>
                                <td class="rank">3</td>
                                <td class="name">alixkill</td>
                                <td class="number">57</td>
                                <td class="time">54:03</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
    },
})
</script>
<style>
    @import '../../css/ladder.css';
</style>
