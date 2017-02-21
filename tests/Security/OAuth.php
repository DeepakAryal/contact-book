<?php

namespace Polifonic\Tests\Page\Security;

use Polifonic\Tests\Page\Page;

class OAuth extends Page
{
    public function getOAuthLinkElement()
    {
        return 'div.auth_link div.providers a.btn-social';
    }
}
