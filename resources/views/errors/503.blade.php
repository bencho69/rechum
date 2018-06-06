<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <title>
        RecHum
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<BODY>
   <?php
      include "menu.php"
   ?> 

<section id="info">
</section>
        <main>
          <section id="blog">
            <div class="contenedor">
               <article>
                <a href="registro.php"> <img src="banners-actualiza-datos.jpg"> </a>
               </article>
               <article>
                <a href="registro.php"><img src="banner.jpg"> </a>
                <a href="registro.php" class="btn btn-success">Modificar Datos Personales.</a>
               </article>
               
             </div> 
           </section>
            <section id="bienvenidos">
                Error 503. Los siento intenta nuevamente.!
            </section>
            
            
            <section id="info">
                <h3>Actualiza tus datos personales.</h3>
                <div class="contenedor">
                    <div class="info-tema">
                        <img src="factorRH.jpg" alt="">
                        <h4>Factor RH?</h4>
                    </div>
                    <div class="info-tema">
                        <img src="cambiar-el-domicilio-fiscal.jpg" alt="">
                        <h4>Cambio Domicilio?</h4>
                    </div>
                    <div class="info-tema">
                        <img src="Accidente.jpg" alt="">
                        <h4>En caso de accidente llamar a...</h4>
                    </div>
                    <div class="info-tema">
                        <img src="EstadoCivil.jpg" alt="">
                        <h4>Estado Civil?</h4>
                    </div>                    
                </div>
            </section>
        </main>
        
    <?php
      include "pie.php"
   ?>       


</body>
</html>