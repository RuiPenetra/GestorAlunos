<?php namespace backend\tests;

use backend\models\Escola;

class escolaTest extends \Codeception\Test\Unit
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
        $escola = new Escola();

        /*Não pode ser null*/
        $escola->setNome(null);
        $this->assertFalse($escola->validate(['nome']));

        $escola->setAbreviatura(null);
        $this->assertFalse($escola->validate(['abreviatura']));


        /*O nome tem max de 255 caracteres*/
        $escola->setNome('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss');
        $this->assertFalse($escola->validate(['nome']));

        /*O nome tem max de 45 caracteres*/
        $escola->setAbreviatura('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss');
        $this->assertFalse($escola->validate(['abreviatura']));

    }
}