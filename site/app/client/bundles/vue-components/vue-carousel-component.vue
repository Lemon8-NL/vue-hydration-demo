<template>
    <carousel
            :ref="reference"
            :navigation-enabled="navigationEnabled"
            :autoplay-hover-pause="autoplayHoverPause"
            :autoplay="autoplay"
            :autoplay-timeout="4000"
            :per-page="perPage"
            :perPageCustom="perPageCustom">
        <slide v-for="(item, index) in $slots.items" :key="index">
            <vnode :node="item" />
        </slide>
    </carousel>
</template>

<script>
	import { Carousel, Slide } from 'vue-carousel';

	export default {
        name: 'vue-carousel-component',
		components: {
			'carousel': Carousel,
			'slide': Slide,
            "vnode": {
                functional: true,
                render(h, context) {
                        return context.props.node
                }
            }
		},
        props: {
            'baseUrl': String,
            'perPage': Number,
            'perPageCustom': Array,
            'offsetLeft': {
                default: null,
                type: String
            },
            'reference' : String,
            'navigationEnabled' : Boolean,
            'autoplayHoverPause' : Boolean,
            'autoplay' : Boolean
        },
        methods: {
            goToPage(event) {
                this.$refs[this.reference].goToPage(event);
            }
        }
	}
</script>

<style lang="scss">
    // Bootstrap config
    @import "../../styles/bootstrap-config";

    .VueCarousel, .VueCarousel-slide { overflow: hidden; }

    .VueCarousel-slide { margin-left: auto; margin-right: auto; max-width: 1300px; display: flex; flex-direction: column; width: 100%; position:relative; }
    .VueCarousel-slide IMG.carousel-slide-image { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); -o-object-fit: cover; object-fit: cover; z-index: 1; height: 100%; width: 100%;}
    .VueCarousel-slide .title { background-color:rgba(0,0,0,0.5); position: absolute; bottom: 0; left:0; z-index: 2; height: auto; width: 100%;}

    .VueCarousel-navigation-button { width:3.5rem!important; height:100%; text-indent:-999px; overflow:hidden; }
    .VueCarousel-navigation-button:focus { outline:none!important; }
    .VueCarousel-navigation-button::before { color:$white; float:left; text-indent:0; font-family: 'Font Awesome 5 Free', sans-serif; font-weight: 400; font-size: 20px;
        opacity:1; background: rgba(0,0,0,.5); height: 3rem; width: 3rem; line-height: 3rem; border-radius: 50%;}

    .VueCarousel-navigation-prev { left: 3.5rem!important; margin-left:0!important; }
    .VueCarousel-navigation-prev::before { content: "\f053"; }

    .VueCarousel-navigation-next { right: 3.5rem!important; }
    .VueCarousel-navigation-next::before { content: "\f054";  }

    .vue-carousel-light .VueCarousel-navigation-prev::before,
    .vue-carousel-light .VueCarousel-navigation-next::before { color:$black; }

    @include media-breakpoint-up(md) {
        .VueCarousel-slide .dot { top:auto; bottom: -35px; right: -35px; padding: 0 1em; }
        .VueCarousel-slide .dot DIV { padding: 0 1em .5em 1em; height: 180px; width: 180px; font-size:2rem; }
    }

    @include media-breakpoint-up(lg) {
        .VueCarousel-slide .dot { top:auto; bottom: -45px; right: -40px; padding: 0 1em; }
        .VueCarousel-slide .dot DIV { padding: 0 1em .5em 1em; height: 240px; width: 240px; font-size:2.2rem; }
    }
</style>
