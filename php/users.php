<?php

define('USERS_FILE', __DIR__ . '/../data/users.json');
define('PASSWORD_MIN_LENGTH', 8);

//La llamamos en register.php donde le pasamos el post
function register(array $post)
{
	$data = $post;

	if (!$errors = validate($data)) 
	{	
		saveUser($data);
	}

	return $errors;
}

function validate(array $data)
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

	elseif (checkDuplicate('email', $data['email']))
	{
		$errors ['email']  = 'El mail está duplicado';
	}

	if(strlen($data['pass']) < PASSWORD_MIN_LENGTH)
	{
		$errors['pass'] = 'La contraseña debe tener al menos ' . PASSWORD_MIN_LENGTH . ' caracteres';
	}
	elseif($data['pass'] != $data['pass_confirm'])
	{
		$errors['pass_confirm'] = 'La contraseña y su confirmacióm deben coincidir';
	}

	return $errors;
}


function checkDuplicate($field, $value)
{
	// @var array $users
	$users = listUSers();

	foreach ($users as $user) 
	{
		if (strtolower(trim($user [$field])) == strtolower(trim($value))) {
				return true;
			}	
	}

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

	$data['pass'] = password_hash ($data['pass'], PASSWORD_DEFAULT);
	unset($data['pass_confirm']);

	//TODO Preguntar a Darío si esto está bien
	$data['newsletter'] = $data['newsletter'] ?? 'off';

	//id - hacer un autonumerico encontrando el id más grande y sumando 1
	$data['id'] = nextId();

	$users = listUSers();
	$users[] = $data;

	saveUsersFile($users);	
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