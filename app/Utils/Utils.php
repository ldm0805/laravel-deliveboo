<?php

namespace App\Utils;


class Utils
{
    // Cambio del valore dei booleani
function changeboolean($boolValue){
    if($boolValue){
        return '<i class="fa-solid fa-check" style="color: #008000;"></i>';
    }
    else{
        return '<i class="fa-solid fa-x" style="color: #ff0000;"></i>';
    }
}

    // Caambio di immagine
// function displayImage($imagePath, $altText) {
//     $publicPath = public_path('storage/'.$imagePath);
//     if (file_exists($publicPath)) {
//         return '<img class="h-100 w-100" src="'.asset('storage/'.$imagePath).'" alt="'.$altText.'">';
//     } else {
//         return '<img class="h-100 w-100" src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg" alt="">';
//     }
// }
}
