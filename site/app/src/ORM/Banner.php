<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

/**
 * Class Banner
 * These are homepage banners, displayed in the carousel at the top of the homepage
 *
 * @package app
 */
class Banner extends DataObject
{
    private static $table_name = 'Banner';
    private static $singular_name = 'Banner';
    private static $plural_name = 'Banners';

	private static $db = [
		'Title' => 'Varchar',
	];

	private static $has_one = [
		'Image' => Image::class,
		'HomePage' => HomePage::class
	];

    private static $owns = ['Image'];

    private static $summary_fields = [
        'Thumbnail',
        'Title'
    ];

    public function getThumbnail()
    {
        if($this->Image()->exists()) {
            return $this->Image()->ScaleWidth(100);
        }
        return 'No photo';
    }

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('FullName', 'Full name'),
            UploadField::create('Image', 'Image')->setFolderName('Banners')
        );
        return $fields;
    }


}
