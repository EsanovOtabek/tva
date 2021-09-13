<?php

class Router
{
	
	public $routes=[];

	public function add($path,$view,$params=[])
	{
		$path=rtrim($path,'/');

		$this->routes[$path]=[
			"view"=>$view,
			"data"=>$params,
		];
	}

	public function dispatch($url)
	{
		foreach ($this->routes as $path => $route) {
			$pattern=$this->createPattern($path);

			if (preg_match($pattern,$url,$params)) {
				$params=$this->clearParams($params);
				return $this->dispatcher($route,$params);
			}
		}

		http_response_code(404);
		return $this->dispatcher($this->routes['404']);
	}

	public function dispatcher($route=['view'=>'route'],$params=[]){
		if(!is_null($route)){
			$view=$route['view'];

			foreach ($route['data'] as $key => $value) {
				$$key = $value;
			}
		}else{
			$view="404";
		}

		try {
			$link='views/'.$view.".view.php";
			
			ob_start();
			include_once $link;
            $content = ob_get_clean();
            $route['data']['param']=$params;
            return ['content'=>$content, 'params'=> $route['data'], 'link'=>$link];

		} catch (Exception $e) {
			echo "VIEW topilmadi! <br>".$e->getMessage(); die();
		}
	}

	protected function createPattern($path)
	{
	    return "#^". preg_replace("#/:([^/]+)#", "/(?<$1>[^/]+)", $path) . "/?$#";
	}

	protected function clearParams($param)
	{
	    $result = [];
	    foreach ($param as $key => $value) {
	        if (!is_int($key)) {
	            $result[$key] = $this->filter($value);
	        }
	    }
	    return $result;
	}

	private function filter($str)
	{
		$s="";
		for ($i=0; $i <strlen($str) ; $i++) { 
			if($str[$i]=='?'||$str[$i]=='&'||$str[$i]=="'"||$str[$i]=='"')
				break;
			$s.=$str[$i];
		}
		return $s;
	}

}