<?php

namespace Sellace\App\Acf;

class AcfOptions
{
    public function __construct()
    {
        add_filter('acf/settings/save_json', [$this, 'acfJsonSave']);
        add_filter('acf/settings/load_json', [$this, 'acfJsonLoad']);
        add_filter('gutenberg_can_edit_post_type', [$this, 'disableGutenberg'], 10, 2);
        add_filter('use_block_editor_for_post_type', [$this, 'disableGutenberg'], 10, 2 );
        add_action('admin_head', [$this, 'disableClassicEditor']);
        $this->pageOptions();
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

    function disableEditor( $id = false ) {
        $excludedTemplates = [
            'page-templates/page-flexible-content.php',
        ];
    
        if(empty($id)) {
            return false;
        }  
    
        $id = intval($id);
        $template = get_page_template_slug($id);
    
        return in_array($template, $excludedTemplates);
    }
    
    function disableGutenberg($can_edit, $post_type) {
        if(!(is_admin() && !empty($_GET['post']))) {
            return $can_edit;
        }
    
        if($this->disableEditor($_GET['post'])) {
            $can_edit = false;
        }
        
        return $can_edit;
    }

    function disableClassicEditor() {
        $screen = get_current_screen();

        if('page' !== $screen->id || !isset( $_GET['post'])) {
            return;
        }
    
        if( $this->disableEditor($_GET['post'])) {
            remove_post_type_support( 'page', 'editor' );
        }
    }
    
    public static function flexibleContent(){
        if ( have_rows('flexible_content')) {
            while (have_rows('flexible_content')) {
                the_row();

                if(get_row_layout() == 'hero_banner') {
                    get_template_part('acf-flexible-content/heroBanner');
                }elseif(get_row_layout() == 'banner_with_list') {
                    get_template_part('acf-flexible-content/bannerList');
                }elseif(get_row_layout() == 'numbers') {
                    get_template_part('acf-flexible-content/numbers');
                }elseif(get_row_layout() == 'icon_boxes') {
                    get_template_part('acf-flexible-content/iconBoxes');
                }elseif(get_row_layout() == 'blog') {
                    get_template_part('acf-flexible-content/blog');
                }
            }
        }
    }

    public function pageOptions() {
        if(function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'page_title' =>  __('Theme options', 'sellace'),
                'menu_title' => __('Theme options', 'sellace'),
                'menu_slug' => 'theme-options',
                'capability' => 'install_themes',
                'redirect' => false
            ]);
        }
    }
}
