# Respuestas primera evaluación

## Antonio Morell Bennasser

Despliegue en: [amorell](http://amorell.ifc33b.cifpfbmoll.eu/)

### Ejercicio 3:
Directorio: `dwes_2021-amorellb/examen_dwes/ex3_classes`
- a) Sí se activan, de forma que se pueden leer esas propiedades. En el ejemplo que he probado se activaban ambas
funciones (get y set), sin embargo siempre me devuelve los valores pasados al constructor.
- b) Tanto las propiedades privadas como las protegidas se heredan de padre a hijos, de manera que una clase
hija tiene acceso a las propiedades de la clase padre.

### Ejercicio 5:
Directorio: `dwes_2021-amorellb/examen_dwes/ex5_form`

Creamos un formulario que irá por `POST` para poder recoger los archivos que deben ir con el `enctype` `multipart`.
Una vez hecho `submit`, comprobamos que en el array `$_POST` se encuentra ese _submit_ y del mismo array recogemos los
datos del usuario: nombre, apellido y fecha de nacimiento.

Por otro lado, mediante una función, que se ejecutará al hacer el _submit_, pasándole los archivos mediante la variable
`$_FILES`, recogeremos de cada uno de los archivos los datos que nos interesan, en este caso name y size. Además,
moveremos los archivos de la carpeta temporal a la carpeta en la que se encuentra el archivo `form.php`, es decir en el
directorio `ex5_form`.

