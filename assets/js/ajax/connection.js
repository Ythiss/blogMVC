$(document).ready(function(){
  $('form').submit(function(event){

    var formData = {
      'username' : $('input[name=username]').val(),
      'password' : $('input[name=password]').val()
    };

    $.ajax({
      type : 'POST',
      url : './Controllers/UsersController.php',
      data : formData,
      dataType : 'json'
    })

    .done(function(data){
      console.log(data);
      if ( ! data.success) {

            // erreur pour username
            if (data.errors.username) {
                $('#username').addClass('has-error');
                $('#username').append('<div class="help-block">' + data.errors.username + '</div>');
            }

            // erreur pour password
            if (data.errors.password) {
                $('#password').addClass('has-error');
                $('#password').append('<div class="help-block">' + data.errors.password + '</div>');
            }
            window.location.reload(true);
        } else {

            // success message!
            $('form').append('<div class="alert alert-success">Connexion réussi !</div>');
            window.location.reload(true);
            alert('Connexion réussi !');

        }
    })

    .fail(function(data){
      console.log(data);
    });

    event.preventDefault();
  });
});
