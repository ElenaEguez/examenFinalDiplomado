<?php
include_once "../CapaNegocio/NEncargado.php";

$pc = new PEncargado();
class PEncargado{

    private $negocio;
    public function __construct()
    {
        $this->negocio = new NEncargado();
    }

    public function Listar()
    {
        return $this->negocio->Listar();
    }

    public function Insertar($ci,$nombre,$telefono,$direccion){
        $this->negocio->Insertar($ci,$nombre,$telefono,$direccion);
        $this->negocio->Listar();
    }

    public function Eliminar($id)
    {
        $this->negocio->Eliminar($id);
        $this->negocio->Listar();
    }
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encargado</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>
<div class="col-md-12 form-group">
    <h1>Registrar Encargado</h1>
    </br>
    <form method="post">
        <table class="table table-responsive table-bordered">
            <div class="col-md-4 form-group">
                <label><strong>Cedula de Identidad (*)</strong></label>
                <input type="number" name="ci" class="form-control"
                       required placeholder="ingrese nro de ci" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Nombre completo (*)</strong></label>
                <input type="text" name="nombre" class="form-control"
                       required placeholder="ingrese nombre completo del encargado" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Telefono (*)</strong></label>
                <input type="number" name="telefono" class="form-control"
                       required placeholder="ingrese nro de telefono" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Direccion de Domicilio (*)</strong></label>
                <input type="text" name="direccion" class="form-control"
                       required placeholder="ingrese direccion" autocomplete="off">
            </div>
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="insertar" value="Guardar" class="btn btn-success"/>
        </div>
    </form>
</div>
<?php
if (isset($_POST['insertar'])){
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $pc->Insertar($ci,$nombre,$telefono,$direccion);
}
if (isset($_POST['eliminar'])){
    $id = $_POST['id'];
    $pc->Eliminar($id);
}
?>
<!----------------------------------------------------------->
<form method="POST" class="col-md-10 form-group">
    <div class="col-md-10 form-group"  align="center">
        <hr width="100%"/>
        <?php $lis= $pc->Listar();?>
        <h2>Lista de Encargados</h2>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th width="10%"><strong>ID</strong></th>
                <th width="10%"><strong>CI</strong></th>
                <th width="30%"><strong>NOMBRE</strong></th>
                <th width="10%"><strong>TELEFONO</strong></th>
                <th width="30%"><strong>DIRECCION</strong></th>
                <th width="25%"><strong>ACCION</strong></th>
                <th width="25%"><strong>ACCION</strong></th>
            </tr>
            </thead>
</form>
<tbody>
<?php foreach ($lis as $value) {?>
    <tr>
        <td><?php echo $value->idEnc; ?></td>
        <td><?php echo $value->ci; ?></td>
        <td><?php echo $value->nombre; ?></td>
        <td><?php echo $value->telefono; ?></td>
        <td><?php echo $value->direccion; ?></td>
        <td><form action="PEncargadoActualizar.php" method="post">
                <?php echo "<a href='PEncargadoActualizar.php?id=" . $value->idEnc . "' class='btn btn-info'>Editar</a>" ?>
            </form>
        </td>
        <td><form method="post">
                <input type="hidden" name="id" value="<?php echo $value->idEnc ?>">
                <input type="submit" name="eliminar" value="ELIMINAR" class="btn btn-red" >
            </form>
        </td>
    </tr>
<?php }?>
</tbody>
</table>
</div>
<!------------------------------------------------------- -->

</div>

</body>

</html>