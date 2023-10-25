<?php

namespace App\controllers;

use App\models\Database;
use App\models\Registration;
use Delight\Auth\Auth;
use League\Plates\Engine;
use function DI\add;
use function Tamtamchik\SimpleFlash\flash;

class HomeController extends Controller {
    private Registration $registration;

    public function __construct(Engine $view, Database $database, Auth $auth, Registration $registration) {
        parent::__construct($view, $database, $auth);
        $this->registration = $registration;
        $this->view->addData([
            'isLoggedIn' => $this->auth->isLoggedIn(),
            'nickname' => $this->auth->getUsername(),
        ]);
    }

    public function home(): void {
        $advertisments = $this->database->getAll('advertisments');
        $authors = [];
        foreach ($advertisments as $advertisment) {
            $userDate=$this->database->getOne('users', $advertisment['user_id']);
            $authors[$advertisment['id']] = $userDate['username'];
        }
        echo $this->view->render('home', [
            'username' => $this->auth->getUsername(),
            'advertisments' => $advertisments,
            'authors' => $authors,
            ]);
    }

    public function logIn() : void {
        echo $this->view->render('/Registration/logIn', [
            'flash' => flash(),
        ]);
    }

    public function signUp() : void {
        echo $this->view->render('/Registration/signUp', [
            'flash' => flash(),
        ]);
    }

    public function createAdvertisement() : void {
        echo $this->view->render('/Advertisment/create', [
            'flash' => flash(),
        ]);
    }
}

?>