<?php

namespace App\controllers;

use App\models\Database;
use App\models\Registration;
use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use League\Plates\Engine;
use function Tamtamchik\SimpleFlash\flash;

class RegistrationController extends Controller {

    private Registration $registration;

    public function __construct(Engine $view, Database $database, Auth $auth, Registration $registration) {
        parent::__construct($view, $database, $auth);
        $this->registration = $registration;
    }

    public function register(): void {
        try {
            $this->registration->register();
            redirect('/login');
        } catch (AuthError $e) {
            redirect('/signup');
        }
    }

    public function logOut() {
        $this->auth->logOut();
        redirect('/');
    }

    public function enter() {
        try {
            $this->registration->enter();
            redirect('/');
        } catch (AuthError $e) {
            redirect('/login');
        }
    }
}