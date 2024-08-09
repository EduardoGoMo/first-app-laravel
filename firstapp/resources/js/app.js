import './bootstrap';
import Search from './live-search';
import Dropzone from 'dropzone';
import 'owl.carousel';

// Importa los archivos CSS
import 'dropzone/dist/dropzone.css';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel/dist/assets/owl.theme.default.css';


if(document.querySelector(".header-search-icon")){
    new Search();
}

// Inicializar Dropzone y Owl Carousel después de que el documento esté cargado
document.addEventListener('DOMContentLoaded', function() {
    // Dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
        paramName: "file[]",
        maxFiles: 10,
        maxFilesize: 5, // MB
        acceptedFiles: '.png,.jpg,.jpeg,.webp,.gif',
        dictDefaultMessage: 'Arrastra las imágenes aquí para subirlas a tu galería',
        dictFallbackMessage: 'Tu navegador no soporta arrastrar y soltar para subir archivos',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5, // Número de archivos a subir en paralelo
        dictMaxFilesExceeded: 'No puedes subir más de 10 imágenes',
        init: function() {
            var myDropzone = this;

            document.querySelector(".btn-primary").addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Verifica si hay archivos en la cola de Dropzone
                if (myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue();
                }
            });
            
            myDropzone.on("successmultiple", function(files, response) {
                // Cuando todos los archivos se han subido, envía el formulario
                document.querySelector("#my-dropzone").submit();
            });
            
            myDropzone.on("errormultiple", function(files, response) {
                // Esto se ejecuta si hay un error con la subida
                console.log(response); // Muestra el error
            });
            
            myDropzone.on("error", function(file, response) {
                if (typeof response === "object") {
                    response = response.message || "Error subiendo el archivo";
                }
                file.previewElement.querySelector("[data-dz-errormessage]").textContent = response;
            });
        }
    });

    // Owl Carousel
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        nav:true,
        center:true,
        margin:10,
        responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },            
        960:{
            items:3
        },
        1200:{
            items:4
        }
        }
    });
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
});