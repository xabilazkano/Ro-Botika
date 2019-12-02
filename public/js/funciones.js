$("#contactForm").submit(function(){
  nombre = $('#name').val();
  email = $('#email').val();
  mensaje = $('#message').text();
  if (nombre === "" || email === "" || mensaje === ""){
    $("#texto").show();
    $('#texto').val("{{__('messages.Inserte todos los campos')}}");
    return false;
  }else{
    return true;
  }
});
