<?php

namespace App\Utils;


class Utils
{
//     function changeDate($saleDate)
// {
//     if (!$saleDate) {
//         return 'Data non disponibile';
//     }
//     else{
//         return \Carbon\Carbon::createFromFormat('Y-m-d', $saleDate)->format('d/M/Y');
//     }
// }


function displayImage($imagePath, $altText) {
    $publicPath = public_path('storage/'.$imagePath);
    if (file_exists($publicPath)) {
        return '<img class="h-100 w-100" src="'.asset('storage/'.$imagePath).'" alt="'.$altText.'">';
    } else {
        return '<img class="h-100 w-100" src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg" alt="">';
    }
}
}
