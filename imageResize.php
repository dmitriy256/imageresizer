<?php
namespace vendors\imageresizer;

class imageResize {

    public function resizeImgFile($sourcePath, $destinationPath, $newHeight = false, $newWidth = 150) {
        try {
            $image = new \Imagick($sourcePath);
            $image->thumbnailImage($newWidth, $newHeight);
            $image->writeImage($destinationPath);
            unset($image);
        } catch (\Exception $e) {
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

}