<?php

/*
Plugin Name: Cropped Image Admin Column
Description: Allow users to use both "Advanced Custom Fields: Image Crop Add-on" and "Codepress Admin Columns" plugins. This plugin allow cropped images to be shown on the admin list pages.
Author: Junior Grossi
Version: 0.1
Author URI: http://juniorgrossi.com
*/

class CroppedImageAdminColumn
{
    private $filterName = '';

    public function __construct()
    {
        add_filter('cac/column/meta/value', array($this, 'changeValue'), 10, 3);
    }

    public function changeValue($value, $id = 0, $object = null)
    {
        $meta = $object->get_meta_by_id($id);
        $meta = json_decode($meta);

        if (isset($meta->cropped_image)) {
            return $object->get_value_by_meta($meta, $id);
        }

        return $value;
    }

}

new CroppedImageAdminColumn();