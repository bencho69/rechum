<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RH | Admon Recursos H</title>
  <style>
    @page {
        size: auto;
        odd-header-name: html_myHeader;
        odd-footer-name: html_myFooter;
        margin-top: 2.0cm;
        margin-bottom: 1.5cm;
        margin-footer: 5mm;
        margin-left: 25mm;
        margin-right: 20mm;
    }
    p {
      font-family: arial;
    }
  </style>  
</head>  
    
	<body class="hold-transition skin-blue sidebar-mini">
    <htmlpageheader name="myHeader" >
        <div style='top: 40px;left: 40px;'><img src='/img/encabezadoofp.png' ></div>
    </htmlpageheader>
    <htmlpagefooter name="myFooter" >
        <table width="100%">
            <tr><td align="center"><div style='position: absolute; top:93%;left: 40px;width: 90%'><img src='/img/pieofp.png'></div></td></tr>
        </table>
    </htmlpagefooter>   
		<!-- Site wrapper -->
    
		<div class="wrapper">

  <div><p>&nbsp;</p></div>
<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='margin-left:233.9pt;border-collapse:collapse;border:none;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;font-size:9.0pt'>
 <tr >
  <td >
  <p align=right style='text-align:right; text-align: right;'><span>DEPENDENCIA: </span></p>
  </td>
  <td >
  <p><span>Organismo Público Descentralizado <br>
  Régimen Estatal de Protección Social en Salud en Guerrero</span></p>
  </td>
 </tr>
 <tr>
  <td><p><span>SECCIÓN:</span></p></td>
  <td>
  <p><span>Dirección de Administración y Financiamiento <br>	
  Subdirección de Recursos Humanos</span><span ></span></p>
  </td>
 </tr>
 <tr >
  <td >
  <p  ><span>NÚMERO:</span></p>
  </td>
  <td >
  <p  ><span>{{$Datos->NOOFPRES}}</span></p>
  </td>
 </tr>
 <tr>
  <td >
  <p  ><span>ASUNTO:</span></p>
  </td>
  <td>
  <p ><span>Oficio de presentación.</span></p>
  </td>
 </tr>
</table>

<p style='text-align:right;font-size:10.0pt'><span>Chilpancingo, Gro., </span><span>{{$Datos->FECHAOFICIO}}.</span></p>
<p  align=right style='text-align:right;'><span>&nbsp;</span></p>
<p><b><span>C. {{$Datos->NOMBRE_COMPLETO}}<br>
P R E S E N T E.</span></b></p>
<p><b><span>&nbsp;</span></b></p>
<p style='margin-right:.05pt;text-align:justify;font-size:11.0pt;'><span>Me permito informarle
que a partir de {{$Datos->FECHA_PRESENTACION}}, deberá presentarse al {{$Datos->ADSCRIPCION}} con funciones de {{$Datos->PUESTO}}, por lo que se le pide atentamente, presentarse previamente con el {{$Datos->NOMBRE_DIR_PRES}} {{$Datos->PUESTO_DIR_PRES}} del Régimen Estatal de Protección
Social en Salud en Guerrero, para que le sean asignadas las funciones y
responsabilidades inherentes al puesto que
desempeñará.</span></p>
<p><span>&nbsp;</span></p>
<p style='margin-right:.05pt;text-align:justify;font-size:11.0pt;'><span >Sin otro particular por el momento,
le envío un cordial saludo y quedo a sus apreciables órdenes.</span></p>
<p><span>&nbsp;</span></p>
<p><span>&nbsp;</span></p>
<p><b ><span>ATENTAMENTE</span></b></p>
<p><b><span>{{$PUESTODIRECTORGRAL}}</span></b></p>
<p><b ><span>&nbsp;</span></b></p>
<p><b ><span>&nbsp;</span></b></p>

<p><b ><span>{{$NombDirector}}</span></b></p>
<p><b ><span>&nbsp;</span></b></p>
<p><span style='font-size:8.0pt'>C.c.p.- {{$Datos->NOMBRE_DIR_PRES}}.- {{$Datos->PUESTO_DIR_PRES}}.-Para su conocimiento.<br>
   C.c.p. Minutario.- REPSS.</span></p>
<p><span>&nbsp;</span></p>
<p><span style='font-size:6.0pt'>JMJH/CAR/jsv/mrl</span></p>

</div>

		</div>
		<!-- ./wrapper -->
	</body>
</html>    