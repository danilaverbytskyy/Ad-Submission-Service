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
        $advertisements = $this->database->getAll('advertisements');
        $authors = [];
        foreach ($advertisements as $advertisement) {
            $userData=$this->database->getOne('users', $advertisement['user_id']);
            $authors[$advertisement['id']] = $userData['username'];
        }
        echo $this->view->render('home', [
            'username' => $this->auth->getUsername(),
            'advertisements' => $advertisements,
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
        echo $this->view->render('/Advertisement/create', [
            'flash' => flash(),
        ]);
    }
}

?>