<?php

namespace App\controllers;

use App\models\Database;
use App\models\ImageProcessor;
use Delight\Auth\Auth;
use League\Plates\Engine;
use function Tamtamchik\SimpleFlash\flash;

class AdvertisementController extends Controller {
    private ImageProcessor $image;

    public function __construct(Engine $view, Database $database, Auth $auth, ImageProcessor $image) {
        parent::__construct($view, $database, $auth);
        $this->image = $image;
    }

    public function storeAdvertisement() {
        $imageFile = $_FILES['image'];
        $imageName = $this->auth->getUserId() . '_' . date('Y-m-d_H-i-s') . '_' . $imageFile['name'];
        $this->image
            ->prepareImage($imageFile['tmp_name'], 300, 200)
            ->save($_SERVER['DOCUMENT_ROOT'] . "/img/Advertisement/{$imageName}"
            );
        $data =[
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => $imageName,
            'date' => date('Y-m-d'),
            'user_id' => $this->auth->getUserId(),
            'category_id'=> intval($_POST['topic']),
        ];
        $this->database->store('advertisements', $data);
        flash()->success('Объявление подано успешно!');
        redirect('/');
    }
}
