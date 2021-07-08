<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RessourceTest extends WebTestCase
{
    public function testGetAllRessources(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/ressources');

        $this->assertResponseIsSuccessful();
    }
}
