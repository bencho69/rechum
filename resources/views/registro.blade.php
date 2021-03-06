@extends('principal')

@section('content')
            <section id="banner">
                <img src="media/banners-actualiza-datos.jpg">
            </section>
    <section id="blog">
        <div class="container">
            <h2>Actualiza los datos que se solicitan correctamente:</h2>  
            <form ACTION="ingresoRFC" METHOD="POST" name="registro" onsubmit="return validaForm()">
                <div class="form-group">
                    <label for="RFC">RFC:</label>
                    <input type="text" class="form-control" name="RFC" placeholder="Escribe tu RFC." required>
                    {{ csrf_field() }}
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </section>
    @section('info')
@endsection

@section('menu')
<header>
    <div class="contenedor">
        <h1 class="icon-dog" style="margin: auto; ">RecHum REPSS Guerrero</h1>
        <input type="checkbox" id="menu-bar">
        <label class="fontawesome-align-justify" for="menu-bar"></label>
                <nav class="menu">
                    <a href="/">Inicio</a>
                    <a href="registro">Cambiar Datos</a>
                    <a href="Login">Login Administrador</a>
                </nav>
            </div>
</header>
@endsection

@section('pie')
        <footer>
            <div class="contenedor">
                <p class="copy">Rubén Rodríguez Camargo &copy; 2017</p>
                <div class="sociales">
                    <a class="fontawesome-facebook-sign" href="https://www.facebook.com/unidadingenieria/"></a>
                    <a class="fontawesome-twitter" href="https://twitter.com/uagrooficial?lang=es"></a>
                    <a class="fontawesome-camera-retro" href="#"></a>
                    <a class="fontawesome-google-plus-sign" href="#"></a>
                </div>
            </div>
        </footer>
        
@endsection    

@section('info')
           <section id="info">
                <h3>Actualiza tus datos personales.</h3>
                <div class="contenedor">
                    <div class="info-tema">
                        <img src="media/factorRH.jpg" alt="">
                        <h4>Factor RH?</h4>
                    </div>
                    <div class="info-tema">
                        <img src="media/cambiar-el-domicilio-fiscal.jpg" alt="">
                        <h4>Cambio Domicilio?</h4>
                    </div>
                    <div class="info-tema">
                        <img src="media/Accidente.jpg" alt="">
                        <h4>En caso de accidente llamar a...</h4>
                    </div>
                    <div class="info-tema">
                        <img src="media/EstadoCivil.jpg" alt="">
                        <h4>Estado Civil?</h4>
                    </div>                    
                </div>
            </section>
@endsection