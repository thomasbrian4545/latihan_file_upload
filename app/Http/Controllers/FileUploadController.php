<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:1000',
        ]);
        $extFile = $request->berkas->getClientOriginalExtension();
        $namaFile = 'lisa-' . time() . "." . $extFile;
        $path = $request->berkas->storeAs('public', $namaFile);
        $pathBaru = asset('storage/' . $namaFile);
        echo "Proses upload berhasil, file berada di: <a href='$pathBaru'>
        $pathBaru</a>";
    }
}
