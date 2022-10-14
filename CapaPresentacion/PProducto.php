<?php
include "../CapaNegocio/NProducto.php";
include "../CapaNegocio/PatronPlantilla/NProductoAbstract.php";
include "../CapaNegocio/PatronPlantilla/NProductoVenta.php";
include "../CapaNegocio/PatronAdapter/NTarget.php";
include "../CapaNegocio/PatronAdapter/NAdaptado.php";
include "../CapaNegocio/PatronAdapter/NAdaptador.php";

class PProducto{

    private NProductoAbstract $nproductoventa;

    private NProducto $negocio;

    private NTarget $adapter;
    public function __construct()
    {
        $this->negocio = new NProducto();

        $this->nproductoventa = new NProductoVenta();

        $this->adapter = new NAdaptador();
    }
    public function Listar()
    {
        return $this->negocio->Listar();
    }
    public function ListarMarca()
    {
        return $this->negocio->ListarMarca();
    }
    public function Insertar($nombre,$precio,$descripcion,$idmarca,$costoVenta,$costodolar)
    {
        $this->negocio->Insertar($nombre,$precio,$descripcion,$idmarca,$costoVenta,$costodolar);
        $this->negocio->Listar();
    }
    public function Eliminar($id)
    {
        $this->negocio->Eliminar($id);
        $this->negocio->Listar();
    }

    /* */
    public function precioVenta($costo)
    {
        return $this->nproductoventa->precioTotal($costo);
    }

    public function getDolar($monto)
    {
        return $this->adapter->ingresarBs($monto);
    }
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>

<br>
<?php include '../layout/_layout.php'; $pc = new PProducto();?>
<div class="col-md-10 form-group">
    <h1>Gestionar Producto</h1>
    </br>
    <form method="POST">
        <table class="table table-responsive table-bordered">
            <div class="col-md-4 form-group">
                <label><strong>Nombre (*)</strong></label>
                <input type="text" name="nombreP" class="form-control"
                       required placeholder="nombre de producto" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Precio (*)</strong></label>
                <input type="number" name="precio" class="form-control"
                       required placeholder="precio de producto" autocomplete="off">
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Marca (*)</strong></label>
                <select type="text" name="idmarca" class="form-control" required >
                    <?php $lci= $pc->ListarMarca();
                    foreach ($lci as $item){
                        echo '<option value="'.$item->idmarca.'"selected>'.$item->nombremarca.'</option>';
                    }?>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Descripcion (*)</strong></label>
                <textarea name="descripcion" class="form-control" required placeholder="descripcion de producto"></textarea>       
            </div>
<!--            <div class="col-md-4 form-group">
                <input type="radio" name="costov" value="1" required> CON FACTURA </br>
                <input type="radio" name="costov" value="2" required> SIN FACTURA
            </div> -->
        </table>
        <div class="col-md-7 form-group">
            <input type="submit"  name="insertar" value="Guardar" class="btn btn-success"/>
        </div>
    </form>
</div>
<?php
if (isset($_POST['insertar'])){
    $nombre = $_POST['nombreP'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $idmarca = $_POST['idmarca'];
 //   $costov =$_POST['costov'];
/*    if($costov==1){
        $costoVenta = $pc->costoConFactura($precio);
    }
    else{
        $costoVenta = $pc->costoSinFactura($precio);
    } */
    $costoVenta = $pc->precioVenta($precio);
    $costodolar = $pc->getDolar($costoVenta);
    $pc->Insertar($nombre,$precio,$descripcion,$idmarca,$costoVenta,$costodolar);
}
if (isset($_POST['eliminar'])){
    $id = $_POST['idp'];
    $pc->Eliminar($id);
}
?>
<!----------------------------------------------------------->
<form method="POST"class="col-md-12 form-group"">
    <div class="col-md-10 form-group"  align="center">
        <hr width="100%"/>
        <?php $lis= $pc->Listar();?>
        <h2>Lista de Productos</h2>
        <table class="table table-responsive table-bordered table-hover table-dark">
            <thead>
            <tr>
                <th width="5%"><strong>ID</strong></th>
                <th width="15%"><strong>NOMBRE</strong></th>
                <th width="10%"><strong>COSTO (Bs)</strong></th>
                <th width="20%"><strong>DESCRIPCION</strong></th>
                <th width="15%"><strong>MARCA</strong></th>
                <th width="15%"><strong>PRECIO VENTA (Bs)</strong></th>
                <th width="15%"><strong>PRECIO VENTA ($)</strong></th>
                <th width="10%"><strong>ACCION</strong></th>
                <th width="10%"><strong>ACCION</strong></th>
            </tr>
            </thead>
</form>
<tbody>
<?php foreach ($lis as $value) {?>
    <tr>
        <td><?php echo $value->idP; ?></td>
        <td><?php echo $value->nombreP; ?></td>
        <td><?php echo $value->costo; ?></td>
        <td><?php echo $value->descripcion; ?></td>
        <td><?php echo $value->marca; ?></td>
        <td><?php echo $value->costoVenta; ?></td>
        <td><?php echo $value->costoDolar; ?></td>
        <td><form method="post">
                <?php echo "<a href='PProductoActualizar.php?idP=" . $value->idP . "' class='btn btn-info'>Editar</a>" ?>
            </form>
        </td>
        <td><form method="post">
                <input type="hidden" name="idp" value="<?php echo $value->idP ?>">
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