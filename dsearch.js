function getData(pForm){
	var xhttp = new XMLHttpRequest();
	xhttp.onload = function(){
		document.getElementById("result").innerHTML = this.responseText;
	}
	xhttp.open("GET", pForm.action + "?bloodgroup" + pForm.bloodgroup.value, true);
    xhttp.send();

}