<template>
    <Head title="RATO GAMES" />

    <div class="body">
        <!-- NAV -->
        <HeadNav/>
        <!-- END NAV -->
        <div class="main">
            <!-- CAROUSEL -->
            <Carousel :settings='settings' :autoplay="5000" :wrap-around="true">
                <Slide v-for='slide in slides' :key='slide'>
                    <div class='carousel__item'>
                        <img :src="slide">
                    </div>
                </Slide>
                <template #addons>
                    <Pagination />
                    <Navigation />
                </template>
            </Carousel>
            <!-- END CAROUSEL -->

            <!-- COMMUNITY -->
            <div class="community">
                <div class="com-block">
                    <div class="com-title">
                        <p>See Chart</p>
                    </div>
                    <div class="com-info card">
                        <div class="com-img">
                            <img src="img/laptop.png">
                        </div>
                        <div class="com-resume">
                            <div class="com-resume-title">
                                <p>Receive rewards like GALA, limited edition NFTs and help the Gala Games ecosystem grow.</p>
                            </div>
                            <div class="com-resume-btn">
                                <jet-button>
                                    LEARN MORE
                                </jet-button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="com-block">
                    <div class="com-title">
                        <p>Join Our Community</p>
                    </div>
                    <div class="com-info card">
                        <div class="com-img">
                            <img src="img/discord.png">
                        </div>
                        <div class="com-resume">
                            <div class="com-resume-title">
                                <p>Join our vibrant community of gamers and NFT enthusiasts to learn all the latest tips and tricks.</p>
                            </div>
                            <div class="com-resume-btn">
                                <jet-button>
                                    LEARN MORE
                                </jet-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END COMMUNITY -->

            <!-- GAMES -->
            <div class="games">
                <div class="games-title">
                    <p>Games</p>
                </div>
                <div class="games-area">
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                    <div class="game">
                        <img class="card" src="img/game1.png">
                    </div>
                </div>
            </div>
            <!-- END GAMES -->

            <!-- SHOP -->
            <div class="shop">
                <div class="shop-title">
                    <p>Recent Items</p>
                </div>
                <div class="items-area">
                    <div v-for="item in items" class="item card">
                        <LastestItem v-bind:item="item" />
                    </div>
                </div>
            </div>
            <!-- END SHOP -->
        </div>
    </div>
    <!-- FOOTER -->
    <Footer />
    <!-- END FOOTER -->
</template>

<style scoped>
    @import '../../css/index.css';
</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetButton from '@/Jetstream/Button.vue';
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
    import 'vue3-carousel/dist/carousel.css';
    import HeadNav from '@/Pages/HeadNav.vue'
    import LastestItem from '@/Pages/LastestItem.vue'
    import Footer from '@/Pages/Footer.vue'

    export default defineComponent({
        components: {
            Head,
            Link,
            JetApplicationMark,
            JetNavLink,
            JetButton,
            Carousel,
            Slide,
            Pagination,
            Navigation,
            HeadNav,
            LastestItem,
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
            // carousel settings
            settings: {
                itemsToShow: 1,
                snapAlign: 'center',
            },
            // carousel img
            slides: ['img/slider_exemple_1.jpg', 'img/slider_exemple_2.jpg', 'img/slider_exemple_3.jpg'],
            // breakpoints are mobile first
            // any settings not specified will fallback to the carousel settings
            items: null,
        }),
        methods: {
            getItems () {
                axios.defaults.headers.get['Accepts'] = 'application/json';
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
                axios.get('http://127.0.0.1:8000/shop/lastest_items').then((result) => {
                    this.items = result.data;
                });
            },
        },
        created: function () {
            this.getItems();
        },
    })
</script>
