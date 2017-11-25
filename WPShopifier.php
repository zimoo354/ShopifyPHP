<?php
class WPShopifier {
	private $url, $api_key, $password, $debug;
	/**
	 * WPShopifier constructor.
	 *
	 * @param $url
	 * @param $api_key
	 * @param $password
	 */
	public function WPShopifier($url, $api_key, $password, $debug = 0) {
		$this->setUrl($url);
		$this->setApiKey($api_key);
		$this->setPassword($password);
		$this->setDebug($debug);
	}

	/**
	 * @return mixed
	 */
	public function getDebug() {
		return $this->debug;
	}

	/**
	 * @param mixed $debug
	 */
	public function setDebug( $debug ) {
		$this->debug = $debug;
	}
	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword( $password ) {
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param mixed $url
	 */
	public function setUrl( $url ) {
		$this->url = $url . 'admin/';
	}

	/**
	 * @return mixed
	 */
	public function getApiKey() {
		return $this->api_key;
	}

	/**
	 * @param mixed $username
	 */
	public function setApiKey( $api_key ) {
		$this->username = $api_key;
	}

	/**
	 * @param $endpoint
	 *
	 * @return json
	 */
	public function curl($endpoint) {
		$url = $this->url . $endpoint;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if ($this->debug)
			print_r($url);
		else
			header('Content-Type: application/json');

		print_r($output);
	}
}

?>