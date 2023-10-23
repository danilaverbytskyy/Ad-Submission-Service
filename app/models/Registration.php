<?php

namespace App\models;

use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;
use Exception;

class Registration {
    private QueryFactory $queryFactory;
    private Auth $auth;

    public function __construct(QueryFactory $queryFactory, Auth $auth) {
        $this->queryFactory = $queryFactory;
        $this->auth = $auth;
    }

    public function logOut() : void {
        $this->auth->logOut();
        $_SESSION['message'] = 'До новых встреч!';
    }

    /**
     * @throws AuthError
     * @throws Exception
     */
    public function register() : void {
        try {
            $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['nickname'], function ($selector, $token) {
                $this->auth->confirmEmail(urldecode($selector), urldecode($token));
            });
        } catch (InvalidEmailException $e) {
            throw new Exception();
        } catch (InvalidPasswordException $e) {
            throw new Exception();
        } catch (UserAlreadyExistsException $e) {
            throw new Exception();
        } catch (TooManyRequestsException $e) {
            throw new Exception();
        }
    }

    public function enter() {
        try {
            $this->auth->login($_POST['email'], $_POST['password']);
            $_SESSION['message'] = 'Добро пожаловать, ' . $this->auth->getUsername() . '!';
        }
        catch (InvalidEmailException $e) {
            $_SESSION['message'] = 'Некорректный email';
            throw new Exception();
        }
        catch (InvalidPasswordException $e) {
            $_SESSION['message'] = "Некорректный пароль";
            throw new Exception();
        }
        catch (EmailNotVerifiedException $e) {
            $_SESSION['message'] = "Email не подтвержден";
            throw new Exception();
        }
        catch (TooManyRequestsException $e) {
            $_SESSION['message'] = "Слишком много запросов";
            throw new Exception();
        }
    }
}