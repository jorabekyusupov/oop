<?php

trait FileHelper
{
    public function fileUpload($image)
    {

        if (isset($image)) {
            $folder = './upload/';

            $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
            $path = $folder . uniqid('', true) .'.'. $ext;
            if ($image['size'] > 1000000) {
                return false;
            }
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {

                if (move_uploaded_file($image['tmp_name'], $path)) return $path;
            }
        }
        return false;
    }

    public function fileDelete($image)
    {
        if ($image && file_exists($image)) {
            unlink($image);
        }
    }
}