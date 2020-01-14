<?php namespace backend\tests;

use backend\models\Aluno;

class alunoTest extends \Codeception\Test\Unit
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
        $aluno = new Aluno();

        $aluno->setIdCurso(null);
        $this->assertFalse($aluno->validate(['id_curso']));

        $aluno->setIdPerfil(null);
        $this->assertFalse($aluno->validate(['id_perfil']));

        $aluno->setIdCurso(2);
        $this->assertTrue($aluno->validate(['id_curso']));

        $aluno->setIdPerfil(1);
        $this->assertTrue($aluno->validate(['id_perfil']));
    }
}