# rechum
Recursos Humanos

El sistema de recursos humanos se crea para administrar los empleados de una empresa.

Esta version permite restaurar el password olvidado, aunque no está terminado al 100% ya que falta la configuración del cliente SMTP, aunque las vistas ya estan creadas.

Verifica que sí un usuario ya se registró y vuelve a entrar, ya no solicita su registro, sino que va directamente a la administración.

Los trigesr se manejan en la base de datos directamente para generar su registro en la tabla de usuarios, con su RFC como password.

Se creó un seed que genera los usuarios según los empleados de la tabla empleados.
