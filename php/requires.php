<?php
session_start();

require_once('files.php');
require_once('users.php');
require_once('usersTokens.php');

/* OOP */
require_once('Controllers/UserController.php');

require_once('Entities/User.php');

require_once('Forms/Form.php');
require_once('Forms/NewUserForm.php');

require_once('Repositories/MySQL.php');
require_once('Repositories/UserRepository.php');

autoLogin();