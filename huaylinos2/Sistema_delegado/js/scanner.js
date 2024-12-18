// scanner.js
document.addEventListener("DOMContentLoaded", function () {
    Quagga.init({
       inputStream: {
          name: "Live",
          type: "LiveStream",
          target: document.querySelector('#scanner')  // Asegúrate de que el contenedor existe en el HTML
       },
       decoder: {
          readers: ["code_128_reader", "pdf417_reader"]  // Ajusta según el formato de tu código de barras
       }
    }, function (err) {
       if (err) {
          console.error("Error al iniciar Quagga:", err);
          return;
       }
       Quagga.start();
    });
 
    Quagga.onDetected(function (result) {
       var dni = result.codeResult.code;  // Aquí está el DNI escaneado
       console.log("DNI escaneado:", dni);
       Quagga.stop();  // Detiene el escaneo después de detectar el DNI
 
       // Puedes mostrar el DNI en un campo de texto u otro elemento
       document.getElementById("dniField").value = dni;
    });
 });
 