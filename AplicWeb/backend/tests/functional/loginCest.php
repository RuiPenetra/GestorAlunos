<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class loginCest
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
        $I->see('Administrador');
    }
}
