var corredor = [];
var maxCorredor = 0;
function inserir(idTabela) {
	let n1 = document.dados.largada;
	let n2 = document.dados.nome;
	let n3 = document.dados.tempo;

	if(maxCorredor > 5){
		document.getElementById('button1').disabled = true;

		window.alert("São permitidos no máximo 6 competidores");

		return false;
	}

	if(validar(n1, "alerta1", "label1") & validar(n2, "alerta2", "label2") & validar(n3, "alerta3", "label3")){
		var novaLinha = document.createElement('tr');
		
		novaLinha.insertCell(0).innerHTML = document.getElementsByName('largada')[0].value;
		novaLinha.insertCell(1).innerHTML = document.getElementsByName('nome')[0].value;
		novaLinha.insertCell(2).innerHTML = document.getElementsByName('tempo')[0].value;
		

		document.getElementById(idTabela).appendChild(novaLinha);

		maxCorredor++;

		corredor.push({
			largada: document.getElementsByName('largada')[0].value,
			nome: document.getElementsByName('nome')[0].value,
			tempo:document.getElementsByName('tempo')[0].value,
			final:"",
			resultado:""
		})

		dados.reset();
		largada.focus();
	}
}

function ordena(){
	document.getElementById("tabelaResultado").style.display = "table"
	document.getElementById("p").style.display = "none"
	document.getElementById("div1").style.display = "none"
	document.getElementById("div2").style.display = "none"
	document.getElementById("div3").style.display = "none"
	document.getElementById("div4").style.display = "none"
	document.getElementById("a").style.display = "block"

	corredor.sort((a, b) => parseFloat(a.tempo) - parseFloat(b.tempo));

	corredor.map((element, index) => {
		if(index == 0){
			element.resultado = 'Vencedor!'
		}
		element.final = index + 1;
	})

	console.log(corredor);

	for(let i = 0; i < corredor.length; i++){
		var novaLinha = document.createElement('tr');
		
		novaLinha.insertCell(0).innerHTML = corredor[i].final;
		novaLinha.insertCell(1).innerHTML = corredor[i].largada;
		novaLinha.insertCell(2).innerHTML = corredor[i].nome;
		novaLinha.insertCell(3).innerHTML = corredor[i].tempo;
		novaLinha.insertCell(4).innerHTML = corredor[i].resultado;

		document.getElementById('dadosResultado').appendChild(novaLinha);
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