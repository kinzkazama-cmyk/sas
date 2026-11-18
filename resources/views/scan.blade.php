@extends('layout')

@section('isi')
<h2>Scan Absen</h2>
<div id="reader" style="width:320px"></div>
<h3 id="hasil"></h3>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
<script>
    let terkunci = false;

    function berhasil(kode) {
        if (terkunci) return;
        terkunci = true;

        fetch('/scan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            body: JSON.stringify({ kode: kode })
        })
        .then(function (r) { return r.json(); })
        .then(function (d) {
            var h = document.getElementById('hasil');
            h.innerText = d.pesan;
            h.style.color = d.ok ? 'green' : 'red';
        })
        .finally(function () {
            setTimeout(function () { terkunci = false; }, 3000);
        });
    }

    new Html5QrcodeScanner('reader', { fps: 10, qrbox: 200 }).render(berhasil);
</script>
@endsection