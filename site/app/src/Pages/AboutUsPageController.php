<?php


use SilverStripe\View\Requirements;

class AboutUsPageController extends PageController
{
    private static $allowed_actions = [];

    protected function init() {
        parent::init();
        Requirements::css('resources/directlease/css/aboutuspage.css');
        Requirements::javascript('resources/directlease/js/aboutuspage.bundle.js');
    }
}
