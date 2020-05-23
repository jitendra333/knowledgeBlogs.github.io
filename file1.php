<?php

class student{

	private $sname,$sroll;

	function getData($name,$roll){
		$this->sname = $name;
		$this->sroll=$roll;
	}

	function showData(){
		echo "<br>Name -".$this->sname."Roll no.".$this->sroll;
	}

}

$student1 = new Student();
$student1->getData("purvik",1);
$student1->showData();
$student2 = new Student();
$student2->getData("jitendra",3);
$student2->showData();
?>