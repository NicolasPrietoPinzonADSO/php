const formulario = document.getElementById('formulario') 
const btnEnviar = document.getElementById('btn-enviar');

const ficha = document.getElementById('ficha') 
const nombre = document.getElementById('nombre')
const apellido = document.getElementById('apellido') 
const correo = document.getElementById('correo') 
const telefono = document.getElementById('telefono') 
const ciudad = document.getElementById('ciudad')
//const generos = document.querySelectorAll('input[name="genero"]')
const generos = document.getElementsByName('genero')
const habilidades = document.getElementsByName('habilidades[]')

const validarCorreo = correo => {
   // Validamos que eL campo tenga soLo un y un punto
   // eL @ no puede ser eL primer caracter deL correo
   // y eL punto debe it posicionando aL menos un cardcter despuds de La @ 
   return /ʌ[ʌ\s@]+@[ʌ\s@]+\•[ʌ\s@]+$/.test(correo)
}

const soloLetras = (e) => {
   //consoLe.log(e)
   const key = e.keyCode || e.which;
   const tecla = String.fromCharCode(key).toLowerCase(); 
   const letras = "áéíóúabcdefghijklmnnopqrstuvwxyz"; 
   const especiales = ['8', '32', '37', '39', '46'];
   let tecla_especial = false

   for (const i in especiales) {
       if (key == especiales[i]) {
           tecla_especial = true;
           break;
       }
   }
   if (letras.indexOf(tecla) == -1 && !tecla_especial) {
       e.preventDefault()
   }
}

const soloNumeros = (e) => {
   //consoLe.log(e)
   // validamos que eL keyCode corresponda a Las tecLas de Los numeros 
   if ((e.keyCode < 48 || e.keyCode > 57) && e.keyCode) {
       e. preventDefault()
    }  
}

const enviarFormulario = formulario => { 
   //consoLe.log(formuLario)
   formulario. submit()
}

const validacion = (e) => { 
   e. preventDefault()

   let seleccionHabilidad = 0
   for (const habilidad of habilidades) {
       if (habilidad.checked) { 
           seleccionHabilidad++ 
       }
   }

   let seleccionGenero = ''
   for (const genero of generos) {
       if (genero.checked) {
           seleccionGenero = genero.value 
           break
       }
   }

   if (ficha.value === "") {
       alert('Por favor, escribe el numero de la ficha') 
       ficha.focus()
       return false
   }

   if (nombre.value === "") {
       alert('Por favor, escribe tu nombre') 
       nombre.focus()
       return false
   }

   if (apellido.value === "") {
       alert('Por favor, escribe tus apellidos') 
       apellido.focus()
       return false
   }

   if (!validarCorreo(correo.value)) {
       alert("Por favor, escribe un correo electronic° valido"); 
       correo. focus();
       return false;
   }

   if (telefono.value == "") {
       alert('Por favor, escribe tu telefono') 
       telefono.focus()
       return false
   }

   if (seleccionGenero === "") {
       alert('Por favor, seleccione un genero') 
       return false
   }

   if (ciudad.selectedlndex == null || ciudad.selectedlndex == 0) { 
       alert('Por favor, seleccione una ciudad')
       return false
   }

   if (seleccionHabilidad < 3) {
       alert('Por favor, seleccione como minima 3 habilidades') 
       return false
   }

   enviarFormulario(formulario)

}

//Eventos deL formulario

//Evento para vaLidar cuando una persona presiona una tecLa sea soLo numeros 
nombre.addEventListener('keypress', soloLetras)
apellido.addEventListener('keypress', soloLetras)

//Evento para vaLidar cuando una persona presiona una tecla sea soLo Las tecLas de numero 
telefono.addEventListener('keypress', soloNumeros)

//Evento para vaLidar eL vento cLick deL baton deL formuLario 
btnEnviar.addEventListener('click', validacion)