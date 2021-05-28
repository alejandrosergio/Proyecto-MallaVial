// Funcion para evitar que se guarden datos en la modal
$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
});