<?php

namespace Sellace\App\Helpers;

class Media
{
    public function __construct()
    {
        add_filter('upload_mimes', [$this, 'uploadSvg']);
        add_action('admin_head', [$this, 'styleSvg']);
    }

    public function uploadSvg($mimes) {
        $mimes['svg'] = 'image/svg+xml'; 
        return $mimes;
    }
    
    public function styleSvg() {
        ?>
 	        <style>
                td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
                    width: 100% !important; 
                    height: auto !important; 
                }
            </style>
        <?php
    }
}