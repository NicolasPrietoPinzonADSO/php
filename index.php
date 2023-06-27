<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>»Validaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrapo5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header class="">
        <h1 class="text-center">Validaciones JS</h1>
    </header>
<main>

    <section class="">

        <div class="container">
            <div class="row justify-content-center">

                <?php

                $ficha = "";
                $nombre = "";
                $apellido = "";
                $correo = "";
                $telefono ="";
                $genero = null;
                $ciudad = null;
                $habilidades = [1];
                ?>

                <?php if ( isset($_POST['ficha']) )  {?>
                <div class="col-md-8 mb-4">

                            <?php
                            $ficha = isset($_POST[ 'ficha']) ? $_POST[ 'ficha'] : "";
                            $nombre = isset($_POST[ 'nombre']) ? $_POST[ 'nombre'] : "";
                            $apellido = isset($_POST[ 'apellido']) ? $_POST[ 'apellido'] :
                            $correo = isset($_POST[ 'correo']) ? $_POST['correo'] : "";
                            $telefono = isset($_POST[ 'telefono']) ? $_POST['telefono'] : "";
                            $genero = isset($_POST[ 'genero']) ? $_POST['genero'] : null ;
                            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
                            $habilidades = isset($_POST['habilidades']) ? $_POST[ 'habilidades'] : [];

                            $campos = array();

                            //Validamos que Los campos tengan información
                            if ($ficha == ""){
                            array_push($campos, "El campo ficha no puede estar vacío");

                        }
                            if ($nombre == ""){
                            array_push($campos, "El campo nombre no puede estar vacío");
                        }
                            if ( $apellido == ""){
                            array_push($campos, "El campo apellido no puede estar vacío");
                        }
                            if ( $correo == ""){
                            array_push($campos, "El campo correo no puede estar vacío");
                        }
                            if ( $genero == "") {
                            array_push($campos, "Seleciona un genero");
                        }
                            if ( $ciudad == ""){
                            array_push($campos, "Seleciona una ciudad");
                        }

                            if ( empty($habilidades) || count($habilidades) < 3){
                            array_push($campos, "Seleciona tes habilidades");
                        }
                            //Mostramos Los errores
                            if(count($campos) > 0){
                            echo "<div class='alert alert-danger mb-0' role='alert'>";
                            for ($i=0; $i < count($campos) ; $i++) {
                            echo "<li>".$campos[$i]."</li>";
                        }
                    }else{
                            echo "<div class='alert alert-success mb-0' role='alert'> Los datos estan completos";
                        };
                            echo "</div>";
                        ?>
                </div>
                <?php } ?>

                <div class="col-md-8">

                    <div class="card mb-3">
                        <div class="card-body"> 
                            <form action="index.php" method="post" class="row" id="formulario">
                                <!-- Campo ficha -->
                                <div class="mb-3">
                                <label for="ficha" class="form-label">Número de ficha</label>
                                <input type="text" name="ficha" class="form-control" id="ficha" value="<?php echo $ficha ?>">
                                </div>
                                <!-- Campo para el nombre -->
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $nombre ?>">
                                </div>
                                <!-- Campo para Los apellidos -->
                                <div class="mb-3">
                                <label for="apellido" class="form-label">Apellidos</label>
                                <input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo $apellido ?>">
                                </div>
                                <!-- Campo para validar el correo -->
                                <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" name="correo" class="form-control" id="correo" value="<?php echo $correo ?>">
                                </div>
                                <!-- Campo para validar el telefono -->
                                <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono ?>">
                                </div>
                                <!-- Campos para seleccionar el genero -->
                                <div class="mb-3">
                                <div class="form-check form-check-inline">

                                <input class="form-check-input" type="radio" name="genero" id="genero1" value="hombre" <?php if($genero == "hombre") echo "checked" ?>>
                                <label class="form-check-label" for="genero1">Hombre</label>

                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="genero2" value="mujer" <?php if($genero == "mujer") echo "checked" ?>>
                                <label class="form-check-label" for="genero2">Mujer</label>

                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="genero3" value="otro" <?php if($genero == "otro") echo "checked" ?>>
                                <label class="form-check-label" for="genero3">0tro</label>

                                </div>

                                </div>
                                <!-- Campos para seleccionar La ciudad -->
                                <div class="mb-3">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <select class="form-select" name="ciudad" id="ciudad">
                                <option value="" selected>Seleccione ciudad</option>

                                <option value="bucaramanga" <?php if($ciudad == "bucaramanga") echo “selected” ?>>Bucaramanga</option>
                                <option value="medellin" <?php if($ciudad == "medellin") echo "selected" ?>>Medellin</option>
                                <option value="cali" <?php if($ciudad == "cali") echo "selected" ?>>Cali</option>
                                <option value="bogota" <?php if($ciudad == "bogota") echo “selected” ?>>Bogota</option>
                                </select>

                                </div>
                                <!-- Campos para seleccionar Las habilidades -->
                                <div class="mb-3">
                                <p>Seleccione minimo 3 habilidades</p>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="htm1" id="htm1" <?php if(in_array('html', $habilidades)) echo “checked” ?>>
                                <label class="form-check-label" for="html1">
                                HTML
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="css" id="css" <?php if(in_array('css', $habilidades)) echo "checked" ?>>
                                <label class="form-check-label" for="css">
                                css
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="javascript" id="javascript" <?php if(in_array('javascript', $habilidades)) echo "checked" ?>>
                                <label class="form-check-label" for="javascript">
                                JavaScript
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="php" id="php" <?php if(in_array('php', $habilidades)) echo "checked" ?>>
                                <label class="form-check-label" for="php">
                                PHP
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="java" id="java" <?php if(in_array('java', $habilidades)) echo “checked” ?>>
                                <label class="form-check-label" for="java">
                                JAVA
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="sgl" id="sqgl" <?php if(in_array('sgl', $habilidades)) echo "checked" ?>>
                                <label class="form-check-label" for="sqgl">
                                SQL
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="habilidades[]" value="uml" id="um1" <?php if(in_array('uml', $habilidades)) echo "checked" ?>>
                                <label class="form-check-label" for="uml1">
                                UML
                                </label>
                                </div>
                                </div>
                                <!-- Botón para enviar el formulario -->
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="btn-enviar">

                                Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<!-- Cargamos el archivo javascript al final para que todas Las etiquetas esten presentes en el archivo -->
 <script src="main.js" type="text/javascript"></script>

</body>

</html>