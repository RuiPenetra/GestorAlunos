<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class loginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->fillField('LoginForm[username]', 'antonio');
        $I->fillField('LoginForm[password]', '123456');
        $I->wait(2);
        //$I->click('login-button');

    }
}
