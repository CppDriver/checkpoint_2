<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Request;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            if ($formData['form'] == "login") {
                $logged = $this->app->getAuth()->login($formData['username'], $formData['passwd']);
                if ($logged) {
                    return $this->redirect('?c=user');
                }
                $data = ($logged === false ? ['message' => 'Username or password is wrong!'] : []);
                return $this->html($data, 'login');
            } elseif ($formData['form'] == "registration") {
                $exists = User::getOneByUsername($formData['username']);
                if (!$exists) {
                    $user = new User();
                    $user->setFirstName($formData['first_name']);
                    $user->setSurname($formData['surname']);
                    $user->setEmail($formData['email']);
                    $user->setUsername($formData['username']);
                    $user->setPasshash($formData['passwd']);
                    $user->save();
                    return $this->redirect('?c=auth');
                }
                return $this->html(null, 'login');
            }
        }
        return $this->html(null,'login');
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
//        return $this->html(viewName: 'logout');
        return $this->redirect("?c=home");
    }

    /**
     * Check if user is already used
     * @return Response
     * @throws \Exception
     */
    public function userExists(): Response {
        $username = $_REQUEST["username"];
        $exists = User::getOneByUsername($username);
        $output = false;
        if ($exists) {
            $output = true;
        }
        return $this->json($output);
    }

    /**
     * Check if email is already used
     * @return Response
     * @throws \Exception
     */
    public function emailExists(): Response {
        $email = $_REQUEST["email"];
        $exists = User::getOneByEmail($email);
        $output = false;
        if ($exists) {
            $output = true;
        }
        return $this->json($output);
    }

    /**
     * Delete user account
     * @return Response
     * @throws \Exception
     */
    public function delete(): Response {
        if ($this->app->getAuth()->isLogged()) {
            User::getOneByUsername($this->app->getAuth()->getLoggedUserName())->delete();
            $this->app->getAuth()->logout();
        }
        return $this->redirect("?c=home");
    }
}