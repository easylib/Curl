<?php
namespace Easy\Curl;
class Curl
{
	public function __construct()
	{
		$this->ckfile = tempnam ("/tmp", "CURLCOOKIE");
	}
	public function get($url, $getCookie=false)
	{
		$ch = curl_init ($url);
		if($getCookie)
		{
			curl_setopt ($ch, CURLOPT_COOKIEJAR, $this->ckfile);
		}
		curl_setopt ($ch, CURLOPT_COOKIEFILE, $this->ckfile);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		return curl_exec($ch);
	}
	public function setCookie($name, $value)
	{

	}
}
?>