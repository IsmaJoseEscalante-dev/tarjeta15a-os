window.onload = function () {
    setTimeout(function () {
        let loader = document.getElementById('contenedor_carga');
        loader.style.visibility = 'hidden';
        loader.style.opacity = '0';
        writing("\ Me estoy preparando para el día más especial de mi vida\"", '\ Por fin llego ese dia magico donde seré protagonista de esta celebración\"')

        let audio = document.createElement("audio")
        document.body.appendChild(audio);
        audio.src = "./fulltrap.mp3"
        document.body.addEventListener("click", function () {
            audio.play()
        })
    }, 1000)
}

let writing = (str, str2) => {
    let txt_1 = str.split('');
    let txt_2 = str2.split('');
    let txt_aux;
    let i = 0;
    let bandera = 1;
    let escritura = document.getElementById("escritura");
    let printStr = setInterval(function () {
        if (bandera == 1) {
            txt_aux = txt_1
        } else if (bandera == 0) {
            txt_aux = txt_2
        }
        if (txt_aux[i] === ' ') {
            escritura.innerHTML += txt_aux[i];
            escritura.innerHTML += txt_aux[i + 1];
            i += 2;
        } else {
            escritura.innerHTML += txt_aux[i];
            i++;
        }
        if (i === txt_aux.length + 1) {
            bandera = bandera == 1 ? 0 : 1;
            escritura.innerHTML = ""
            i = 0;
        }
    }, 300)
}
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

function validarFormulario(evento) {
    evento.preventDefault();
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var error_text = document.getElementById('error_text');
    if (name.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error!!!',
            text: "Es obligatorio el nombre!",
            background: "#fff",
          })
        return;
    } else if (/^([0-9])*$/.test(name)) {
        Swal.fire({
            icon: 'error',
            title: 'Error!!!',
            text: 'El nombre no puede tener numeros!',
            background: "#fff",
          })
        return;    
    }else if (phone.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error!!!',
            text: 'Es obligatorio el telefono!',
            background: "#fff",
          })
        return;
    } else if (!document.querySelector('input[name="status"]:checked')) {
        Swal.fire({
            icon: 'error',
            title: 'Error!!!',
            text: 'Debes rellenar el campo asistencia!',
            background: "#fff",
          })
        return;
    }
        
    this.submit();
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}