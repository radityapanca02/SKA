<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartController extends Controller
{
    public function index()
    {
        $departments = [
            'tik' => $this->makeDepartment('Departemen TIK', '/assets/departemen-tik.png', [
                [
                    'id' => 'rpl',
                    'name' => 'RPL (Rekayasa Perangkat Lunak)',
                    'emoji' => '💻',
                    'desc' => 'Belajar coding, database, pemrograman web, mobile, dan software engineering.',
                    'image' => '/assets/jurusan-rpl.png',
                    'skills' => "Pemrograman (PHP, JavaScript, Python)\nDatabase (MySQL, PostgreSQL)\nAlgoritma & Struktur Data\nVersion Control (Git)\nTesting & Debugging",
                    'careers' => "Web Developer\nMobile App Developer\nBackend Engineer\nFull Stack Developer\nQuality Assurance",
                ],
                [
                    'id' => 'dkv',
                    'name' => 'DKV (Desain Komunikasi Visual)',
                    'emoji' => '🎨',
                    'desc' => 'Fokus pada desain grafis, ilustrasi, desain digital, dan branding.',
                    'image' => '/assets/jurusan-dkv.png',
                    'skills' => "Desain Grafis (Adobe Photoshop, Illustrator)\nTipografi & Layout\nBranding & Identitas Visual\nIlustrasi Digital\nDesain UI/UX",
                    'careers' => "Graphic Designer\nUI/UX Designer\nIllustrator\nBrand Designer\nDigital Marketer",
                ],
                [
                    'id' => 'bp',
                    'name' => 'BP (Broadcasting dan Perfilman)',
                    'emoji' => '📹',
                    'desc' => 'Produksi film, editing video, penyiaran, dan perfilman.',
                    'image' => '/assets/jurusan-bp.png',
                    'skills' => "Videografi & Sinematografi\nEditing Video (Premiere, DaVinci)\nAudio Editing\nProduksi & Penyutradaraan\nLighting & Kamera",
                    'careers' => "Videografer\nEditor Film\nProduksi TV & Film\nTeknisi Siaran\nContent Creator",
                ],
                [
                    'id' => 'nima',
                    'name' => 'NIMA (Animasi)',
                    'emoji' => '🎮',
                    'desc' => 'Mempelajari animasi 2D, 3D, VFX, dan multimedia digital.',
                    'image' => '/assets/jurusan-animasi.png',
                    'skills' => "Animasi 2D & 3D (Blender, Maya)\nVFX & Compositing\nModeling & Rigging\nMotion Graphics\nStoryboarding",
                    'careers' => "Animator\nVFX Artist\nMotion Graphic Designer\nGame Developer\nArtist Multimedia",
                ],
                [
                    'id' => 'tkj',
                    'name' => 'TKJ (Teknik Komputer & Jaringan)',
                    'emoji' => '🖧',
                    'desc' => 'Networking, server, cloud computing, dan keamanan jaringan.',
                    'image' => '/assets/jurusan-tkj.png',
                    'skills' => "Jaringan Komputer (LAN, WAN)\nKonfigurasi Server (Linux, Windows)\nKeamanan Jaringan\nVirtualisasi & Cloud\nAdministrasi Sistem",
                    'careers' => "Network Engineer\nSystem Administrator\nIT Support\nCloud Engineer\nSecurity Specialist",
                ],
            ]),

            // ===== DEPARTEMEN PEMESINAN BARU =====
            'pemesinan' => $this->makeDepartment('Departemen Pemesinan', '/assets/Depart2.png', [
                [
                    'id' => 'bdp',
                    'name' => 'BDP (Bisnis Digital & Pemasaran)',
                    'emoji' => '📈',
                    'desc' => 'E-commerce, pemasaran digital, dan kewirausahaan dalam konteks industri manufaktur.',
                    'image' => '/assets/jurusan-bdp.png',
                    'skills' => "Digital Marketing (SEO, SEM)\nMedia Sosial & Content Marketing\nAnalisis Data & Google Analytics\nE-commerce & Marketplace\nStrategi Bisnis Digital untuk Manufaktur",
                    'careers' => "Digital Marketer Industri\nSocial Media Manager\nE-commerce Specialist\nBusiness Development\nEntrepreneur Manufaktur",
                ],
                [
                    'id' => 'tpl',
                    'name' => 'TPL (Teknik Pengelasan)',
                    'emoji' => '🔥',
                    'desc' => 'Pengelasan logam, fabrikasi, dan konstruksi teknik untuk industri manufaktur.',
                    'image' => '/assets/jurusan-tpl.png',
                    'skills' => "Teknik Pengelasan (MIG, TIG, SMAW)\nPengelasan Otomatis & Robotik\nPemrosesan Logam & Metalurgi\nSafety Welding & Inspeksi\nPerbaikan & Fabrikasi Struktur",
                    'careers' => "Welder / Pengelas Industri\nInspector Pengelasan\nSupervisor Fabrication\nTeknisi Maintenance\nEngineer Metalurgi",
                ],
                [
                    'id' => 'tpm',
                    'name' => 'TPM (Teknik Pemesinan)',
                    'emoji' => '⚙️',
                    'desc' => 'Mesin bubut, frais, CNC, dan teknologi manufaktur modern dengan sistem kontrol.',
                    'image' => '/assets/jurusan-tp.png',
                    'skills' => "Pengoperasian Mesin (CNC, Bubut, Frais)\nGambar Teknik & CAD/CAM\nPemrograman CNC & Controller\nPemeliharaan & Kalibrasi Mesin\nKontrol Kualitas Produksi",
                    'careers' => "Operator CNC\nProgrammer Mesin CNC\nTeknisi Maintenance Mesin\nQuality Control Inspector\nSupervisor Produksi",
                ],
            ]),

            'elektro' => $this->makeDepartment('Departemen Kelistrikan', '/assets/departemen-elektro.png', [
                [
                    'id' => 'teav',
                    'name' => 'TE & AV (Teknik Elektronika & Audio Video)',
                    'emoji' => '📺',
                    'desc' => 'Mempelajari elektronika dasar, sistem audio, dan perangkat video.',
                    'image' => '/assets/jurusan-teav.png',
                    'skills' => "Elektronika Dasar\nSistem Audio & Video\nPengolahan Sinyal\nPemasangan & Perawatan Peralatan\nKalibrasi & Troubleshooting",
                    'careers' => "Teknisi Audio/Video\nEngineer Elektronika\nOperator Sistem AV\nMaintenance AV\nKonsultan Sistem Multimedia",
                ],
                [
                    'id' => 'tl',
                    'name' => 'TL (Teknik Pembangkit Tenaga Listrik)',
                    'emoji' => '⚡',
                    'desc' => 'Sistem pembangkit tenaga listrik dan distribusi energi.',
                    'image' => '/assets/jurusan-tl.png',
                    'skills' => "Pembangkit Listrik (PLTA, PLTS)\nDistribusi & Transmisi\nPerawatan Turbin & Generator\nSistem Kontrol & Proteksi\nKeselamatan Listrik",
                    'careers' => "Engineer Pembangkit Listrik\nTeknisi Distribusi Listrik\nEngineer Tenaga & Energi\nPerencana Sistem Listrik\nMaintenance Engineer",
                ],
                [
                    'id' => 'tei',
                    'name' => 'TEI (Teknik Elektronika Industri)',
                    'emoji' => '🏭',
                    'desc' => 'Elektronika industri, kontrol otomatis, dan PLC.',
                    'image' => '/assets/jurusan-tei.png',
                    'skills' => "Kontrol Otomatis (PLC, SCADA)\nSensor & Aktuator\nElektronika Daya\nRobotika Industri\nPemrograman Embedded",
                    'careers' => "Engineer Otomasi Industri\nTeknisi PLC/SCADA\nMaintenance Industri\nEngineer Elektronika Daya\nOtomatisasi Proses",
                ],
                [
                    'id' => 'tki',
                    'name' => 'TKI (Teknik Kimia Industri)',
                    'emoji' => '⚗️',
                    'desc' => 'Proses kimia industri, analisis laboratorium, dan teknologi bahan.',
                    'image' => '/assets/jurusan-tki.png',
                    'skills' => "Kimia Dasar & Organik\nProses Industri (Reaktor, Distilasi)\nAnalisis Laboratorium\nPengendalian Proses\nTeknologi Bahan & Material",
                    'careers' => "Process Engineer\nTeknisi Kimia Industri\nQuality Control\nLaboran Industri\nR&D Material",
                ],
            ]),

            'otomotif' => $this->makeDepartment('Departemen Otomotif', '/assets/departemen-otomotif.png', [
                [
                    'id' => 'tbsm',
                    'name' => 'TBSM (Teknik Bisnis Sepeda Motor)',
                    'emoji' => '🏍️',
                    'desc' => 'Perawatan, servis, dan manajemen bisnis sepeda motor.',
                    'image' => '/assets/jurusan-tbsm.png',
                    'skills' => "Servis Mekanik Motor\nTeknologi Mesin Motor\nManajemen Bengkel\nPenjualan Suku Cadang\nCustomer Service",
                    'careers' => "Mekanik Sepeda Motor\nManager Bengkel\nTeknisi Khusus Motor\nPengusaha Bengkel\nSales Sparepart",
                ],
                [
                    'id' => 'tkr',
                    'name' => 'TKR (Teknik Kendaraan Ringan)',
                    'emoji' => '🚗',
                    'desc' => 'Mesin kendaraan, sistem kelistrikan mobil, dan perawatan mobil.',
                    'image' => '/assets/jurusan-tkr.png',
                    'skills' => "Teknologi Mesin Mobil\nSistem Kelistrikan & Elektronik Mobil\nDiagnostik & ECU\nServis Perawatan\nSistem Bahan Bakar & Mesin",
                    'careers' => "Teknisi Mobil\nDiagnostic Specialist\nTeknisi Kelistrikan Mobil\nService Advisor\nTeknisi Mesin & Transmisi",
                ],
                [
                    'id' => 'bo',
                    'name' => 'BO (Teknik Perbaikan Body Otomotif)',
                    'emoji' => '🛠️',
                    'desc' => 'Perbaikan, pengecatan, dan rekayasa body kendaraan.',
                    'image' => '/assets/jurusan-bo.png',
                    'skills' => "Perbaikan Body & Panel\nTeknik Pengecatan Otomotif\nStruktur Frame & Plat\nFinishing & Polishing\nWelding & Frame Straightening",
                    'careers' => "Panel Beater\nTeknisi Body Repair\nPengecat Mobil\nInspector Body & Cat\nTeknisi Perawatan Body",
                ],
            ]),
        ];

        return view('program.jurusan', compact('departments'));
    }

    /**
     * Membuat struktur data departemen secara dinamis
     *
     * @param string $title
     * @param string $cover
     * @param array $majorsData
     * @return array
     */
    private function makeDepartment(string $title, string $cover, array $majorsData): array
    {
        return [
            'title' => $title,
            'cover' => $cover,
            'majors' => array_map(function ($m) {
                return [
                    'id' => $m['id'],
                    'name' => $m['name'],
                    'emoji' => $m['emoji'] ?? '',
                    'desc' => $m['desc'] ?? '',
                    'image' => $m['image'] ?? '',
                    'skills' => $m['skills'] ?? '',
                    'careers' => $m['careers'] ?? '',
                ];
            }, $majorsData),
        ];
    }
}