<?php

class Circle extends Figure
{
	private $radius;
	private $point1;

	public function __construct($point1, $radius)
	{
		$this->radius = $radius;
		$this->point1 = $point1;
	}

	public function getArea(): float
	{
		return pi() * pow($this->radius, 2);
	}

}

?>