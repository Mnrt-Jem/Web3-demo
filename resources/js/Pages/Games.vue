<template>
    <Head title="RATO GAMES" />

    <div class="body">
        <!-- NAV -->
        <HeadNav/>
        <!-- END NAV -->
        <div class="games-main">
            <div class="game-div card">
                <div class="game-img">
                    <img src="img/game1.png">
                </div>
                <div class="game-info">
                   <div class="game-title">
                        Climber coins
                   </div>
                    <div class="game-resume">
                        Survival MMORPG
                    </div>
                    <div class="game-play">
                        <jet-button>
                            Play now
                        </jet-button>
                    </div>
                </div>
            </div>
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
    name: "Games",
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
