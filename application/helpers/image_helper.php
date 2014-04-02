<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed.');


function thumbnailByURL($uri, $params = array('w'=>350, 'h'=>350, 'q'=>75), $folder = 'taobao')
{
    if(empty($uri))
        return 'no-image';

    $image_directory = "images/$folder/" . $params['w'] . 'x' . $params['h'] . 'x' . $params['q'];
    $image_filename_salt = 'thumbnail-salt';
    $image_filename = $image_directory . '/' . md5($uri . $image_filename_salt) . '.jpg';

    if (!file_exists($image_directory)) {
        mkdir($image_directory, 0777, true);
    }

    if (!file_exists($image_filename)) {

        $_CI = & get_instance();

        $_CI->load->library('Image_moo');
        $_CI->image_moo->set_jpeg_quality($params['q']);
        $_CI->image_moo->load($uri);

        if($_CI->image_moo->errors)
            return false;

        $_CI->image_moo->resize_crop($params['w'], $params['h'])
            ->save($image_filename, true)->clear();

    }

    return base_url($image_filename);
}