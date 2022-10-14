<?php
include_once "../CapaNegocio/NEncargado.php";

$PCa= new PEncargadoActualizar();
class PEncargadoActualizar{

    private $negocio;
    public function __construct()
    {
        $this->negocio = new NEncargado();
    }

    public function ListarPorId($id)
    {
        return $this->negocio->ListarPorId($id);
    }

    public function Actualizar($id,$ci,$nombre,$telefono,$direccion)
    {
        $this->negocio->Actualizar($id,$ci,$nombre,$telefono,$direccion);
    }
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encargado</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>
<div class="col-md-12 form-group">
    <h1>Actualizar</h1>
    </br>
    <form method="post" >
        <table class="table table-responsive table-bordered">
            <?php $id = $_GET['id'];?>
            <?php foreach ($PCa->ListarPorId($id) as $value){ ?>
                <div class="col-md-4 form-group">
                    <label><strong>Cedula de Identidad (*)</strong></label>
                    <input type="number" name="ci" value="<?php echo $value->ci ?>" class="form-control"
                           required placeholder="ingrese nro de CI" autocomplete="off"/>

                    <label><strong>Nombre (*)</strong></label>
                    <input type="text" name="nombre" value="<?php echo $value->nombre ?>" class="form-control"
                           required placeholder="ingrese nombre completo" autocomplete="off"/>

                    <label><strong>Telefono (*)</strong></label>
                    <input type="number" name="telefono" value="<?php echo $value->telefono ?>" class="form-control"
                           required placeholder="ingrese nro de telefono" autocomplete="off"/>

                    <label><strong>Direccion de Domicilio (*)</strong></label>
                    <input type="text" name="direccion" value="<?php echo $value->direccion ?>" class="form-control"
                           required placeholder="ingrese direccion" autocomplete="off"/>
                </div>
            <?php } ?>
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="actualizar" value="Actualizar" class="btn btn-green" />
            <a class="btn btn-orange" href="PEncargado.php">Cancelar</a>
        </div>
    </form>
</div>
<?php
if (isset($_POST['actualizar'])){
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $PCa->Actualizar($id,$ci,$nombre,$telefono,$direccion);
    header("location:../CapaPresentacion/PEncargado.php");
}
?>
</body>

</html>
