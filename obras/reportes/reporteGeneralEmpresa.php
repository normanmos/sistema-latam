<?php
require_once "../bd/conbd.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
$cmbobra = (isset($_POST['cmbobra'])) ? $_POST['cmbobra'] : '';
header("Content-Type: application/vnd.ms-excel");
$hoy = date("Y-m-d");
header("Content-Disposition: attachment; filename=Reporte_General_$hoy.xls");
?>
<table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <td><strong>Id</strong></td>
        <td><strong>Empresa</strong></td>
        <td><strong>Obra</strong></td>
        <td><strong>Trabajador</strong></td>
        <td><strong>Equipo/Maquinaria</strong></td>
        <td><strong>Fecha</strong></td>
        <td><strong>Nro Parte</strong></td>
        <td><strong>Horas T</strong></td>
        <td><strong>Combustible</strong></td>
        <td><strong>Foto</strong></td>
    </tr>
    <?php       
    $consulta = "SELECT O.IdOperacion,EM.Descripcion AS 'Empresa',OB.Obra AS 'Obra',
    CONCAT(E.Nombres,' ',E.Apellidos)AS'Empleado',
    CONCAT(EQ.Aleas,' ',EQ.Tipo,' ',EQ.Marca) AS'Equipo',
    O.Fecha,O.NroParte,O.Horas,O.Combustible,O.Foto FROM operaciones O
    INNER JOIN empresas EM ON (O.IdEmpresa=EM.IdEmpresa)
    INNER JOIN obras OB ON (O.IdObra=OB.IdObra)
    INNER JOIN empleados E ON (O.IdEmpleado=E.IdEmpleado) 
    INNER JOIN equipos EQ ON (O.IdEquipo=EQ.IdEquipo)
    WHERE O.IdEmpresa = '$cmbempresa' AND O.IdObra = '$cmbobra' AND O.IdEstado=1 ORDER BY O.IdOperacion ASC";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $dato=$resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($dato as $data){
        $horas = $data["Horas"];  
        $h = number_format($horas, 2, ",", ".");
        $comb = $data["Combustible"];
        $vc = number_format($comb, 2, ",", ".");
    ?>
    <tr>
        <td><?php echo $data["IdOperacion"];?></td>
        <td><?php echo $data["Empresa"];?> </td>
        <td><?php echo $data["Obra"];?> </td>
        <td><?php echo $data["Empleado"];?></td>
        <td><?php echo $data["Equipo"];?></td>
        <td><?php echo $data["Fecha"];?></td>
        <td><?php echo $data['NroParte']; ?></td>
        <td><?php echo $h ?></td>
        <td><?php echo $vc ?></td>
        <td><a href="https://celiconstrucciones.com/app/obras/<?php echo $data["Foto"];?>"><?php echo $data["Foto"];?></a></td>
    </tr>
    <?php        
   }  
    ?>
</table>
</strong>