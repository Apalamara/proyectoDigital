<?php

require_once('Entities/User.php');

use OfficeGuru\Entities\User;

$myUser = new User('Juan', 'Pérez', 'juan@perez.com', 'juan@perez.com');
$myUser
	->setId(1)
	->setImage('juan.png');

print_r($myUser);

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
/*