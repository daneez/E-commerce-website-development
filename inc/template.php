<?php


$contentExample = array(
	array(
		"name" => "First Product",
		"price" => "€24.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
	),
	array(
		"name" => "Second Product",
		"price" => "€64.99",
		"description" => "This is another description. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
	),
	array(
		"name" => "Third Product",
		"price" => "€74.99",
		"description" => "This is another description. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
	),
	array(
		"name" => "Fourth Product",
		"price" => "$19.99",
		"description" => "This is another description. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
	),
	array(
		"name" => "Fifth Product",
		"price" => "€12.99",
		"description" => "This is another description. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
	),
	array(
		"name" => "Sixth Product",
		"price" => "€84.99",
		"description" => "This is another description. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
	)
);


class Template{
	private $template;
	private $content;
	private $hasNext;
	private $noOfResults;

	public function __construct($template,$content){
		//Should validate arguments before we continue
		$this->load($template,$content);
	}

	public function __get($val){
		if($val=="hasNext"){
			return $this->$val;
		}
		else if($val=="noOfResults"){
			return $this->$val;
		}
		else{
			die("Cannot access private property Template::$val");
		}
	}
	public function output(){
		$record = current($this->content);
		$html = $this->template;

		//test case: $key = "name", $val = "First Product"

		foreach($record as $key=>$val){
			$html = str_replace("{".$key."}",$val,$html);
		}
		if(!next($this->content)){
			$this->hasNext = FALSE;
		}
		return $html;
	}

	public function load($template,$content){
		$this->template = file_get_contents("http://localhost/shawpify5/templates/$template",true);
		//$this->template = $template;
		$this->content = $content;
		$this->hasNext = TRUE;
		$this->noOfResults = sizeof($this->content);
	}
}
/*
$test = new Template("product_thumbnail.html",$contentExample);

while($test->hasNext){
	echo $test->output();
}*/