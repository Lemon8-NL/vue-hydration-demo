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

    private static $translate = [
        'JobTitle'
    ];

    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);
        $labels['Thumbnail'] = _t(__CLASS__.'._ProfilePhoto', 'Profile photo');
        $labels['FullName'] = _t(__CLASS__.'._FullName', 'Full name');
        $labels['JobTitle'] = _t(__CLASS__.'._JobTitle', 'Job title');
        $labels['EmailAddress'] = _t(__CLASS__.'._EmailAddress', 'E-mail address');
        return $labels;
    }

    public function getThumbnail()
    {
        if($this->ProfilePhoto()->exists()) {
            return $this->ProfilePhoto()->ScaleWidth(100);
        }
        return _t(__CLASS__.'.NOPHOTO', 'No photo');
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(
            $uploader = UploadField::create('ProfilePhoto', _t(__CLASS__.'._ProfilePhoto', 'Profile photo')),
            TextField::create('FullName', _t(__CLASS__.'._FullName', 'Full name')),
            TextField::create('JobTitle', _t(__CLASS__.'._JobTitle', 'Job title')),
            TextField::create('EmailAddress', _t(__CLASS__.'._EmailAddress', 'E-mail address'))
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