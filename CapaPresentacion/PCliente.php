<?php
include "../CapaNegocio/NCliente.php";

$pc = new PCliente();
class PCliente{

    private $negocio;
    public function __construct()
    {
        $this->negocio = new NCliente();
    }
    public function Listar()
    {
        return $this->negocio->Listar();
    }
    public function ListarCiudad()
    {
        return $this->negocio->ListarCiudad();
    }
    public function Insertar($nom,$telefono,$idcid)
    {
        $this->negocio->Insertar($nom,$telefono,$idcid);
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
    <title>Cliente</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>
<div class="col-md-10 form-group">
    <h1>Registrar Cliente</h1>
    </br>
    <form method="POST">
        <table class="table table-responsive table-bordered">
            <div class="col-md-4 form-group">
                <label><strong>Nombre Completo </strong></label>
                <input type="text" name="nombre" class="form-control"
                       required placeholder="ingrese nombre de cliente" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Telefono </strong></label>
                <input type="number" name="telefono" class="form-control"
                       required placeholder="ingrese nro de telefono" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Ciudad (*)</strong></label>
                <select type="text" name="idCiudad" class="form-control" required >
                    <?php $lci= $pc->ListarCiudad();
                    foreach ($lci as $item){
                        echo '<option value="'.$item->idCiudad.'"selected>'.$item->nombreCiu.'</option>';
                    }?>
                </select>
            </div>
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="insertar" value="Guardar" class="btn btn-success"/>
        </div>
    </form>
</div>
<?php
if (isset($_POST['insertar'])){
    $name = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $idCiudad = $_POST['idCiudad'];
    $pc->Insertar($name,$telefono,$idCiudad);
}
if (isset($_POST['eliminar'])){
    $id = $_POST['idcli'];
    $pc->Eliminar($id);
}
?>
<!----------------------------------------------------------->
<form method="POST" class="col-md-10 form-group">
    <div class="col-md-10 form-group"  align="center">
        <hr width="100%"/>
        <?php $lis= $pc->Listar();?>
        <h2>Lista de Clientes</h2>
        <table class="table table-responsive table-bordered table-hover table-dark">
            <thead>
            <tr>
                <th width="5%"><strong>ID</strong></th>
                <th width="25%"><strong>NOMBRE</strong></th>
                <th width="25%"><strong>TELEFONO</strong></th>
                <th width="55%"><strong>CIUDAD</strong></th>
                <th width="15%"><strong>ACCION</strong></th>
                <th width="15%"><strong>ACCION</strong></th>
            </tr>
            </thead>
</form>
<tbody>
<?php foreach ($lis as $value) {?>
    <tr>
        <td><?php echo $value->idCli; ?></td>
        <td><?php echo $value->nombre; ?></td>
        <td><?php echo $value->telefono; ?></td>
        <td><?php echo $value->ciudad; ?></td>
        <td><form method="post">
                <?php echo "<a href='PClienteActualizar.php?idCli=" . $value->idCli . "' class='btn btn-info'>Editar</a>" ?>
            </form>
        </td>
        <td><form method="post">
                <input type="hidden" name="idcli" value="<?php echo $value->idCli ?>">
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