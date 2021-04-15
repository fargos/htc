<?php
include 'classes/Figure.php';
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
     <p><a href="/views/db.php">Таблица</a></p>
    <div id="form">
        <form id="figure_data" method="post">
            <p id="lab"><b>Заполните форму</b></p>
            <label>
                Тип фигуры
                <select name="type" id="type_figure">
                    <option disabled selected style="display:none"></option>
                    <option value="<?= Figure::TYPE_CIRCLE ?>">Круг</option>
                    <option value="<?= Figure::TYPE_TRIANGL ?>">Треугольник</option>
                    <option value="<?= Figure::TYPE_PARALLELOGRAM ?>">Параллелограмм</option>
                </select>
            </label>
            <br />
            <div id="params">
             
            </div>
            <br />
            <input id="send" type="button" value="Добавить">
        </form>
    </div>
 </body>
</html>