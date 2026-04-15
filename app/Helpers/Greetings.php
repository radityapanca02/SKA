<?php

function greetings() {
    $hour = date('H');
    
    if ($hour >= 5 && $hour < 11) {
        return 'Selamat Pagi';
    } elseif ($hour >= 11 && $hour < 15) {
        return 'Selamat Siang';
    } elseif ($hour >= 15 && $hour < 18) {
        return 'Selamat Sore';
    } else {
        return 'Selamat Malam';
    }
}