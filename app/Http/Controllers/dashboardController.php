<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\kelas;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index() 
   {

    $students = Student::latest()->paginate(10);
        return view('dashboard.index', [
            "title" => "Dashoard",
            "students" => $students
        ]);
  }


  public function create(Student $student)
  {
    return view('student.create', [
      "title" => "AddData-students",
      "grades" => kelas::all()
    ]);
}



public function store(Request $request)
{
  $validatedData = $request->validate([
    'id' => 'AUTO INCREMENT',
    'nis' => 'required|max:225',
    'nama' => 'required|max:225',
    'kelas_id' => 'required',
    'tgl_lahir' => 'required',
    'alamat' => 'required',
]);

$result = Student::create($validatedData);

if ($result) {
    return redirect('/dashboard/dashboard')->with('success', 'Data siswa berhasil ditambahkan');
}
}

public function destroy(Student $student)
{
    $result = Student::destroy($student->id);

    if ($result) {
      return redirect('/dashboard/dashboard')->with('success', 'Data siswa berhasil dihapus');
    }
}

public function edit(Student $student)  
  {
    return view('student.edit', [
      "title" => "detail-students",
      "student" => $student,
      "grades" => kelas::all(),
    ]);
}

public function update(Request $request, Student $student) {

  $validatedData = $request->validate([
    // 'id' => 'AUTO INCREMENT',
    'nis' => 'required|max:225',
    'nama' => 'required|max:225',
    'kelas_id' => 'required',
    'tanggal_lahir' => 'required',
    'alamat' => 'required',
]);

$result = Student::where('id', $student->id)->update($validatedData);

if ($result) {
    return redirect('/dashboard/dashboard')->with('success', 'Data siswa berhasil diubah');
} 

}

public function indexKelas() 
{
 
     return view('./dashboard/grade', [
         "title" => "kelas",
         "kelas" => kelas::all()
     ]);
 
}


public function createKelas(kelas $class) 
   {
    
        return view('kelas.create', [
            "title" => "AddData-Kelas",
            "kelas" => $class
        ]);
    
  }

public function storeKelas(Request $request)
{
  $validatedData = $request->validate([
    'id' => 'AUTO INCREMENT',
    'nama' => 'required|max:225',
]);

$result = kelas::create($validatedData);

if ($result) {
    return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil ditambahkan');
} 

  }

  public function destroyKelas(kelas $kelas)
  {
      $result = $kelas->delete();
  
      if ($result) {
          return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil dihapus');
      }
  }


  public function editKelas(kelas $kelas) 
  {
    return view('kelas.edit', [
      "title" => "edit-kelas",
      "kelas" => $kelas
    ]);
}

public function updateKelas(Request $request, kelas $kelas) {

    $validatedData = $request->validate([
      'nama' => 'required|max:225',
  ]);
  
  $result = kelas::where('id', $kelas->id)->update($validatedData);
  
  if ($result) {
      return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil diubah');
  } 
  
  }
}
