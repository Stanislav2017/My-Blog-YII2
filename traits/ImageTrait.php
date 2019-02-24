<?php

namespace app\traits;

use Faker\Provider\Image;
use const false;
use function file_exists;
use function md5;
use function unlink;
use function var_dump;
use Yii;
use yii\web\UploadedFile;

trait ImageTrait
{
    /**
     * @param string $folder
     * @param UploadedFile|null $file
     * @return bool|string
     */
    public function saveImage(string $folder, UploadedFile $file = null)
    {
        $filename = md5($file->baseName) . '.' . $file->extension;
        if ($file->saveAs($this->buildFilePath($folder, $filename))) {
            return $filename;
        }
        return false;
    }

    /**
     * @param string $folder
     * @return string
     */
    public function saveDefaultImage(string $folder)
    {
        $image = md5(time()) . '.png';
        if (file_exists(Yii::getAlias('@web') . 'images/no-image.png')) {
            copy('images/no-image.png', "uploads/{$folder}/{$image}");
        }
        return $image;
    }

    /**
     * @param string $folder
     * @param string $filename
     * @return string
     */
    public function buildFilePath(string $folder, string $filename)
    {
        return Yii::getAlias('@web') . "uploads/{$folder}/{$filename}";
    }

    /**
     * @param string $folder
     * @param string $filename
     */
    public function deleteFile(string $folder, string $filename)
    {
        $file = $this->buildFilePath($folder, $filename);
        if (file_exists($file)) {
            unlink($file);
        }
    }

}