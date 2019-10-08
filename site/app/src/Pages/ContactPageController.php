<?php

use SilverStripe\View\Requirements;

class ContactPageController extends PageController
{
    private static $allowed_actions = [];

    protected function init() {
        parent::init();
        Requirements::css('resources/app/css/contactpage.css');
        Requirements::javascript('resources/app/js/contactpage.bundle.js');
    }
}
