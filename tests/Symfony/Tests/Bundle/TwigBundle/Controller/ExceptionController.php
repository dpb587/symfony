<?php

namespace Symfony\Tests\Bundle\TwigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExceptionControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/missing-resource/path1234.abcd');

        $this->assertTrue($crawler->filter('html:contains("in  at line")')->count() > 0);
        $this->assertTrue($crawler->filter('.trace-inat')->count() > 0);
        print_r(json_decode($crawler->filter('.trace-inat')->text(), true));
    }
}
