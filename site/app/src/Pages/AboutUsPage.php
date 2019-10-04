<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\HeaderField;

class AboutUsPage extends Page
{
    private static $table_name = 'AboutUsPage';
    private static $singular_name = 'About us page';
    private static $plural_name = 'About us pages';
    private static $can_be_root = true;

    private static $db = [
        'Block1Title' => 'Varchar(255)',
        'Block1Content' => 'HTMLText',
        'Block2Title' => 'Varchar(255)',
        'Block2Content' => 'HTMLText',
        'Block3Title' => 'Varchar(255)',
        'Block3Content' => 'HTMLText',
    ];

    private static $has_many = ['Employees' => Employee::class];

    private static $owns = ['Employees'];

    public function getCMSFields()
    {

	    $this->beforeUpdateCMSFields(function (FieldList $fields) {
	        $fields->removeByName('Content');
		    $fields->addFieldsToTab('Root.Main', [

			    HeaderField::create('Block1Header', _t(__CLASS__.'._Block1Header', 'Block 1'), 4),
			    TextField::create('Block1Title', _t(__CLASS__.'._Block1tTitle', 'Title'))->setMaxLength(100),
			    HTMLEditorField::create('Block1Content', _t(__CLASS__.'._Block1Content', 'Content'))->setRows(3),


			    HeaderField::create('Block2Header', _t(__CLASS__.'._Block2Header', 'Block 2'), 4),
			    TextField::create('Block2Title', _t(__CLASS__.'._Block2Title', 'Title'))->setMaxLength(100),
			    HTMLEditorField::create('Block2Content', _t(__CLASS__.'._Block2Content', 'Content'))->setRows(3),
			    GridField::create('Employees', _t('DirectLease\\ORM\\Employee.PLURALNAME','Employees'), $this->Employees(), GridFieldConfig_RecordEditor::create()),

			    HeaderField::create('Block3Header', _t(__CLASS__.'._Block3Header', 'Block 3'), 4),
			    TextField::create('Block3Title', _t(__CLASS__.'._Block3Title', 'Title'))->setMaxLength(100),
			    HTMLEditorField::create('Block3Content', _t(__CLASS__.'._Block3Content', 'Content'))->setRows(3)
		    ]);
	    });
	    return parent::getCMSFields();

        /*$fields = parent::getCMSFields();

        $fields->removeFieldFromTab('Root.Main', 'Content');
        $fields->addFieldToTab('Root.Main', );
        $fields->addfieldtotab('Root.Main', );
        $fields->addFieldToTab('Root.Main', );

        $fields->addFieldToTab('Root.Main', );
        $fields->addfieldtotab('Root.Main', );
        $fields->addFieldToTab('Root.Main', );
        $fields->addFieldToTab('Root.Main', );

        $fields->addFieldToTab('Root.Main', );
        $fields->addfieldtotab('Root.Main', );
        $fields->addFieldToTab('Root.Main', );
        return $fields;*/
    }
}
