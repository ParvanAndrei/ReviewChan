<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check if database connection works');
$I->amGoingTo('register a new person and than try to log in with those dates saved in DB.');

$I->amOnPage('http://localhost/ReviewChan/html/register.php');
$I->see('Join our community, register now!');

$I->amGoingTo('click on Register button to open pop-up and than enter register data');
$I->click('.open-button');
$I->see('Full Name');
$I->see('Email');
$I->see('Password');
$I->see('Repeat Password');

$I->amGoingTo('register a new person');
$I->fillField('fullname','Nick Smith');
$I->fillField('email','nicksmith@gmail.com');
$I->fillField('password','def');
$I->fillField('password2','def');
$I->click('Register','.btn');
$I->see('New account has been created successfully, return to login page here');

$I->amOnPage('http://localhost/ReviewChan/html/login.php');
$I->see('Welcome to our community');

$I->amGoingTo('try to log in with those new values. This way, I can see if DB connection works.');
$I->fillField('txt_uname', 'nicksmith@gmail.com');
$I->fillField('txt_pwd','def');
$I->click('Login','.btn');
$I->see('Welcome, Nick Smith');
$I->see('Create Review');
