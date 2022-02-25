<template>
    <Head title="RATO GAMES" />

    <div class="body">
        <!-- NAV -->
        <HeadNav/>
        <!-- END NAV -->
        <div class="about-main">
            <!-- ABOUT -->
            <div class="about-head">
                <div class="about-title">
                    Making blockchain games you'll actually want to play.
                </div>
            </div>
            <div class="about-info">
                <!-- First -->
                <div class="about-text">
                    <div class="about-text-title">
                        Fun First.
                    </div>
                    <div class="about-text-resume">
                        We believe the blockchain should be invisible in our games. We use simple game mechanics that all players can enjoy, whether or not they consider themselves to be blockchain pros.
                    </div>
                </div>
                <div class="about-img">
                    <img src="img/about1.png">
                </div>
                <!-- End First -->
                <!-- Second -->
                <div class="about-img">
                    <img src="img/about1.png">
                </div>
                <div class="about-text">
                    <div class="about-text-title">
                        Fun First.
                    </div>
                    <div class="about-text-resume">
                        We believe the blockchain should be invisible in our games. We use simple game mechanics that all players can enjoy, whether or not they consider themselves to be blockchain pros.
                    </div>
                </div>
                <!-- End Second -->
            </div>
            <!-- END ABOUT -->
        </div>
    </div>
    <!-- FOOTER -->
    <Footer />
    <!-- END FOOTER -->
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetButton from '@/Jetstream/Button.vue';
import HeadNav from '@/Pages/HeadNav.vue'
import Footer from '@/Pages/Footer.vue'

export default defineComponent({
    name: "About",
    components: {
        Head,
        Link,
        JetApplicationMark,
        JetButton,
        HeadNav,
        Footer,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
        url: String,
    },
    data: () => ({
    }),
    methods: {
    },
    created: function () {
    },
})
</script>


<style scoped>
    @import '../../css/index.css';
</style>
