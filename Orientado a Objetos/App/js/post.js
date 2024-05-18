//Tendo acesso as funções de outro arquivo JS
// escreveConsole("Senac MG");
document.getElementById("dados").textContent = "";
document.getElementById("dados").innerText = "Sem Dados...";
let xhttp = new HttpClasse();
xhttp.escreveConsole("Senac  - Desenvolvimento de Sistemas");
//usando a classe HTTP passando o TIPO, URL, DADOS caso necessite
//Callback é a forma de passar uma função para outra Função veja abaixo
//Estamos chamando um método da classe e passando uma função para tratar o retorno 
xhttp.xhrGET('./xmlhttp',function(error,response){
    //Temos duas possibilidades de retorno da requisição error ou response
    if(error){
        //mostrando o erro
        console.error(error);
    }else{
        //mostrando a resposta
        console.log(typeof response);
        let dados = JSON.parse(response);  //Converte JSON STRING para um ARRAY de Objetos
        console.log(dados);
        todos = '';
        let i = 1;
        dados.forEach(linha => {
            todos += `</h1> ${i++} - ${linha.post}  </h1><br>`;
        });
        document.getElementById("dados").innerHTML = todos;
    }

})
