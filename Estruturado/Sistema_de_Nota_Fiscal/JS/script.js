//Função q muda fundo de botões
function changeBack(btn) {
  var btn2 = document.getElementById(`${btn}`);
  btn2.style.backgroundColor = "#333";
  btn2.style.color = "white";
}
//Funcão que volta o botão
function ChangeAgain(btn) {
  var btn3 = document.getElementById(`${btn}`);
  btn3.style.backgroundColor = "white";
  btn3.style.color = "#333";
}
function abrirTAB(idTAB) {
  var conteudos = document.getElementsByClassName("conteudo");
  for (var i = 0; i < conteudos.length; i++) {
    conteudos[i].style.display = "none";
  }
  document.getElementById(idTAB).style.display = "block";
}
//Função para salvar dados do Remetente
function SaveRemetente(idTAB) {
  var Nnota = document.getElementById("labelNnota").textContent;
  var Name = document.getElementById("RazaoSocial").value;
  var Cpf = document.getElementById("CNPJ").value;
  var Endereço = document.getElementById("Endereço").value;
  var Bairro = document.getElementById("Bairro").value;
  var Municipio = document.getElementById("Municipio").value;
  var CEP = document.getElementById("CEP").value;
  var Telefone = document.getElementById("Telefone").value;
  var Estado = document.getElementById("Estado").value;
  var ArrayDadosRemet = {
    Nome: Name,
    Cpf: Cpf,
    Endereço: Endereço,
    Bairro: Bairro,
    Municipio: Municipio,
    CEP: CEP,
    Telefone: Telefone,
    Estado: Estado,
  };
  var arrayString = JSON.stringify(ArrayDadosRemet);
  var idkey = `${Nnota}-Personal`;
  localStorage.setItem(idkey, arrayString);
  abrirTAB(idTAB);
}
//Função salvar dados do DANFE
function SaveDANFE(){
  var Nnota1 = document.getElementById("labelNnota").textContent;
  //gambiarra para ver qual radiobutton ta marcado(mds do ceu)
  var EntradaOuSaida = "";
  var entrada = document.getElementById('entrada');
  var saida = document.getElementById('saida');
  if(entrada.checked){
    EntradaOuSaida = "entrada";
  }else if(saida.checked){
    EntradaOuSaida = "Saida";
  }
  //________________________________________________________________
  var NumeroNota = document.getElementById("labelNnota").textContent;
  var SerieNota = document.getElementById("labelNserie").textContent;
  var FolhaNota = document.getElementById("folha");
  var foia = FolhaNota.value;
  var data = document.getElementById('data').textContent;
  var hora = document.getElementById('hora').textContent;
  var ArrayDadosDanfe = {
    EntradaOuSaida: EntradaOuSaida,
    NumeroNota: NumeroNota,
    SerieNota: SerieNota,
    FolhaNota: foia,
    data:data,
    hora:hora,
  };
  var arrayString2 = JSON.stringify(ArrayDadosDanfe);
  var idkey2 = `${Nnota1}-Danfe`;
  localStorage.setItem(idkey2, arrayString2);
}
//Função Para Salvar dados do Destinatário:
function SaveDestiny(idTAB) {
  var Nnota2 = document.getElementById("labelNnota").textContent;
  var DestName = document.getElementById("NameDest").value;
  var DestCPF = document.getElementById("CNPJdest").value;
  var DestAddress = document.getElementById("EndereçoDest").value;
  var DestNeighborhood = document.getElementById("BairroDest").value;
  var DestCity = document.getElementById("MunicipioDest").value;
  var DestPhone = document.getElementById("TelefoneDest").value;
  var DestUF = document.getElementById("EstadoDest").value;
  var DestCEP = document.getElementById("CEPDest").value;
  var ArrayDadosDestiny = {
    NomeDestinatario: DestName,
    CPFDestinatario: DestCPF,
    EnderecoDestinatario: DestAddress,
    BairroDestinatario: DestNeighborhood,
    MunicipioDestinatario: DestCity,
    TelefoneDestinatario: DestCity,
    InscricaoEstadual: DestUF,
    CEPDestinatario: DestCEP,
  };
  var arrayString3 = JSON.stringify(ArrayDadosDestiny);
  var idkey3 = `${Nnota2}-Destinatario`;
  localStorage.setItem(idkey3, arrayString3);
  abrirTAB(idTAB);
}
//Função para Salvar dados do Transportador:
function SaveTransport(idTAB) {
  var Nnota3 = document.getElementById("labelNnota").textContent;
  var TransportName = document.getElementById("TransportName").value;
  var TransportResponsibility = document.getElementById("FreteConta").value;
  var TransportCNPJ = document.getElementById("CNPJTransport").value;
  var TransportAddress = document.getElementById("TransportAddress").value;
  var TransportDistrict = document.getElementById("TransportDistrict").value;
  var TransportCity = document.getElementById("TransportCity").value;
  var TransportPhone = document.getElementById("TransportPhone").value;
  var TransportUF = document.getElementById("TransportUF").value;
  var TransportPrice = document.getElementById("FreteValor").value;
  var TransportWeight = document.getElementById("TransportWeight").value;
  var ArrayDadosTrans = {
    NomeTransport: TransportName,
    ResponsabTransport: TransportResponsibility,
    CNPJTransport: TransportCNPJ,
    EnderecoTransport: TransportAddress,
    TransportDistrict: TransportDistrict,
    TransportMunicipío: TransportCity,
    TelefoneTransport: TransportPhone,
    InscriçãoEstadual: TransportUF,
    ValorDoFrete: TransportPrice,
    PesoBruto: TransportWeight,
  };
  var arrayString4 = JSON.stringify(ArrayDadosTrans);
  var idkey4 = `${Nnota3}-Transport`;
  localStorage.setItem(idkey4, arrayString4);
  abrirTAB(idTAB);
}

