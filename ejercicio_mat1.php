<?php 
include_once 'conexionPDO.php';
	session_start();
	if (!isset($_SESSION['rol'])) 
		{
			header('location: usuario.php');
		}
	else
		{
			if ($_SESSION['rol'] !=2)
				{
					header('Location: usuario.php');
				}
		}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio de Sumas - Dinosapiens</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <style>
            body
            {
                font-family: pixeled;
                text-align: center;
                background-image: url(fn1.jpg);
                background-size: cover;
            }
            h1{
                font-family: this cafe;
                font-size: 110px;
                color: white;
            }
            .contenedor 
            {
                margin-top: 20px;

            }
            .ejercicio 
            {
                font-family: pixeled;
                margin: 20px;
                font-size: 50px;
            }
            .resultado 
            {
                font-family: pixeled;
                margin: 20px;
                font-size: 18px;
            }
            #puntos 
            {
                font-family: pixeled;
                font-size: 20px;
                color: green;
            }
            #terminar 
            {
                font-family: pixeled;
                display: none;
                margin-top: 20px;
            }
            div.row-uno{
                width: 550;
                height: auto;
            }
            hr{
                color: white;
                
            }
            button.regreso{

                position: absolute;
                left: 10px; top: 5px;
                background-color: #c2fbd7;
                border-radius: 100px;
                box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
                color: green;
                cursor: pointer;
                display: inline-block;
                font-family: dinofiles;
                padding: 7px 20px;
                text-align: center;
                text-decoration: none;
                transition: all 250ms;
                border: 0;
                font-size: 16px;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
                }

                .button-33:hover {
                box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
                transform: scale(1.05) rotate(-1deg);
            }
    
        </style>
    </head>
    <body>

        <form action="usuario.php"><button name="dino-regreso" class="regreso">Dino-Regreso</button></form>
        <br><h1>Matematicas</h1><br>
        <h2><u>SUMA</u></h2>
        <br>
        <div class="contenedor">
            <div id="ejercicio-container"></div>
            <p id="resultado" class="resultado"></p>
            <span id="puntos"></span>
            <button id="terminar" class="btn btn-success" onclick="terminarEjercicio()">Terminar ejercicio</button>
        </div>
        <script>

            let ejercicios=[];
            let puntos=0;
            let ejercicioActual = 0;
            const total_e = 10;

            function generarEjercicios() 
                {
                    for (let i=0; i < total_e; i++) 
                        {
                            const num1 = Math.floor(Math.random() * 20) + 1;
                            const num2 = Math.floor(Math.random() * 20) + 1;
                            ejercicios.push({ num1, num2 });
                        }
                }

            function mostrarEjercicio() 
                {
                    if (ejercicioActual < total_e) 
                        {
                            const ejercicio = ejercicios[ejercicioActual];
                            document.getElementById('ejercicio-container').innerHTML = `<br><div class="ejercicio">¿Cuanto es ${ejercicio.num1} + ${ejercicio.num2}?</div>
                                <br><input type="number" id="respuesta" class="form-control w-25 mx-auto" placeholder="Escribe tu respuesta" autofocus>
                                <br><button class="btn btn-primary mt-2" onclick="verificarRespuesta()">Enviar</button>`;
                        } 
                    else 
                        {
                            document.getElementById('terminar').style.display='block';
                            document.getElementById('ejercicio-container').innerHTML='';
                            document.getElementById('resultado').innerHTML='';
                        }
                }

            function verificarRespuesta() 
                {
                    const respuesta = parseInt(document.getElementById('respuesta').value);
                    const ejercicio = ejercicios[ejercicioActual];
                    const resultadoCorrecto = ejercicio.num1 + ejercicio.num2;

                    if (respuesta === resultadoCorrecto) 
                        {
                            puntos++;
                            document.getElementById('resultado').innerHTML = "¡Correcto!";
                            document.getElementById('resultado').style.color = "green";
                        } 
                    else 
                        {
                            document.getElementById('resultado').innerHTML = "Incorrecto. La respuesta correcta era "+resultadoCorrecto;
                            document.getElementById('resultado').style.color = "red";
                        }


                    ejercicioActual++;
                    setTimeout(mostrarEjercicio, 1500);
                }

            function terminarEjercicio() 
                {
                    window.location.href = 'usuario.php';
                }

            generarEjercicios();
            mostrarEjercicio();
        </script><br>
       <!-- <h2><i>Resta</i></h2><br>
        <div>
            <?php

                $aleatorio1=mt_rand(0,50);
                $aleatorio2=mt_rand(0,20);
                $total=$aleatorio1-$aleatorio2;
                
                echo "¿Cuanto es ".$aleatorio1."-".$aleatorio2."?";
        
            ?>
            <form method="post">
                <br><input type="number" id="respuesta" class="form-control w-25 mx-auto" name="respuesta" placeholder="Escribe tu respuesta" autofocus><br>
                <button class="btn btn-primary mt-2">Enviar</button>
            </form>
            <?php

                if(isset($_POST['respuesta'])){
                    $respuesta=($_POST['respuesta']);
                    if($respuesta === $total){
                        echo"¡Correcto!";
                    }else{
                        echo"<br>Incorrecto";
                    }
                }else{
                    echo"...";
                }
            ?>
        </div>-->
        
                
    </body>
</html>
