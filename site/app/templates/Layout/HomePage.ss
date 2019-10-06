<div class="bg-info mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-5 my-3 text-center">
                <h1 class="text-white mb-4">$Title</h1>
                <p class="lead col-md-7 mx-auto">$Intro</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <vue-carousel-component class="banner-carousel" reference="homepagebanners" :pagination-enabled="false" :navigation-enabled="true" :autoplay-hover-pause="false" :autoplay="true" :per-page="1">
        <% loop $Banners %>
            <template slot="items">
                <div class="text-center px-5 px-lg-4">
                    <img data-srcset="$Image.Fill(800,431).URL 800w,
                                        $Image.Fill(1300,700).URL 1300w"
                         sizes="100vw" alt="$Title"
                         class="img-fluid carousel-slide-image lazyload" />
                </div>
            </template>
        <% end_loop %>
    </vue-carousel-component>
</div>

<div class="light-grey my-5 py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 mx-auto my-5 text-center">

                <%--
                Here we place the content in portals so we can send them to both the mobile & desktop views.
                Portal allow us to define the content only once and use it in multiple places in components or the main dom
                --%>
                <portal to="portal-content">$Content</portal>

                <%-- isMobile calls our Vue mixin from BasePage to see if we are on mobile or dekstop --%>
                <div v-if="!isMobile()">
                    <%-- The desktop version of the component (it has the included content in one column, and both the questions & customer content in a second column) --%>
                    <desktop-component></desktop-component>
                </div>
                <div v-else>
                    <%-- The mobile version of the component (it has the included, questions & customer content three separate foldouts) --%>
                    <mobile-component></mobile-component>
                </div>

            </div>
        </div>
    </div>
</div>

<page-homepage-component></page-homepage-component>