

document.addEventListener("DOMContentLoaded", function () {

  if (document.getElementById("formulario-login")) {
    document.getElementById("formulario-login").addEventListener('submit', function (event) { validarLoginForm(event) });
  } else if (document.getElementById("formulario-reg")) {
    document.getElementById("formulario-reg").addEventListener('submit', function (event) { validarRegisterForm(event) });

  }

});
var errores = [];

function validarRegisterForm(event) {
  event.preventDefault();
  const nombre = document.getElementById('nombre').value;
  if(require(nombre)){
    document.querySelector('.nombreError').innerHTML = 'Ingrese su nombre';
    return false;
  }else{
    document.querySelector('.nombreError').innerHTML = '';
  };
  const apellido = document.getElementById('apellido').value;
  if(require(apellido)){
    document.querySelector('.apellidoError').innerHTML = 'Ingrese su Apellido';
    return false;
  }else{
    document.querySelector('.apellidoError').innerHTML = '';  
  };
  const correo = document.getElementById('correo').value;
  if(require(correo)){
    document.querySelector('.correoError').innerHTML = 'Ingrese su correo electronico';
    return false;
  } else if(validarMail(correo)){
    document.querySelector('.correoError').innerHTML = 'El correo no es valido';
    return false;
  }else{
    document.querySelector('.correoError').innerHTML = '';
  };
  const pass = document.getElementById('pass').value;
  if(require(pass)){
    document.querySelector('.passError').innerHTML = 'Debe ingresar una contraseña';
    return false;
  }else{
    document.querySelector('.passError').innerHTML = '';
    document.getElementById("formulario-reg").submit();
  }

}

function validarLoginForm(event) {
  event.preventDefault();

  const correo = document.getElementById('correo').value;
  
  if(require(correo)){
    document.querySelector('.correoError').innerHTML = 'Ingrese su correo electronico';
    return false;
  } else if(validarMail(correo)){
    document.querySelector('.correoError').innerHTML = 'El correo no es valido';
    return false;
  };
  const pass = document.getElementById('pass').value;
  if(require(pass)){
    document.querySelector('.passError').innerHTML = 'Debe ingresar una contraseña';
    return false;
  }
  document.getElementById("formulario-login").submit();
}


function require(par) {
  if (par == null || par.trim().length < 2) {
    return true;
  }
}
function validarMail(email) {
  const expCorreo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
  if (!(expCorreo.test(email))) {
    return true;
  }
}

function validarPass(password, minlength) {
  if (password.length < minlength) {
    errores.push({ pass: `Por favor ingrese una contraseña de al menos ${minlength} caracteres` })
    return `Por favor ingrese una contraseña de al menos ${minlength} caracteres`;
  }
  const mayusculas = /[A-Z]/g;
  if (!mayusculas.test(password)) {
    errores.push({ pass: 'Su contraseña debe contener al menos una letra mayuscula.' })
    return 'Su contraseña debe contener al menos una letra mayuscula.';
  }
  const numero = /\d/g;
  if (!numero.test(password)) {
    errores.push({ pass: 'Su contraseña debe contener al menos un numero.' })
    return 'Su contraseña debe contener al menos un numero.';
  }

  return '';
}