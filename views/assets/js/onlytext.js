//key code: Devuelve el código de tecla presionada, o el codigo del caracter de la tecla alfanumerica presionada.
//which : which es una propiedad de objetos. Se define para eventos relacionados con claves y relacionados con el mouse en la mayoría de los navegadores.
//String.fromCharCode: método estático que devuelve una cadena creada mediante el uso de una secuencia de valores Unicode especificada.
//toLowerCase: devuelve el valor en minúsculas de la cadena que realiza la llamada.
//ofindex: devuelve la posición de la primera aparición de un valor especificado en una cadena.
function onlytext(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for(var i in especiales){
        if (key==especiales[i]) {
            teclado_especial = true;break;
        }
    }
    if (letras.indexOf(teclado)==-1 && !teclado_especial) {
        return false;
    }
}
