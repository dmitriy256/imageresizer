<?php
namespace vendors\imageresizer;

class imageResize {

    function __construct() {

    }

    public function resizeImgFile($source_path, $destination_path, $newheight = false, $newwidth = 300, $quality = false) {
        ini_set("gd.jpeg_ignore_warning", 1);
        list($oldwidth, $oldheight, $type) = getimagesize($source_path);
        switch ($type) {
            case IMAGETYPE_JPEG: $typestr = 'jpeg'; break;
            case IMAGETYPE_GIF: $typestr = 'gif' ;break;
            case IMAGETYPE_PNG: $typestr = 'png'; break;
        }
        $function = "imagecreatefrom$typestr";
        $src_resource = $function($source_path);
        unset($function);
        $function = null;

        if (!$newwidth) {
            $newwidth = round($newheight * $oldwidth/$oldheight);
        } elseif (!$newheight) {
            $newheight = round($newwidth * $oldheight/$oldwidth);
        }
        $destination_resource = imagecreatetruecolor($newwidth, $newheight);

        imagecopyresampled($destination_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $oldwidth, $oldheight);

        $function = "image$typestr";
        $function($destination_resource, $destination_path);
        unset($function);
        $function = null;

        imagedestroy($destination_resource);
        unset($destination_resource);
        $destination_resource = null;

        imagedestroy($src_resource);
        unset($src_resource);
        $src_resource = null;
    }

}