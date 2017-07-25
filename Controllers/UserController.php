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

	/* Tal vez esto deba ir en una clase de autentiación */
	public function loginAction($post)
	{
		$myLoginForm = new UserLoginForm($post);
		if ($myLoginForm->isValid())
		{
        	$myUserRepo = new UserRepository;
        	$myUser = $myUserRepo->fetchByField('email', $myLoginForm->getEmail());

            if (!$myUser) {
                $myLoginForm->addMessage(
                	array('email' => 'El mail no se encuentra registrado en el sitio')
            	);
            }
            else
            {
            	if (!$myUser->verifyPassword($myLoginForm->getPassword())) 
            	{
	                $myLoginForm->addMessage(
	                	array('password' => 'El password es incorrecto')
	            	);	
            	}
            	else
            	{
            		$this->_saveSession($myUser);
    				if($myLoginForm->getRememberMe())
					{
						setcookie('og_user', $myUser->getId(), 5*365*24*60*60+time());
					}
            	}
            }
			// Login User
		}

		/* Set view messages */
		$GLOBALS['view']['messages'] = $myLoginForm->getMessages();
	}

	/**
	 * @return bool
	 */
	public function isLoggedIn(): bool
	{
	    return isset($_SESSION['og_user']);
	}

	/**
	* @param User $user
	*/
	private function _saveSession(User $user)
	{
		$user->setPassword('');
		$_SESSION['og_user'] = $user;
	}

	private function _autoLogin()
	{
	    //chequear si ya esta logueado
	    if(!$this->isLoggedIn() && isset($_COOKIE['og_user']))
	    {
	        //leer cookie
	        $userId = $_COOKIE['og_user'];

        	$myUserRepo = new UserRepository;
        	$myUser = $myUserRepo->fetchByField('id', $userId);

	        if($myUser)
	        {
	            $this->_saveSession($myUser);
	        }
	    }

	}
}