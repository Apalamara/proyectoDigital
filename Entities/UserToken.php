<?php

namespace OfficeGuru\Entities;

use OfficeGuru\Entities\Token;

class UserToken
{
	const DEFAULT_EXPIRATION_TIME = '+5 minutes';
	
	/** @var int */
	private $userId;
	/** @var string */
	private $token;
	/** @var string */
	private $expitationDate;

	public function __construct() {}
}