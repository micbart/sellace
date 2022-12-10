<?php

namespace Sellace\App\Acf\Blocks;

use Sellace\App\Acf\Blocks\Blocks;

class Numbers extends Blocks
{
    public function getFields()
    {
        return [
            'grid' => get_sub_field('columns') ?: 'flex-sm-4',
            'button' => [
                'button' => get_sub_field('button'),
                'style_button' => get_sub_field('style_button')
            ],
            'numbers' => get_sub_field('numbers') ?: []
        ];
    }
}