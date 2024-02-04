<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Guru::all();
        return view('index', compact('data'));
    }

     public function create(Request $request)
    {
        try {
            $this->validate($request, [
                'nama_guru' => 'required|max:1000',
                'jenis_kelamin_guru' => 'required',
                'tanggal_lahir' => 'required',
                'alamat_guru' => 'required|max:2000',
                'no_telepon' => 'required',
                'cropped_image' => 'required',
            ]);

            $data = $request->except('foto');
            $croppedImage = $request->input('cropped_image');
            $croppedImageFile = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
            $croppedImagePath = 'foto/' . uniqid() . '.jpg';
            Storage::put($croppedImagePath, $croppedImageFile);

            $data['foto'] = $croppedImagePath;

            Guru::create($data);

            Alert::success('Success', 'Data Guru Berhasil Ditambahkan!');

            return redirect('/');
        }

            catch (\Exception $e) {
                Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());

                return redirect('/');
            }
    }

    public function update(Request $request, $id)
         {
         try {
            if (empty($request->file('foto'))) {
                $data = Guru::where('id_guru', $id)->first();
                $data->update([
                    'nama_guru' => $request->nama_guru,
                    'jenis_kelamin_guru' => $request->jenis_kelamin_guru,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat_guru' => $request->alamat_guru,
                    'no_telepon' => $request->no_telepon,
                ]);
            } else {
                $data = Guru::where('id_guru', $id)->first();
                Storage::delete($data->foto);
                $data->update([
                    'nama_guru' => $request->nama_guru,
                    'jenis_kelamin_guru' => $request->jenis_kelamin_guru,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat_guru' => $request->alamat_guru,
                    'no_telepon' => $request->no_telepon,
                    'foto' => $request->file('foto')->store('foto')
                ]);
            }

            Alert::success('Success', 'Data Guru Berhasil Diubah!');
            return redirect()->back();

            } catch (\Exception $e) {
                Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
                return redirect()->back();
        }
    }

    public function delete(Request $request)
        {
            $selectedItems = $request->input('selectedItems');

            try {
                if (!empty($selectedItems)) {
                    Guru::whereIn('id_guru', $selectedItems)->delete();
                     Storage::delete($selectedItems->foto);
                    Alert::success('Success', 'Data Guru Berhasil Dihapus.');
                } else {
                    throw new \Exception('Mohon Pilih Data Guru.');
                }
            } catch (\Exception $e) {
                Alert::error('Error', 'Data Guru Tidak Bisa Dihapus: ' . $e->getMessage());
                }

        return redirect('/');
        }
}
