<?php

require_once('php/requires.php');

use OfficeGuru\Entities\User;
use OfficeGuru\Repositories\UserRepository;

$myUser = new User('Juan', 'Pérez', 'juan@perez.com', 'juan@perez.com');
$myUser->setImage('juan.png');

$myUserRepo = new UserRepository();
$myUserRepo->insert($myUser);

/*

if ($_POST) {
	$myUserForm = new NewUserForm($_POST);
	if ($myUserForm->isValid()) {

		$myUser = new User($_POST['name'], etc);
		$myUser->setImage($_POST['image']);

		$myUserRepo = new UserRepository();
		$myUserRepo->insert($myUser);
		$myUserRepo->getLastInsertedID;
	}
	else
	{
		$viewErrors = $myUserForm->getMessages();
	}
}
*/