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
use function Tamtamchik\SimpleFlash\flash;

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
            flash()->success('Вы успешно зарегистрировались!');
        } catch (InvalidEmailException $e) {
            flash()->warning('Некорректный email');
            throw new AuthError();
        } catch (InvalidPasswordException $e) {
            flash()->warning('Некорректный пароль');
            throw new AuthError();
        } catch (UserAlreadyExistsException $e) {
            flash()->warning('Вы уже зарегистрированы');
            throw new AuthError();
        } catch (TooManyRequestsException $e) {
            flash()->error('Слишком много запросов');
            throw new AuthError();
        }
    }

    public function enter() {
        try {
            $this->auth->login($_POST['email'], $_POST['password']);
        }
        catch (InvalidEmailException $e) {
            flash()->warning('Некорректный email');
            throw new AuthError();
        }
        catch (InvalidPasswordException $e) {
            flash()->warning('Некорректный пароль');
            throw new AuthError();
        }
        catch (EmailNotVerifiedException $e) {
            flash()->warning('Почта не была подтверждена');
            throw new AuthError();
        }
        catch (TooManyRequestsException $e) {
            flash()->error('Слишком много запросов');
            throw new AuthError();
        }
    }
}