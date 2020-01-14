<?php namespace backend\tests;

use backend\models\AlunoDisciplina;

class alunodisciplinaTest extends \Codeception\Test\Unit
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
        $alunodisciplina = new AlunoDisciplina();

        /*Não pode ser null*/
        $alunodisciplina->setAlunoId(null);
        $this->assertFalse($alunodisciplina->validate(['aluno_id']));

        $alunodisciplina->setDisciplinaId(null);
        $this->assertFalse($alunodisciplina->validate(['disciplina_id']));

        /*Tem de ser INT*/
        $alunodisciplina->setNota('swdw');
        $this->assertFalse($alunodisciplina->validate(['nota']));

        $alunodisciplina->setAlunoId('swdw');
        $this->assertFalse($alunodisciplina->validate(['aluno_id']));

        $alunodisciplina->setDisciplinaId('swdw');
        $this->assertFalse($alunodisciplina->validate(['disciplina_id']));
    }
}