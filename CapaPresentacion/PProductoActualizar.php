<?php
include_once "../CapaNegocio/NProducto.php";

$pa= new PProductoActualizar();
class PProductoActualizar
{
    private $negocio;
    public function __construct()
    {
        $this->negocio = new NProducto();
    }

    public function ListarPorId($idcli)
    {
        return $this->negocio->ListarPorId($idcli);
    }
    public function ListarMarca()
    {
        return $this->negocio->ListarMarca();
    }
    public function Actualizar($idp,$nombre,$costo,$descripcion,$idm)
    {
        $this->negocio->Actualizar($idp,$nombre,$costo,$descripcion,$idm);
    }
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>

<?php $idp = $_GET['idP'];
$lis = $pa->ListarPorId($idp);
foreach ($lis as $value){
    $idp = $value->id;
}
?>

<div class="col-md-12 form-group">
    <h1>Actualizar</h1>
    </br>
    <form method="post" >
        <table class="table table-responsive table-bordered">
            <?php foreach ($pa->ListarPorId($idp) as $value){ ?>
                <div class="col-md-4 form-group">
                    <label><strong>Nombre (*)</strong></label>
                    <input type="text" name="nombreP" value="<?php echo $value->nombre ?>" class="form-control"
                           autocomplete="off"/>

                    <label><strong>Costo (*)</strong></label>
                    <input type="number" name="costo" value="<?php echo $value->costo ?>" class="form-control"
                           autocomplete="off"/>

                    <label><strong>Descripcion (*)</strong></label>
                    <input type="text" name="descripcion" value="<?php echo $value->descripcion ?>" class="form-control"
                           autocomplete="off"/>

                    <label><strong>Marca (*)</strong></label>
                    <select type="text" name="idmar" class="form-control" required >
                        <?php $lc= $pa->ListarMarca();
                        foreach ($lc as $item) {
                            if ($item->idmarca==$idp){
                                echo '<option value="' . $item->idmarca . '"selected>' . $item->nombremarca . '</option>';
                            }else{
                                echo '<option value="' . $item->idmarca . '">' . $item->nombremarca . '</option>';
                            }
                        } ?>
                    </select>
                </div>
            <?php } ?>
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="actualizar" value="Actualizar" class="btn btn-green" />
            <a class="btn btn-orange" href="../CapaPresentacion/PProducto.php">Cancelar</a>
        </div>
    </form>
</div>
<?php
if (isset($_POST['actualizar'])){
    $nombre = $_POST['nombreP'];
    $costo = $_POST['costo'];
    $descripcion = $_POST['descripcion'];
    $idm = $_POST['idmar'];
    $pa->Actualizar($idp,$nombre,$costo,$descripcion,$idm);
    header("location:../CapaPresentacion/PProducto.php");
}
?>
</body>

</html>
