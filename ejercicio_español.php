<!DOCTYPE html>
<html>
    <head>
        <style>
            body {

                background-color: aquamarine;

                font-family: pixeled;
                text-align: center;
                background-image: url(fn1.jpg);
                background-size: cover;

                h1{
                    font-family: this cafe;
                    font-size: 75px;
                    color: black;
                }
                div.ejercicios{
                    width: 425px;
                    height: 450px;
                }
                div.card-body{
                    border-width: 6px;
                    border-style: dotted;
                    border-color: #ffa934;
                }
                div.col-uno{
                    position: absolute;
                    top: 210px; left: 14px;
                    
                }
                div.col-dos{
                    position: absolute;
                    top: 210px; left: 490px;
                }
                div.col-tres{
                    position: absolute;
                    top: 210px; left: 1155px;
                }
                button.regreso{
                    position: absolute;
                    top: 15px; left: 15px;

                    background: linear-gradient(to bottom right, #EF4765, #FF9A5A);
                    border: 0;
                    border-radius: 12px;
                    color: #FFFFFF;
                    cursor: pointer;
                    display: inline-block;
                    font-family: dinofiles;
                    font-size: 16px;
                    font-weight: 500;
                    line-height: 2.5;
                    outline: transparent;
                    padding: 0 1rem;
                    text-align: center;
                    text-decoration: none;
                    transition: box-shadow .2s ease-in-out;
                    user-select: none;
                    -webkit-user-select: none;
                    touch-action: manipulation;
                    white-space: nowrap;
                
                    .button-62:not([disabled]):focus {
                    box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
                    }

                    .button-62:not([disabled]):hover {
                    box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
                    }
                }


            }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <br><br><h1 align="center">GRAMATICA</h1><br><br>
        
        <form action="usuario.php"><button type="submit" name="regreso" class="regreso">Dino-Regreso</button></form>

        <div class="row row-cols-1 row-cols-md-3 g-4">   
            <div class="ejercicios">
                <div class="col-uno">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i>Ejercicio 1</i></h5><hr>
                            <p class="card-text">Mis amigos ____________ mucho en la fiesta anoche. </p>
                        </div>
                        <div class="card-footer">
                            <form method="post">
                                <small class="text-body-secondary"><br>
                                    <button type="submit" name="respuesta" value="a">A.</button> Me diverti</label> <br><br>
                                    <button type="submit" name="respuesta" value="b">B.</button> Se divierten</label><br><br>
                                    <button type="submit" name="respuesta" value="c">C.</button> Se divirtieron</label><br><br>
                                    <button type="submit" name="respuesta" value="d">D.</button> Se divertimos</label>
                                    <br><br>
                                </small>
                                <?php

                                    
                                    if (isset($_POST['respuesta'])) {
                                        $respuesta = $_POST['respuesta'];
                                        $respuestacorrecta='c';
                                        if ($respuesta == $respuestacorrecta) {
                                            echo "<i>Correcto!</i>";
                                        } else 
                                        if($respuestacorrecta==false){
                                            echo "<i>Incorrecto :(</i>";
                                        }
                                    }
                                        
                                ?>
                            </form>
                        </div>
                    </div>
                </div><br><br>
                <div class="col-dos">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i>Ejercicio 2</i></h5><hr>
                            <p class="card-text">¿Cual es la definicion que va de acuerdo con el significado de un 'sustantivo'?</p>
                        </div>
                        <div class="card-footer">
                            <form method="post">
                                <small class="text-body-secondary"><br>
                                    <button type="submit" name="respuesta1" value="a1">A.</button> Es aquel que tiene significados opuestos, inversos o contrarios entre sí. <br><br>
                                    <button type="submit" name="respuesta1" value="b1">B.</button> Palabra que se utiliza para denominar o nombrar personas, animales y cosas. <br><br>
                                    <button type="submit" name="respuesta1" value="c1">C.</button> Que tiene el mismo significado o muy parecido, como empezar y comenzar. <br><br>
                                    <button type="submit" name="respuesta1" value="d1">D.</button> Que se pronuncia como otra, pero tiene diferente origen o significado muy distante. <br><br>
                                </small>
                                <?php

                                    if (isset($_POST['respuesta1'])) {
                                        $respuesta1 = $_POST['respuesta1'];
                                        $respuestacorrecta='b1';
                                        if ($respuesta1 == $respuestacorrecta) {
                                            echo "<i>Correcto!</i>";
                                        } else 
                                        if($respuestacorrecta==false){

                                            echo "<i>Incorrecto :(</i>";
                                        }
                                    }

                                ?>
                            </form>
                        </div>
                    </div>
                </div><br><br>
                <div class="col-tres">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i>Ejercicio 3</i></h5><hr>
                            <p class="card-text">¿Que expresan los enunciados interrogativos?</p>
                        </div>
                        <div class="card-footer">
                            <form method="post">
                                <small class="text-body-secondary"><br>
                                    <button type="submit" value="a2" name="respuesta2">A.</button> Todas las anteriores <br><br>
                                    <button type="submit" value="b2" name="respuesta2">B.</button> Sorpresa o incredulidad. <br><br>
                                    <button type="submit" value="c2" name="respuesta2">C.</button> Curiosidad. <br><br>
                                    <button type="submit" value="d2" name="respuesta2">D.</button> Incertidumbre. <br><br></small>
                            
                                <?php

                                    if (isset($_POST['respuesta2'])) {
                                        $respuesta2 = $_POST['respuesta2'];
                                        $respuestacorrecta='a2';
                                        if ($respuesta2 == $respuestacorrecta) {
                                            echo "<i>Correcto!</i>";
                                        } else 
                                        if($respuestacorrecta==false){

                                            echo "<i>Incorrecto :(</i>";
                                        }
                                    }

                                ?>
                            </form>
                        </div>
                    </div>
                </div><br><br>
            </div>   
        </div> 

    </body>
</html>