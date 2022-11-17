A TENER EN CUENTA
a la hora de editar(PUT) o agregar(POST) un juegador debera llenar el body en formato JSON y tenes todos los campos llenos .
en caso de dejar un campo vacio le imprimira un mensaje de que debe llenarlos a todos.
para los id_equipos: estos son los valores guardados en la base de datos y su respectivos equipos para cada uno.
(1=navi, 7=vitality, 9=faze clan, 12=virtus pro, 13=ninjas en pijamass);
ENDPOINTS
PUT(/:ID):localhost/tp-web-2/jugadores
hhttp://localhost/trabajo-2-web-main/api/jugadores/(ID)
usando metodo put al llenar el body en forma de json se envia y editaran los valores de la posicion que se indica en la URL(:ID=).
siempre  y cuando ningun elemento este vacio y cumpla con los requisitos

POST(CREA UN ELEMENTO)
hhttp://localhost/trabajo-2-web-main/api/jugadores/
llenando el body en formato JSON con todos los campos llenos ,crea un nuevo elemento en la base de datos cuyo ID va a ser el siguiente al ultimo guardado

DELETED(/:ID):localhost/tp-web-2/jugadores
hhttp://localhost/trabajo-2-web-main/api/jugadores/(ID)
se borrara el elemento de la base de daton donse de indique con el ID en la url y se imprimira un mensaje de que fue eliminado, 
en caso de que no existe un elemento con esa id dira que no existe y una ves eliminado al querer buscarlo por metodo get dira que no existe

GET(/ID):localhost/tp-web-2/jugadores
hhttp://localhost/trabajo-2-web-main/api/jugadores/(ID)
a traves de este metodo se traera todos los campos asociados al elemento cuya ID este en la URL,
este te permitira ver en datalle los campos que contenga ese elemento 

GET(TODOS LOS ELEMENTOS)
hhttp://localhost/trabajo-2-web-main/api/jugadores/
este meotod permite ver todos los elementosm enlistados a traves de sus ID de menor a mayor y 
poder ver la cantidad total de elementos y todos los campos asociados a cada usando

OPCIONAL + OBLIGATORIO
ORDENAR POR UN CAMPO A ELECCION(ordenarPor,orden)
hhttp://localhost/trabajo-2-web-main/api/jugadores=ordenarPor=(campo)&orden=(DESC O ASC)
este metodo permite a parte de ver todos los elementos que contiene la base de datos, 
tambien permite que acomodarlos de forma ascendente o descendente especificando esto en la url y a la par el campo por el cual se quiera ordenar
