<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
    public function myTest0(AcceptanceTester $I) {
        $I->wantTo('Проверить работу главной страницы.');
        $I->amOnPage('/actions/Catalog.action');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);


    }
    public function myTest1(AcceptanceTester $I)
    {
        $I->amOnPage('/actions/Catalog.action');
        $I->see('Freshwater');
    }

    public function myTest2(AcceptanceTester $I) {
        $I->amOnPage('/actions/Catalog.action');
        $I->see('Sign In');
        $I->see('Breeds');
        $I->seeResponseCodeIsSuccessful();

    }

    public function myTest3(AcceptanceTester $I) {
        $I->amOnPage('/actions/Account.action?signonForm=');
        $I->see('Username');
        $I->see('Password');
        $I->seeResponseCodeIsSuccessful();

    }

    public function myTest4(AcceptanceTester $I) {
        $I->wantTo('1 Проверить работу поиска.');
        $I->amOnPage('/actions/Catalog.action');
        $I->fillField('keyword','test');
        $I->click('Search');
        $I->see('Product ID');

    }

    public function myTest41(AcceptanceTester $I) {
        $I->wantTo('Проверить работу поиска с пустым значеним.');
        $I->amOnPage('/actions/Catalog.action');
        $I->fillField('keyword','');
        $I->click('Search');
        $I->see('Please enter a keyword to search for, then press the search button.');

    }
    public function myTest5(AcceptanceTester $I) {
        $I->wantTo('2 Проверить работу поиска.');
        $I->amOnPage('/actions/Catalog.action');
        $I->fillField('keyword','fish');
        $I->click('Search');
        $I->see('Goldfish');

    }

    public function myTest6(AcceptanceTester $I) {
        $I->wantTo('Проверка регистрации.');
        $I->amOnPage('/actions/Catalog.action');
        $I->click('Sign In');
        $I->click('Register Now!');
        $I->see('User Information');
        $I->fillField('username','Test');
        $I->fillField('password','Test123');
        $I->fillField('repeatedPassword','Test123');
        $I->click('Save Account Information');
        $I->seeResponseCodeIs(500);

    }



}
