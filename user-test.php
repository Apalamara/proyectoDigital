<?php

require_once('Entities/User.php');

use OfficeGuru\Entities\User;

$myUser = new User('Juan', 'Pérez', 'juan@perez.com', 'juan@perez.com');
$myUser
	->setId(1)
	->setImage('juan.png');

print_r($myUser);