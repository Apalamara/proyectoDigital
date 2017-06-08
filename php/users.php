<?php

define('USERS_FILE', __DIR__ . '/../data/users.json');
define('PASSWORD_MIN_LENGTH', 8);

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
   Base de datos
   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

//La llamamos en register.php donde le pasamos el post
function register(array $post)
{
	$data = $post;

	if (!$errors = validateRegister($data)) 
	{	
		saveUser($data);
	}

	return $errors;
}

function validateRegister(array $data)
{
	$errors = [];

	if(!isset($data['first_name']) ||
		trim($data['first_name']) == '')
	{
		$errors['first_name'] = 'Debe ingresar un nombre';
	}

	if(!isset($data['last_name']) ||
		trim($data['last_name']) == '')
	{
		$errors['last_name'] = 'Debe ingresar un apellido';
	}

	if(!isset($data['email']) ||
		!filter_var($data['email'], FILTER_VALIDATE_EMAIL)
	)
	{
		$errors['email'] = 'Debe ingresar un email válido';
	}

	elseif (findByField('email', $data['email']))
	{
		$errors ['email']  = 'El mail está duplicado';
	}

	if(strlen($data['password']) < PASSWORD_MIN_LENGTH)
	{
		$errors['password'] = 'La contraseña debe tener al menos ' . PASSWORD_MIN_LENGTH . ' caracteres';
	}
	elseif($data['password'] != $data['pass_confirm'])
	{
		$errors['pass_confirm'] = 'La contraseña y su confirmacióm deben coincidir';
	}

	return $errors;
}


function findByField($field, $value)
{
	// @var array $users
	$users = listUSers();

	foreach ($users as $user) 
	{
		if (strtolower(trim($user [$field])) == strtolower(trim($value))) {
				return $user;
			}	
	}

	return false;
}


function saveUsersFile(array $users = [])
{
	$content = [
		'users' => $users
	];

	file_put_contents(USERS_FILE, json_encode($content));
}

function listUSers()
{

	if (!file_exists(USERS_FILE))
	{
		saveUsersFile();
	}

	$users = file_get_contents(USERS_FILE);

	$users = json_decode($users, true);

	return $users['users'];
}


function saveUser (array $data)
{
	
	$data['email'] = strtolower (trim($data['email']));

	$data['password'] = password_hash ($data['password'], PASSWORD_DEFAULT);
	unset($data['pass_confirm']);

	//TODO Preguntar a Darío si esto está bien
	$data['newsletter'] = $data['newsletter'] ?? 'off';

	//id - hacer un autonumerico encontrando el id más grande y sumando 1
	$data['id'] = nextId();

	$users = listUSers();
	$users[] = $data;

	saveUsersFile($users);	

	saveSession($data);
}


function nextId ()
{
	$users = listUSers();

	$id=0;

	foreach ($users as $user) 
	{
		if ($id < $users['id']) 
		{
			$id = $users['id'];		
		}	
	}

	return $id+1;
}

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
   Sesiones y Cookies
   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

function login(array $post)
{

	$data = $post;

	if (!$errors = validateLogin($data)) 
	{	
		//Chequear existencia del mail
		if(!($user = findByField('email', $data['email'])))
		{
			return ['email' => 'El email ingresado no esta registrado en nuestra base de datos'];
		}

		//chequear el password
		if(!password_verify($data['password'], $user['password']))
		{
			return ['password' => 'El password ingresado es inválido'];
		}

		//guardamos en la session
		saveSession($user);

		//suponiendo que chequeo el recordarme
		if(isset($data['remember_me']))
		{
			//guardamos la cookie de remember
			setcookie('og_user', $user['id'], 5*365*24*60*60+time());
		}

	}

	return $errors;
}


function validateLogin(array $data)
{
	$errors = [];

	if(!isset($data['email']) ||
		!filter_var($data['email'], FILTER_VALIDATE_EMAIL)
	)
	{
		$errors['email'] = 'Debe ingresar un email válido';
	}

	if(trim($data['password']) == '')
	{
		$errors['password'] = 'Debe ingresar un password';
	}

	return $errors;
}


function isLoggedIn()
{
	return isset($_SESSION['user']);
}

function saveSession($user)
{
	unset($user['password']);
	$_SESSION['user'] = $user;
}

function autoLogin()
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


function logout()
{
	//borrar la variable user de la session
	unset($_SESSION['user']);
	//destruir la session
	session_destroy();
	//borrar la cookie de recordarme
	setcookie('og_user', 0, time() * -1);
}


