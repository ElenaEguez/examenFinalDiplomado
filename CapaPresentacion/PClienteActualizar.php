<?php
include "../CapaNegocio/NCliente.php";

$PCa= new PClienteActualizar();
class PClienteActualizar{

    private $negocio;
    public function __construct()
    {
        $this->negocio = new NCliente();
    }

    public function ListarPorId($idcli)
    {
        return $this->negocio->ListarPorId($idcli);
    }
    public function ListarCiudad()
    {
        return $this->negocio->ListarCiudad();
    }
    public function Actualizar($idcli,$nombre,$telefono,$idciu)
    {
        $this->negocio->Actualizar($idcli,$nombre,$telefono,$idciu);
    }
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>

<?php $idCli = $_GET['idCli'];
$lis = $PCa->ListarPorId($idCli);
foreach ($lis as $value){
    $idciu = $value->idCiudad;
}
?>

<div class="col-md-12 form-group">
    <h1>Actualizar</h1>
    </br>
    <form method="post" >
        <table class="table table-responsive table-bordered">
            <?php foreach ($PCa->ListarPorId($idCli) as $value){ ?>
                <div class="col-md-4 form-group">
                    <label><strong>Nombre (*)</strong></label>
                    <input type="text" name="nombre" value="<?php echo $value->nombre ?>" class="form-control"
                           autocomplete="off"/>

                    <label><strong>Telefono (*)</strong></label>
                    <input type="number" name="telefono" value="<?php echo $value->telefono ?>" class="form-control"
                            autocomplete="off"/>

                    <label><strong>Ciudad (*)</strong></label>
                    <select type="text" name="idciu" class="form-control" required >
                        <?php $lc= $PCa->ListarCiudad();
                        foreach ($lc as $item) {
                            if ($item->idCiudad==$idciu){
                                echo '<option value="' . $item->idCiudad . '"selected>' . $item->nombreCiu . '</option>';
                            }else{
                                echo '<option value="' . $item->idCiudad . '">' . $item->nombreCiu . '</option>';
                            }
                        } ?>
                    </select>
                </div>
            <?php } ?>
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="actualizar" value="Actualizar" class="btn btn-green" />
            <a class="btn btn-orange" href="../CapaPresentacion/PCliente.php">Cancelar</a>
        </div>
    </form>
</div>
<?php
if (isset($_POST['actualizar'])){
    $nom = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $idciu = $_POST['idciu'];
    $PCa->Actualizar($idCli,$nom,$telefono,$idciu);
    header("location:../CapaPresentacion/PCliente.php");
}
?>
</body>

</html>
