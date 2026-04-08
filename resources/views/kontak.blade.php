@extends('layouts.app')
<title>@yield('title', 'KONTAK - SMK PGRI 3')</title>

@push('styles')
<style>
    section, body {
    background: 
        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), /* lapisan gelap 50% */
        url('assets/backgroundMain.png') center / cover no-repeat;
}



    .radio-pill-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .radio-pill {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.2rem 1rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        border-radius: 9999px;
        background-color: rgba(255, 255, 255, 0.3);
        border: 1.5px solid #e5e7eb; /* gray-200 */
        color: #374151; /* gray-700 */
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .radio-pill:hover {
        background-color: rgba(249, 115, 22, 0.07);
        border-color: #f97316;
    }

    .radio-pill input[type="radio"] {
        appearance: none;
        -webkit-appearance: none;
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .radio-pill input[type="radio"]:checked + span {
        background: linear-gradient(135deg, #f97316, #fb923c);
        color: white;
        border-color: transparent;
        box-shadow: 0 6px 16px rgba(249, 115, 22, 0.3);
        transform: scale(1.03);
    }

    .radio-pill span {
        position: relative;
        z-index: 2;
        display: inline-block;
        padding: 0.5rem 1.4rem;
        border-radius: 9999px;
        transition: all 0.3s ease;
    }

    /* Responsiveness */
    @media (max-width: 640px) {
        .radio-pill {
            width: 100%;
            justify-content: center;
        }
    }

    .radio-pill {
    padding: 0.3rem 0.9rem;
    font-size: 0.9rem;
    border-width: 1px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}

.radio-pill span {
    padding: 0.25rem 0.8rem;
}
button[type="submit"] {
    width: 100%;
    background: linear-gradient(135deg, #f97316, #fb923c);
    color: white;
    font-weight: 600;
    padding: 0.9rem 1.4rem;
    border: none;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 0.5px;
    box-shadow: 0 6px 16px rgba(249, 115, 22, 0.25);
}

button[type="submit"]:hover {
    background: linear-gradient(135deg, #fb923c, #f97316);
    box-shadow: 0 8px 20px rgba(249, 115, 22, 0.4);
    transform: translateY(-2px);
}

button[type="submit"]:active {
    transform: translateY(0);
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
}

/* New styles for enhanced text section */
.hero-text-content {
    max-width: 600px;
    text-align: center;
}

.cta-highlight {
    color: #f97316;
    font-weight: 700;
}

.benefit-list {
    text-align: left;
    margin-top: 1.5rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.8rem;
    color: #e5e7eb;
    font-size: 1.1rem;
}

.benefit-icon {
    color: #f97316;
    font-weight: bold;
}

</style>
@endpush

@section('content')
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-center items-start gap-10">
        <!-- Enhanced Text Section -->
        <div class="mt-36 text-center px-4 text-white hero-text-content">
            <h1 class="text-3xl md:text-4xl font-bold mb-6">Punya Pertanyaan atau Ingin Daftar?
Kami siap membantu!</h1>
            
            <p class="text-lg mb-6 leading-relaxed">
                <span class="cta-highlight">Bergabunglah dengan keluarga besar SMK PGRI 3</span> - 
                Isi formulir di bawah ini dan tim kami akan memberikan informasi sesuai kebutuhan Anda — cepat, jelas, dan ramah.
            </p>

            <!-- <div class="benefit-list">
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Konsultasi gratis dengan tim akademik kami</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Informasi lengkap program keahlian terbaru</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Pendampingan proses pendaftaran yang mudah</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span>Jawaban cepat dalam 1x24 jam</span>
                </div>
            </div>

            <p class="text-lg mt-6 italic text-orange-200">
                "Pilih subjek yang sesuai dengan kebutuhan Anda, dan mari kita mulai percakapan!"
            </p> -->
        </div>

        <!-- Form Section -->
        <div class="bg-white p-8 shadow-md rounded-2xl w-full md:w-2/5">

            <form action="{{ route('kontak.kirim') }}" method="POST">
                @csrf

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <input type="text" name="nama" value="{{ old('nama') }}"
                        class="mt-1 bg-gray-200 block w-full border border-gray-300 rounded-xl shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Nama Lengkap" required>
                </div>

                <div class="mb-4">
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 bg-gray-200 block w-full border border-gray-300 rounded-xl shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Email" required>
                </div>

                <!-- Enhanced Radio Section with Descriptions -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-3">Pilih Jenis Layanan</label>
                    <div class="radio-pill-group mb-3">
                        <label class="radio-pill">
                            <input type="radio" name="subjek" value="Konsultasi"
                                {{ old('subjek') === 'Konsultasi' ? 'checked' : '' }} required>
                            <span>Konsultasi</span>
                        </label>

                        <label class="radio-pill">
                            <input type="radio" name="subjek" value="Pendaftaran"
                                {{ old('subjek') === 'Pendaftaran' ? 'checked' : '' }}>
                            <span>Pendaftaran</span>
                        </label>
                    </div>
                    
                    <!-- Description for each option -->
                    <div class="text-sm text-gray-600 space-y-2">
                        <div id="konsultasi-desc" class="radio-desc hidden">
                            <span class="font-medium text-orange-600">Konsultasi:</span> 
                            Tanyakan tentang program studi, fasilitas, kurikulum, atau informasi akademik lainnya. Tim kami siap membantu!
                        </div>
                        <div id="pendaftaran-desc" class="radio-desc hidden">
                            <span class="font-medium text-orange-600">Pendaftaran:</span> 
                            Mulai proses pendaftaran siswa baru. Dapatkan panduan lengkap dan bantuan untuk bergabung dengan SMK PGRI 3.
                        </div>
                        <div id="default-desc" class="radio-desc">
                            <span class="font-medium text-orange-600">Pilih layanan:</span> 
                            Konsultasi untuk bertanya informasi atau Pendaftaran untuk memulai proses bergabung dengan kami.
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <textarea name="pesan" rows="5"
                        class="mt-1 bg-gray-200 block w-full border border-gray-300 rounded-xl shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Ceritakan kebutuhan Anda atau pertanyaan yang ingin diajukan..." required>{{ old('pesan') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 shadow-md transform hover:scale-105">
                    KIRIM SEKARANG
                </button>
                
                <!-- <p class="text-xs text-center text-gray-500 mt-3">
                    Kami akan membalas pesan Anda dalam 1x24 jam melalui email
                </p> -->
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="subjek"]');
        const descriptions = document.querySelectorAll('.radio-desc');
        
        function showDescription(selectedValue) {
            // Hide all descriptions first
            descriptions.forEach(desc => {
                desc.classList.add('hidden');
            });
            
            // Show the appropriate description
            if (selectedValue === 'Konsultasi') {
                document.getElementById('konsultasi-desc').classList.remove('hidden');
            } else if (selectedValue === 'Pendaftaran') {
                document.getElementById('pendaftaran-desc').classList.remove('hidden');
            } else {
                document.getElementById('default-desc').classList.remove('hidden');
            }
        }
        
        // Add event listeners to radio buttons
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                showDescription(this.value);
            });
        });
        
        // Show appropriate description on page load if there's a selected value
        const selectedRadio = document.querySelector('input[name="subjek"]:checked');
        if (selectedRadio) {
            showDescription(selectedRadio.value);
        }
    });
</script>
@endpush