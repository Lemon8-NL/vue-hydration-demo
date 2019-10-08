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


<div class="light-grey my-5 py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 mx-auto my-5 text-center">
                <% if $Block1Title %>
                <h3>$Block1Title</h3>
                <hr />
                <% end_if %>
                $Block1Content
            </div>
        </div>
    </div>
</div>


<div class="container-fluid my-3">
    <div class="row">

        <div class="text-center col-8 mx-auto">
            <h2>$Block2Title</h2>
            <p>$Block2Content</p>
        </div>

        <vue-carousel-component class="employee-carousel" reference="homepagebanners" :pagination-enabled="false" :navigation-enabled="true" :autoplay-hover-pause="false" :autoplay="true" :per-page="1" :per-page-custom="[[700, 2], [768, 3], [1200, 4]]">
            <% loop $Employees %>
            <template slot="items">
                <div class="text-center px-5 px-lg-4">
                    <img data-srcset="$ProfilePhoto.Fill(500,500).URL 500w,
                                        $ProfilePhoto.Fill(800,800).URL 800w"
                         sizes="(max-width: 768px) 90vw, (max-width: 1400px) 30vw, 20vw" alt="DirectLease $FullName"
                         class="w-75 img-fluid my-4 lazyload" />
                    <h5>$FullName</h5>
                    <p><a href="mailto:$EmailAddress"><i class="fas fa-envelope" aria-hidden="true"></i> $EmailAddress</a></p>
                </div>
            </template>
            <% end_loop %>
        </vue-carousel-component>

    </div>
</div>


<div class="light-grey my-5 py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 mx-auto my-5 text-center">
                <% if $Block3Title %>
                <h3>$Block3Title</h3>
                <hr />
                <% end_if %>
                $Block3Content
            </div>
        </div>
    </div>
</div>