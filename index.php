<?php
$apiUrl = "https://6480e390f061e6ec4d49feb5.mockapi.io/";

function guardarUsuarios() {
    global $apiUrl;

    $url = $apiUrl . "informacion";

    $credenciales["http"]["method"] = "POST";
    $credenciales["http"]["header"] = "Content-Type: application/json";

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $horario = $_POST['horario'];
    $team = $_POST['team'];
    $trainer = $_POST['trainer'];

    $data = [
        "cc" => $cedula,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "edad" => $edad,
        "direccion" => $direccion,
        "email" => $email,
        "horario" => $horario,
        "team" => $team,
        "trainer" => $trainer
    ];

    $data = json_encode($data);
    $credenciales["http"]["content"] = $data;
    $config = stream_context_create($credenciales);
    $_DATA = file_get_contents($url, false, $config);

    print_r(json_decode($_DATA, true));
}

function obtenerUsuarios() {
    global $apiUrl;
    $url = $apiUrl . "informacion";
    $data = file_get_contents($url);
    $usuarios = json_decode($data, true);
    return $usuarios;
}

if (isset($_POST['guardar'])) {
    guardarUsuarios();
}

$usuarios = obtenerUsuarios();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="./bootstrap.css/bootstrap-grid.min.css" />
</head>

<body>
    <div class="container-fluid">
        <form action="" method="POST">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control mt-3" name="nombre" placeholder="Nombre"/>
                </div>
                <div class="col-6">
                    <img src="https://media.licdn.com/dms/image/D563DAQFas8vErYi8iA/image-scale_191_1128/0/1681268367946?e=1686783600&v=beta&t=AxWQwwzzQ5dfcbg7RTf3_LAWFZUaEMWYY8pRfOr3MlM" alt="" class="img">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control mt-3" name="apellido" placeholder="Apellidos" />
                </div>
                <div class="col-6">
                    <input type="number" class="form-control mt-3" name="edad" placeholder="Edad" />
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control mt-3" name="direccion" placeholder="Direccion" />
                </div>
                <div class="col-6">
                    <input type="email" class="form-control mt-3" name="email" placeholder="Email" />
                </div>
            </div>

            <div class="cuadro mt-3">
                <div class="row">
                    <div class="col-6">
                        <label for="">Horario de Entrada: </label> <br>
                        <input type="time" class="form-control mt-1" name="horario" placeholder="Horario de Entrada" />
                    </div>
                    <div class="col-6">
                        <input type="submit" value="✅" name="guardar" />
                        <input type="submit" value="❌" name="eliminar" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control mt-3" name="team" placeholder="Team"/>
                    </div>
                    <div class="col-6">
                        <input type="submit" value="✏️" name="editar" />
                        <input type="submit" value="🔎" name="buscar" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control mt-3" name="trainer" placeholder="Trainer" />
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control mt-3" name="cedula" placeholder="Cedula" />
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="tabla mt-3">
                    <table>
                        <thead>
                            <tr>
                                <th class="titulo_tabla">Nombre</th>
                                <th class="titulo_tabla">Apellidos</th>
                                <th class="titulo_tabla">Direccion</th>
                                <th class="titulo_tabla">Edad</th>
                                <th class="titulo_tabla">Email</th>
                                <th class="titulo_tabla">H/E</th>
                                <th class="titulo_tabla">Team</th>
                                <th class="titulo_tabla">Trainer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td class="contenido_tabla"><?php echo $usuario['nombre']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['apellido']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['direccion']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['edad']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['email']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['horario']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['team']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['trainer']?></td>
                                <td class="contenido_tabla"><input type="submit" value="&#11014;"/></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
</body>
</html>
