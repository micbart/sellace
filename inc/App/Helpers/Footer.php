<?php

namespace Sellace\App\Helpers;

class Footer
{
    public static function footer()
    {
        $class = new Footer();

        return [
            'footerFields' => get_field('footer_options', 'options') ?? [],
            'footerMenu' => $class->menuArray('footer') ?? null,
            'copyrights' => '@ ' . get_bloginfo('description') . ' ' .date('Y'),
        ];
    }

    public function menuArray($footerName)
    {
        return wp_nav_menu(
            [
                'theme_location' => $footerName,
                'echo' => FALSE,
                'fallback_cb' => '__return_false',
                'depth' => 1,
                'menu_class' => 'flex flex-sm-justify-end'
            ]
        );
    }
}