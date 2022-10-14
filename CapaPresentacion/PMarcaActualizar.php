<?php
include "../CapaNegocio/NMarca.php";

$PMa= new PMarcaActualizar();
class PMarcaActualizar{

    private $negocio;
    public function __construct()
    {
        $this->negocio = new NMarca();
    }

    public function ListarPorId($id)
    {
        return $this->negocio->ListarPorId($id);
    }

    public function Actualizar($id, $nombre)
    {
        $this->negocio->Actualizar($id,$nombre);
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marca</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>
<div class="col-md-12 form-group">
    <h1>Actualizar</h1>
    </br>
    <form method="post" >
        <table class="table table-responsive table-bordered">
            <?php $id = $_GET['id'];?>
            <?php foreach ($PMa->ListarPorId($id) as $value){ ?>
                <div class="col-md-4 form-group">
                    <label><strong>Nombre (*)</strong></label>
                    <input type="text" name="nombre" value="<?php echo $value->nombre ?>" class="form-control"
                           required placeholder="ingrese nombre de categoria" autocomplete="off"/>
                </div>
            <?php } ?>
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="actualizar" value="Actualizar" class="btn btn-green" />
            <a class="btn btn-orange" href="PMarca.php">Cancelar</a>
        </div>
    </form>
</div>
<?php
if (isset($_POST['actualizar'])){
    $nom = $_POST['nombre'];
    $PMa->Actualizar($id,$nom);
    header("location:../CapaPresentacion/PMarca.php");
}
?>
</body>

</html>
