<?php

namespace App\controllers;

use App\models\Database;
use App\models\Registration;
use Delight\Auth\Auth;
use League\Plates\Engine;

class HomeController extends Controller {
    private Registration $registration;

    public function __construct(Engine $view, Database $database, Auth $auth, Registration $registration) {
        parent::__construct($view, $database, $auth);
        $this->registration = $registration;
    }

    public function home(): void {
        $advertisments = $this->database->getAll('advertisments');
        echo $this->view->render('home', [
            'advertisments' => $advertisments,
            'isLoggedIn' => $this->auth->isLoggedIn(),
            ]);
    }

    public function logIn() : void {
        echo $this->view->render('/Registration/logIn', []);
    }

    public function signUp() : void {
        echo $this->view->render('/Registration/signUp', []);
    }
}

?>