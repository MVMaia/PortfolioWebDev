//Pegando as informações do Formulário.
let btndeslogar = document.getElementById('logout');
btndeslogar.addEventListener('click', deslogar);

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
                window.location.href = "./index.php?class=Index";
            }


        }

    })

}