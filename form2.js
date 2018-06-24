var tableau;
var phase = 0;
var pressedx;
var pressedy;

var date = 0;

function setup(i,j)
{
	tableau = new Array();
	for (var x = 0; x < i; x++) {
		tableau[x] = new Array();
		for (var y = 0; y < j; y++) {
			tableau[x][y] = -1;
		}
	}
}

function hovered(i,j)
{
	if(phase)
	{
		$tmp1 = pressedx*tableau[0].length+pressedy;
		$tmp2 = (i-1)*tableau[0].length+(j-1);

		for (var x = 0; x <  tableau.length; x++) {
			for (var y = 0; y < tableau[0].length; y++) {
				if((x*tableau[0].length+y >= Math.min($tmp1,$tmp2)) && (x*tableau[0].length+y <= Math.max($tmp1,$tmp2)))
				{
					if(phase == 1)
						tableau[x][y] = 2;
					else if(phase == -1)
					{
						tableau[x][y] = -2;
					}
				}
				else if(tableau[x][y] == -2 || tableau[x][y] == 2)
					tableau[x][y] = -1;
			}
		}
		update();
	}
}

function pressed(i,j)
{
	if(tableau[i-1][j-1]>0)
	{
		phase = -1;
	}
	else
	{
		phase = 1;
	}

	pressedx = i-1;
	pressedy = j-1;

	hovered(i,j);
}

function released()
{
	phase = 0;

	for (var x = 0; x < tableau.length; x++) {
		for (var y = 0; y < tableau[0].length; y++) {
			if(tableau[x][y] == -2)
				tableau[x][y] = -1;
			else if(tableau[x][y] == 2)
				tableau[x][y] = 1;
		}
	}
}

function update()
{
	for (var x = 1; x <= tableau.length; x++) {
		for (var y = 1; y <= tableau[0].length; y++) {
			var button = document.getElementById(x+'-'+y);
			var hidden = document.getElementById('h'+x+'-'+y);
			if(tableau[x-1][y-1] > 0)
			{
				button.style.backgroundColor = 'rgba(160,160,0,0.6)';
				hidden.value = 1;
			}
			else
			{
				button.style.backgroundColor = 'rgba(160,160,160,0.5)';
				hidden.value = 0;
			}
		}
	}
}

function formu_date()
{
	var div = document.getElementById('date');
	var date1 = document.getElementById('date1').value;
	if(date)
		div.innerHTML = '<label for="date1">Date : </label><input type="date" name="date1" id="date1" />';
	else
		div.innerHTML = '<label for="date1">Date de début : </label><input type="date" name="date1" id="date1" />  <label for="date2">Date de fin : </label><input type="date" name="date2" id="date2" />';
	document.getElementById('date1').value = date1;

	date = (date+1)%2;
}