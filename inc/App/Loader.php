<?php

namespace Sellace\App;

use Sellace\App\Acf\AcfOptions;
use Sellace\App\Helpers\Media;

class Loader
{
    public function __construct()
    {
        $this->loadFiles();
        $this->initClasses();
    }

    public function loadFiles()
    {
        require get_template_directory() . '/inc/App/Acf/AcfOptions.php';
        require get_template_directory() . '/inc/App/Helpers/Media.php';
    }

    public function initClasses()
    {
        new AcfOptions();
        new Media();
    }
}

new Loader();