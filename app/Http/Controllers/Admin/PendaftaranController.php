<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::orderBy('tahun', 'desc')->paginate(5);
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        return view('admin.pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun'            => 'required|integer',
            'jumlah_pendaftar' => 'required|integer',
            'jumlah_diterima'  => 'required|integer',
        ]);

        Pendaftaran::create($request->all());
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'tahun'            => 'required|integer',
            'jumlah_pendaftar' => 'required|integer',
            'jumlah_diterima'  => 'required|integer',
        ]);

        $pendaftaran->update($request->all());
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data berhasil dihapus.');
    }
}
