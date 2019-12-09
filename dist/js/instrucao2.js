function abrirPagd(valor){

	var url = valor;
	
	xmlRequest.open("GET",url,true);
	
	xmlRequest.onreadystatechange = mudancaEstadodentro;
	
	xmlRequest.send(null);
	
		if (xmlRequest.readyState == 1) {
		
		document.getElementById("dados_alunos2").innerHTML = "<img src='loader.gif'>" ;
		
		}
	
	return url;
	
}

function mudancaEstadodentro(){

	if (xmlRequest.readyState == 4){
	
	document.getElementById("dados_alunos2").innerHTML = xmlRequest.responseText;
	
	}

}