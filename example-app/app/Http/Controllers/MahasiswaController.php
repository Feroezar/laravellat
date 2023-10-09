<?php

namespace App\Http\Controllers;

//import Model "Mahasiswa
use App\Models\Mahasiswa;
use Carbon\Carbon;
//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {
        //get Mahasiswas
        $pagination = 5;
        $Mahasiswa = Mahasiswa::latest()->paginate($pagination);

        //render view with Mahasiswas
        return view('maha.index', compact('Mahasiswa'))->with('i', ($request->input('page', 1) - 1)*$pagination);
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('maha.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'Nim'     => 'required|max:8|',
            'Nama'     => 'required|min:5',
            'TanggalLahir',
            'Alamat'   => 'required|min:10'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/maha', $image->hashName());
        $date = $request->TanggalLahir;
        //create Mahasiswa
        Mahasiswa::create([
            'Nim'     => $request->Nim,
            'Nama'     => $request->Nama,
            'TanggalLahir'   => $date,
            'Alamat'    => $request->Alamat
        ]);

        //redirect to index
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get Mahasiswa by ID
        $Mahasiswa = Mahasiswa::findOrFail($id);

        //render view with Mahasiswa
        return view('maha.show', compact('Mahasiswa'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get Mahasiswa by ID
        $Mahasiswa = Mahasiswa::findOrFail($id);

        //render view with Mahasiswa
        return view('Maha.edit', compact('Mahasiswa'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'Nim'     => 'required|max:8|',
            'Nama'     => 'required|min:5',
            'TanggalLahir',
            'Alamat'   => 'required|min:10'
        ]);

        //get Mahasiswa by ID
        $Mahasiswa = Mahasiswa::findOrFail($id);

        //check if image is uploaded

        // if ($request->hasFile('image')) {
        $date = $request->TanggalLahir;
        //create Mahasiswa
        $Mahasiswa->update([
            'Nim'     => $request->Nim,
            'Nama'     => $request->Nama,
            'TanggalLahir'   => $date,
            'Alamat'    => $request->Alamat
        ]);
        //     //upload new image
        //     $image = $request->file('image');
        //     $image->storeAs('public/Mahasiswas', $image->hashName());

        //     //delete old image
        //     Storage::delete('public/Mahasiswas/'.$Mahasiswa->image);

        //     //update Mahasiswa with new image
        //     $Mahasiswa->update([
        //         'image'     => $image->hashName(),
        //         'title'     => $request->title,
        //         'content'   => $request->content
        //     ]);

        // } else {

        //     //update Mahasiswa without image
        //     $Mahasiswa->update([
        //         'title'     => $request->title,
        //         'content'   => $request->content
        //     ]);
        // }

        //redirect to index
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $Mahasiswa
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get Mahasiswa by ID
        $Mahasiswa = Mahasiswa::findOrFail($id);

        //delete image
        // Storage::delete('public/Mahasiswas/'. $Mahasiswa->image);

        //delete Mahasiswa
        $Mahasiswa->delete();

        //redirect to index
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
