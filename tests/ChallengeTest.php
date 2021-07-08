<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChallengeTest extends WebTestCase
{
    public function testRouteGetChallenge(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/challenges');

        $this->assertResponseIsSuccessful();
    }
}
