<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class perfilCest
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
        $I->click(['class' => 'perfil']);
        $I->fillField('Perfil[nome]', 'Simão Marques1');
        $I->click(['class' => 'btn-primary']);
        $I->see('Simão Marques1');
    }
}
