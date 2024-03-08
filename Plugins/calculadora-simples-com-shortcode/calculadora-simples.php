<?php
/**
 * Plugin Name: Calculadora Simples
 * Description: Uma calculadora simples que pode ser inserida em páginas ou posts via shortcode [calculadora_simples].
 * Version: 1.0
 * Author: Paulo Sergio Xavier Barbosa
 * Author URI: https://github.com/Paulosxb
 */

function calculadora_simples_shortcode() {
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora simples</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        
        .fundo{
            background-image: linear-gradient(45deg, black, rgb(10, 132, 61));
            height: 100vh;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .calculadora{
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            padding: 15px;
        }

        .botao {
            width: 50px;
            height: 50px;
            font-size: 25px;
            cursor: pointer;
            margin: 3px;
            background-color: rgb(31, 31, 31);
            border: none;
            color: #ffffff;

        }

        .botao:hover {
            background-color: black;
        }

        #resultado {
            background-color: #fff;
            width: 207px;
            height: 30px;
            margin: 5px;
            font-size: 25px;
            color: black;
            text-align: right;
            padding: 5px;
        }

    </style>
    </head>
    <body>
    <div class="fundo">
        <h1>Paulo Sergio</h1>
        <div class="calculadora">
            <h1>Calculadora</h1>
            <p id="resultado"></p>
            <table>
                <tr>
                    <td title="Apagar Tudo" alt="Apagar Tudo"><button class="botao" onclick="clean()">C</button></td>
                    <td title="Apagar um por vez" alt="Apagar um por vez"><button class="botao" onclick="back()"><</button></td>
                    <td title="Divisão" alt="Divisão"><button class="botao" onclick="insert('/')">/</button></td>
                    <td title="Multiplicação" alt="Multiplicação"><button class="botao" onclick="insert('*')">X</button></td>
                </tr>
                <tr>
                    <td title="Sete" alt="Sete"><button class="botao" onclick="insert('7')">7</button></td>
                    <td title="Oito" alt="Oito"><button class="botao" onclick="insert('8')">8</button></td>
                    <td title="Nove" alt="Nove"><button class="botao" onclick="insert('9')">9</button></td>
                    <td title="Subtração" alt="Subtração"><button class="botao" onclick="insert('-')">-</button></td>
                </tr>
                <tr>
                    <td title="Quatro" alt="Quatro"><button class="botao" onclick="insert('4')">4</button></td>
                    <td title="Cinco" alt="Cinco"><button class="botao" onclick="insert('5')">5</button></td>
                    <td title="Seis" alt="Seis"><button class="botao" onclick="insert('6')">6</button></td>
                    <td title="Soma" alt="Soma"><button class="botao" onclick="insert('+')">+</button></td>
                </tr>
                <tr>
                    <td title="Um" alt="Um"><button class="botao" onclick="insert('1')">1</button></td>
                    <td title="Dois" alt="Dois"><button class="botao" onclick="insert('2')">2</button></td>
                    <td title="Três" alt="Três"><button class="botao" onclick="insert('3')">3</button></td>
                    <td rowspan="2"  title="Resultado" alt="Resultado"><button class="botao" style="height: 106px;" onclick="calcular()">=</button></td>
                </tr>
                <tr>
                    <td colspan="2"  title="Zero" alt="Zero"><button class="botao" style="width: 106px;" onclick="insert('0')">0</button></td>
                    <td  title="Ponto" alt="Ponto"><button class="botao" onclick="insert('.')">.</button></td>
                </tr>
            </table>
        </div>
    </div>

    <script>

        //Aqui temos a funão que acrescentta os numeros 
        function insert(num)
        {
            var numero = document.getElementById('resultado').innerHTML;
            document.getElementById('resultado').innerHTML = numero + num;
        }

        //Aqui temos um botãõ para realizar a limpeza completa dos campos digitados
        function clean()
        {
            document.getElementById('resultado').innerHTML = "";
        }

        //Aqui temos botão para limpar apenas um numero ou expressão por vez
        function back()
        {
            var resultado = document.getElementById('resultado').innerHTML;
            document.getElementById('resultado').innerHTML = resultado.substring(0, resultado.length -1);
        }

        //Aqui realizamos o calculo, temos um if e else para verificar se existe numero para ser calculado
        function calcular()
        {
            var resultado = document.getElementById('resultado').innerHTML;
            if(resultado)
            {
                document.getElementById('resultado').innerHTML = eval(resultado);
            }
            else
            {
                document.getElementById('resultado').innerHTML = "Sem calculo"
            }
        }

    </script>
    </body>
    </html>
    <?php
    return ob_get_clean(); // Isso vai capturar a saída do buffer e retorná-la como string
}

// Registrar o shortcode no WordPress
add_shortcode('calculadora_simples', 'calculadora_simples_shortcode');
