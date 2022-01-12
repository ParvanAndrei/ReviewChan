<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');

$I->amGoingTo('see if header buttons work');

//check button for main page
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->click(['link' => 'Review Chan']);
$I->see('Create Review');

//check button for Google
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->click(['link' => 'Google Search']);
$I->see('Google');

//check button for email
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->click(['link' => 'Send it on email']);
$I->see('Secure, smart, and easy to use email');

//check button for notifications
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->click('.w3-dropdown-hover.w3-hide-small');
$I->see('We updated your User Experience on 07-December-2021');

//check button for Premium
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->click(['link' => 'Get Premium']);
$I->amOnPage('http://localhost/ReviewChan/html/checkout.html');
$I->see('Premium Account Checkout');

//check if I can add a review without filling title field
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->amGoingTo('try to add a review, without filling title field');
$I->fillField('title3','');
$I->fillField('name3','Lidl');
$I->fillField('link3','https://www.lidl.ro/');
$I->selectOption('#category3', 'Shopping');
$I->selectOption('#stars', '5');
$I->fillField('review3','Good');
$I->click('#but_submit3');
$I->cantSee('Good');

//check if I can add a review without filling name field
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->amGoingTo('try to add a review, without filling name field');
$I->fillField('title3','Lidl-review');
$I->fillField('name3','');
$I->fillField('link3','https://www.lidl.ro/');
$I->selectOption('#category3', 'Shopping');
$I->selectOption('#stars', '5');
$I->fillField('review3','Good');
$I->click('#but_submit3');
$I->cantSee('Good');

//check if I can add a review without filling link field
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->amGoingTo('try to add a review, without filling link field');
$I->fillField('title3','Lidl-review');
$I->fillField('name3','Lidl');
$I->fillField('link3','');
$I->selectOption('#category3', 'Shopping');
$I->selectOption('#stars', '5');
$I->fillField('review3','Good');
$I->click('#but_submit3');
$I->cantSee('Good');

//check if I can add a review without filling review text field
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->amGoingTo('try to add a review, without filling review text field');
$I->fillField('title3','Lidl-review');
$I->fillField('name3','Lidl');
$I->fillField('link3','https://www.lidl.ro/');
$I->selectOption('#category3', 'Shopping');
$I->selectOption('#stars', '5');
$I->fillField('review3','');
$I->click('#but_submit3');
$I->cantSee('Lidl');

//check if I can add a review
$I->amOnPage('http://localhost/ReviewChan/html/index.php#');
$I->see('Create Review');
$I->amGoingTo('try to add a review');
$I->fillField('title3','Lidl-review');
$I->fillField('name3','https://www.lidl.ro/');
$I->fillField('link3','lidl.ro');
$I->selectOption('#category3', 'Shopping');
$I->selectOption('#stars', '5');
$I->fillField('review3','Best shop in the city');
$I->click('Post', '.block');

$I->amOnPage('http://localhost/ReviewChan/html/index2.php');
$I->fillField('search','Lidl');
$I->selectOption('searchby', 'name');
$I->selectOption('orderby', 'name');
$I->selectOption('ascdesc', 'asc');
$I->click('Search', '.block');
$I->see('Lidl');
$I->see('https://www.lidl.ro/');









