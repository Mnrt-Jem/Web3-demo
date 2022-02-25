<template>
    <footer>
        <div class="footer">
            <div class="footer-block">
                <div class="footer-title">CONTACT</div>
                <div class="footer-list">
                    <ul>
                        <li>
                            <Link class="link" :href="route('home')">Contact on discord</Link>
                        </li>
                        <li>
                            <Link class="link" :href="route('home')">Contact on twitter</Link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-block footer-separator">
                <div class="footer-title">SOCIAL NETWORK</div>
                <div class="footer-list">
                    <ul>
                        <li>
                            <Link class="link" :href="route('home')">Discord</Link>
                        </li>
                        <li>
                            <Link class="link" :href="route('home')">Twitter</Link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-block">
                <div class="footer-title">USEFULL LINKS</div>
                <div class="footer-list">
                    <ul>
                        <li>
                            <Link class="link" :href="route('home')">About</Link>
                        </li>
                        <li>
                            <Link class="link" :href="route('home')">Games</Link>
                        </li>
                        <li>
                            <Link class="link" :href="route('home')">Get RATO</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-link">
                <jet-application-mark class="block h-9 w-auto" />
            </div>
            <div class="footer-link">
                <Link class="link" :href="route('home')">Legal Mention</Link>
            </div>
            <div class="footer-link">
                <p>© RATO GAMES</p>
            </div>
        </div>
    </footer>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'

export default {
    name: "Footer",
    components: {
        Head,
        Link,
        JetApplicationMark,
        JetNavLink,
    },
}
</script>

<style scoped>

</style>
