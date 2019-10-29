function calcular(alerta){
	let n1 = document.dados.amplitude;
	let n2 = document.dados.intervalo;

	if(validar(n1, "alerta1", "label1") & validar(n2, "alerta2", "label2")){
		let m = Math.log10(parseFloat(n1.value)) + (3 * (Math.log10(8 * parseFloat(n2.value)))) - 2.92;

		document.dados.mag.value = m.toFixed(1);

		if(m < 3.5){
			document.getElementById("alerta3").style.display = "block";
		}
		else if(m >= 3.5 && m <= 5.4){
			document.getElementById("alerta4").style.display = "block";
		}
		else if(m > 5.4 && m <= 6.0){
			document.getElementById("alerta5").style.display = "block";
		}
		else if(m > 6.0 && m < 6.9){
			document.getElementById("alerta6").style.display = "block";
		}
		else if(m > 6.9 && m < 7.9){
			document.getElementById("alerta7").style.display = "block";
		}
		else{
			document.getElementById("alerta8").style.display = "block";
		}
	}
}

function validar(campo, alerta, label){
	let n = campo.value;

	if(n.length == 0){
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

function limpar(campo){
	window.location.reload();
}