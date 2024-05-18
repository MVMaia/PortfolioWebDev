<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
    <!-- Link do ajax: -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        body {
            width: 97.5vw;
            height: 97.5vh;
            background-color: gray;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-image: url('IMGS/shop1.jpg');
        }

        .box {
            width: 70vw;
            height: 80vh;
            background-color: rgba(0, 0, 0, 0.581);
            border: 2px solid white;
            border-radius: 50px;
            -webkit-box-shadow: 45px 27px 37px 6px rgba(0, 0, 0, 0.34);
            -moz-box-shadow: 45px 27px 37px 6px rgba(0, 0, 0, 0.34);
            box-shadow: 45px 27px 37px 6px rgba(0, 0, 0, 0.34);
            -webkit-box-shadow: inset -6px -19px 32px 6px rgba(0, 0, 0, 0.34);
            -moz-box-shadow: inset -6px -19px 32px 6px rgba(0, 0, 0, 0.34);
            box-shadow: inset -6px -19px 32px 6px rgba(0, 0, 0, 0.34);
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;

        }

        .header {
            width: 100%;
            height: 15vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .inputs1 {
            width: 22%;
        }

        .texts {
            width: 100%;
            height: 25%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-bottom: 3px;
        }

        .inputs {
            width: 100%;
            height: 23%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;

        }

        .desc {
            font-size: 25px;
            color: white;
        }

        .titulo {
            font-size: 23px;
            height: 15px;
            margin-top: -12px;
        }

        .tableDiv {
            width: 100%;
            height: 85vh;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
        }

        .tableDiv1 {
            width: 600px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: start;
            overflow-y: auto;
            max-height: 400px;
            /* margin-left: 185px */
        }

        .tabelinha {
            width: 100%;
            border-collapse: collapse;
        }

        .botao {
            width: 200px;
            height: 30px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 20px;
            border: 1px solid black;
            transition: background-color 0.3s;
        }

        .botao:active {
            background-color: black;
        }

        .buttonTD {
            border: none;
        }

        #edit {
            background-color: yellow;
            transition: background-color 0.3s;
            width: 100%;
            cursor: pointer;
            /* box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset; */
        }

        #edit:active {
            background-color: black;
        }

        #delete {
            background-color: red;
            transition: background-color 0.3s;
            color: white;
            cursor: pointer;
            /* box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset; */
        }

        #delete:active {
            background-color: black;
        }

        #buy {
            background-color: greenyellow;
            transition: background-color 0.3s;
            cursor: pointer;
            /* box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset; */
        }

        #buy:active {
            background-color: black;
        }

        #remake {
            background-color: blue;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            /* box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset; */
        }

        #remake:active {
            background-color: black;
        }

        td,
        th {
            border: 1px solid black;
        }

        .riscado {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="header">
            <h1 class="titulo" style="color:white;">LISTA DE COMPRAS</h1>
            <div class="texts">
                <p class="desc" style="position: absolute;margin-right:940px">Produto:</p>
                <p class="desc" style="position:absolute; margin-right: 430px;">Marca:</p>
                <p class="desc" style="position: absolute; margin-left: 150px;">Quantidade:</p>
                <p class="desc" style="position: absolute; margin-left: 695px;">RA do Aluno:</p>
            </div>
            <div class="inputs">
                <input type="text" class="inputs1" id="descricao">
                <input type="text" class="inputs1" id="marca">
                <input type="text" class="inputs1" id="qtd">
                <input type="text" class="inputs1" id="ra">
            </div>
        </div>
        <div class="tableDiv">
            <button class="botao" id="botao">Adicionar Produto</button>
            <div class="tableDiv1" id="tableDiv1">
                <table class="tabelinha" id="tabelinha">
                    <thead>
                        <colgroup>
                            <col width="200" style="background-color:white;">
                            <col width="200" style="background-color:white;">
                            <col width="200" style="background-color:white;">
                            <col width="200" style="background-color:white;">
                        </colgroup>
                        <tr>
                            <th>Produto:</th>
                            <th>Marca:</th>
                            <th>Quantidade</th>
                            <th>RA:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>Whey</td>
                            <td>Probiótica</td>
                            <td>4</td>
                            <td>10</td>
                            <td class="buttonTD"><button class="buttonT" id="edit">Editar</button></td>
                            <td class="buttonTD"><button class="buttonT" id="delete">Deletar</button></td>
                            <td class="buttonTD"><button class="buttonT" id="buy">Comprado</button></td>

                        </tr> -->
                        <?php
                        require_once ('PDO/fill.php');
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>
<script type="text/javascript">
    //Ajax INSERT:
    $(document).ready(function () {
        //Sinaliza o evento no componente que ativará o AJAX:
        $("#botao").click(function () {
            var inputProduto = document.getElementById('descricao').value;
            var inputMarca = document.getElementById('marca').value;
            var inputQtd = document.getElementById('qtd').value;
            var inputRA = document.getElementById('ra').value;
            if (inputProduto == "" || inputMarca == "" || inputQtd == "" || inputRA == "") {
                alert("Preencha todos os campos!");
            } else {
                var descricao = document.getElementById('descricao').value;
                var marca = document.getElementById('marca').value;
                var qtd = document.getElementById('qtd').value;
                var ra = document.getElementById('ra').value;
                var dados = {
                    descricao: descricao,
                    marca: marca,
                    qtd: qtd,
                    ra: ra,
                }
                //Estrutura de requisição AJAX
                $.ajax({
                    url: "PDO/insert.php",
                    type: 'POST',
                    data: dados,
                    //Executa ações caso a requisição seja retornada com sucesso:
                    success: function (mensagem) {
                        console.log(mensagem);
                        location.reload();
                    }

                })
            }

        })
    })

    function deleteItem(id) {
        var url = './PDO/delete.php?id=' + id;
        window.location.href = url;
    }

    function atualizarElemento(idTarefa) {
        var inputProduto = document.getElementById('descricao').value;
        var inputMarca = document.getElementById('marca').value;
        var inputQtd = document.getElementById('qtd').value;
        var inputRA = document.getElementById('ra').value;
        if (inputProduto == "" || inputMarca == "" || inputQtd == "" || inputRA == "") {
            alert("Preencha todos os campos!");
        } else {
            let produto = $('#descricao').val();
            let marca = $('#marca').val();
            let quantidade = $('#qtd').val();
            var url = './PDO/update.php?id=' + idTarefa + '&produto=' + produto + '&quantidade=' + quantidade + '&marca=' + marca;
            window.location.href = url;
        }
    }

    function updateBuy(id) {
        var url = './PDO/updateBuy.php?id=' + id;
        window.location.href = url;
    }

    function remakeBuy(id) {
        var url = './PDO/remake.php?id=' + id;
        window.location.href = url;
    }



</script>

</html>