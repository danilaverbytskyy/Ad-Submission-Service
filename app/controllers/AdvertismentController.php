<?php

namespace App\controllers;

use App\models\Database;
use Delight\Auth\Auth;
use League\Plates\Engine;

class AdvertismentController extends Controller {
    public function __construct(Engine $view, Database $database, Auth $auth) {
        parent::__construct($view, $database, $auth);
    }


}