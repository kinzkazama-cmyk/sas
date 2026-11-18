@extends('layout')

@section('isi')
<h2>Data Siswa</h2>

<form method="POST" action="/siswa">
    @csrf
    <input name="nama" placeholder="Nama" required>
    <input name="kelas" placeholder="Kelas" required>
    <button>Tambah</button>
</form>
<br>

<table>
    <tr>
        <th>Nama</th>
        <th>Kelas</th>
        <th>QR Code</th>
        <th>Aksi</th>
    </tr>
    @foreach ($students as $s)
    <tr>
        <td>{{ $s->nama }}</td>
        <td>{{ $s->kelas }}</td>
        <td><div class="qr" data-kode="{{ $s->kode }}"></div></td>
        <td>
            <form method="POST" action="/siswa/{{ $s->id }}">
                @csrf
                @method('DELETE')
                <button>Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    document.querySelectorAll('.qr').forEach(function (el) {
        new QRCode(el, { text: el.dataset.kode, width: 100, height: 100 });
    });
</script>
@endsection