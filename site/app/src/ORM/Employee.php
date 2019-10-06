<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;

class Employee extends DataObject
{
    private static $table_name = 'Employee';
    private static $singular_name = 'Employee';
    private static $plural_name = 'Employees';

    private static $db = [
        'FullName' => 'Varchar(255)',
        'JobTitle' => 'Varchar(255)',
        'EmailAddress' => 'Varchar(255)',
	    'Sort' => 'Int'
    ];

    private static $has_one = [
        'AboutUsPage' => AboutUsPage::class,
        'ProfilePhoto' => Image::class
    ];

    private static $owns = ['ProfilePhoto'];

    private static $summary_fields = [
        'Thumbnail',
        'FullName',
        'JobTitle',
        'EmailAddress'
    ];


    public function getThumbnail()
    {
        if($this->ProfilePhoto()->exists()) {
            return $this->ProfilePhoto()->ScaleWidth(100);
        }
        return 'No photo';
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(
            $uploader = UploadField::create('ProfilePhoto', 'Profile photo'),
            TextField::create('FullName', 'Full name'),
            TextField::create('JobTitle', 'Job title'),
            TextField::create('EmailAddress', 'E-mail address')
        );
        $uploader->setFolderName('profile-photos');
        $uploader->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg']);
        $this->extend('updateCMSFields', $fields);
        return $fields;
    }

    public function getCMSValidator()
    {
        return new RequiredFields([
            'ProfilePhoto',
            'FullName'
        ]);
    }
}