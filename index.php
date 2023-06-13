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
        "horario-entrada" => $horario,
        "team" => $team,
        "trainer" => $trainer
    ];

    $data = json_encode($data);
    $credenciales["http"]["content"] = $data;
    $config = stream_context_create($credenciales);
    $_DATA = file_get_contents($url, false, $config);
    json_decode($_DATA, true);

}

function obtenerUsuarios() {
    global $apiUrl;
    $url = $apiUrl . "informacion";
    $data = file_get_contents($url);
    $usuarios = json_decode($data, true);
    return $usuarios;
}
global $usuarioData;

function buscarUsuario() {
    global $apiUrl;
    global $usuarioData;
    $url = $apiUrl . "informacion";
    $inputCedula = $_POST['cedula'];
    $data = file_get_contents($url);
    $usuarios = json_decode($data, true);
    foreach($usuarios as $usuario) {
        if ($inputCedula === $usuario['cc']) {
            $usuarioData = $usuario;
        }
    };
}

function subirUsuario() {
    global $apiUrl;
    global $usuarioData;
    $url = $apiUrl . "informacion";
    $cedula = $_POST['cedula-invisible'];
    $data = file_get_contents($url);
    $usuarios = json_decode($data, true);
    foreach($usuarios as $usuario) {
        if ($cedula === $usuario['cc']) {
            $usuarioData = $usuario;
        }
    };

}

function actualizarUsuario($id) {
    global $apiUrl;
    $urlID = $apiUrl . "informacion" . "/$id";


    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $horario = $_POST['horario'];
    $team = $_POST['team'];
    $trainer = $_POST['trainer'];

    $usuarioActualizado = [
        "cc" => $cedula,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "edad" => $edad,
        "direccion" => $direccion,
        "email" => $email,
        "horario-entrada" => $horario,
        "team" => $team,
        "trainer" => $trainer
    ];

    $data = json_encode($usuarioActualizado);
    $credenciales["http"]["header"] = "Content-Type: application/json";
    $credenciales["http"]["method"] = "PUT";
    $credenciales["http"]["content"] = $data;
    $config = stream_context_create($credenciales);
    $_DATA = file_get_contents($urlID, false, $config);
    json_decode($_DATA, true);

}

if (isset($_POST['guardar'])) {
    guardarUsuarios();
}

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    actualizarUsuario($id);
}

if (isset($_POST['buscar'])) {
    buscarUsuario();
}

if (isset($_POST['flecha-subir'])) {
    subirUsuario();
}

$usuarios = obtenerUsuarios();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="./bootstrap.css/bootstrap-grid.min.css"/>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="POST">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control mt-3" name="nombre" placeholder="Nombre" value="<?php echo isset($usuarioData) ? $usuarioData['nombre'] : ""; ?>"/>
                    <input type="text" class="form-control mt-3" name="id" placeholder="id" value="<?php echo isset($usuarioData) ? $usuarioData['id'] : ""; ?>"/>
                </div>
                <div class="col-6">
                    <img src="https://media.licdn.com/dms/image/D563DAQFas8vErYi8iA/image-scale_191_1128/0/1681268367946?e=1686783600&v=beta&t=AxWQwwzzQ5dfcbg7RTf3_LAWFZUaEMWYY8pRfOr3MlM" alt="" class="img">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control mt-3" name="apellido" placeholder="Apellidos" value="<?php  echo isset($usuarioData) ? $usuarioData['apellido'] : ""; ?>"/>
                </div>
                <div class="col-6">
                    <input type="number" class="form-control mt-3" name="edad" placeholder="Edad" value="<?php  echo isset($usuarioData) ? $usuarioData['edad'] : ""; ?>"/>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control mt-3" name="direccion" placeholder="Direccion" value="<?php  echo isset($usuarioData) ? $usuarioData['direccion'] : "";  ?>"/>
                </div>
                <div class="col-6">
                    <input type="email" class="form-control mt-3" name="email" placeholder="Email" value="<?php echo isset($usuarioData) ? $usuarioData['email'] : "";  ?>"/>
                </div>
            </div>

            <div class="cuadro mt-3">
                <div class="row">
                    <div class="col-6">
                        <label for="">Horario de Entrada: </label> <br>
                        <input type="time" class="form-control mt-1" name="horario" placeholder="Horario de Entrada" value="<?php echo isset($usuarioData) ? $usuarioData['horario-entrada'] : "";  ?>"/>
                    </div>
                    <div class="col-6">
                        <input type="submit" value="✅" name="guardar" />
                        <input type="submit" value="❌" name="eliminar" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control mt-3" name="team" placeholder="Team" value="<?php  echo isset($usuarioData) ? $usuarioData['team'] : ""; ?>"/>
                    </div>
                    <div class="col-6">
                        <input type="submit" value="✏️" name="editar" />
                        <input type="submit" value="🔎" name="buscar" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control mt-3" name="trainer" placeholder="Trainer" value="<?php echo isset($usuarioData) ? $usuarioData['trainer'] : "";  ?>"/>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control mt-3" name="cedula" placeholder="Cedula" value="<?php echo isset($usuarioData) ? $usuarioData['cc'] : "";  ?>"/>
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
                                <td class="contenido_tabla"><?php echo $usuario['nombre']?> 
                                <td class="contenido_tabla"><?php echo $usuario['apellido']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['direccion']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['edad']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['email']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['horario-entrada']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['team']?></td>
                                <td class="contenido_tabla"><?php echo $usuario['trainer']?></td>
                                <td class="contenido_tabla" >
                                    <form action="" method="POST">
                                        <input type=""  name="cedula-invisible" value="<?php echo $usuario['cc']?>">
                                        <input type="submit" name="flecha-subir" value="&#11014;&#11014;"/>
                                    </form>
                                </td>
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
