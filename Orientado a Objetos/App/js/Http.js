class Http {

    constructor() {
        //O construtor sempre será ativado com a utilização pa palavra NEW
        this.xhr = new XMLHttpRequest;
        //bind evita erros de trocar de instancia
    }


    xhrGET(url, callback) {
        // Concatenando os parâmetros à URL, 
        //Se desejar pode passar na URL mas deve refatora alguns codigos abaixo inclusive remover a união do .PHP
        //evitando passar o .PHP 
        let caminho = url;

        console.log('A URL Post é: ', caminho);


        this.xhr.onreadystatechange = function () {

            if (this.xhr.readyState < 4) {

                console.log('Lendo o State: ', this.xhr.readyState);
                console.log('Status Code: ', this.xhr.statusText);
                if (this.xhr.statusText == "") {

                    console.log("Aberta a Requisição GET");

                } else {

                    console.log(this.xhr.statusText);
                }

            } else {


                console.log('Lendo o State: ', this.xhr.readyState);
                console.log('Status Code: ', this.xhr.statusText);
                if (this.xhr.readyState == 4 && this.xhr.status == 200) {


                    callback(null, this.xhr.responseText);


                } else {


                    callback('Error: ' + this.xhr.statusText);
                }
            }
        }.bind(this);  //assegura a resposta a instancia para que chamou a classe evitando assim erros 
        this.xhr.open('GET', caminho, true);
        this.xhr.send();

    }
    xhrPost(url, params, callback) {
        // Concatenando os parâmetros à URL, 
        //Se desejar pode passar na URL mas deve refatora alguns codigos abaixo inclusive remover a união do .PHP
        //evitando passar o .PHP 
        //let caminho = url + '.php';
        let caminho = url;
        console.log('A URL Post é: ', caminho);

        // Defina o tipo de conteúdo da solicitação como application/x-www-form-urlencoded
        //this.xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //this.xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        this.xhr.onreadystatechange = function () {

            if (this.xhr.readyState < 4) {

                console.log('Lendo o State: ', this.xhr.readyState);
                console.log('Status Code: ', this.xhr.statusText);
                if (this.xhr.statusText == "") {

                    console.log("Aberta a Requisição POST");

                } else {

                    console.log(this.xhr.statusText);
                }

            } else {


                console.log('Lendo o State: ', this.xhr.readyState);
                console.log('Status Code: ', this.xhr.statusText);
                if (this.xhr.readyState == 4 && this.xhr.status == 200) {


                    callback(null, this.xhr.responseText);


                } else {


                    callback('Error: ' + this.xhr.statusText);
                }
            }
        }.bind(this);  //assegura a resposta a instancia para que chamou a classe evitando assim erros 
        this.xhr.open('POST', caminho, true);
        this.xhr.send(params);

    }

    //teste da Classe
    escreveConsole(texto) {
        //Testando Comunicação entre JS
        console.log("Alguem escreveu: " + texto);
    }

}
