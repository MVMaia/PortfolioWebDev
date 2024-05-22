//Pegando as informações do Formulário.
let btndeslogar = document.getElementById('logout');
let btnPostar = document.getElementById('btnPostar');
let btnUpdate = document.getElementById('btnUpdate');
var updateID = null;

btndeslogar.addEventListener('click', deslogar);
btnPostar.addEventListener("click", postar);
btnUpdate.addEventListener('click', updatePost);

function deslogar() {
    let xhttp = new Http();
    xhttp.escreveConsole("Deslogando");
    //usando a classe HTTP passando o TIPO, URL, DADOS caso necessite
    //Callback é a forma de passar uma função para outra Função veja abaixo
    //Estamos chamando um método da classe e passando uma função para tratar o retorno 
    xhttp.xhrGET('./index.php?class=Usuario&method=deslogar', function (error, response) {
        //Temos duas possibilidades de retorno da requisição error ou response
        if (error) {

            //mostrando o erro
            console.log("O erro foi: ", error);

        } else {

            console.log(response);

            if (response === "Autenticado") {

                window.location.href = "./index.php?class=Home";

            } else {

                console.log("Sistema diz Deslogado :", response);
                // Ou você pode redirecionar para uma página local
                window.location.href = "./index.php?class=Login";
            }


        }

    })

}

function postar() {
    // ev.preventDefault();
  let xhttp = new Http();
  xhttp.escreveConsole("Estou Postando");
  
  let TAposts = document.getElementById("TAposts").value;
  const params = new FormData();
  params.append("posts", TAposts);
  console.log(params);
  
  xhttp.xhrPost("./index.php?class=Posts&method=insert",params,function (error, response) {
    //Temos duas possibilidades de retorno da requisição error ou response
    if(error){
      console.log(error);
    }else{
      console.log(response);
      if((response = "Postado")) {
        window.location.href = "./index.php?class=Home";
      }else{
        console.log("Intruso tentando logar...");
      }
    }
  });
}


  function deletePost(num){
    let xhttp = new Http();
    console.log("deletando");

    const params = new FormData();
    params.append("id", num);
    console.log(params);

    xhttp.xhrPost("./index.php?class=Posts&method=deletePost", params, function (error,response){
      if(error){
        console.log(error);
      }else{
        console.log(response)
        if(response = "deletado"){
          window.location.href = "./index.php?class=Home";
        }else{
          console.log("deu ruim aqui no tratamento da resposta, arquivo home.js");
        }
      }
    });
  }

  function updatePost(){
    let xhttp = new Http();
    console.log("Atualizando");

    let updatedPost = document.getElementById('TAupdate').value;
    console.log(updatedPost);
    const params = new FormData();
    params.append("id", updateID);
    params.append("updated", updatedPost);
    console.log(params);

    xhttp.xhrPost("./index.php?class=Posts&method=updatePost", params, function (error,response){
      if(error){
        console.log(error);
      }else{
        console.log(response)
        if(response = "deletado"){
          window.location.href = "./index.php?class=Home";
        }else{
          console.log("deu ruim aqui no tratamento da resposta, arquivo home.js");
        }
      }
    });
  }

  function updateIDchanger(number){
    updateID = number;
  }