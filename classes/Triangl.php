<?php

class Triangl extends Figure
{
	private $point1;
	private $point2;
	private $point3;

	public function __construct($params)
	{
		$this->point1 = $params[0];
		$this->point2 = $params[1];
		$this->point3 = $params[2];
	}

	public function getArea(): float
	{
		
		$AB = sqrt(pow($this->point1['x'] - $this->point2['x'], 2) + pow($this->point1['y'] - $this->point2['y'], 2));
		$BC = sqrt(pow($this->point2['x'] - $this->point3['x'], 2) + pow($this->point2['y'] - $this->point3['y'], 2));
		$CA = sqrt(pow($this->point3['x'] - $this->point1['x'], 2) + pow($this->point3['y'] - $this->point1['y'], 2));

		$P = ($AB + $BC + $CA) / 2.0;
		$S = sqrt(($P - $AB) * ($P - $BC) * ($P - $CA) * $P);

		return $S;
	}
}

?>