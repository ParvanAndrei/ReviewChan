<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check if on guest page I can only search a review');

$I->amOnPage('http://localhost/ReviewChan/html/index2.php');
$I->see('Welcome, guest');

$I->dontSee('Create Review');
$I->see('Search Review');
$I->dontSee('My Reviews');

$I->wantTo('check if log out button works');
$I->click(['class' => 'logoutguest']);
$I->see('Welcome to our community, sign in and let\'s get started.');