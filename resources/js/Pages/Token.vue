<template>
    <Head title="RATO GAMES" />
    <div class="body">
        <!-- NAV -->
        <HeadNav/>
        <!-- END NAV -->
        <div class="token-main">
            <!-- TOKEN -->
            <div class="token-head">
                <div class="token-title">
                    Buy rato coin on traderjoe
                </div>
            </div>
            <div class="token-info">
                IFRAME traderjoe
            </div>
            <!-- END TOKEN -->
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
    name: "Token",
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
