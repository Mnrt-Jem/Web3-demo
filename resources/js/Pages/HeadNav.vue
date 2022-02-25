<template>
    <nav class="menu">
        <div class="menu-link">
            <div class="logo">
                <Link :href="route('home')">
                    <jet-application-mark class="block h-9 w-auto" />
                </Link>
            </div>
            <Link class="link" :href="route('about')" :active="route().current('about')">About</Link>
            <Link class="link" :href="route('games')" :active="route().current('games')">Games</Link>
            <Link class="link" :href="route('token')" :active="route().current('token')">Get RATO</Link>
            <Link class="link" :href="route('home')">
                <img class="discord-min" src="img/discord-min.png" alt="discord-logo-min">
                Join Discord
            </Link>
        </div>
        <div class="auth">
            <Link class="link" :href="route('login')">
                <jet-button>
                    Register / login
                </jet-button>
            </Link>
        </div>
    </nav>
</template>

<script>
import { defineComponent } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetButton from '@/Jetstream/Button.vue';

export default {
    name: "HeadNav",
    components: {
        Head,
        Link,
        JetApplicationMark,
        JetButton,
        JetNavLink,
    },

}
</script>

<style scoped>

</style>
