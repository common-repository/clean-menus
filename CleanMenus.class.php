<?php
namespace LoMa;

/**
 * Class CleanMenus
 * @package LoMa
 * @version 1.0.0
 */
class CleanMenus
{
    /**
     * Plugin constructor.
     * @since 1.0.0
     */
    public function __construct()
    {
        add_filter('wp_nav_menu_objects', array($this, 'cleanNavMenuObjects'));
    }

    /**
     * @since 1.0.0
     * @internal
     *
     * @param array $items
     * @return array
     */
    public function cleanNavMenuObjects($items)
    {
        if(current_user_can('manage_options')) {
            return $items;
        }

        $isEditor = current_user_can('edit_posts');
        $excludedTypes = apply_filters('clean_menus_excluded_types', array('draft', 'pending', 'future', 'trash', 'private'));

        foreach($items as $objectId => $object) {
            if(!$isEditor && in_array(get_post_status($object->object_id), $excludedTypes)) {
                unset ($items[$objectId]);
            }
        }

        return $items;
    }
}