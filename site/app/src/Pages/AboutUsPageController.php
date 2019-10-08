<?php

use SilverStripe\View\Requirements;

class AboutUsPageController extends PageController
{
    private static $allowed_actions = [];

    protected function init() {
        parent::init();
        Requirements::css('resources/app/css/aboutuspage.css');
        Requirements::javascript('resources/app/js/aboutuspage.bundle.js');
    }
}
