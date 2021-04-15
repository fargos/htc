<?php
include '../classes/Figure.php';
include '../classes/Db.php';

$figure = Db::getAll();
$figure_arr = [];
$tmp = '';
$tnp2 = [];
foreach($figure as $item){
	if($item[0]['type'] == 'circle'){
		$radius_key = array_search('radius', array_column($item, 'data_type'));

		$tmp = Figure::create($item[0]['type'], 1, (int)$item[$radius_key]['point_id']);
		$figure_arr[] = [
			'name' => $item[0]['type'],
			'area' => $tmp->getArea()
			];
	}else{
		for($i = 0; $i < count($item); $i++){
			$tnp2[] = [
				'x' => $item[$i]['x'],
				'y' => $item[$i]['y'],
				];
		}
		$tmp = Figure::create($item[0]['type'], $tnp2);
		$figure_arr[] = [
			'name' => $item[0]['type'],
			'area' => $tmp->getArea()
			];
		$tmp2 = [];
	}

}

?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
  <script src="/assets/js/jquery-3.6.0.min.js"></script>
  <script src="/assets/js/main.js"></script>
 </head>
 <body>
 	<p>
 		<a href="/">Добавить</a>
 	</p>
	<table>
		<tr>
			<th>Тип</th>
			<th>Площадь</th>
		</tr>
	
		<?php foreach($figure_arr as $v): ?>
			<tr>
				<td>
					<?= $v['name'];?>
				</td>
				<td>
					<?= $v['area'];?>
				</td>
			</tr>
		<?php endforeach;?>
</table>
 </body>
</html>