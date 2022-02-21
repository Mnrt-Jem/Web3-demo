<template>
    <app-layout title="Ladder">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ladderboard TOP #100
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="leaderboard">
                        <header>
                            <nav>
                                <jet-nav-link :href="route('StageLadder')" :active="route().current('StageLadder')">
                                    STAGE
                                </jet-nav-link>
                                <jet-nav-link :href="route('CoinsLadder')" :active="route().current('CoinsLadder')">
                                    COINS
                                </jet-nav-link>
                                <jet-nav-link :href="route('KillLadder')" :active="route().current('KillLadder')">
                                    KILL
                                </jet-nav-link>
                            </nav>
                        </header>
                        <div v-if="route().current('StageLadder')">
                            <StageLadder />
                        </div>
                        <div v-else-if="route().current('CoinsLadder')">
                            <CoinsLadder />
                        </div>
                        <div v-else-if="route().current('KillLadder')">
                            <KillLadder />
                        </div>
                        <div v-else>
                            <StageLadder />
                        </div>
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
import StageLadder from '@/Pages/StageLadder.vue'
import CoinsLadder from '@/Pages/CoinsLadder.vue'
import KillLadder from '@/Pages/KillLadder.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        StageLadder,
        CoinsLadder,
        KillLadder,
        JetNavLink,
    },
})
</script>
<style>
    @import '../../css/ladder.css';
</style>
