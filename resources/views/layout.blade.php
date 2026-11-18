<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Absensi QR</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: auto; padding: 20px; }
        nav a { margin-right: 15px; font-weight: bold; }
        table { border-collapse: collapse; width: 100%; }
        td, th { border: 1px solid #ccc; padding: 8px; text-align: left; }
        input { padding: 6px; margin: 4px; }
        button { padding: 6px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Absensi QR</h1>
    <nav>
        <a href="/siswa">Data Siswa</a>
        <a href="/scan">Scan Absen</a>
        <a href="/rekap">Rekap Hari Ini</a>
    </nav>
    <hr>
    @yield('isi')
</body>
</html>