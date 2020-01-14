<?php namespace backend\tests;


use common\models\User;

class userTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $user = new User();

        $user->setUsername(null);
        $this->assertFalse($user->validate(['username']));
        $user->setUsername('simaomarques');
        $this->assertTrue($user->validate(['username']));
        $user->setEmail('simaomarques@dhd.pt');
        $this->assertTrue($user->validate(['email']));

    }
}