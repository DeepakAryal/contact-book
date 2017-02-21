<?php

use PropelException;
use Dotenv\Dotenv;
use Polifonic\Tests\Page\Security\Login;
use Polifonic\Tests\Page\Security\Logout;
use Polifonic\Tests\User\User;
use Polifonic\Tests\Wiki\TestWiki;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractTestCase extends WebTestCase
{
    const URL = '/';

    const USER_CLASS = User::class;

    protected $client;

    protected $user;

    protected $page;

    protected $wiki;

    public function getClient()
    {
        return $this->client;
    }

    public function getUser()
    {
        if (!$this->user) {
            $class = static::USER_CLASS;

            $this->user = new $class();
        }

        return $this->user;
    }

    public function setUp()
    {
        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();

        putenv(sprintf('DZANGOCART_DOMAIN_SUBSCRIPTION_DOMAIN=%s', $this->getWiki()->getDomain()));

        // [SS 2016-12-13] when cache is cleared there is error:
        // "PropelException: No connection information in your runtime configuration file for datasource [default]"
        try {
            $this->client = static::createClient();
        } catch (PropelException $e) {
            $this->client = static::createClient();
        }
    }

    protected function login(User $user = null)
    {
        $page = new Login();

        $client = $this->getClient();

        $crawler = $client->request('GET', $page->getUrl());

        $form = $crawler->selectButton($page->getFormSubmit())
            ->form();

        if (!$user) {
            $user = $this->getUser();
        }

        $data = $page->getFormData(
            $user->getEmail(),
            $user->getPassword()
        );

        $crawler = $client->submit($form, $data);
    }

    protected function logout()
    {
        $page = new Logout();

        $crawler = $this->getClient()
            ->request('GET', $page->getUrl());
    }

    protected function generatePassword($length = 8)
    {
        return substr(md5(rand()), 0, $length);
    }
}
