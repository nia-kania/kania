<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Detail Siswa</title>
      <style type="text/css">
            table {
                  border-collapse: collapse;
                  margin: 20px 0px;
                  text-align: left;
            }
            
            table,th,td {
                  border: 1px solid;
                  text-align: left;
                  padding-right: 20px;
            }
      </style>
</head>
<body>
      <h1>Detail Siswa</h1>

      {{-- Link kembali ke halaman index siswa --}}
      <a href="{{ route('admin.siswa.index') }}">Kembali</a>

      <table>
            <tr>
                  <td colspan="4" style="text-align: center;">
                        {{-- Perbaikan typo height --}}
                        <img src="{{ asset('storage/siswas/'.$siswa->image) }}" width="120px" height="120px" alt="Foto Siswa">
                  </td>
            </tr>
            <tr>
                  <td colspan="2">Akun Siswa</td>
                  <td colspan="2">Data Siswa</td>
            </tr>
            <tr>
                  <th>Nama</th>
                  <td>: {{ $siswa->name }}</td>
                  <th>NIS</th>
                  <td>: {{ $siswa->nis }}</td>
            </tr>
            <tr>
                  <th>Email</th>
                  <td>: {{ $siswa->email }}</td>
                  <th>Kelas</th>
                  <td>: {{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
            </tr>
            <tr>
                  <td></td>
                  <td></td>
                  <th>No HP</th>
                  <td>: {{ $siswa->hp }}</td>
            </tr>
            <tr>
                  <td></td>
                  <td></td>
                  <th>Status</th>
                  @if($siswa->status)
                      <td>: Aktif</td>
                  @else
                      <td>: Tidak Aktif</td>
                  @endif
            </tr>
      </table>
</body>
</html>
