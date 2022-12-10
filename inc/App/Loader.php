<?php

namespace Sellace\App;

use Sellace\App\Acf\AcfOptions;
use Sellace\App\Helpers\Media;
use Sellace\App\Acf\Blocks\Blocks;

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
        require get_template_directory() . '/inc/App/Helpers/Footer.php';
        require get_template_directory() . '/inc/App/Acf/Blocks/Blocks.php';
        require get_template_directory() . '/inc/App/Acf/Blocks/Hero.php';
        require get_template_directory() . '/inc/App/Acf/Blocks/BannerList.php';
        require get_template_directory() . '/inc/App/Acf/Blocks/Numbers.php';
        require get_template_directory() . '/inc/App/Acf/Blocks/IconBoxes.php';
        require get_template_directory() . '/inc/App/Acf/Blocks/Blog.php';
    }

    public function initClasses()
    {
        new AcfOptions();
        new Media();
        new Blocks();
    }
}

new Loader();