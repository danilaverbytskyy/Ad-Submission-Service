<?php

namespace App\controllers;

use App\models\Database;
use App\models\Registration;
use Delight\Auth\Auth;
use League\Plates\Engine;
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
        echo $this->view->render('home', [
            'advertisments' => $advertisments,
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
}

?>