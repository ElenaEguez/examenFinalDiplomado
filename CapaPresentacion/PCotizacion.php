<?php
include_once "../CapaNegocio/NCotizacion.php";

$pp = new PCotizacion();
class PCotizacion
{
    public function obtenerClase($id)
    {
        $negocio = new NCotizacion();
        return $negocio->obtenerClase($id);
    }

 /*   public function Listar()
    {
        $negocio = new NCotizacion();
        return $negocio->Listar();
    }*/

    public function ListarClase()
    {
        $negocio = new NCotizacion();
        return $negocio->ListarClase();
    }

    public function ListarCliente()
    {
        $negocio = new NCotizacion();
        return $negocio->ListarCliente();
    }

 /*   public function Insertar($codp,$costo,$horai,$horaf,$idclase,$idcliente){
        $negocio = new NCotizacion();
        $negocio->Insertar($codp,$costo,$horai,$horaf,$idclase,$idcliente);
      //  $negocio->Listar();
    }*/

    public function Eliminar($id)
    {
        $negocio = new NCotizacion();
        $negocio->Eliminar($id);
    }
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/jquery-3.5.1.min.map" type="text/javascript"></script>
    <title>Inscripcion</title>
</head>

<br>
<?php include '../layout/_layout.php'; ?>
<div class="col-md-12 form-group">
    <h1>Gestionar Cotizacion</h1>
    </br>
    <form method="post">

            <div class="col-md-4 form-group">
                <label><strong>Codigo (*)</strong></label>
                <input type="text" name="codi" class="form-control" required autocomplete="off">
            </div>
        <div class="col-md-4 form-group">
            <label><strong>Fecha (*)</strong></label>
            <input type="date" name="fecha" class="form-control" required autocomplete="off">
        </div>
            <div class="col-md-4 form-group">
                <label><strong>Encargado (*)</strong></label>
                <select type="text"  name="idencargado" class="form-control" required >
                    <?php $lcli= $pp->ListarCliente();
                    foreach ($lcli as $item) {
                        echo '<option value="'.$item['id'].'"selected>'.$item['nombre'].'</option>';
                    } ?>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label><strong>Cliente (*)</strong></label>
                <select type="text"  name="idcliente" class="form-control" required >
                    <?php $lcla= $pp->ListarClase();
                    foreach ($lcla as $item) {
                        echo '<option value="'.$item['id'].'"selected>'.$item['nombre'].'</option>';
                    } ?>
                </select>
            </div>

        <div class="col-md-6 form-group">
            <button id="add" type="button" onclick="agregarInscripcion()" class="btn btn-orange">Agregar</button>
            <button type="button" class="btn btn-primary">Agregar</button>
        </div>

        <div class="col-md-12 form-group">
            <table id="tablaTemp" class="table table-responsive table-bordered">
                <thead>
                <tr>
                    <th width="10%"><strong>CODIGO</strong></th>
                    <th width="25%"><strong>CLIENTE</strong></th>
                    <th width="25%"><strong>CLASE</strong></th>
                    <th width="10%"><strong>FECHA INICIO</strong></th>
                    <th width="10%"><strong>FECHA FIN</strong></th>
                    <th width="10%"><strong>ACCION</strong></th>
                </tr>
                </thead>
            <tbody>

            </tbody>
            </table>
        </div>
        <div class="col-md-6 form-group">
            <input type="submit" name="insertar" value="Guardar" class="btn btn-success"/>
        </div>
        </form>
</div>


<?php
if (isset($_POST['insertar'])){
    $codi = $_POST['codi'];
    $costo = $_POST['costo'];
    $fechai = $_POST['fechai'];
    $fechaf = $_POST['fechaf'];
    $idcliente = $_POST['idcl'];
    $idclase = $_POST['idcla'];
  //  $pp->Insertar($codi,$costo,$fechai,$fechaf,$idclase,$idcliente);
}

if (isset($_POST['idtemp'])){
    $id = $_POST['codi'];
    $pp->Eliminar($id);
}
?>
<!----------------------------------------------------------->
<form method="POST" class="col-md-9 form-group">
  <!--  <?php $lis = $pp->Listar();?> -->
    <div class="col-md-6 form-group"  align="center">
        <h2>Lista de Inscripciones</h2>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th width="10%"><strong>NRO</strong></th>
                <th width="35%"><strong>CODIGO DE INSCRIPCION</strong></th>
                <th width="35%"><strong>FECHA</strong></th>
                <th width="20%"><strong>ACCION</strong></th>
            </tr>
            </thead>
</form>
    <tbody>
        <?php foreach ($lis as $value) {?>
    <tr>
        <td><?php echo $value['id']; ?></td>
        <td><?php echo $value['cod_pago']; ?></td>
        <td><?php echo $value['fecha'] ?></td>
        <td><form method="post">
                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                <input type="submit" name="eliminar" value="Ver" class="btn btn-red" >
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
