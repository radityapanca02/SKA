<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@php
$author = "CTRL + V";
$title = "SMK PGRI 3 MALANG";
$desc = "Sekolah untuk Kerja, Wirausaha, Kuliah apalagi.";
$image = $assetBase . '/assets/skariga(300x300).jpg';
$keywords = "SMK PGRI 3 MALANG, SKARIGA, SMK PGRI, SMK PGRI MALANG, SMK PGRI 3, SMK, SMK 3 MALANG, PGRI, SMK MALANG, PGRI 3 MALANG, PGRI 3, SEKOLAH MENENGAH KEJURUAN, LKS, SMKPGRI3MLG,
SMK UNGGULAN, SMK TERBAIK, SMK FAVORIT, SMK DIGITAL, SMK KREATIF, SMK INOVATIF, SMK JUARA, SMK NASIONAL, SMK JAWA TIMUR, SMK INDONESIA,
SEKOLAH KEJURUAN TERBAIK, SEKOLAH VOKASI, SEKOLAH VOKASI DIGITAL, SEKOLAH VOKASI UNGGULAN, SEKOLAH VOKASI MALANG, SEKOLAH VOKASI JAWA TIMUR,
PKL SMK, PRAKERIN SMK, MAGANG SMK, KUNJUNGAN INDUSTRI, DUNIA USAHA DUNIA INDUSTRI, DUDI SMK, KERJA SAMA INDUSTRI, MITRA INDUSTRI SMK,
LKS SMK, LKS NASIONAL, LKS JAWA TIMUR, LKS MALANG, LKS PGRI, LKS DIGITAL, LKS KOMPETISI, LKS JUARA,
SMK PGRI 3 MALANG PKL, SMK PGRI 3 MALANG LKS, SMK PGRI 3 MALANG PRESTASI, SMK PGRI 3 MALANG WEBSITE, SMK PGRI 3 MALANG SHOWCASE, SMK PGRI 3 MALANG TERBAIK,
JURUSAN SMK, SMK MULTIMEDIA, SMK RPL, SMK TKJ, SMK BISNIS DIGITAL, SMK DESAIN KOMUNIKASI VISUAL, SMK BROADCASTING, SMK ANIMASI, SMK TEKNOLOGI INFORMASI,
PRESTASI SMK, KARYA SISWA SMK, KARYA DIGITAL SMK, KARYA INOVATIF SMK, KARYA SHOWCASE SMK, KARYA NASIONAL SMK,
WEBSITE SMK, WEBSITE SEKOLAH, WEBSITE SMK PGRI, WEBSITE SMK PGRI 3 MALANG, WEBSITE SEKOLAH DIGITAL, WEBSITE SEKOLAH UNGGULAN,
SHOWCASE SMK, SHOWCASE SEKOLAH, SHOWCASE DIGITAL, SHOWCASE SISWA, SHOWCASE KARYA SISWA, SHOWCASE PKL, SHOWCASE LKS,
SEKOLAH PGRI, SEKOLAH PGRI MALANG, SEKOLAH PGRI JAWA TIMUR, SEKOLAH PGRI UNGGULAN, SEKOLAH PGRI DIGITAL, SEKOLAH PGRI NASIONAL,
SMK PGRI 3 MALANG RPL, SMK PGRI 3 MALANG TKJ, SMK PGRI 3 MALANG MULTIMEDIA, SMK PGRI 3 MALANG BISNIS DIGITAL, SMK PGRI 3 MALANG DKV,
SMK PGRI 3 MALANG KOMPETISI, SMK PGRI 3 MALANG EVENT, SMK PGRI 3 MALANG LOMBA, SMK PGRI 3 MALANG KARYA SISWA, SMK PGRI 3 MALANG KARYA DIGITAL,
SMK PGRI 3 MALANG KUNJUNGAN INDUSTRI, SMK PGRI 3 MALANG MAGANG, SMK PGRI 3 MALANG DUDI, SMK PGRI 3 MALANG KERJA SAMA INDUSTRI";
$lower_keywords = strtolower($keywords);
@endphp

<meta name="description" content="{{ $desc }}">
<meta name="author" content="{{ $author }}">
<meta name="keywords" content="{{ $keywords . ', ' . $lower_keywords }}">

<meta name="google-site-verification" content="">
<meta name="robots" content="index, follow">

<!-- <meta name="theme-color" content=""> -->

<!-- <meta http-equiv="refresh" content="5; url=https://example.com"> -->

<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $desc }}">
<meta property="og:image" content="{{ $image }}">
<!-- <meta property="og:url" content="https://example.com"> -->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $desc }}">
<meta name="twitter:image" content="{{ $image }}">
