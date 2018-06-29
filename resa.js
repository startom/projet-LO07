var tableau;
var phase = 0;

var pressedx;
var pressedy;

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
		for (var x = 0; x <  tableau.length; x++) {
			for (var y = 0; y < tableau[0].length; y++) {
				if(!document.getElementById(x+'-'+y).disabled)
				{
					if(x == pressedx && y>= Math.min(j,pressedy) && y<= Math.max(j,pressedy))
					{
						if(phase == 1)
						{
							for(z = 0; z < tableau.length; z++) 
								tableau[z][y] = -1;
							tableau[x][y] = 2;
						}
						else if(phase == -1)
						{
							tableau[x][y] = -2;
						}
					}
					else if(tableau[x][y] == -2 || tableau[x][y] == 2)
						tableau[x][y] = -1;
				}
			}
		}
		update();
	}
}

function pressed(i,j)
{
	if(!document.getElementById(i+'-'+j).disabled)
	{
		if(tableau[i][j]>0)
		{
			phase = -1;
		}
		else
		{
			phase = 1;
		}

		pressedx = i;
		pressedy = j;

		hovered(i,j);
	}
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
	for (var x = 0; x < tableau.length; x++) {
		for (var y = 0; y < tableau[0].length; y++) {
			var button = document.getElementById(x+'-'+y);
			var hidden = document.getElementById('h'+x+'-'+y);
			var hidden2 = document.getElementById(y);

			if(!document.getElementById(x+'-'+y).disabled)
			{
				if(tableau[x][y] > 0)
				{
					button.style.backgroundColor = 'rgba(160,160,0,0.6)';
					hidden2.value = hidden.value;
				}
				else
				{
					button.style.backgroundColor = 'rgba(160,160,160,0.5)';
					hidden2.value = 0;
				}
			}
		}
	}
}