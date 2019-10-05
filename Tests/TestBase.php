<?php

namespace Joschi127\DoctrineEntityOverrideBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestBase extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        self::$container = $kernel->getContainer();
        $this->em = self::$container->get('doctrine.orm.entity_manager');
    }

    public function tearDown(){
        /*
         * Close doctrine connections to avoid having a 'too many connections'
         * message when running many tests
         */
        self::$container->get('doctrine')->getConnection()->close();

        parent::tearDown();
    }
}
