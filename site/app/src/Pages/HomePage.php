<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class HomePage extends Page
{
    private static $table_name = 'HomePage';
    private static $singular_name = 'Home page';
    private static $plural_name = 'Home pages';
    private static $can_be_root = true;
    private static $db = [];

    private static $has_many = ['Banners' => Banner::class];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->addFieldsToTab('Root.Main', [
                GridField::create('Banners', 'Banners', $this->Banners(), GridFieldConfig_RecordEditor::create())
            ]);
        });
        return parent::getCMSFields();
    }
}
