<?php

namespace OfficeGuru\Forms;

use OfficeGuru\Repositories\UserRepository;

class UserLoginForm extends Form
{
	/** @var string */
	private $email;
	/** @var string */
	private $password;

	public function __construct($post)
	{
        $this->email = $post['email'] ?? '';
        $this->password = $post['password'] ?? '';
	}

    /**
     * @return bool
     */
	public function isValid(): bool
	{
        $myUserRepo = new UserRepository;
        
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $this->addMessage(array('email' => 'Debe ingresar un email válido'));
        }
        else
        {
        	$myUser = $myUserRepo->fetchByField('email', $this->email);
            if (!$myUser) {
                $this->addMessage(
                	array('email' => 'El mail no se encuentra registrado en el sitio')
            	);
            }
            else
            {
            	if (!$myUser->verifyPassword($this->password)) 
            	{
	                $this->addMessage(
	                	array('password' => 'El password es incorrecto')
	            	);	
            	}
            }
        }

        return empty($this->getMessages());
	}
}