<?php

namespace WebMadaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategorieControllerTest extends WebTestCase
{
    public function testReadcategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/readCategorie');
    }

}