function SaveData(){
  var Nnota4 = document.getElementById("labelNnota").textContent;
  var ProductCode = document.getElementById("Codigo").value;
  var ProductDescription = document.getElementById("Produto").value;
  var ProductAmount = document.getElementById("Qtd").value;
  var ProductPrice = document.getElementById("Unit").value;
  var ProductTotal = document.getElementById("valorTotal").textContent;
  var ArrayDadosData = {
    CodigoProduto: ProductCode,
    DescricaoProduto: ProductDescription,
    QuantidadeProduto: ProductAmount,
    ValorUnit: ProductPrice,
    ValorTotal: ProductTotal,
  };
  var arrayString5 = JSON.stringify(ArrayDadosData);
  var idkey5 = `${Nnota4}-Data`;
  localStorage.setItem(idkey5, arrayString5);
}
//Função que adiciona produtos na Table:
function addTable(){
  //--------------------------------------------------------
  var produtoCode = document.getElementById('Codigo').value;
  var produtoName = document.getElementById('Produto').value;
  var produtoQtd = document.getElementById('Qtd').value;
  var valorUnit = document.getElementById('Unit').value;
  if(produtoCode != "" && produtoName != "" && produtoQtd != "" && valorUnit != ""){
    var valorTotal = calcularTotal();
    var totalFix = valorTotal.toFixed(2);
    var totalVirgula = trocaPonto(totalFix);
    var tabela1 = document.getElementById('Tabela1');
  
    var TableLine = `<tr style="Color:white;"><td>${produtoCode}</td><td>${produtoName}</td><td>${produtoQtd}</td><td>R$${valorUnit}</td><td>R$${totalVirgula}</td><td><button style="width: 80px; background-color: rgb(255, 50, 50); border: none;color: white; border-radius: 10px; " onclick="excluirLinha(this)">Excluir</button></td></tr>`;
    tabela1.innerHTML += TableLine;
    var quantidadeLinhas = tabela1.rows.length;
        if (quantidadeLinhas > 3) {
            tabela1.parentElement.style.overflowY = 'scroll';
        }
    
  }else{
    alert("PREENCHA TODOS OS CAMPOS!");
  }
}
function trocaPonto(valor){
  let stringSubstituida = valor.replace(".", ",");
  return stringSubstituida;
}

function trocaVirgula(valor2){
  let stringSubstituida2 = valor2.replace(",", ".");
  return stringSubstituida2;
}
function deleteAll(){
  var nota4 = localStorage.getItem("Nnota");
  if(nota4 !== null){
    localStorage.clear();
    localStorage.setItem('Nnota',nota4);
  }
  else{
    localStorage.clear();
    localStorage.setItem('Nnota','0');
  }
}
//Função que pega os dados da tabela Produtos e os adiciona ao localStorage:
function saveProd(){
  var table1 = document.getElementById("Tabela1");
  var Lines = table1.getElementsByTagName("tr");
  var prods = [];

  for(i=1; i < Lines.length; i++){
    var lines2 = Lines[i];
    var cells = lines2.getElementsByTagName("td");
    var keys = {
      codigo: cells[0].textContent,
      produto: cells[1].textContent,
      quantidade: cells[2].textContent,
      valorUnit: cells[3].textContent,
      valorTotal:cells[4].textContent,
    }
    prods.push(keys);
  }
  var Nnota6 = document.getElementById("labelNnota").textContent;
  var idkey6 = `${Nnota6}-Prods`;
  prodsLocalStorage = JSON.stringify(prods);
  localStorage.setItem(idkey6, prodsLocalStorage);
}
function excluirLinha(button) {
  var linha = button.closest('tr'); // Encontrar a linha pai mais próxima do botão clicado


  // Verificar se há uma linha a ser excluída
  if (linha) {
    var tabela = linha.parentNode; // Referência à tabela

    var textLabel = document.getElementById('valorTotal').textContent;
    var nomeDeVariavel = removeText(textLabel);
    var trocaAlgo = trocaVirgula(nomeDeVariavel); 
    var unitPrice = linha.cells[4].textContent;
    var socorro = removeText(unitPrice);
    var socorroComVirgula = trocaVirgula(socorro);

    var result = parseFloat(trocaAlgo) - parseFloat(socorroComVirgula);
    var textLabel2  = document.getElementById('valorTotal');
    result5 = result.toFixed(2);
    var amoALais = trocaPonto(result5.toString());
    textLabel2.innerText = ` R$ ${amoALais}`;

    // Remover a linha da tabela
    tabela.removeChild(linha);

  }
}
function removeText(algo){
  var nAguentoMais = algo.split('$');
  var legal = nAguentoMais[1];
  return legal;
}
