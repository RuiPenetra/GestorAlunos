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

        /*Nao pode ser null*/
        $aluno->setIdCurso(null);
        $this->assertFalse($aluno->validate(['id_curso']));

        $aluno->setIdPerfil(null);
        $this->assertFalse($aluno->validate(['id_perfil']));

        /*So permite se existir na tabela Curso*/
        $aluno->setIdCurso(2);
        $this->assertTrue($aluno->validate(['id_curso']));

        /*So permite se existir na tabela Perfil*/
        $aluno->setIdPerfil(1);
        $this->assertTrue($aluno->validate(['id_perfil']));
    }
}