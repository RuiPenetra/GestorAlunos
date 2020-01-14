<?php namespace backend\tests;

use backend\models\Teste;

class testeTest extends \Codeception\Test\Unit
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
        $teste = new Teste();

        /*Nao pode ser null*/
        $teste->setData(null);
        $this->assertFalse($teste->validate(['data']));

        $teste->setSala(null);
        $this->assertFalse($teste->validate(['sala']));

        $teste->setDuracao(null);
        $this->assertFalse($teste->validate(['duracao']));

        $teste->setPercentagem(null);
        $this->assertFalse($teste->validate(['percentagem']));

        $teste->setIdDisciplina(null);
        $this->assertFalse($teste->validate(['id_disciplina']));

        /*Nao pode ser Int*/
        $teste->setPercentagem('32432');
        $this->assertFalse($teste->validate(['percentagem']));

        $teste->setIdDisciplina('32432');
        $this->assertFalse($teste->validate(['id_disciplina']));
    }
}