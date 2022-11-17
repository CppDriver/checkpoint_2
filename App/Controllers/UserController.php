<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class UserController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function contact(): Response
    {
        return $this->html();
    }

    /**
     * Change user password
     * @return Response
     * @throws \Exception
     */
    public function changePassword(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        if ($this->app->getAuth()->isLogged()) {
            $user = User::getOneByUsername($this->app->getAuth()->getLoggedUserName());
            if ($user->getPasshash() == $formData['oldpassword']) {
                $user->setPasshash($formData['newpassword']);
                $user->save();
                $data = ['message' => 'Password changed successfully.'];
            } else {
                $data = ['message' => 'Password not changed, wrong current password!'];
            }
        }
        return $this->html($data, 'index');
    }
}