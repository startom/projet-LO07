<?php session_start(); ?>
<!DOCTYPE html>
<html onmouseup='released();'>
	<head>
		<meta charset="utf-8" />
		<script type="text/javascript" src="form2.js"> </script>
        <link rel="stylesheet" href="form.css" />
		<title>test formulaire</title>
	</head>

	<body>
		<form method="post" action="traitement_dispo.php">
			<label for="recur">Récurrence ?</label> <input type="checkbox" name="recur" id="recur" onclick="formu_date();" /> 

			<div id="date">
				<label for="date1">Date : </label><input type="date" name="date1" id="date1" />
			</div>

			<div class="horizontal">
			<?php
				$int_m = 0;
				$int_h = 1;

				$jours = array ('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');

				for($i = 1;$i <= 7;$i++)
				{
					$j = 0;
					$minute = 0;

					echo '<div class=\'vertical\'>';

					while($minute < 1440)
					{
						if(!$j)
							echo '<p>'.$jours[$i-1].'</p>';
						else
						{
							$value = intdiv($minute, 60).'h'.sprintf("%02d",$minute%60).' - ';

							$minute += $int_m + $int_h*60;
							if($minute > 1440)
								$minute = 1440;

							$value .= intdiv($minute, 60).'h'.sprintf("%02d",$minute%60);

							echo '<input type=\'button\' value=\''.$value.'\' id=\''.$i.'-'.$j.'\' onmousedown=\'pressed('.$i.','.$j.');\' onmouseover=\'hovered('.$i.','.$j.');\'>';
							echo '<input type=\'hidden\' name=\''.$i.'-'.$j.'\' id=\'h'.$i.'-'.$j.'\' value=\'0\'>';
						}
						$j++;
					}
					
					$j--;
					$tmp = $int_h*60 + $int_m;

					echo '<input type=\'hidden\' name=\'intervalle\' value=\''.$tmp.'\'>';

					echo '
						<script type="text/javascript">
							setup(7,'.$j.');
						</script>
					';

					echo '</div>';
				}
			?>
			</div>
			<input type="submit" name="Confirmer">
		</form>
	</body>
</html>