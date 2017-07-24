<?php

namespace OfficeGuru\Forms;

use OfficeGuru\Repositories\UserRepository;

class NewUserForm extends Form
{
    /** @var int */
    const PASSWORD_MIN_LENGTH = 8;

    /** @var string */
    private $email;
    /** @var string */
    private $firsName;
    /** @var string */
    private $lastName;
    /** @var string */
    private $password;
    /** @var string */
    private $passwordConfirm;


    public function __construct($post)
    {
        parent::__construct();

        $this->email = $post['email'] ?? '';
        $this->firsName = $post['first_name'] ?? '';
        $this->lastName = $post['last_name'] ?? '';
        $this->password = $post['password'] ?? '';
        $this->passwordConfirm = $post['password_confirm'] ?? '';        
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $this->addMessage(array('email' => 'Debe ingresar un email válido'));
        } 
        else
        {
            $myUserRepo = new UserRepository;
            if ($myUserRepo->fetchByField('email', $this->email)) {
                $this->addMessage(array('email' => 'El mail ya se encuentra registrado'));
            }
        }

        if(trim($this->firsName) == '')
        {
            $this->addMessage(array('first_name' => 'Debe ingresar un nombre'));
        }

        if(trim($this->lastName) == '')
        {
            $this->addMessage(array('last_name' => 'Debe ingresar un apellido'));
        }


        if(strlen($this->password) < PASSWORD_MIN_LENGTH)
        {
            $this->addMessage(array('password' => 'La contraseña debe tener al menos ' . PASSWORD_MIN_LENGTH . ' caracteres'));
        }
        elseif($this->password != $this->passwordConfirm)
        {
            $this->addMessage(array('password_confirm' => 'La contraseña y su confirmación deben coincidir'));
        }

        return empty($this->getMessages());
    }

}