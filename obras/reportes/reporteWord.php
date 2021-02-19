<?php
include("conexion.php");
header('Content-type: application/vnd.ms-word');
$hoy = date("Y-m-d");
header("Content-Disposition: attachment; filename=Reporte$hoy.doc");
?>
   <h1>Reportes</h1><!--<img src="http://img/word.jpg" width="200px" height="100px"><br>-->
   <label>Nombre:<strong>Juan</strong></label><br>
   <label>Apellido:<strong>Peres Rosario</strong></label><br>
   <label>Cedula:<strong>021-3434675-8</strong></label>
     <table  border='1' cellpadding='1' cellspacing='1'>
        <tr>
          <td><strong>Id</strong></td>
          <td><strong>Cliente</strong></td>
          <td><strong>Rnc</strong></td>
          <td><strong>Fecha de Compra</strong></td>
          <td><strong>Producto</strong></td>
          <td><strong>Cantidad</strong></td>
          <td><strong>Total</strong></td>
        </tr>
 <?php
          $total=0;
          $sql="SELECT * FROM `tbfactura`";
          $res=mysqli_query($GLOBALS['cn'],$sql)or die("problema con la consulta");
       
          while($data=mysqli_fetch_array($res)){  
          ?>
          <tr>
            <td><?php echo $data['id_factura'];?></td>
            <td><?php echo $data['Cliente'];  ?> </td>
            <td><?php echo $data['RNC'];?> </td>
            <td><?php echo $data['Fecha'];?> </td>
            <td><?php echo $data['producto'];?> </td>
            <td><?php echo $data['cantidad'];?> </td>
            <td><?php echo $data['total']; ?>  </td>
          </tr>
        <?php
               $total+=$data['total'];
          }    
        ?>
          <tr>
	        	<td colspan='6' class='text-right'><strong>TOTAL:</strong></td>
	        	<td><strong style="color:green;">$<?php echo $total;?></strong> </td>
	      </tr>
      </table>
      <strong style="color:red;">Fecha: <?php echo $hoy = date("Y-m-d H:i:s");?></strong>