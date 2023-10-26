<?php
namespace App\models;

use Exception;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class ImageProcessor
{
    private $imageManager;

    public function __construct()
    {
        // Создаем экземпляр менеджера изображений
        $this->imageManager = new ImageManager();
        $destinationPath = __DIR__ . "/public/img";
    }

    public function prepareImage(string $filePath, int $weight=null, int $height=null) : Image {
        if($height!==null && $weight!==null) {
            return $this->imageManager->make($filePath)->resize($weight, $height);
        }
        return $this->imageManager->make($filePath);
    }

    public function uploadImage($file, $destinationPath, $imageName)
    {
        // Проверяем, является ли файл изображением
        if (!$this->isImage($file['tmp_name'])) {
            throw new Exception('Uploaded file is not a valid image');
        }

        // Создаем объект изображения с помощью Intervention Image
        $image = $this->imageManager->make($file['tmp_name']);

        // Изменяем размер изображения, если необходимо
        // $image->resize(800, null, function ($constraint)
        // {
        //    $constraint->aspectRatio();
        // });

        // Сохраняем изображение на сервере
        $image->save($destinationPath . '/' . $imageName);

        // Освобождаем ресурсы
        $image->destroy();
    }

    protected function isImage($filePath)
    {
        $imageInfo = getimagesize($filePath);
        return $imageInfo !== false;
    }
}