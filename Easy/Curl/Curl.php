<?php
namespace Easy\Curl;
class Curl
{
	public function __construct()
	{
		$this->ckfile = tempnam ("/tmp", "CURLCOOKIE");
	}
	public function get($url)
	{
		$ch = curl_init ($url);

		curl_setopt ($ch, CURLOPT_COOKIEJAR, $this->ckfile);
		curl_setopt ($ch, CURLOPT_COOKIEFILE, $this->ckfile);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		return $r;
	}
	public function setCookie($name, $value)
	{

	}
}
?>