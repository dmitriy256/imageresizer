<?php
namespace vendors\imageresizer;

class imageResize {

    public function resizeImgFile($sourcePath, $destinationPath, $newHeight = false, $newWidth = 150) {
        $image = new \Imagick($sourcePath);
        $image->thumbnailImage($newWidth, $newHeight);
        $image->writeImage($destinationPath);
        unset($image);
    }

}