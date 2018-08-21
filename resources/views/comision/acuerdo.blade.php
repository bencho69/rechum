<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RH | Admon Viaticos</title>
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
<p><b>Acuerdo con el Director General</b></p>
<p style='text-align:right;font-size:10.0pt'><span>Chilpancingo, Gro., a </span><span><?php setlocale(LC_ALL,"es_MX@peso","es_MX","esp");$fecha = strftime("%d de %B de %Y", strtotime($Datos->fechaof)); echo $fecha;
?> .</span></p>
<p  align=right style='text-align:right;'><span>&nbsp;</span></p>
<table>
  <thead>
    <tr>
    <th>ASUNTO</th>
    <th>ACUERDO</th>
    </tr>
  </thead>
  <tbody>
    <td>Informo a Usted que los próximos días {{ $Datos->periodo }}, se requiere comisionar al (a) C. personal de esta Área, para que se traslade a <b>{{ $Datos->objeto }}</b>, para <b>{{ $Datos->objeto }}</b>; para lo cual se le autorizan {{ $Datos->periodo }} días de viáticos, con tarifa de {{ $Datos->tarifa }} de $ {{ $Datos->montoT }}.</td>
    <td><p><span>&nbsp;</span></p> Dr. Juan Manuel Jiménez Herrera</td>
  </tbody>
</table>  

<p><b><span>Cuantificación $</span></b></p>

<table>
  <thead>
    <tr>
    <th>N/P</th>
    <th>NOMBRE</th>
    <th>LUGAR DE COMISIÓN</th>
    <th>VIÁTICO</th>
    <th>COMBUSTIBLE</th>
    <th>PEAJE/PASAJE</th>
    <th>SUBTOTAL</th>
    </tr>
  </thead>
  <tbody>
    <td>{{ $Datos->no }}</td>
    <td>{{ $Datos->destino }}</td>
    <td>{{ $Datos->destino }}</td>
    <td>{{ $Datos->viaticos }}</td>
    <td>{{ $Datos->combustible }}</td>
    <td>{{ $Datos->pasajes }}</td>
    <td>SubTotal</td>
  </tbody>

</table>  

<p><span>&nbsp;</span></p>

<p><span>&nbsp;</span></p>

<table>
  <thead>
    <tr>
      <th> <p><b ><span>ATENTAMENTE</span></b></p>
<p><b><span>{{$PUESTODIRECTORGRAL}}</span></b></p>
<p><b ><span>&nbsp;</span></b></p>
<p><b ><span>&nbsp;</span></b></p>

<p><b ><span>{{$NombDirector}}</span></b></p>
      </th>
      <th> <p><b ><span>&nbsp;</span></b></p></th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>



</div>

		</div>
		<!-- ./wrapper -->
	</body>
</html>    