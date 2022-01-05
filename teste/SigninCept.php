<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('see if sign in works properly');
$I->amOnPage('http://localhost/ReviewChan/html/login.php');
$I->see('Welcome to our community');

$I->amGoingTo('see if a pop-up appears when I press Login button');
$I->click('.open-button');
$I->see('.form-popup');

$I->amGoingTo('see if pop-up disappear when I press Close button');
$I->click('.btn.cancel');
$I->dontsee('#myForm');

$I->amGoingTo('try to log in with no email');
$I->fillField('txt_uname','');
$I->fillField('txt_pwd','2222');
$I->click('#but_submit');
$I->cantSee('Create Review');

$I->amGoingTo('try to log in with no password');
$I->fillField('txt_uname','ovi@gmail.com');
$I->fillField('txt_pwd','');
$I->click('#but_submit');
$I->cantSee('Create Review');

$I->amGoingTo('try to log in with no email and no password');
$I->seeInField('txt_uname','');
$I->seeInField('txt_pwd','');
$I->click('#but_submit');
$I->cantSee('Create Review');

$I->amGoingTo('try to log in with wrong email');
$I->fillField('txt_uname', 'ovi27@gmail.com');
$I->fillField('txt_pwd','2222');
$I->click('#but_submit');
$I->cantSee('Create Review');

$I->amGoingTo('try to log in with wrong password');
$I->fillField('txt_uname', 'ovi27@gmail.com');
$I->fillField('txt_pwd','2223');
$I->click('#but_submit');
$I->cantSee('Create Review');

$I->amGoingTo('try to log in with wrong email and wrong password');
$I->fillField('txt_uname', 'ovi27@gmail.com');
$I->fillField('txt_pwd','2223');
$I->click('#but_submit');
$I->cantSee('Create Review');

$I->amGoingTo('try to log in with true values');
$I->fillField('txt_uname', 'ovi@gmail.com');
$I->fillField('txt_pwd','2222');
$I->click('#but_submit');
$I->see('Welcome, Ovidiu Botsch');
$I->see('Create Review');








