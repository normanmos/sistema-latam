
<?php
require_once "../bd/conbd.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
$cmbobra = (isset($_POST['cmbobra'])) ? $_POST['cmbobra'] : '';
require_once("libs/dompdf/dompdf_config.inc.php");
$html='
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Table</title>
</head>
 <h1>Reportes</h1><img src="../img/logo_header1.png" width="200px" height="100px"><br>
   <label>Nombre:<strong>Juan</strong></label><br>
   <label>Apellido:<strong>Peres Rosario</strong></label><br>
   <label>Cedula:<strong>021-3434675-8</strong></label>
   
    <table  border="1" cellpadding="1" cellspacing="1">
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
        </tr>';
 
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
         $html.='
          <tr>
            <td>'.$data["IdOperacion"].'</td>
            <td>'.$data["Empresa"].' </td>
            <td>'.$data["Obra"].'</td>
            <td>'.$data["Empleado"].'</td>
            <td>'.$data["Equipo"].'</td>
            <td>'.$data["Fecha"].'</td>
            <td>'.$data['NroParte'].'</td>
            <td>'.$h.'</td>
            <td>'.$vc.'</td>
            <td><a href="https://celiconstrucciones.com/app/obras/'.$data["Foto"].$data["Foto"].'</a></td>
          </tr>';
          }    
     $html.='
      </table>
      <strong style="color:red;">Fecha:'.$hoy = date("Y-m-d H:i:s").'</strong>
<body>
</body>
</html>';
$codigo=utf8_encode($html);
$dompdf=new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","128M");
$dompdf->render();
$hoy = date("Y-m-d");
$dompdf->stream("Reporte_$hoy.pdf");
