<?php

use Polifonic\Tests\Page\Page;

class Signup
{
    const URL = '/:signup/';

    const FORM_NAME = 'signup';

    const SECURE = false;

    public function getForm()
    {
        return sprintf('form[action="%s"]', static::URL);
    }

    public function getUsernameWidget()
    {
        return sprintf(
            'form[name=%s] input[type=email][id=%s_email]',
            static::FORM_NAME,
            static::FORM_NAME
        );
    }

    public function getPasswordWidget()
    {
        return sprintf(
            'form[name=%s] input[type=password][id=%s_plainPassword_first]',
            static::FORM_NAME,
            static::FORM_NAME
        );
    }

    public function getConfirmPasswordWidget()
    {
        return sprintf(
            'form[name=%s] input[type=password][id=%s_plainPassword_second]',
            static::FORM_NAME,
            static::FORM_NAME
        );
    }

    public function getFormSubmit()
    {
        return sprintf(
            '%s[submit]',
            static::FORM_NAME
        );
    }

    public function getFormData($email, $password, $confirm, $token = null)
    {
        return array(
            sprintf('%s[email]', static::FORM_NAME) => $email,
            sprintf('%s[plainPassword][first]', static::FORM_NAME) => $password,
            sprintf('%s[plainPassword][second]', static::FORM_NAME) => $confirm,
            sprintf('%s[invitation]', static::FORM_NAME) => $token,
        );
    }
}
