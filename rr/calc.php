<!DOCTYPE html>
<html>
<head>
	<title>Расчёт уборки</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/clearing.css" />
</head>
<body>
<div style="margin-top: 10px;">
	Выберите тип помещения
	<select name="area" id="area_id" class="btn btn-primary" style="margin-left: 10px;">
		<option >Квартира</option>
		<option >Коттедж</option>
		<option >Офис</option>
		<option >Производственное помещение</option>
		<option >Магазин</option>
		<option >Торговый центр</option>
	</select>
	</div>
<div style="margin-top: 10px;">
	Выберите вид уборки <select name="type_clean" id="type_clean" class="btn btn-primary" style="margin-left: 10px;">
		<option >После строительных работ</option>
		<option >Уборка 1 раз в день</option>
		<option >Уборка 2 раз в день</option>
		<option >Поддерживающая уборка</option>
	</select>
</div>
	<br>
	Площадь помещения <input onchange="calculate()" type="text" name="value" style="width: 70px;" />кв. м.
	<br>
	Помещение за пределами МКАД <input type="checkbox" id="mkad" onclick="show_dist()" />
	<input  type="text"  id="dist" name="dist" style="width: 70px; display: none;" />
	<div>
	Мытьё окон <input type="checkbox" onclick="show(id, 'winds')" id="need_window"  />
	</div>
	<div style="display: block; border: 0px solid #CBC192;height: 373px; width: 557px; " id="winds">
	<?php
		for ($i=1; $i <= 6; $i++)
		{
			echo "<div id='win_" . $i . "'  class='pict' style='display: none;' >";
			echo "<div style='margin-bottom: 5px;'><span id='minus' onclick='plus(\"val_" . $i . "\", \"minus\")' class='min'>-</span>";
			echo "<input value='0' id='val_" . $i . "' style='width:20px; text-align:center;'></input>";
			echo "<span id='plus' onclick='plus(\"val_" . $i . "\", \"plus\")' class='min'>+</span></div>";
			echo "<img src='win_0" . $i . ".jpg' style='height: 80px;'><br> ";
			switch ($i) {
				case 1:
					echo "Одностворчатое стандартное окно";
					break;
				case 2:
					echo "Двухстворчатое стандартное окно";
					break;
				case 3:
					echo "Трёхстворчатое стандартное окно";
					break;
				case 4:
					echo "Мойка лоджий и балконов";
					break;
				case 5:
					echo "Мойка оконного блока";
					break;
				case 6:
					echo "Балконное остекление";
					break;
			}
			echo "</div>";
		}

	?>
	</div>
	<div style="position: ">
	Химчистка мебели<input type="checkbox" onclick="show(id, 'chemi')" id="need_chemi"  />
	</div>
	<div style="display: block; border: 0px solid #CBC192;height: 572px; width: 840px;" id="chemi">
	<?php
		for ($i=1; $i <= 12; $i++)
		{
			echo "<div id='chemi_" . $i . "'  class='pict' style='display: none;' >";
			echo "<div style='margin-bottom: 5px;'><span id='chemi_minus' onclick='plus(\"chemis_" . $i . "\", \"minus\")' class='min'>-</span>";
			echo "<input value='0' id='chemis_" . $i . "' style='width:20px; text-align:center;'></input>";
			echo "<span id='chemi_plus' onclick='plus(\"chemis_" . $i . "\", \"plus\")' class='min'>+</span></div>";
			echo "<img src='chemi_" . $i . ".png' style='height: 100px;'><br></div> ";
		}

	?>

</div>

	<span id='res_count' class="calc_res_cont"></span>
</body>
</html>


<script type="text/javascript">
		function show_dist()
		{
			var mkad = document.getElementById('mkad').checked;
			if(mkad) document.getElementById('dist').style.display = '';
			else document.getElementById('dist').style.display = 'none';
		}

		function show(e, entity)
		{
			var entity = document.getElementById(entity);
			var need_show = document.getElementById(e).checked;
			var elems = entity.getElementsByTagName('div');
			for (var i = 0; i < elems.length; i++)
			{
				if(need_show == true) elems[i].style.display = '';
				else elems[i].style.display = 'none';
			}
		}


		function plus(e, ee)
		{
			var val = e;
			var movie = ee;
			var kol = 0;
			kol = document.getElementById(val).value;

			if(movie == 'plus') kol++;
			else
				if(kol > 0) kol--;
			document.getElementById(val).value = kol;

		}

		function calculate()
		{
			console.log(document.getElementById('res_count').style.display);
			var res_count = document.getElementById('res_count');
			document.getElementById('res_count').style.display = '';
			console.log(document.getElementById('res_count').style.display);
			res_count.innerHTML = 'Общая стоимость ';
		}

</script>