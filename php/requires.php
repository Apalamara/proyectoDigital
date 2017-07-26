<?php

require_once('files.php');
require_once('users.php');
require_once('usersTokens.php');

/* OOP */
require_once('Controllers/UserController.php');

require_once('Entities/User.php');

require_once('Forms/Form.php');
require_once('Forms/UserLoginForm.php');
require_once('Forms/UserRegisterForm.php');
require_once('Forms/UserProfileForm.php');

require_once('Repositories/MySQL.php');
require_once('Repositories/UserRepository.php');

session_start();
$myUserCtrl = new OfficeGuru\Controllers\UserController();
$myUserCtrl->autoLogin();