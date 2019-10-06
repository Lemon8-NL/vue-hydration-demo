<?php

use SilverStripe\View\Requirements;

class HomePageController extends PageController
{
    private static $allowed_actions = [];

    protected function init() {
        parent::init();
        //Requirements::css('resources/app/css/homepage.css');
        //Requirements::javascript('resources/app/js/homepage.bundle.js');
    }
}
