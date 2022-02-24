<template>
    <Head title="RATO GAMES" />

    <div class="body">
        <!-- NAV -->
        <nav class="menu">
            <div class="menu-link">
                <div class="logo">
                    <Link :href="route('home')">
                        <jet-application-mark class="block h-9 w-auto" />
                    </Link>
                </div>
                <Link class="link" :href="route('home')">About</Link>
                <Link class="link" :href="route('home')">Games</Link>
                <Link class="link" :href="route('home')">Get RATO</Link>
                <Link class="link" :href="route('home')">Join Discord</Link>
            </div>
            <div class="auth">
                <Link class="link" :href="route('login')">
                    <jet-button>
                        Register / login
                    </jet-button>
                </Link>
            </div>
        </nav>
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
                    <div class="item card">
                        <div class="nft_picture">
                            <div class="picture">
                                <div class="quantity">597 / 1000</div>
                                <img src="img/gold_climber.png">
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="item-title">TEST</div>
                            <div class="item-resume">TEST</div>
                            <div class="item-bonus">Bonus : TEST</div>
                            <div class="item-price">Price : TEST</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SHOP -->
        </div>
        <!-- FOOTER -->
        <footer>
            <div class="footer">
                <div class="footer-block">
                    <div class="footer-title">Contact</div>
                    <div class="footer-list">
                        <ul>
                            <li>
                                Contact Admin on discord
                            </li>
                            <li>
                                Contact me on twitter
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-block footer-separator">
                    <div class="footer-title">Social Networks :</div>
                    <div class="footer-list">
                        <ul>
                            <li>
                                Discord
                            </li>
                            <li>
                                Twitter
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-block">
                    <div class="footer-title">Usefull Links :</div>
                    <div class="footer-list">
                        <ul>
                            <li>
                                About
                            </li>
                            <li>
                                Games
                            </li>
                            <li>
                                Get RATO
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
        <!-- END FOOTER -->
    </div>
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
        }),
        created: function () {
        },
    })
</script>
