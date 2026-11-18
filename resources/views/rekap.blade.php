@extends('layout')

@section('isi')
<h2>Rekap Absen Hari Ini</h2>
<p>Total hadir: <b>{{ $absen->count() }}</b> siswa</p>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jam</th>
    </tr>
    @foreach ($absen as $a)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $a->student->nama }}</td>
        <td>{{ $a->student->kelas }}</td>
        <td>{{ $a->jam }}</td>
    </tr>
    @endforeach
</table>
@endsection