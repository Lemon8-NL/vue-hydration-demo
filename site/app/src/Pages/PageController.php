<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            //Requirements::css('resources/app/css/common.css');
            //Requirements::javascript('resources/app/js/common.bundle.js');
            Requirements::css('resources/app/css/main.css');
            Requirements::javascript('resources/app/js/main.bundle.js');

            // if this is a "plain" built in ss class, then we need to include the default styles here, cuz there is no child class
            /*if( $this->ClassName === 'Page' || $this->ClassName === 'ErrorPage') {
                Requirements::css('resources/app/css/contentpage.css');
                Requirements::javascript('resources/app/js/contentpage.bundle.js', array('async' => true));
            }*/
        }
    }
}
