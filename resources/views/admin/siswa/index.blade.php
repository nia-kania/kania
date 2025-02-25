<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <!-- Menambahkan link ke Menu Utama -->
    <a href="{{ route('admin.dashboard') }}">Menu Utama</a>
    <br>
    <!-- Form untuk Pencarian -->
    <form action="{{ route('siswa.index') }}" method="get">
        <label>Cari :</label>
        <input type="text" name="cari" value="{{ request()->query('cari') }}">
        <input type="submit" value="Cari">
    </form>
    <br><br>
    
    <!-- Link untuk Menambah User -->
    <a href="{{ route('akun.create') }}">Tambah User</a>
    
    <!-- Menampilkan Pesan Sukses jika ada -->
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <!-- Tabel Data Siswa -->
    <table class="tabel">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>No Hp</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswas as $siswa)
            <tr>
                <td>
                    <img src="{{ asset('storage/public/siswas/' . $siswa->image) }}" width="120px" height="120px" alt="Foto Siswa">
                </td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                <td>{{ $siswa->no_hp }}</td>
                <td>
                    @if ($siswa->status == 1)
                        Aktif
                    @else
                        Tidak Aktif
                    @endif
                </td>
                <td>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" onsubmit="return confirm('Anda Yakin ?')" method="POST">
                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">
                    <p>Data Tidak Ditemukan</p>
                    <a href="{{ route('siswa.index') }}">Kembali</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Menampilkan Pagination -->
    {{ $siswas->links() }}
</body>
</html>
