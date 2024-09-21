<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio de Inglés 1 - Dinosapiens</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <style>
            body {
                text-align: center;
                background-image: url(fn1.jpg);
                background-size: cover;

                text-align: center;
            }
            h1{
                font-family: this cafe;
                color: white;
                font-size: 75px;
            }
            .exercise-container {
                margin-top: 50px;
            }
            .question {
                font-size: 24px;
            }
            .answers button {
                margin: 10px;
                padding: 10px 20px;
                font-size: 18px;
                cursor: pointer;
            }
            div.row{
                position: relative; left: 375px;
            }
            div.row-uno{
                position: relative; left: 375px;
            }
            button.dino-regreso{
           
                position: absolute;
                    top: 15px; left: 15px;
                
                align-items: center;
                background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
                border: 0;
                border-radius: 8px;
                box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
                box-sizing: border-box;
                color: #FFFFFF;
                display: flex;
                font-family: dinofiles;
                font-size: 20px;
                justify-content: center;
                line-height: 1em;
                max-width: 100%;
                min-width: 140px;
                padding: 3px;
                text-decoration: none;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
                white-space: nowrap;
                cursor: pointer;
                }

                .button-64:active,
                .button-64:hover {
                outline: 0;
                }

                .button-64 span {
                background-color: rgb(5, 6, 45);
                padding: 16px 24px;
                border-radius: 6px;
                width: 100%;
                height: 100%;
                transition: 300ms;
                }

                .button-64:hover span {
                background: none;
                }

                @media (min-width: 768px) {
                .button-64 {
                    font-size: 24px;
                    min-width: 196px;
                }
            }
            
        </style>
    </head>
<body>

    <br><h1>Ingles</h1><br>
        <form action="usuario.php"><button name="dinoregreso" type="submit" class="dino-regreso">Dino-Regreso</button></form>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <div class="exercise-container">
                        <h2>____ you like the coffee?</h2>
                        <div class="answers">
                            <button onclick="checkAnswer('Does')">Does</button>
                            <button onclick="checkAnswer('Did')">Did</button>
                            <button onclick="checkAnswer('Do')">Do</button>
                        </div>
                        <p id="result"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkAnswer(answer) {
            const resultText = document.getElementById('result');
            if (answer === 'Do') {
                resultText.innerHTML = "¡Correcto!";
                resultText.style.color = "green";
            } else {
                resultText.innerHTML = "Inténtalo de nuevo.";
                resultText.style.color = "red";
            }
        }
    </script><hr>


    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <div class="exercise-container">
                        <form method="post">
                            <h2 class="card-text">The cat is ______ table </h2>
                            <small class="text-body-secondary"><br>
                                <div class="answers">
                                    <button type="submit" name="respuesta" value="On" onclick="checkAnswer('On')">On</button>  
                                    <button type="submit" name="respuesta" value="Under" onclick="checkAnswer('Under')">Under</button> 
                                    <button type="submit" name="respuesta" value="Between" onclick="checkAnswer('Between')">Between</button>
                                    <br>
                                </div>
                            </small>
                            <?php
                                    
                                if (isset($_POST['respuesta'])) {
                                    $respuesta = $_POST['respuesta'];
                                    $respuestacorrecta='On';
                                    if ($respuesta == $respuestacorrecta) {
                                        echo "<i>Correcto!</i>";
                                    } else 
                                    if($respuestacorrecta !== false){
                                        echo "<i>Incorrecto :(</i>";
                                    }
                                }
                                                        
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <div class="exercise-container">
                        <form method="post">
                            <h2 class="card-text">She ________ a book now </h2>
                            <small class="text-body-secondary"><br>
                                <div class="answers">
                                    <button type="submit" name="respuesta1" value="Reads" onclick="checkAnswer('Reads')">Reads</button>  
                                    <button type="submit" name="respuesta1" value="Reading" onclick="checkAnswer('Reading')">Reading</button> 
                                    <button type="submit" name="respuesta1" value="Read" onclick="checkAnswer('Read')">Read</button>
                                    <br><br>
                                </div>
                            </small>
                            <?php
                                    
                                if (isset($_POST['respuesta1'])) {
                                    $respuesta1 = $_POST['respuesta1'];
                                    $respuestacorrecta1='Reading';
                                    if ($respuesta1 == $respuestacorrecta1) {
                                        echo "<i>Correcto!</i>";
                                    } else 
                                    if($respuestacorrecta1 !== false){
                                        echo "<i>Incorrecto :(</i>";
                                    }
                                }
                                                        
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

</body>
</html>