<?php

namespace OfficeGuru\Entities;

use Lando\Token;

class Session
{
	const TYPE_LOGIN = 'login';
	const TYPE_RECOVERY = 'recovery';

	const DEFAULT_EXPIRATION_DATE = [
		self::TYPE_LOGIN => '+5 years',
		self::TYPE_RECOVERY =>'+5 minutes',
	];

	/** @var int */
	private $id_user;
	/** @var string */
	private $type;
	/** @var string */
	private $token;
	/** @var string */
	private $expirationDate;

	private function __construct(int $id_user, string $type, string $token, \DateTime $expirationDate = null)
	{
		$this->id_user = $id_user;
		$this->type = $type;
		$this->token = $token ? $token : Token::generate();
		$this->setExpirationDate($expirationDate);
	}

	static function login(int $id_user, string $token = '', \DateTime $expirationDate = null) 
	{
		return new Session($id_user, self::TYPE_LOGIN, $token, $expirationDate);
	}

	static function passwordRecover(int $id_user, string $token = '', \DateTime $expirationDate = null) 
	{
		return new Session($id_user, self::TYPE_RECOVERY, $token, $expirationDate);
	}

	private function setExpirationDate($date)
	{
		if(!$date)
		{
			$date = new \DateTime("now");
			$date->modify(self::DEFAULT_EXPIRATION_DATE[$this->type]);
		}
		$this->expirationDate = $date->format('Y-m-d H:i:s');	
	}
}