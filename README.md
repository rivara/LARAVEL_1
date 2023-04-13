# Ejemplo2023
<h4>Prueba técnica de selección</h4>
<p>Se trata de desarrollar un pequeño CMR con un CRUD básico  dispuesto en 2 pantallas agregar borrar y buúsqueda</p>
<H4>Pasos a seguir para desplegar este proyecto</h3>
<ul>
<li>1.- Descargar un programa tipo AMP (tipo laragon ,xamp wamp etc...)</li>
<li>2.- Descargarse en la carpeta del servidor del AMP el programa por consola o deszipeando la opcion que deja github aunque recomiendo la primera forma , para eso nos posicionamos en el terminal del AMP y pegamos la opción de clonado que ofrece github ya escrita en la parte superiori izquierda del repo.</li>
<li>3.- En la consola tendremos que ejecutar composer (gestor de dependencias) para ello usamos php composer install (nota ver previamente si esta configurada bien la versión de php que requiere)</li>
<li>4.- Desplegamos la BD y los ejemplos dummies para ello lanzamos los siguientes comandos PHP ARTSIAN MIGRATION Y PHP ARTISAN DB:SEED <B>IMPORTANTE:Hay que tener la bd previamente creada en el servidor de bd</b></li>
<li>5.- Una vez que hemos hecho eso limpiamos cache y rutas ya que hay ficheros y rutas no actualizadas que pueden provocar errores 500 y 400 para ello lanzamos el comando php artisan optimize </li>
<li>6.- Por último se deberia de actualizar las librerias del vendor y npm (si este último esta en el proyecto integrado) </li>
<li>7.- Si hay errores probablemente sea por la cache o porque se ha saltado alguno de los pasos anteriores por lo que habrá que repetirlos</li>
</ul<

