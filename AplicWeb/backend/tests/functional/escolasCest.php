<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class escolasCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('login');
        $I->fillField('LoginForm[username]', 'simao');
        $I->fillField('LoginForm[password]', '123456');
        $I->click('login-button');
        $I->click(['class' => 'escolas']);
        $I->click(['class' => 'criar']);
        $I->fillField('Escola[nome]', 'teste');
        $I->fillField('Escola[abreviatura]', 'test');
        $I->click(['class' => 'btn']);
        $I->see('Atualizar');
    }
}
