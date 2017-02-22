<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginPageTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        try {
            $this->client = static::createClient();
        } catch (PropelException $e) {
            $this->client = static::createClient();
        }
    }

    public function testUserNameField()
    {
        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter('input#username')->count()
        );
    }

    public function testPasswordField()
    {
        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter('input#password')->count()
        );
    }

    public function testSubmitButton()
    {
        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter('input#_submit')->count()
        );
    }

    public function testRegisterButton()
    {
        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter('a[name="create_account"]')->count()
        );
    }

    public function testForgetPasswordLink()
    {
        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter('a[href="/resetting/request"]')->count()
        );
    }

    protected function getClient()
    {
        return $this->client;
    }

    protected function getLogInCrawler()
    {
        $crawler = $this->getClient()
            ->request('GET', '/login');

        return $crawler;
    }
}
