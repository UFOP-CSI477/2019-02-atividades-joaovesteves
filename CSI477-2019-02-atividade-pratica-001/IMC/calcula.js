function validar(campo, alerta, label){
	let n = campo.value;

	if(n.length == 0 || isNaN(parseFloat(n))){
		//Erro

		//Exibir alerta
		document.getElementById(alerta).style.display = "block";

		//Reporte o campo como invalido
		campo.classList.add("is-invalid");

		//Reportar o label como invalido
		document.getElementById(label).classList.add("text-danger");

		//Finalizar
		campo.value = "";
		campo.focus();
		return false
	}		

	//Tudo correto
	document.getElementById(alerta).style.display = "none"
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid");

	document.getElementById(label).classList.remove("text-danger");

	document.getElementById(label).classList.add("text-success");
		return true;
}

function calcular(){
	let n1 = document.dados.peso;
	let n2 = document.dados.altura;

	if (validar(n1, "alerta1", "peso") && validar(n2, "alerta2", "altura")){
		let res = parseFloat(n1.value) / (parseFloat(n2.value) * parseFloat(n2.value))

		document.dados.imc.value = res.toFixed(1);

		let min = (parseFloat(n2.value) * parseFloat(n2.value)) * 18.5
		let max = (parseFloat(n2.value) * parseFloat(n2.value)) * 24.9

		if(res < 18.5){
			document.dados.classificação.value = "Subnutrição";
			document.dados.pesoIdeal.value = "" + (min.toFixed(1)) + "kg até " + (max.toFixed(1)) + "kg.";
		}
		else if(res > 18.5 && res < 24.9){
			document.dados.classificação.value = "Saudável";
			document.dados.pesoIdeal.value = "" + (min.toFixed(1)) + "kg até " + (max.toFixed(1)) + "kg.";
		}
		else if(res > 25.0 && res < 29.9){
			document.dados.classificação.value = "Sobrepeso";
			document.dados.pesoIdeal.value = "" + (min.toFixed(1)) + "kg até " + (max.toFixed(1)) + "kg.";
		}
		else if(res > 30.0 && res < 34.9){
			document.dados.classificação.value = "Obesidade grau 1";
			document.dados.pesoIdeal.value = "" + (min.toFixed(1)) + "kg até " + (max.toFixed(1)) + "kg.";
		}
		else if(res > 35.0 && res < 39.9){
			document.dados.classificação.value = "Obesidade grau 2";
			document.dados.pesoIdeal.value = "" + (min.toFixed(1)) + "kg até " + (max.toFixed(1)) + "kg.";
		}
		else{
			document.dados.classificação.value = "Obesidade grau 3";
			document.dados.pesoIdeal.value = "" + (min.toFixed(1)) + "kg até " + (max.toFixed(1)) + "kg.";
		}
	}	
}
