

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario-reg").addEventListener('submit', validarRegisterForm(e));
    document.getElementById("formulario-login").addEventListener('submit', validarLoginForm(e));
});
var errores = [];

function validarRegisterForm(e) {
    e.preventDefault();
    const nombre = document.getElementById('nombre').value;
    require(nombre);
    const apellido = document.getElementById('apellido');
    require(apellido);
    const correo = document.getElementById('correo');
    require(correo);
    validarMail(correo);
    const pass = document.getElementById('pass');
    require(pass);
    validarPass(pass, 6);
    console.log(errores);
  }

  function validarLoginForm(e) {
    e.preventDefault();
    
    const correo = document.getElementById('correo');
    require(correo);
    const pass = document.getElementById('pass');
    require(pass);

    this.submit();
  }




  function require(par){
    if(par.trim().length == 0){
        errores.push({par: `El campo ${par} está vacío`});
        return;
    }
  }
  function validarMail(email) {
    const isValidEmail = /^\S+@\S+$/g
    if (!isValidEmail.test(email)) {
        errores.push({email: 'Por favor, ingrese un email valido'});
    }
  }

function validarPass(password, minlength) {
    if (password.length < minlength) {
        errores.push({pass: `Por favor ingrese una contraseña de al menos ${minlength} caracteres`})
      return `Por favor ingrese una contraseña de al menos ${minlength} caracteres`;
    }
    const mayusculas = /[A-Z]/g;
    if (!mayusculas.test(password)) {
        errores.push({pass: 'Su contraseña debe contener al menos una letra mayuscula.'})
      return 'Su contraseña debe contener al menos una letra mayuscula.';
    }
    const numero = /\d/g;
    if (!numero.test(password)) {
        errores.push({pass: 'Su contraseña debe contener al menos un numero.'})
      return 'Su contraseña debe contener al menos un numero.';
    }
  
    return '';
  }