<?php
namespace OfficeGuru\Controllers;

use OfficeGuru\Entities\User;
use OfficeGuru\Forms\NewUserForm;
use OfficeGuru\Repositories\UserRepository;

class UserController
{
	public function registerAction($post)
	{
		/* @todo migrar a un controller */
		$myUserForm = new NewUserForm($post);
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
}