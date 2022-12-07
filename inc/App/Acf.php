<?php

namespace Sellace\App;

use Sellace\App\AcfOptions;

class Acf
{
    public function __construct()
    {
        add_filter('acf/settings/save_json', [$this, 'acfJsonSave']);
        add_filter('acf/settings/load_json', [$this, 'acfJsonLoad']);
        $this->loadFiles();
        $this->initClasses();
    }

    public function loadFiles()
    {
        require get_template_directory() . '/inc/App/AcfOptions.php';
    }

    public function initClasses()
    {
        new AcfOptions();
    }

    function acfJsonSave($path)
    {
        $path = get_stylesheet_directory() . '/acf-json';
        return $path;   
    }
    
    function acfJsonLoad($paths) 
    {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-json';
        return $paths;
    }
}

new Acf();