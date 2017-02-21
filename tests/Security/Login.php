<?php

namespace Polifonic\Tests\Page\Security;

use Polifonic\Tests\Page\Page;

class Login extends Page
{
    const URL = '/:login';

    const SECURE = false;

    public function getForm()
    {
        return 'form[action="/:login_check"]';
    }

    public function getFormSubmit()
    {
        return '_submit';
    }

    public function getFormData($username, $password)
    {
        return array(
            '_username' => $username,
            '_password' => $password,
        );
    }
}
