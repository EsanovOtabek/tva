<?php 

/**
 * 
 */
class TextGears
{

	private $url="https://api.textgears.com/";

	private $api_key="";

	public $language="en-GB";

	
	public function __construct($api_key="DCPPfV4fxo0eyMKv")
	{
		$this->api_key=$api_key;
	}

	public function setLanguage($lang)
	{
		$this->language=$lang;
	}

	public function suggest($text)
	{
		$txt=explode(" ", $text);

		$str=implode("+", $txt);

		return $this->send("suggest",$str);
	}

	public function summarize($text)
	{
		$txt=explode(" ", $text);

		$str=implode("+", $txt);

		return $this->send("summarize",$str);
	}

	private function send($method,$text)
	{
		$json = file_get_contents($this->url.$method."?key=".$this->api_key."&text=".$text);

		return json_decode($json,true);
	}
}