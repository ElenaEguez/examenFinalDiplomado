<?php
include_once "../CapaNegocio/NMarca.php";

$pm = new PMarca();
class PMarca{

    private $negocio;
    public function __construct()
    {
        $this->negocio = new NMarca();
    }

    public function Listar()
    {
        return $this->negocio->Listar();
    }

    public function Insertar($nom){
        $this->negocio->Insertar($nom);
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
    <title>Ciudad</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>
<div class="col-md-12 form-group">
    <h1>Registrar Marca</h1>
    </br>
    <form method="post">
        <table class="table table-responsive table-bordered">
            <div class="col-md-4 form-group">
                <label><strong>Nombre (*)</strong></label>
                <input type="text" name="nombre" class="form-control"
                       required placeholder="ingrese nombre de la marca" autocomplete="off">
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
    $pm->Insertar($name);
}
if (isset($_POST['eliminar'])){
    $id = $_POST['id'];
    $pm->Eliminar($id);
}
?>
<!----------------------------------------------------------->
<form method="POST" class="col-md-10 form-group">
    <div class="col-md-10 form-group"  align="center">
        <hr width="100%"/>
        <?php $lis= $pm->Listar();?>
        <h2>Lista de Marcas</h2>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th width="15%"><strong>ID</strong></th>
                <th width="55%"><strong>NOMBRE</strong></th>
                <th width="55%"><strong>ACCION</strong></th>
                <th width="55%"><strong>ACCION</strong></th>
            </tr>
            </thead>
</form>
<tbody>
<?php foreach ($lis as $value) {?>
    <tr>
        <td><?php echo $value->id; ?></td>
        <td><?php echo $value->nombre; ?></td>
        <td><form action="PMarcaActualizar.php" method="post">
                <?php echo "<a href='PMarcaActualizar.php?id=" . $value->id . "' class='btn btn-info'>Editar</a>" ?>
            </form>
        </td>
        <td><form method="post">
                <input type="hidden" name="id" value="<?php echo $value->id ?>">
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