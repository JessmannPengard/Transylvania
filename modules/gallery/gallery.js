$(document).ready(function () {

    // Obtener el parámetro de página de la URL
    var urlParams = new URLSearchParams(window.location.search);
    var pageParam = urlParams.get('gallery-page');
    // Si el parámetro de página está presente, dirigir la página a la sección de galería
    if (pageParam) {
        // Obtener el elemento de la sección de galería
        var gallerySection = document.getElementById('section-gallery');
        // Establecer la posición de desplazamiento al elemento de la sección de galería
        gallerySection.scrollIntoView({ block: 'start', behavior: 'instant' });
    };


    // Al clicar en el botón de borrar cambiamos el enlace para borrar
    // la imagen seleccionada si el usuario confirma el borrado
    $('.delete-pic').click(function () {
        idImagenBorrar = $(this).attr('id');
        $("#confirm-delete").attr('href', './modules/gallery/gallery.delete.php?id=' + idImagenBorrar)
    });

    // Previsualizar las imágenes
    // cuando cambia el valor del campo de imagen
    $('#imagen').on('change', function () {
        var archivo = $(this)[0].files[0];
        if (archivo) {
            var lector = new FileReader();
            lector.onload = function (e) {
                $('#previsualizacion').attr('src', e.target.result);
                $('#previsualizarImg').removeClass("d-none");
                $('#file').removeClass("d-none");
            }
            lector.readAsDataURL(archivo);
        }
    });

    // Mostrar el lightbox al hacer click en las imágenes
    $('.image-container').on('click', function () {
        var rutaImagen = $(this.querySelector('img')).attr('src');
        var lightbox = '<div class="lightbox">' +
            '<img src="' + rutaImagen + '">' +
            '<i class="fa-solid fa-circle-xmark cerrar"></i>' +
            '</div>';
        $('body').append(lightbox);
        $('.cerrar').on('click', function (e) {
            e.preventDefault();
            $('.lightbox').remove();
        });
    });

});
