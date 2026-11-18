<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{
    public function siswa()
    {
        $students = Student::orderBy('nama')->get();
        return view('siswa', compact('students'));
    }

    public function simpanSiswa(Request $request)
    {
        $data = $request->validate([
            'nama'  => 'required',
            'kelas' => 'required',
        ]);
        $data['kode'] = 'SISWA-' . strtoupper(Str::random(6));
        Student::create($data);
        return back();
    }

    public function hapusSiswa(Student $student)
    {
        $student->delete();
        return back();
    }

    public function scan()
    {
        return view('scan');
    }

    public function proses(Request $request)
    {
        $student = Student::where('kode', $request->kode)->first();

        if (!$student) {
            return response()->json(['ok' => false, 'pesan' => 'QR tidak dikenal!']);
        }

        $tanggal = now()->toDateString();
        $sudah = Attendance::where('student_id', $student->id)
            ->where('tanggal', $tanggal)
            ->exists();

        if ($sudah) {
            return response()->json(['ok' => false, 'pesan' => $student->nama . ' sudah absen hari ini.']);
        }

        Attendance::create([
            'student_id' => $student->id,
            'tanggal'    => $tanggal,
            'jam'        => now()->format('H:i:s'),
        ]);

        return response()->json(['ok' => true, 'pesan' => 'Selamat datang, ' . $student->nama . '!']);
    }

    public function rekap()
    {
        $absen = Attendance::with('student')
            ->where('tanggal', now()->toDateString())
            ->orderBy('jam')
            ->get();
        return view('rekap', compact('absen'));
    }
}