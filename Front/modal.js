let cantidadDisponible = window.prompt("Ingrese la cantidad disponible");

function enviarDatos(cantidadDisponible){
    window.location.href = window.location.href + 'calcular.php' + '?w1=' + cantidadDisponible;
}
enviarDatos(cantidadDisponible);

