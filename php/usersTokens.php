<?php
require_once('token.php');

Class UsersTokens {
	const USERS_TOKENS_FILE = __DIR__ . '/../data/usersTokens.json';

	/* @var string - relative date/time format */
	const DEFAULT_EXPIRATION_TIME = '+5 minutes';
	
	private $userId;
	private $token;
	private $expitationDate;

	public function __construct(int $userId) {
		$this->userId = $userId;
	}

	public function generate() :string
	{
		$token = new Token;
		$this->token = $token->generate();

		$date = new DateTime("now");
		$date->modify(self::DEFAULT_EXPIRATION_TIME);
		$this->expitationDate = $date->format('Y-m-d H:i:s');

		$this->save();

		return $this->token;
	}


	private function save()
	{
		// Sólo puede haber un token activo por usuario
		$this->deleteByUserId($this->userId);

        $newToken = [
        	'userId' => $this->userId,
			'token' => $this->token,
			'expitationDate' => $this->expitationDate,
        ];

	    // @var array $tokens
	    $tokens = $this->list();

	    $tokens[] = $newToken;

        $this->saveUsersTokenFile($tokens);
	}

	public static function findByField($field, $value)
	{
	    /* @var array $users */
	    $tokens = self::list();

	    foreach ($tokens as $token) 
	    {
	        if ($token[$field] == $value) {
	            return $token;
	        }
	    }

	    return false;
	}

	private function deleteByUserId($userId)
	{
	    // @var array $tokens
	    $tokens = $this->list();

	    foreach ($tokens as $key => $token) {
	        if ($token['userId'] == $userId) {
	            unset($tokens[$key]);
	            $this->saveUsersTokenFile($tokens);
	        }
	    }
	}

	private function list()
	{

	    if (!file_exists(self::USERS_TOKENS_FILE))
	    {
	        $this->saveUsersTokenFile();
	    }

	    $tokens = file_get_contents(self::USERS_TOKENS_FILE);

	    $tokens = json_decode($tokens, true);

	    return $tokens['tokens'];
	}

	private	function saveUsersTokenFile(array $tokens = [])
	{
	    $content = [
	        'tokens' => $tokens
	    ];

	    file_put_contents(self::USERS_TOKENS_FILE, json_encode($content));
	}
}