<?php
namespace vendors\imageresizer;

class imageResize {

    public function resizeImgFile($sourcePath, $destinationPath, $newHeight = false, $newWidth = 150) {
        try {
            $image = new \Imagick($sourcePath);
            $image->thumbnailImage($newWidth, $newHeight);
            if (!$image->setImageFormat("jpeg")) throw new Exception();
            $a = $image->getImageBlob();
            $image = null;
            return $a;
        } catch (\ImagickException $e) {
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

}
