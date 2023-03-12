<?php

// Requires
require_once("./modules/database/database.php");
require_once("gallery.model.php");

// Número de página e imágenes por página
$page = isset($_GET['gallery-page']) ? (int) $_GET['gallery-page'] : 1;
$perPage = 5;

// Conexión a la base de datos
$db = new Database;

// Instancia Gallery
$gallery = new Gallery($db->getConnection());

// Obtener las imágenes de la página actual
$images = $gallery->getImages($page, $perPage);

// Construir el HTML de la galería paginada
$html = !isset($manage) ? '<section class="py-5" id="section-gallery">' : '';
$html .= ' <div class="container">
                <h2 class="text-center mb-4 section-title">Galería</h2>';
$html .= '<div class="row">';
foreach ($images as $image) {
    $html .= '<div class="col-md-4 mb-3">';
    $html .= '<div class="card">';
    $html .= '<div class="image-container">';
    $html .= '<img src="' . $image['url_picture'] . '" class="card-img-top">';
    // Overlay para el lightbox
    $html.='<div class="image-overlay"></div>';
    $html .= '</div>';
    // Mostramos los controles de administración si estamos en ese modo
    if (isset($manage) && $manage) {
        $html .= '<div class="card-body"><a href="" data-toggle="modal" data-target="#confirmacionModal" class="delete-pic" id=' . $image["id"] . '>
                    <i class="fas fa-trash"></i>
                </a></div>';
    }
    $html .= '</div></div>';
}
$html .= '</div>';

// Obtener el número total de imágenes
$total = $gallery->getCount();

// Construir la navegación de la paginación
$html .= '<nav aria-label="Page navigation">';
$html .= '<ul class="pagination justify-content-center">';
$numPages = ceil($total / $perPage);
// Botón Anterior
if ($page > 1) {
    $html .= '<li class="page-item">
                <a class="page-link" href="?gallery-page=' . $page - 1 . '" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">&laquo;</span>
                </a>
            </li>';
}
for ($i = 1; $i <= $numPages; $i++) {
    $active = ($i == $page) ? ' active' : '';
    $html .= '<li class="page-item' . $active . '"><a class="page-link" href="?gallery-page=' . $i . '">' . $i . '</a></li>';
}
// Botón siguiente
if ($page < $numPages) {
    $html .= '<li class="page-item">
                <a class="page-link" href="?gallery-page=' . $page + 1 . '" aria-label="Anterior">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">&raquo;</span>
                </a>
            </li>';
}
$html .= '</ul>';
$html .= '</nav>';
$html .= !isset($manage) ? '</section>' : '';
$html .= '</div>';

// Imprimir el HTML generado
echo $html;

?>

<!-- Estilos -->
<link rel="stylesheet" href="./modules/gallery/gallery.css">
<!-- Script -->
<script src="./modules/gallery/gallery.js"></script>