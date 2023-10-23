<?php

namespace App\controllers;

use App\models\Database;
use App\models\Roles;
use Delight\Auth\Auth;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;

class Controller {

    protected Engine $view;
    protected Database $database;
    protected Auth $auth;

    public function __construct(Engine $view, Database $database, Auth $auth) {
        $this->view = $view;
        $this->database = $database;
        $this->auth = $auth;
    }

    function checkForAccess() : void{
        if($this->auth->hasRole(Roles::USER)) {
            redirect('/');
        }
    }
}