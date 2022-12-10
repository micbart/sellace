<?php

namespace Sellace\App\Acf\Blocks;

use Sellace\App\Acf\Blocks\Blocks;

class BannerList extends Blocks
{
    public function getFields()
    {
        return [
            'image' => [
                'id' => get_sub_field('image'),
                'position' => get_sub_field('position_image') ?: 'left'
            ],
            'title' => [
                'titleContent' => get_sub_field('title'),
                'style' => get_sub_field('style_title')
            ],
            'list' => get_sub_field('list') ?: [],
            'buttons' => get_sub_field('buttons') ?: [],
        ];
    }
}