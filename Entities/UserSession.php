<?php

namespace OfficeGuru\Entities;

class UserSession
{
	public function login(User $user)
	{
		saveSession($user);

		if(isset($data['remember_me']))
		{
			setcookie('og_user', $user->getId(), 5*365*24*60*60+time());
		}
	}

	/**
	 * @return bool
	 */
	public function isLoggedIn() bool
	{
	    return isset($_SESSION['og_user']);
	}

	/**
	 * @param User $user
	 */
	public function saveSession(User $user)
	{
	    unset($user['password']);
	    $_SESSION['og_user'] = $user;
	}

	public function autoLogin()
	{
	    //chequear si ya esta logueado
	    if(!isLoggedIn() && isset($_COOKIE['og_user']))
	    {
	        //leer cookie
	        $userId = $_COOKIE['og_user'];

	        //buscamos el usuario
	        $user = findByField('id', $userId);

	        //lo escribimos en la session
	        if($user)
	        {
	            saveSession($user);
	        }
	    }

	}

	function autoLoginByUserId($userId)
	{
	    //chequear si ya esta logueado
	    if($user = findByField('id', $userId))
	    {
	        saveSession($user);
	    }

	}

	function destroy()
	{
	    unset($_SESSION['og_user']);
	    session_destroy();
	    setcookie('og_user', 0, time() * -1);
	}

}