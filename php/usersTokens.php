<?php
Class UsersTokens {
	const USERS_TOKENS_FILE = __DIR__ . '/../data/usersTokens.json';
	
	private $userId;
	private $token;
	private $expitationDate;

	public function generate()
	{
		$this->userId = $userId;
		$this->token = $this->getToken();
		$date = new DateTime("now");
		$this->expitationDate = $date->format('Y-m-d H:i:s');

		$this->addToken();

		return $this->token;
	}

	public function findByField($field, $value)
	{
	    // @var array $users
	    $tokens = $this->listTokens();

	    foreach ($tokens as $token) 
	    {
	        if ($token[$field] == $value) {
	            return $token;
	        }
	    }

	    return false;
	}

	private function addToken()
	{
		// Sólo puede haber un token activo por usuario
		$this->deleteToken();

        $newToken = [
        	'userId' => $this->userId,
			'token' => $this->token,
			'expitationDate' => $this->expitationDate,
        ];

	    // @var array $tokens
	    $tokens = $this->listTokens();

	    $tokens[] = $newToken;

        $this->saveUsersTokenFile($tokens);
	}

	private function deleteToken()
	{
	    // @var array $tokens
	    $tokens = $this->listTokens();

	    foreach ($tokens as $key => $token) {
	        if ($token['userId'] == $userId) {
	            unset($tokens[$key]);
	            $this->saveUsersTokenFile($tokens);
	        }
	    }
	}

	private function listTokens()
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

	/* https://stackoverflow.com/questions/3290283/what-is-a-good-way-to-produce-a-random-site-salt-to-be-used-in-creating-passwo/3291689#3291689 */
	private function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
	}

	private function getToken($length=32){
	    $token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet.= "0123456789";
	    for($i=0;$i<$length;$i++){
	        $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
	    }
	    return $token;
	}
}