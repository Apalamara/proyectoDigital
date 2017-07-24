<?php
namespace OfficeGuru\Controllers;

use OfficeGuru\Entities\User;
use OfficeGuru\Forms\UserRegisterForm;
use OfficeGuru\Forms\UserLoginForm;
use OfficeGuru\Repositories\UserRepository;

class UserController
{
	public function registerAction($post)
	{
		$myUserForm = new UserRegisterForm($post);
		if ($myUserForm->isValid()) 
		{
			$myUser = new User($post['first_name'], $post['last_name'], $post['email'], $post['password']);

			$myUserRepo = new UserRepository();
			$myUserRepo->insert($myUser);

			header('location: welcome.php');
			/* @todo: Log user in */
		}
		else
		{
			/* Set view messages */
			$GLOBALS['view']['messages'] = $myUserForm->getMessages();
		}
	}

	public function loginAction($post)
	{
		$myLoginForm = new UserLoginForm($post);
		if ($myLoginForm->isValid())
		{
			// Login User
		}
		else
		{
			/* Set view messages */
			$GLOBALS['view']['messages'] = $myLoginForm->getMessages();
		}
	}

	
}