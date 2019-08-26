<?php
$filename = 'imagem-para-web.png';

$width = 200;
$height = 200;

list($width_original, $height_original) = getimagesize($filename);

$ratio = $width_original / $height_original;

if ($width/$height > $ratio) {
    $width = $height * $ratio;
} else {
    $height = $width / $ratio;
}

/*echo 'LARGURA ORIGINAL: ' . $width_original . ' - ALTURA ORIGINAL: ' . $height_original . '<br>';
echo 'LARGURA: ' . $width . ' - ALTURA: ' . $height;*/

$finalImage = imagecreatetruecolor($width, $height);
$originalImage = imagecreatefrompng($filename);
imagecopyresampled(
    $finalImage,
    $originalImage,
    0,
    0,
    0,
    0,
    $width,
    $height,
    $width_original,
    $height_original
);

// header('Content-Type: image/png');
imagepng($finalImage, 'mini_imagem.png');

echo 'Imagem redimensionada com sucesso!';
?>