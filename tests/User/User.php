<?php

namespace Polifonic\Tests\User;

class User
{
    const EMAIL = null;

    const USERNAME = null;

    const PASSWORD = null;

    const TOKEN = null;

    protected $email;

    protected $username;

    protected $password;

    public function getEmail()
    {
        if (!$this->email) {
            $this->email = static::EMAIL ?: $this->getUsername().'@polifonic.io';
        }

        return $this->email;
    }

    public function getUsername()
    {
        if (!$this->username) {
            $this->username = static::USERNAME
                ?: sprintf(
                    'functional+%s',
                    $this->getPassword()
                );
        }

        return $this->username;
    }

    public function getPassword()
    {
        if (!$this->password) {
            $this->password = static::PASSWORD ?: substr(md5(rand()), 0, 8);
        }

        return $this->password;
    }

    public function getInvitationToken()
    {
        return static::TOKEN;
    }

    public function login()
    {
        $login = new Login();
    }
}
