# rechum
Recursos Humanos

El sistema de recursos humanos se crea para administrar los empleados de una emppresa.

Esta version permite restaurar el password olvidado, aunque no esta terminado al 100% ya que falta la configuracion del cliente SMTP, aunque las vitas ya estan creadas.

Verifica que si un usuario ya se registro y vuelve a entrar ya no solicita su registro, sino que va directamente a la administración.

Los trigesr se manejan en la base de datos directamente para generar su registro en la tabla de usuarios, con su RFC como password.

Se creo un seed que genera los usuarios segun los empleados de la tabla empleados.
