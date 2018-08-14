<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <title> RecHum </title>
    @include('links')
</head>
<BODY>
   @include('menu')

  <section id="info">
  </section>
  <main>          
      @yield('content')
  </main>
        
  @include('pie')
</body>
</html>