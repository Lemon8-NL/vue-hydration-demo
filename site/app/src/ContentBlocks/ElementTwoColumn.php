<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\ORM\FieldType\DBField;

class ElementTwoColumn extends BaseElement
{
    private static $table_name = 'ElementTwoColumn';
    private static $singular_name = 'Two column block';
    private static $plural_name = 'Two column blocks';
    private static $icon = 'font-icon-columns';

    private static $db = [
        'FirstColumn' => 'HTMLText',
        'SecondColumn' => 'HTMLText',
    ];

    function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);
        $labels['FirstColumn'] = _t(__CLASS__.'._FirstColumn', 'First column');
        $labels['SecondColumn'] = _t(__CLASS__.'._SecondColumn', 'Second column');
        return $labels;
    }

    public function getSummary()
    {
        return DBField::create_field('HTMLText', $this->FirstColumn)->Summary(20);
    }

    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    public function getType()
    {
        return _t(__CLASS__.'._BlockName', 'Two columns');
    }

}
