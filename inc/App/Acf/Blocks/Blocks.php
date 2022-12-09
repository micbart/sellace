<?php

namespace Sellace\App\Acf\Blocks;

class Blocks
{
    public function __construct()
    {
        $this->fillers();
    }

    public function fillers()
    {
        add_filter('acf/load_field/name=style_title', [$this, 'customSelectTitle']);
        add_filter('acf/load_field/name=style_button', [$this, 'customSelectButton']);
    }

    public function getFields()
    {
        return [];
    }

    public $titleStyle = [
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6'
    ];

    public $buttonsStyle = [
        'btn btn-primary',
        'btn btn-secondary',
        'none'
    ];

    public function customSelectTitle($field)
    {
        $field['choices'] = [];

        foreach ($this->titleStyle as $style) {
            $field['choices'][$style] = $style;
        }
                   
        return $field;  
    }

    public function customSelectButton($field)
    {
        $field['choices'] = [];

        foreach ($this->buttonsStyle as $style) {
            $field['choices'][$style] = $style;
        }
                   
        return $field;  
    }  
}