Bueno, en este proyecto utilizaremos el framework de testing unitario PHPUnit y hacemos uso de la misma para testing unitario  como para Mock objects. Las pruebas unitarias las usamos para comprobar nuestros requisitos funcionales que son relevados en casos de uso. Los mocks nos sirven para cortar una cadena de dependencias en la creacion de objetos cuando estamos testeando, aislando de los efectos colaterales, para poder centrarnos en la utilizacion del mismo.
A modo ejemplo:
Usuario necesita registrarse en un sistema. El sistema esta compuesto por muchas cosas, y para poder instanciarlo , en el testeo necesito instanciarlas. Muchas de las cosas que componen al sistema no influyen en una interaccion particular (particularmente testeo una y sola una cosa en testeo unitario), con lo cual "sobran". No necesitaria instanciarlas ... bueno, para similar que existen usamos Mocks.
De esta forma tambien evitamos que una parte del sistema tenga que estar implementada para poder hacer utilizar el sistema haciendo más sencilla y rapida la división de subtareas en un equipo de desarrollo.

Links sobre PHPUnit (framework utilizado para el proyecto) de la familia xUnit = 
http://phpunit.de/manual/4.2/en/index.html
 