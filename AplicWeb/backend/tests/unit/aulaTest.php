<?php namespace backend\tests;

use backend\models\Aula;

class aulaTest extends \Codeception\Test\Unit
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
        $aula = new Aula();

        /*Nao pode ser null*/
        $aula->setNome(null);
        $this->assertFalse($aula->validate(['nome']));

        $aula->setInicio(null);
        $this->assertFalse($aula->validate(['inicio']));

        $aula->setFim(null);
        $this->assertFalse($aula->validate(['fim']));

        $aula->setSala(null);
        $this->assertFalse($aula->validate(['sala']));

        $aula->setDia(null);
        $this->assertFalse($aula->validate(['dia']));

        $aula->setIdTurno(null);
        $this->assertFalse($aula->validate(['id_turno']));

        $aula->setIdProfessor(null);
        $this->assertFalse($aula->validate(['id_professor']));

        $aula->setHorarioId(null);
        $this->assertFalse($aula->validate(['horario_id']));

        $aula->setNome(null);
        $this->assertFalse($aula->validate(['nome']));

        /*Mas caracteres 45*/
        $aula->setDia('efwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww');
        $this->assertFalse($aula->validate(['dia']));

    }
}