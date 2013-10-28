<?php
namespace Easy\Curl;
class Curl
{
	public function __construct()
	{
		$this->ckfile = tempnam ("/tmp", "CURLCOOKIE");
	}
	private $cookie = array();
	public function addCookie($name, $value)
	{
		$this->cookie[$name]=$value;
	}
	public function get($url)
	{
		$ch = curl_init ($url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$cookie = array();
		foreach($this->cookie as $c => $v)
		{
			$cookie[] = $c."=".$v;
		}
		curl_setopt($ch, CURLOPT_COOKIE , implode("; ", $cookie));
		$r = curl_exec($ch);
		curl_close($ch);
		return $r;
	}
}
?>