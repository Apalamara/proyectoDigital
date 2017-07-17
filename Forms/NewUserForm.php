<?php
namespace OfficeGuru\Forms

class NewUserForm
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
    /** @var array */
    private $messages;


    public function __construct($post)
    {
        $this->email = $post['email'] ?? '';
        $this->firsName = $post['first_name'] ?? '';
        $this->lastName = $post['last_name'] ?? '';
        $this->password = $post['password'] ?? '';
        $this->passwordConfirm = $post['password_confirm'] ?? '';
        $this->messages = [];
    }

    /**
     * @return boolean
     */
    public function isValid() :boolean
    {
        $this->messages = [];
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $this->messages['email'] = 'Debe ingresar un email válido';
        } 
        /*
        Requires repository
        
        elseif (findByField('email', $this->email))
        {
            $this->messages['email']  = 'El mail está duplicado';
        }
        */
        if(trim($this->firsName) == '')
        {
            $this->messages['first_name'] = 'Debe ingresar un nombre';
        }

        if(trim($this->lastName) == '')
        {
            $this->messages['last_name'] = 'Debe ingresar un apellido';
        }


        if(strlen($this->password) < PASSWORD_MIN_LENGTH)
        {
            $this->messages['password'] = 'La contraseña debe tener al menos ' . PASSWORD_MIN_LENGTH . ' caracteres';
        }
        elseif($this->password != $this->passwordConfirm)
        {
            $this->messages['password_confirm'] = 'La contraseña y su confirmacióm deben coincidir';
        }

        return empty($messages);
    }

    /**
     * @return array 
     */
    public function getMessages() {
        return $this->messages;
    }
}