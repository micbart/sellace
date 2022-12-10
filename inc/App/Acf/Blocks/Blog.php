<?php

namespace Sellace\App\Acf\Blocks;

use Sellace\App\Acf\Blocks\Blocks;
use WP_Query;

class Blog extends Blocks
{
    public function getFields()
    {
        return [
            'title' => [
                'titleContent' => get_sub_field('title'),
                'style' => get_sub_field('style_title')
            ],
            'archiveButton' => get_sub_field('button_archive') ?: false
        ];
    }

    public function getQuery()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3
        ];

        return new WP_Query($args);
    }
}