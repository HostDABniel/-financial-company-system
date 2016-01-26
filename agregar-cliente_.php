<?php
session_start();

if((isset($_SESSION["user"])) && ($_SESSION["tipo"] == 'admin') || ($_SESSION["tipo"] == 'vendedor')){
	
include ("panel/conn1.php");
include ("panel/rempla_fech.php");

$id = $_POST["id"];if($id == ''){$id = $_REQUEST["id"];};
$vi = $_POST["vi"];if($vi == ''){$vi = $_REQUEST["vi"];};
$tipo = $_POST["tipo"];if($tipo == ''){$tipo = $_REQUEST["tipo"];};

if ($id != ''){
	$sql1 = "SELECT * FROM cliente WHERE id='".$id."' ";
	$result1 = mysql_query($sql1, $conn1);
	$row = mysql_fetch_array($result1);
};


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<link href="styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>

<body>

<div class="log-out">
  <div class="lo-logo"><img src="logopocket.png"  height="42" /></div>
  <div class="lo-logout"><a href="salir.php">Cerrar sesión</a></div>
</div>

    <div class="menubar" >
  <a href="programacion.php" class="op log"></a>
<?php   $sql7 = "SELECT * FROM  usuario WHERE id='".$_SESSION["iduser"]."' ORDER BY id ASC";
        $result7 = mysql_query($sql7, $conn1);
        $row7 = mysql_fetch_array($result7); 
?>
  <a href="cuenta.php" class="op loname">Bienvenido <?php echo $row7["nombre"];?>! <br /></a>



  <a href="programacion.php" class="op lop">Inicio</a>
  <a href="estadisticas.php" class="op mop">Estadisticas</a>
<?php if($_SESSION["tipo"] == 'admin'){?>  <a href="usuarios.php" class="op rop">Usuarios</a><?php  };?>
</div>
  
<div class="bann-int">
<div class="today">
<?php  
  $created = date("Y-m-d H:i:s");
  $dia_hoy = substr($created,8,2);
  $mes_hoy = substr($created,5,2); 
?>
<span class="day"><?php echo replacemes($mes_hoy);?></span>
<span class="dayn"><?php echo $dia_hoy;?> </span>
</div>
<div class="btn-proys"><a href="cliente.php"><img src="back-clientes.png" width="44" height="44" /></a></div>
<span class="titlesec">CLIENTES</span>
</div>  
    


<div class="tp">
<div class="subpanel">
<!--<a href="datos.php"><img src="ic-sets.png" width="20" height="20" /></a>
<a href="index.php"><img src="ic-home.png" width="20" height="20" style="margin-right:12px"/></a>
--></div>
  <div class="cf"></div>
</div>



<form method="post" action="panel/a_cli.php?id=<?php echo $id;?>&vi=<?php echo $vi;?>" name="frmRegistro">
<div class="onecol"><span class="titlecol-ad"><?php if($tipo == ''){echo 'Agregar';}else{echo 'Modificar';};?> cliente </span>
  




<?php /*if($_SESSION["tipo"] != 'vendedor') {?>
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="vendedor" id="textfield" placeholder="Vendedor asignado:" value="<?php echo $row["vendedor"];?>"/>-->
      <select name="vendedor" id="textfield"  class="hospitalx" style="height: 44px;">
      <option value="" disabled="disabled" selected>Vendedor </option>
      <?php //  
        $sql9h= "SELECT * FROM vendedor ORDER BY nombre, apellido ASC";
        $result9h = mysql_query($sql9h, $conn1);
        while($row9h = mysql_fetch_array($result9h)){ 
      ?>    
      <option value="<?php echo $row9h["id"]?>"<?php 
                  if($row["vendedor"] == $row9h["id"]){
                  echo ' selected';}; 
                  ?>><?php echo $row9h["nombre"].' '.$row9h["apellido"]?></option>
      <?php };///?>
      </select>
    </div><div class="campb dospor">
      <label for="textfield"></label>
      <!--<input type="text" name="rfc" id="textfield" placeholder="RFC:" value="<?php echo $row["rfc"];?>"/>      -->
    </div>
  </div>
<?php };//*/?>




<!---------------------------------------  PERFIL PERSONAL ------------------------ -->
<div id="P_Personal" style="display:block;">




  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="folio" id="textfield" placeholder="Folio" value="<?php echo $row["folio"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="contacto" placeholder="Nombre" value="<?php echo $row["contacto"];?>" class="hospitalx mayusculas"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="apellido_materno" class="hospitalx mayusculas" placeholder="Apellido Materno:" value="<?php echo $row["apellido_materno"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="apellido_paterno" class="hospitalx mayusculas" placeholder="Apellido Paterno" value="<?php echo $row["apellido_paterno"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="fecha_nacimiento" id="textfield" placeholder="Fecha Nacimiento:" value="<?php echo $row["fecha_nacimiento"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="lugar_nacimiento" id="textfield" placeholder="Lugar Nacimiento:" value="<?php echo $row["lugar_nacimiento"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="sexo" id="textfield" placeholder="Sexo" value="<?php echo $row["sexo"];?>"/>-->
      <select name="sexo"  class="hospitalx">
        <option value="h"> Hombre </option>
        <option value="m"> Mujer </option>
      </select>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="celular" id="textfield" placeholder="Celular" value="<?php echo $row["celular"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="email" id="textfield" placeholder="email:" value="<?php echo $row["email"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="telefono" id="textfield" placeholder="telefono" value="<?php echo $row["telefono"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="rfc" id="textfield" placeholder="RFC:" value="<?php echo $row["rfc"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="CURP" id="textfield" placeholder="CURP" value="<?php echo $row["CURP"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="como_entero" id="textfield" placeholder="como_entero:" value="<?php echo $row["como_entero"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="telefono" id="textfield" placeholder="telefono" value="<?php echo $row["telefono"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <input type="hidden" id="numero_domicilios" value="1"/>
    <div>Domicilio <a onclick="mas_dom()">(+)</a></div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="domicilio" id="textfield" placeholder="Direccion" value="<?php echo $row["domicilio"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="calles" id="textfield" placeholder="Entre que calles y referencia de domicilio" value="<?php echo $row["calles"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="desde_cuando" id="textfield" placeholder="Desde Cuando vives ahi" value="<?php echo $row["desde_cuando"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="calles" id="textfield" placeholder="Calles" value="<?php echo $row["calles"];?>"/>-->
    </div>
  </div>


<div class="campitem-cliente" id="domicilios_extras"></div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <div>Dependientes</div>
      <input type="hidden" id="numero_dependientes0" value="0"/>
      <select name="numero_dependientes" id="numero_dependientes"  class="hospitalx" style="height: 44px;" onchange="mas_dep()">
          <option value="0" disabled="disabled" selected>Cantidad de Dependientes </option>
          <option value="0" <?php if($row["numero_dependientes"] == '0'){echo 'selected';};?>> 0 </option>
          <option value="1" <?php if($row["numero_dependientes"] == '1'){echo 'selected';};?>> 1 </option>
          <option value="2" <?php if($row["numero_dependientes"] == '2'){echo 'selected';};?>> 2 </option>
          <option value="3" <?php if($row["numero_dependientes"] == '3'){echo 'selected';};?>> 3 </option>
          <option value="4" <?php if($row["numero_dependientes"] == '4'){echo 'selected';};?>> 4 </option>
          <option value="5" <?php if($row["numero_dependientes"] == '5'){echo 'selected';};?>> 5 </option>
          <option value="6" <?php if($row["numero_dependientes"] == '6'){echo 'selected';};?>> 6 </option>
          <option value="7" <?php if($row["numero_dependientes"] == '7'){echo 'selected';};?>> 7 </option>
          <option value="8" <?php if($row["numero_dependientes"] == '8'){echo 'selected';};?>> 8 </option>
          <option value="9" <?php if($row["numero_dependientes"] == '9'){echo 'selected';};?>> 9 </option>
          <option value="10" <?php if($row["numero_dependientes"] == '10'){echo 'selected';};?>> 10 </option>
          <option value="11" <?php if($row["numero_dependientes"] == '11'){echo 'selected';};?>> 11 </option>
          <option value="12" <?php if($row["numero_dependientes"] == '12'){echo 'selected';};?>> 12 </option>
      </select>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="calles" id="textfield" placeholder="Entre que calles y referencia de domicilio" value="<?php echo $row["calles"];?>"/>-->
    </div>
  </div>


  <div class="campitem-cliente" id="dependientes_extras"></div>





  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="num_personas_tech" id="textfield" placeholder="Nº personas bajo el mismo techo" value="<?php echo $row["num_personas_tech"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="salud_problemas" id="textfield" placeholder="Alguno de ustedes tiene problemas de salud?" value="<?php echo $row["salud_problemas"];?>"/>
    </div>
  </div>




  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="salud_comentario" id="textfield" placeholder="Que Problema?" value="<?php echo $row["salud_comentario"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="tipo_casa" id="textfield" placeholder="tipo_casa" value="<?php echo $row["tipo_casa"];?>"/>-->
      <select name="tipo_casa"  class="hospitalx">
        <option value="0" disabled="disabled" selected>Vive en Casa </option>
        <option value="Propia" <?php if($row["tipo_casa"] == 'Propia'){echo 'selected';};?>> Propia </option>
        <option value="Financiada" <?php if($row["tipo_casa"] == 'Financiada'){echo 'selected';};?>> Financiada </option>
        <option value="Rentada" <?php if($row["tipo_casa"] == 'Rentada'){echo 'selected';};?>> Rentada </option>
        <option value="Familiar" <?php if($row["tipo_casa"] == 'Familiar'){echo 'selected';};?>> De un Familiar </option>
      </select>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="arrendador_nombre" id="textfield" placeholder="Nombre arrendador" value="<?php echo $row["arrendador_nombre"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="arrendador_celular" id="textfield" placeholder="Celular arrendador" value="<?php echo $row["arrendador_celular"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="familiar_nombre" id="textfield" placeholder="Nombre del familiar" value="<?php echo $row["familiar_nombre"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="familiar_parentesco" id="textfield" placeholder="parentesco" value="<?php echo $row["familiar_parentesco"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="familiar_domicilio" id="textfield" placeholder="Domicilio del familiar:" value="<?php echo $row["familiar_domicilio"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="familiar_referencia_dom" id="textfield" placeholder="Referencia del domicilio" value="<?php echo $row["familiar_referencia_dom"];?>"/>
    </div>
  </div>




</div>
<!---------------------------------------  FIN PERFIL PERSONAL ------------------------ -->



<!---------------------------------------  PERFIL LABORAL ------------------------ -->
<div id="perfil_laboral">

<span class="titlecol-ad">Perfil Laboral</span>

  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="ocupacion" id="textfield" placeholder="Ocupacion:" value="<?php echo $row["ocupacion"];?>"/>-->
      <select name="ocupacion"  class="hospitalx">
      <option value="" disabled="disabled" selected>Ocupacion</option>
        <option value="Empleado" <?php if($row["ocupacion"] == 'Empleado'){echo 'selected';};?>> Empleado </option>
        <option value="Independiente" <?php if($row["ocupacion"] == 'Independiente'){echo 'selected';};?>> Independiente </option>
        <option value="Pensionado" <?php if($row["ocupacion"] == 'Pensionado'){echo 'selected';};?>> Pensionado </option>
      </select>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="jefe_nombre" id="textfield" placeholder="Nombre del Jefe" value="<?php echo $row["jefe_nombre"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="jefe_celular" id="textfield" placeholder="Celular del Jefe:" value="<?php echo $row["jefe_celular"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="empresa_nombre" id="textfield" placeholder="Nombre de la empresa" value="<?php echo $row["empresa_nombre"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="empresa_sector" id="textfield" placeholder="Sector de la Empresa:" value="<?php echo $row["empresa_sector"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="empresa_puesto" id="textfield" placeholder="Puesto de la Empresa" value="<?php echo $row["empresa_puesto"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="empresa_direccion" id="textfield" placeholder="Direccion de la Empresa:" value="<?php echo $row["empresa_direccion"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="empresa_referencia" id="textfield" placeholder="Referencias de la Direccion" value="<?php echo $row["empresa_referencia"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="trabajo_horario" id="textfield" placeholder="Horario de Trabajo:" value="<?php echo $row["trabajo_horario"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="trabajo_entrada" id="textfield" placeholder="Hora de Entrada" value="<?php echo $row["trabajo_entrada"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="trabajo_salida" id="textfield" placeholder="Hora de Salida:" value="<?php echo $row["trabajo_salida"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="trabajo_telefono1" id="textfield" placeholder="Telefono de la Empresa" value="<?php echo $row["trabajo_telefono1"];?>"/>
    </div>
  </div>

<!--
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="trabajo_telefono2" id="textfield" placeholder="trabajo_telefono2:" value="<?php echo $row["trabajo_telefono2"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="trabajo_telefono3" id="textfield" placeholder="trabajo_telefono3" value="<?php echo $row["trabajo_telefono3"];?>"/>
    </div>
  </div>
-->

  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="trabajo_tiempo" id="textfield" placeholder="Tiempo de Trabajo en la Empresa:" value="<?php echo $row["trabajo_tiempo"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="jefe_nombre" id="textfield" placeholder="jefe_nombre" value="<?php echo $row["jefe_nombre"];?>"/>-->
    </div>
  </div>



</div>
<!---------------------------------------  FIN PERFIL LABORAL ------------------------ -->



<!---------------------------------------  PERFIL ECONOMICO ------------------------ -->
<div id="perfil_economico">
  

<span class="titlecol-ad">Perfil Economico</span>

  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ganancias_mes" id="textfield" placeholder="Cuanto ganas en promedio al mes, libre de impuestos?" value="<?php echo $row["ganancias_mes"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="pago_tipo" id="textfield" placeholder="Como te pagan? " value="<?php echo $row["pago_tipo"];?>"/>-->

      <select name="pago_tipo"  class="hospitalx">
      <option value="" disabled="disabled" selected>Como te pagan?</option>
        <option value="Semanal" <?php if($row["pago_tipo"] == 'Semanal'){echo 'selected';};?>> Semanal </option>
        <option value="Quincenal" <?php if($row["pago_tipo"] == 'Quincenal'){echo 'selected';};?>> Quincenal </option>
        <option value="Mensual" <?php if($row["pago_tipo"] == 'Mensual'){echo 'selected';};?>> Mensual </option>
        <option value="Otro" <?php if($row["pago_tipo"] == 'Otro'){echo 'selected';};?>> Otro </option>
      </select>

    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pago_dia" id="textfield" placeholder="Que días del mes te pagan?" value="<?php echo $row["pago_dia"];?>"/>
     </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="pago_lugar" id="textfield" placeholder="pago_lugar" value="<?php echo $row["pago_lugar"];?>"/>-->
      <select name="pago_lugar"  class="hospitalx">
        <option value="" disabled="disabled" selected>Te Pagan en:</option>
        <option value="Banco" <?php if($row["pago_lugar"] == 'Banco'){echo 'selected';};?>> Banco </option>
        <option value="Efectivo" <?php if($row["pago_lugar"] == 'Efectivo'){echo 'selected';};?>> Efectivo </option>
      </select>   
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pago_banco" id="textfield" placeholder="En cual Banco?:" value="<?php echo $row["pago_banco"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pago_banco_succaj" id="textfield" placeholder="Sucursal o cajero en el que lo cobra" value="<?php echo $row["pago_banco_succaj"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pago_donde" id="textfield" placeholder="En donde te lo entregan?:" value="<?php echo $row["pago_donde"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pago_horario" id="textfield" placeholder="A que horas?" value="<?php echo $row["pago_horario"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="otros_ingresos" id="textfield" placeholder="Tienes otros ingresos?" value="<?php echo $row["otros_ingresos"];?>"/>-->
      <select name="otros_ingresos"  class="hospitalx">
        <option value="" disabled="disabled" selected>Tienes otros ingresos?</option>
        <option value="Si" <?php if($row["otros_ingresos"] == 'Si'){echo 'selected';};?>> Si </option>
        <option value="No" <?php if($row["otros_ingresos"] == 'No'){echo 'selected';};?>> No </option>
      </select>   
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="otros_ingresos_monto" id="textfield" placeholder="Monto mensual ibre" value="<?php echo $row["otros_ingresos_monto"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="otros_ingresos_tipoingr" id="textfield" placeholder="Tipo de ingresos:" value="<?php echo $row["otros_ingresos_tipoingr"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="estado_civil" id="textfield" placeholder="Estado civil" value="<?php echo $row["estado_civil"];?>"/>-->
      <select name="estado_civil"  class="hospitalx">
        <option value="" disabled="disabled" selected>Estado civil</option>
        <option value="Soltero" <?php if($row["estado_civil"] == 'Soltero'){echo 'selected';};?>> Soltero </option>
        <option value="Casado" <?php if($row["estado_civil"] == 'Casado'){echo 'selected';};?>> Casado </option>
        <option value="Union_Libre" <?php if($row["estado_civil"] == 'Union_Libre'){echo 'selected';};?>> Union Libre </option>
        <option value="Divorciado" <?php if($row["estado_civil"] == 'Divorciado'){echo 'selected';};?>> Divorciado </option>
        <option value="Viudo" <?php if($row["estado_civil"] == 'Viudo'){echo 'selected';};?>> Viudo </option>
      </select> 
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pareja_ganancia" id="textfield" placeholder="Cuanto gana en promedio al mes tu pareja, libres?" value="<?php echo $row["pareja_ganancia"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pareja_empresa" id="textfield" placeholder="Nombre de la empresa donde trabaja:" value="<?php echo $row["pareja_empresa"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pareja_sector" id="textfield" placeholder="Sector:" value="<?php echo $row["pareja_sector"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pareja_puesto" id="textfield" placeholder="Puesto que desempeña:" value="<?php echo $row["pareja_puesto"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pareja_direccion" id="textfield" placeholder="Direccion del Trabajo:" value="<?php echo $row["pareja_direccion"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pareja_referencia" id="textfield" placeholder="Referencia para ubicar su trabajo" value="<?php echo $row["pareja_referencia"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="pareja_horario" id="textfield" placeholder="pareja_horario:" value="<?php echo $row["pareja_horario"];?>"/>-->
      <select name="pareja_horario"  class="hospitalx">
        <option value="" disabled="disabled" selected>Horario de trabajo</option>
        <option value="Quebrado" <?php if($row["pareja_horario"] == 'Quebrado'){echo 'selected';};?>> Quebrado </option>
        <option value="Corrido" <?php if($row["pareja_horario"] == 'Corrido'){echo 'selected';};?>> Corrido </option>
      </select> 
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pareja_entrada" id="textfield" placeholder="Hora de entrada" value="<?php echo $row["pareja_entrada"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pareja_salida" id="textfield" placeholder="Hora de salida:" value="<?php echo $row["pareja_salida"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pareja_telefono_trabajo1" id="textfield" placeholder="Telefono del trabajo" value="<?php echo $row["pareja_telefono_trabajo1"];?>"/>
    </div>
  </div>

<!--
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
    <input type="text" name="pareja_telefono_trabajo2" id="textfield" placeholder="Telefono del trabajo" value="<?php echo $row["pareja_telefono_trabajo2"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="pareja_telefono_trabajo3" id="textfield" placeholder="Telefono del trabajo" value="<?php echo $row["pareja_telefono_trabajo3"];?>"/>
    </div>
  </div>

-->

  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="pareja_tiempo_trabajo" id="textfield" placeholder="Cuanto tiempo lleva trabajando ahi?" value="<?php echo $row["pareja_tiempo_trabajo"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>-->
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="parejaex_mensualidad" id="textfield" placeholder="Le da una mensualidad a su ex pareja? Si o no" value="<?php echo $row["parejaex_mensualidad"];?>"/>-->
      <select name="parejaex_mensualidad"  class="hospitalx">
        <option value="" disabled="disabled" selected>Le da una mensualidad a su ex pareja?</option>
        <option value="Si" <?php if($row["parejaex_mensualidad"] == 'Si'){echo 'selected';};?>> Si </option>
        <option value="No" <?php if($row["parejaex_mensualidad"] == 'No'){echo 'selected';};?>> No </option>
      </select> 
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="parejaex_mensualidad_cant" id="textfield" placeholder="Que Cantidad?" value="<?php echo $row["parejaex_mensualidad_cant"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
  <div>EGRESOS:</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="eg_casa_mensualidad" id="textfield" placeholder="Mensualidad de casa:" value="<?php echo $row["eg_casa_mensualidad"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="eg_casa_servicios" id="textfield" placeholder="Servicios de la casa" value="<?php echo $row["eg_casa_servicios"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="eg_alimentacion" id="textfield" placeholder="Alimentacion" value="<?php echo $row["eg_alimentacion"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="eg_escuelas" id="textfield" placeholder="Escuelas" value="<?php echo $row["eg_escuelas"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="eg_carro_mensualidad" id="textfield" placeholder="Mensualidad de carro" value="<?php echo $row["eg_carro_mensualidad"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="eg_transporte" id="textfield" placeholder="Gasolina y/o Transportes" value="<?php echo $row["eg_transporte"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="eg_tagera_credito" id="textfield" placeholder="Tarjetas de credito:" value="<?php echo $row["eg_tagera_credito"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="eg_celulares" id="textfield" placeholder="Celulares" value="<?php echo $row["eg_celulares"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="eg_otros" id="textfield" placeholder="Otros:" value="<?php echo $row["eg_otros"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>-->
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <select name="deudas_actuales"  class="hospitalx">
        <option value="" disabled="disabled" selected>Tienes deudas actuales?</option>
        <option value="Si" <?php if($row["deudas_actuales"] == 'Si'){echo 'selected';};?>> Si </option>
        <option value="No" <?php if($row["deudas_actuales"] == 'No'){echo 'selected';};?>> No </option>
      </select> 
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="deudas_cuantas" id="textfield" placeholder="Cuantas deudas?  (elegir del 1 al 5)" value="<?php echo $row["deudas_cuantas"];?>"/>-->
      <select name="deudas_cuantas"  class="hospitalx">
        <option value="" disabled="disabled" selected>Cuantas deudas?</option>
          <option value="1" <?php if($row["deudas_cuantas"] == '1'){echo 'selected';};?>> 1 </option>
          <option value="2" <?php if($row["deudas_cuantas"] == '2'){echo 'selected';};?>> 2 </option>
          <option value="3" <?php if($row["deudas_cuantas"] == '3'){echo 'selected';};?>> 3 </option>
          <option value="4" <?php if($row["deudas_cuantas"] == '4'){echo 'selected';};?>> 4 </option>
          <option value="5" <?php if($row["deudas_cuantas"] == '5'){echo 'selected';};?>> 5 </option>
      </select> 
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="deudas_aquien" id="textfield" placeholder="A quien le debes?:" value="<?php echo $row["deudas_aquien"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="deudas_cuanto" id="textfield" placeholder="Cuanto le debes?" value="<?php echo $row["deudas_cuanto"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="deudas_abono_mes" id="textfield" placeholder="Cuando abonas mensual?:" value="<?php echo $row["deudas_abono_mes"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="resultado" id="textfield" placeholder="Resultado (ingresos - egresos)" value="<?php echo $row["resultado"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="dinero_disponible" id="textfield" placeholder="De cuanto dinero mensual dispones para cumplir con los pagos de un nuevo crédito?" value="<?php echo $row["dinero_disponible"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="financieras_otras_cliente" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["financieras_otras_cliente"];?>"/>-->
      <select name="financieras_otras_cliente"  class="hospitalx">
        <option value="" disabled="disabled" selected>Has sido cliente de otras financieras?</option>
        <option value="Si" <?php if($row["financieras_otras_cliente"] == 'Si'){echo 'selected';};?>> Si </option>
        <option value="No" <?php if($row["financieras_otras_cliente"] == 'No'){echo 'selected';};?>> No </option>
      </select> 
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="financieras_otras_nombre" id="textfield" placeholder="Cual financiera?" value="<?php echo $row["financieras_otras_nombre"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="financieras_otras_quedaste" id="textfield" placeholder="Como quedaste?" value="<?php echo $row["financieras_otras_quedaste"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <select name="estas_buro"  class="hospitalx">
        <option value="" disabled="disabled" selected>Estas en buró de crédito?</option>
        <option value="Si" <?php if($row["estas_buro"] == 'Si'){echo 'selected';};?>> Si </option>
        <option value="No" <?php if($row["estas_buro"] == 'No'){echo 'selected';};?>> No </option>
      </select>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="estas_buro_porque" id="textfield" placeholder="Por que?" value="<?php echo $row["estas_buro_porque"];?>"/>
    </div>
  </div>

<!--
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss:" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
  </div>
-->

</div>
<!---------------------------------------  FIN PERFIL ECONOMICO ------------------------ -->


<!---------------------------------------    PROPIEDADES ------------------------ -->

<div id="propiedades">
  

<span class="titlecol-ad">Propiedades</span>


  <div class="campitem-cliente">  
  <div>Carro (+)</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="marca" id="textfield" placeholder="Marca:" value="<?php echo $row["marca"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="modelo" id="textfield" placeholder="Modelo" value="<?php echo $row["modelo"];?>"/>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="year" id="textfield" placeholder="Año" value="<?php echo $row["year"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="propietario" id="textfield" placeholder="Propietario" value="<?php echo $row["propietario"];?>"/>-->
      <select name="propietario"  class="hospitalx">
        <option value="" disabled="disabled" selected>Propietario</option>
        <option value="A_tu_nombre" <?php if($row["propietario"] == 'A_tu_nombre'){echo 'selected';};?>> A tu nombre </option>
        <option value="Financiado" <?php if($row["propietario"] == 'Financiado'){echo 'selected';};?>> Financiado </option>
        <option value="Del_Trabajo" <?php if($row["propietario"] == 'Del_Trabajo'){echo 'selected';};?>> Del Trabajo </option>
        <option value="de_Familiar" <?php if($row["propietario"] == 'de_Familiar'){echo 'selected';};?>> de un Familiar </option>
      </select>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <select name="tipo"  class="hospitalx">
        <option value="" disabled="disabled" selected>Tipo</option>
        <option value="Nacional" <?php if($row["tipo"] == 'Nacional'){echo 'selected';};?>> Nacional</option>
        <option value="Importado" <?php if($row["tipo"] == 'Importado'){echo 'selected';};?>> Importado </option>
        <option value="Americano" <?php if($row["tipo"] == 'Americano'){echo 'selected';};?>> Americano </option>
      </select>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="multas" id="textfield" placeholder="Debe multas?" value="<?php echo $row["multas"];?>"/>-->
      <select name="multas"  class="hospitalx">
        <option value="" disabled="disabled" selected>Debe multas?</option>
        <option value="Si" <?php if($row["multas"] == 'Si'){echo 'selected';};?>> Si</option>
        <option value="No" <?php if($row["multas"] == 'No'){echo 'selected';};?>> No </option>
      </select>
    </div>
  </div>



  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="cuando" id="textfield" placeholder="Cuanto?" value="<?php echo $row["cuando"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="placa" id="textfield" placeholder="Numero de placa" value="<?php echo $row["placa"];?>"/>
    </div>
  </div>




  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="num_serie" id="textfield" placeholder="Numero de serie:" value="<?php echo $row["num_serie"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="comentarios" id="textfield" placeholder="Comentarios" value="<?php echo $row["comentarios"];?>"/>
    </div>
  </div>


<!--
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss:" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
  </div>
-->


</div>

<!---------------------------------------  FIN PROPIEDADES ------------------------ -->



<!---------------------------------------  FIN REFERENCIAS ------------------------ -->

<div id="referencias">


  

<span class="titlecol-ad">REFERENCIAS</span>




  <div class="campitem-cliente">
    <div class="campb">
    <div>FAMILIAR QUE VIVA CON USTED</div>
      <label for="textfield"></label>
      <input type="text" name="ref_familiar" id="textfield" placeholder="Nombre" value="<?php echo $row["ref_familiar"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_domicil" id="textfield" placeholder="Domicilio" value="<?php echo $row["ref_familiar_domicil"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_parentesco" id="textfield" placeholder="Parentesco" value="<?php echo $row["ref_familiar_parentesco"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_celular" id="textfield" placeholder="Celular" value="<?php echo $row["ref_familiar_celular"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_telefono" id="textfield" placeholder="Telefono" value="<?php echo $row["ref_familiar_telefono"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>      
    </div>
  </div>


  <div class="campitem-cliente">
  <div>FAMILIAR QUE VIVA CON USTED</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_viva" id="textfield" placeholder="Nombre" value="<?php echo $row["ref_familiar_viva"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_viva_domicil" id="textfield" placeholder="Domicilio" value="<?php echo $row["ref_familiar_viva_domicil"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_viva_parentesco" id="textfield" placeholder="Parentesco:" value="<?php echo $row["ref_familiar_viva_parentesco"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_viva_celular" id="textfield" placeholder="Celular" value="<?php echo $row["ref_familiar_viva_celular"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_viva_telefono" id="textfield" placeholder="Telefono:" value="<?php echo $row["ref_familiar_viva_telefono"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>-->
    </div>
  </div>


  <div class="campitem-cliente">
  <div>FAMILIAR QUE NO VIVA CON USTED</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_noviva" id="textfield" placeholder="Nombre" value="<?php echo $row["ref_familiar_noviva"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_noviva_domicil" id="textfield" placeholder="Domicilio" value="<?php echo $row["ref_familiar_noviva_domicil"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_noviva_parentesco" id="textfield" placeholder="Parentesco:" value="<?php echo $row["ref_familiar_noviva_parentesco"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_noviva_celular" id="textfield" placeholder="Celular" value="<?php echo $row["ref_familiar_noviva_celular"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_familiar_noviva_telefono" id="textfield" placeholder="Telefono:" value="<?php echo $row["ref_familiar_noviva_telefono"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>-->
    </div>
  </div>


  <div class="campitem-cliente">
  <div>COMPAÑERO DE TRABAJO</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_com_trabajo" id="textfield" placeholder="Nombre" value="<?php echo $row["ref_com_trabajo"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_com_trabajo_domicil" id="textfield" placeholder="Domicilio" value="<?php echo $row["ref_com_trabajo_domicil"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_com_trabajo_parentesco" id="textfield" placeholder="Parentesco:" value="<?php echo $row["ref_com_trabajo_parentesco"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_com_trabajo_celular" id="textfield" placeholder="Celular" value="<?php echo $row["ref_com_trabajo_celular"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_com_trabajo_telefono" id="textfield" placeholder="Telefono:" value="<?php echo $row["ref_com_trabajo_telefono"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="ref_amigo" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["ref_amigo"];?>"/>-->
    </div>
  </div>


  <div class="campitem-cliente">
  <div>AMIGO</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_amigo" id="textfield" placeholder="Nombre" value="<?php echo $row["ref_amigo"];?>"/>      
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_amigo_domicil" id="textfield" placeholder="Domicilio:" value="<?php echo $row["ref_amigo_domicil"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_amigo_parentesco" id="textfield" placeholder="Parentesco" value="<?php echo $row["ref_amigo_parentesco"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="ref_amigo_celular" id="textfield" placeholder="Celular:" value="<?php echo $row["ref_amigo_celular"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="ref_amigo_telefono" id="textfield" placeholder="Telefono" value="<?php echo $row["ref_amigo_telefono"];?>"/
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="ref_amigo_celular" id="textfield" placeholder="iiiiiissss:" value="<?php echo $row["ref_amigo_celular"];?>"/>>-->
    </div>
  </div>


  <div class="campitem-cliente">
  <div>REFERENCIAS CREDITICIAS (+)</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="num_tarjeta" id="textfield" placeholder="Numero de tarjeta" value="<?php echo $row["num_tarjeta"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="institucion" id="textfield" placeholder="Institucion" value="<?php echo $row["institucion"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="limite_credito" id="textfield" placeholder="Limite de crédito exacto" value="<?php echo $row["limite_credito"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="institucion" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["institucion"];?>"/>-->
    </div>
  </div>

<!--
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss:" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
  </div>
-->


</div>

<!---------------------------------------  FIN REFERENCIAS ------------------------ -->


<!---------------------------------------   ANALISIS DE CLIENTE ------------------------ -->

<div id="analisis_cliente">

<span class="titlecol-ad">ANALISIS DE CLIENTE</span>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <!--<input type="text" name="riesgo" id="textfield" placeholder="Riesgo" value="<?php echo $row["riesgo"];?>"/>-->
      <select name="riesgo"  class="hospitalx">
        <option value="" disabled="disabled" selected>Riesgo</option>
        <option value="Alto" <?php if($row["riesgo"] == 'Alto'){echo 'selected';};?>> Si</option>
        <option value="Bajo" <?php if($row["riesgo"] == 'Bajo'){echo 'selected';};?>> No </option>
      </select>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="google" id="textfield" placeholder="Google" value="<?php echo $row["google"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="buro_credito" id="textfield" placeholder="Buró de crédito" value="<?php echo $row["buro_credito"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="linea_credito" id="textfield" placeholder="Linea de crédito" value="<?php echo $row["linea_credito"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="buro_interno" id="textfield" placeholder="Buró interno:" value="<?php echo $row["buro_interno"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="papeles_carro" id="textfield" placeholder="Papeles carro" value="<?php echo $row["papeles_carro"];?>"/>-->
      <select name="papeles_carro"  class="hospitalx">
        <option value="" disabled="disabled" selected>Papeles carro</option>
        <option value="Si" <?php if($row["papeles_carro"] == 'Si'){echo 'selected';};?>> Si</option>
        <option value="No" <?php if($row["papeles_carro"] == 'No'){echo 'selected';};?>> No </option>
      </select>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="aval" id="textfield" placeholder="Aval" value="<?php echo $row["aval"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="comentarios_analisis" id="textfield" placeholder="Comentarios" value="<?php echo $row["comentarios_analisis"];?>"/>
    </div>
  </div>


  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="observaciones_grales" id="textfield" placeholder="Observaciones:" value="<?php echo $row["observaciones_grales"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <!--<input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>-->
    </div>
  </div>

<!--
  <div class="campitem-cliente">
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss:" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
    <div class="campb dosporch">
      <label for="textfield"></label>
      <input type="text" name="iiiiiissss" id="textfield" placeholder="iiiiiissss" value="<?php echo $row["iiiiiissss"];?>"/>
    </div>
  </div>
-->


</div>

<!---------------------------------------  FIN ANALISIS DE CLIENTE ------------------------ -->
  <div class="cf"></div>
  
  <div class="save-btns">
      <input type="submit" name="add"  value="Guardar" class="rax"/> </div>
  </div>
  
  
  
  
  
  
  
  <div class="cf"></div>
</div>
</form>
<?php //*?/?>



<div id="copydom">
    <div class="campitem-cliente0">
          <div>Domicilio</div>
          <div class="campb">
              <input type="text" name="domicilio" id="textfield" placeholder="Direccion" value="<?php echo $row["domicilio"];?>"/>
          </div>
          <div class="campb dosporch">
              <input type="text" name="calles" id="textfield" placeholder="Entre que calles y referencia de domicilio" value="<?php echo $row["calles"];?>"/>
          </div>
    </div>
    <div class="campitem-cliente0">
        <div class="campb">
          <input type="text" name="desde_cuando" id="textfield" placeholder="Desde Cuando vives ahi" value="<?php echo $row["desde_cuando"];?>"/>
        </div>
        <div class="campb dosporch">
          <!--<input type="text" name="calles" id="textfield" placeholder="Calles" value="<?php echo $row["calles"];?>"/>-->
        </div>
    </div>
</div>

<div id="copydep">
  <div class="campitem-cliente">
   <div>Dependiente 1</div>
    <div class="campb">
      <label for="textfield"></label>
      <input type="text" name="edad" id="textfield" placeholder="edad:" value="<?php echo $row["edad"];?>"/>
    </div>
    <div class="campb dosporch">
      <select name="sexo"  class="hospitalx">
        <option value="h"> Hombre </option>
        <option value="m"> Mujer </option>
      </select>
    </div>
  </div>
  <!--<div class="campitem-cliente" id="dependientes_extras"></div>-->
</div>
<script>
  function mas_dep(){
    var CantDom0=document.getElementById('numero_dependientes').options.selectedIndex;//cuenta cant de domicilios hay
    //var CantDom2=document.getElementById('numero_dependientes').elements[CantDom0].value;
    var CantDom= document.getElementById("numero_dependientes").value;
    CantDom2 = parseInt(CantDom);
    var posAnterior = document.getElementById('numero_dependientes0').value;
    posAnterior = parseInt(posAnterior);
    if (CantDom2 > posAnterior){
          var cantAgregar = CantDom2 - posAnterior;
          var valoragregado = posAnterior + 1;
          for (var i = posAnterior; i < CantDom2; i++) {
              var nuevaid = "copydep" + valoragregado;
              var clonedDiv = $('#copydep').clone(); // Clono
              clonedDiv.attr("id", nuevaid); // Cambio ID
              var segundo_p2 = document.getElementById('dependientes_extras');// Despues de quien lo quiero meter
              $('#dependientes_extras').append(clonedDiv);

              var padre = document.getElementById(nuevaid).getElementsByTagName("div");
              var padre_b = padre[0].getElementsByTagName("div");
              padre_b[0].innerHTML = "Dependiente " + valoragregado;// Cambio valor de texto
              var padre_c = padre_b[1].getElementsByTagName("input");
              padre_c[0].name = "edad" + valoragregado;// cambio el name de edad
              var padre_d = padre_b[2].getElementsByTagName("select");
              padre_d[0].name = "sexo" + valoragregado;// cambio el name de edad

              var valoragregado = valoragregado + 1;
          };
          document.getElementById('numero_dependientes0').value = CantDom2;
    };
    if (CantDom2 < posAnterior){
        var delDesde = CantDom2 + 1;
        for (var i = delDesde + 1; i < posAnterior + 2; i++) {
          var idDesde = "#copydep" + delDesde;
          $(idDesde).remove();
          delDesde = delDesde + 1;
        };
        document.getElementById('numero_dependientes0').value = CantDom2;
    };
  }
  function mas_dom(){  
      
    var CantDom=document.getElementById('numero_domicilios').value;//cuenta cant de domicilios hay
    CantDom2 = parseInt(CantDom);
    var nuevovalor = CantDom2 + 1;
    var nuevaid = "copydom" + nuevovalor;

    var clonedDiv = $('#copydom').clone(); // Clono
    clonedDiv.attr("id", nuevaid); // Cambio ID
    var segundo_p2 = document.getElementById('domicilios_extras');// Despues de quien lo quiero meter
    $('#domicilios_extras').append(clonedDiv);
    var padre = document.getElementById(nuevaid).getElementsByTagName("div");
    var padre_b = padre[0].getElementsByTagName("div");
    padre_b[0].innerHTML = "Domicilio " + nuevovalor;// Cambio valor de texto
    var padre_c = padre_b[1].getElementsByTagName("input");
    padre_c[0].name = "domicilio" + nuevovalor;// cambio el name de domicilio
    var padre_d = padre_b[2].getElementsByTagName("input");
    padre_d[0].name = "calles" + nuevovalor;// cambio el name de calles
    
    var tabla2 = padre[4].getElementsByTagName("div");
    var tabla2b = tabla2[0].getElementsByTagName("input");
    tabla2b[0].name = "desde_cuando" + nuevovalor;// cambio el name de desde_cuando

    document.getElementById('numero_domicilios').value = nuevovalor;
  }
</script>
<script type="text/javascript" src="./jquery.js"></script>
</body>
</html>

<?php

		mysql_close($conn1);
	}
else{
	header("location: login.php");
	};
	?>