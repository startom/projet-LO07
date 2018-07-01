function clicked(i){
	for(var j = 1; j<6; j++){
		var img=document.getElementById('img'+j);
		if(j>i){
			img.src='grey.png';
		}
		else
			img.src='couleur.png';
	}
	document.getElementById('note').value=i;
}