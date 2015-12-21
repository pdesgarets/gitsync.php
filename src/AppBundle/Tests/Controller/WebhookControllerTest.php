<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebhookControllerTest extends WebTestCase
{
    public function testTrigger()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{repo}');
    }

}
