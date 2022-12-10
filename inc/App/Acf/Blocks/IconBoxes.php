<?php

namespace Sellace\App\Acf\Blocks;

use Sellace\App\Acf\Blocks\Blocks;

class IconBoxes extends Blocks
{
    public function getFields()
    {
        return [
            'grid' => get_sub_field('columns') ?: 'flex-sm-3',
            'title' => [
                'titleContent' => get_sub_field('title'),
                'style' => get_sub_field('style_title')
            ],
            'icons' => get_sub_field('icons') ?: []
        ];
    }
}