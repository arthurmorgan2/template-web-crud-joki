@extends('layouts.app')
@section('content')
<section class="container min-vh-100">
    <div class="d-flex flex-column gap-2 py-3 px-3">
        <div class="fs-3">
            Data Guru
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a href="#" class="btn btn-primary btn-rounded" type="button" data-bs-toggle="modal"
                    data-bs-target="#tambahModal" href="#"><i class="fa-solid fa-plus fa-beat"></i>
                    Tambah
                    Data Guru</a>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <table class="table table-hover table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat Guru</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Input Date</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Pilih</th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" action='guru/delete'>
                    @csrf
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->id_guru }}</td>
                        <td>{{ $row->nama_guru }}</td>
                        <td>{{ $row->jenis_kelamin_guru }}</td>
                        <td>{{ $row->tanggal_lahir }}</td>
                        <td>{{ $row->alamat_guru }}</td>
                        <td>{{ $row->no_telepon }}</td>
                        <td><img src="{{ URL::asset('uploads/' . $row->foto) }}" width="100"></td>
                        <td>{{ date('d M Y', strtotime($row->input_date)) }}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $row->id_guru }}"
                                class="btn btn-warning"><i class="fa-solid fa-pen-to-square"
                                    style="color: #ffffff;"></i></a>
                        </td>
                        <td>
                            <input type="checkbox" name="selectedItems[]" value="{{ $row->id_guru }}">
                        </td>
                    </tr>
                    @endforeach
                    <button class="btn btn-danger mb-3 mx-1" type="submit">Hapus Terpilih</button>
                </form>
            </tbody>
        </table>
    </div>
</section>


<!-- Modal Tambah -->
<div class="modal fade w-100" id="tambahModal" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center" class="modal-title" id="tambahModalLabel">Tambahkan Data Guru</h5>
                <button type="button" class="btn-close" data-bs-target="#alertModal" data-bs-toggle="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/guru/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru" class="form-control" placeholder="Nama Guru"
                            autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin_guru" class="form-label">Jenis Kelamin Guru</label>
                        <select class="form-control" name="jenis_kelamin_guru" id="jenis_kelamin_guru" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            placeholder="Tanggal Lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_guru" class="form-label">Alamat Guru</label>
                        <textarea class="form-control" name="alamat_guru" id="alamat_guru"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon/WA</label>
                        <input type="number" name="no_telepon" id="no_telepon" class="form-control"
                            placeholder="08*********" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                        <img src="#" alt="Preview" id="image-preview"
                            style="max-width: 100%; height: auto; display: none;">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($data as $edit)
<div class="modal fade" id="editModal-{{ $edit->id_guru }}" tabindex="-1" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Mengubah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/guru/update/' . $edit->id_guru) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru" class="form-control"
                            value="{{ $edit->nama_guru }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin_guru" class="form-label">Jenis Kelamin Guru</label>
                        <select class="form-control" name="jenis_kelamin_guru" id="jenis_kelamin_guru">
                            <option value="{{ $edit->jenis_kelamin_guru }}" selected>{{ $edit->jenis_kelamin_guru }}
                            </option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            value="{{ $edit->tanggal_lahir }}" placeholder="Tanggal Lahir">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_guru" class="form-label">Alamat Guru</label>
                        <textarea class="form-control" name="alamat_guru"
                            id="alamat_guru">{{ $edit->alamat_guru }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon/WA</label>
                        <input type="number" name="no_telepon" id="no_telepon" class="form-control"
                            value="{{ $edit->no_telepon }}" placeholder="08*******213">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto"
                            class="form-control @error('foto') is-invalid @enderror mb-3">
                        <label for="foto" class="form-label">Foto Guru Saat Ini</label>
                        <br>
                        <img src="{{ asset('uploads/' . $edit->foto) }}" width="100">
                        <br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Inisialisasi Cropper --}}
<script>
    $(document).ready(function () {
        const image = document.getElementById('image-preview');
        const cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 2,
        });

        $('#foto').change(function () {
            const input = this;
            const reader = new FileReader();

            reader.onload = function (e) {
                image.src = e.target.result;
                cropper.replace(e.target.result);
                $('#image-preview').show();
            };

            reader.readAsDataURL(input.files[0]);
        });

        $('form').submit(function (e) {
            e.preventDefault();

            const canvas = cropper.getCroppedCanvas();
            const croppedDataUrl = canvas.toDataURL('image/jpeg');

            $('<input>').attr({
                type: 'hidden',
                name: 'cropped_image',
                value: croppedDataUrl,
            }).appendTo('form');

            this.submit();
        });
    });
</script>
@endsection