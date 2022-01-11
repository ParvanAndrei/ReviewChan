<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('test register');

$I->amOnPage('http://localhost/ReviewChan/html/register.php');
$I->see('Join our community, register now!');

$I->amGoingTo('click on Register button to see if pop-up appears');
$I->click('.open-button');
$I->see('Full Name');
$I->see('Email');
$I->see('Password');
$I->see('Repeat Password');

$I->amGoingTo('try to register without entering the name');
$I->fillField('fullname','');
$I->fillField('email','ovi@gmail.com');
$I->fillField('password','abc');
$I->fillField('password2','abc');
$I->click('#but_submit2');
$I->cantSee('New account has been created successfully');

$I->amGoingTo('try to register without entering the email');
$I->fillField('fullname','Ovi');
$I->fillField('email','');
$I->fillField('password','abc');
$I->fillField('password2','abc');
$I->click('#but_submit2');
$I->cantSee('New account has been created successfully');

$I->amGoingTo('try to register with wrong format email');
$I->fillField('fullname','Ovi');
$I->fillField('email','');
$I->fillField('password','abc');
$I->fillField('password2','abc');
$I->click('#but_submit2');
$I->cantSee('New account has been created successfully');

$I->amGoingTo('try to register without setting a password');
$I->fillField('fullname','Ovi');
$I->fillField('email','ovi@gmail.com');
$I->fillField('password','');
$I->fillField('password2','');
$I->click('#but_submit2');
$I->cantSee('New account has been created successfully');

$I->amGoingTo('try to register without retyping the password');
$I->fillField('fullname','Ovi');
$I->fillField('email','ovi@gmail.com');
$I->fillField('password','abc');
$I->fillField('password2','');
$I->click('#but_submit2');
$I->cantSee('New account has been created successfully');

$I->amGoingTo('try to see what happens when the two passwords entered are not the same');
$I->fillField('fullname','Ovi');
$I->fillField('email','ovi@gmail.com');
$I->fillField('password','abc');
$I->fillField('password2','def');
$I->click('Register', '.btn');
$I->see('Password typed incorrectly');

$I->amGoingTo('register a new person');
$I->fillField('fullname','Ovi');
$I->fillField('email','ovi@gmail.com');
$I->fillField('password','abc');
$I->fillField('password2','abc');
$I->click('Register','.btn');
$I->see('New account has been created successfully, return to login page here');

