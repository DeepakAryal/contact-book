<?php

namespace ContactBook\Tests\Login;

use ContactBook\Tests\AbstractTestCase;
use ContactBook\Tests\Login;

class LoginPageTest extends AbstractTestCase
{
    public function testUserNameField()
    {
        $page = new Login();

        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter($page->getUserNameField())->count()
        );
    }

    public function testPasswordField()
    {
        $page = new Login();

        $this->assertEquals(
            1,
            $this->getLogInCrawler()->filter($page->getPasswordField())->count()
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

    protected function getLogInCrawler()
    {
        $crawler = $this->getClient()
            ->request('GET', '/login');

        return $crawler;
    }
}
