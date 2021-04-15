<?php

include 'Circle.php';
include 'Parallelogram.php';
include 'Triangl.php';

abstract class Figure
{
	const TYPE_CIRCLE = 'circle';
	const TYPE_PARALLELOGRAM = 'parallelogram';
	const TYPE_TRIANGL = 'triangl';

	public static function create ($type, $param1, $param2 = null) : Figure
	{
		switch($type) {
			case self::TYPE_CIRCLE: return new Circle($param1, $param2);
			case self::TYPE_PARALLELOGRAM: return new Parallelogram($param1);
			case self::TYPE_TRIANGL: return new Triangl($param1);
		}
	}
    abstract public function getArea(): float;
}

?>