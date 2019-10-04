<div class="teal mb-5">
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



<div class="light-grey py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>$EmailUsTitle</h3>
                <hr />
                $EmailUsContent
                <div class="btn btn-primary mt-2">
                    <a href="mailto:$SiteConfig.EmailAddress" class="text-white"><%t Contact.EmailUs "Email us" %></a>
                </div>
            <!--/div>

            <div class="col-12 col-sm-6"-->
                <h3 class="mt-5">$CallUsTitle</h3>
                <hr />
                $CallUsContent
                <a href="tel:$SiteConfig.PhoneNumber" class="lead d-block mt-1">$SiteConfig.PhoneNumber</a>
            <!--/div>

            <div class="col-12 col-sm-6"-->
                <h3 class="mt-5">$FAQTitle</h3>
                <hr />
                $FAQContent
                <div class="btn btn-primary mt-2">
                    <a href="/faq" class="text-white"><%t Contact.FAQ "E-mail" %></a>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <h3 class="mt-5 mt-sm-0">$VisitUsTitle</h3>
                <hr />
                $VisitUsContent
                <a target="_blank" href="https://www.google.com/maps/place/Demmersweg+110,+7556+BN+Hengelo/data=!4m2!3m1!1s0x47b80e3ab0190c7b:0x3bc53c2fafdd73a3?ved=2ahUKEwiV0ozq15zfAhUPyaQKHaRFDzgQ8gEwAHoECAAQAQ">
                    <%t Contact.GoogleMapLink "View map" %>
                </a>
                <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2440.7910512712547!2d6.776542415798668!3d52.28349527977015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b80e3ab0190c7b%3A0x3bc53c2fafdd73a3!2sDemmersweg+110%2C+7556+BN+Hengelo!5e0!3m2!1sen!2snl!4v1544700017546"
                        width="600" height="450" frameborder="0">
                </iframe>
            </div>
        </div>
    </div>
</div>



<div class="blue slick-carousel-team my-5 py-5">
    <div class="container-fluid my-3">
        <div class="row">

            <div class="text-center col-8 mx-auto">
                <h2 class="text-white">$Block2Title</h2>
                <p class="text-white">$Block2Content</p>
            </div>

            <vue-carousel-component class="employee-carousel" reference="homepagebanners" :pagination-enabled="false" :navigation-enabled="true" :autoplay-hover-pause="false" :autoplay="true" :per-page="1" :per-page-custom="[[700, 2], [768, 3], [1200, 4]]">
                <% loop $Employees.Sort('Sort') %>
                <template slot="items">
                    <div class="text-center text-white px-5 px-lg-4">
                        <img data-srcset="$ProfilePhoto.Fill(500,500).URL 500w,
                                            $ProfilePhoto.Fill(800,800).URL 800w"
                             sizes="(max-width: 768px) 90vw, (max-width: 1400px) 30vw, 20vw" alt="DirectLease $FullName"
                             class="w-75 img-fluid rounded-circle my-4 lazyload" />
                        <h5 class="text-white">$FullName</h5>
                        <p class="text-white">$JobTitle</p>
                        <p><a href="mailto:$EmailAddress"><i class="fas fa-envelope" aria-hidden="true"></i> <%t Contact.Email "email" %></a></p>
                    </div>
                </template>
                <% end_loop %>
            </vue-carousel-component>

        </div>
    </div>
</div>

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