<?php

class Db
{
	public static $dbh = null;

	public static function getDbh()
	{
		if (!self::$dbh) {
			try {
				self::$dbh = new PDO('sqlite:'. $_SERVER['DOCUMENT_ROOT']. '/figure.db');
			}
			catch (PDOException $e) {
				exit('Error connecting to database: ' . $e->getMessage());
			}
		}
		return self::$dbh;
	}

	public static function add($data)
	{

		$figures_sql = "INSERT INTO figures (type) VALUES (?)";
		$figures = self::getDbh()->prepare($figures_sql);
		$figures->execute([$data['type']]);
		$figures_id = self::getDbh()->lastInsertId();
		$points_sql =  "INSERT INTO points (x, y) VALUES (?, ?)";
		$points = self::getDbh()->prepare($points_sql);
		$params_sql =  "INSERT INTO params (figure_id, type, point_id) VALUES (?, ?, ?)";
		$params= self::getDbh()->prepare($params_sql);

		foreach($data['points'] as $p)
		{
			$i = 1;
			$points->execute([$p['x'],$p['y']]);
			$points_id = self::getDbh()->lastInsertId();
			$param_t = $data['radius'] ? 'center' : 'point'.$i;
			$params->execute([$figures_id, $param_t, $points_id]);
			$i++;
		}

		if($data['radius']){
			$params->execute([$figures_id, 'radius', $data['radius']]);
		}
	}

	public static function getAll()
	{
		$sql = "SELECT figures.id, figures.type, points.x, points.y, params.point_id, params.type as data_type
		FROM figures
		INNER JOIN params ON figures.id = params.figure_id
		LEFT JOIN points ON params.point_id = points.id";
		$result = self::getDbh()->query($sql);
		$figure = $result->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);

		return $figure;

	}
}

?>