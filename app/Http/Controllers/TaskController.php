<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Task; // Sesuaikan dengan nama model Anda
use App\Models\Matakuliah; // Sesuaikan dengan nama model Anda
use App\Models\History;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class TaskController extends Controller
{

    // Fungsi untuk menyimpan data dari formulir
    public function submitForm(Request $request)
    {
        try {
            // Validasi data formulir jika diperlukan
            $request->validate([
                'title' => 'required|string|max:255',
                'course_id' => 'required|string',
                'status' => 'required|string',
                'deadline' => 'required|date',
                'pdfModule' => 'nullable|mimes:pdf|max:10240', // Maksimum 10 MB
                'description' => 'required|string',
            ]);
    
            // Menyimpan file PDF jika diunggah
            $pdfModulePath = null;
            $pdfModuleName = null;
            
            if ($request->hasFile('pdfModule')) {
                $pdfModule = $request->file('pdfModule');
                $pdfModulePath = $pdfModule->storeAs('pdf_modules', $pdfModule->hashName() , 'public');
                $pdfModuleName = $pdfModule->hashName();  // Menggunakan hashName untuk nama file
            }
    
            // Menyimpan data ke database menggunakan model
         $newTask =   Task::create([
                'title' => $request->input('title'),
                'user_id' => auth()->user()->id,
                'course_id' => $request->input('course_id'),
                'status' => $request->input('status'),
                'deadline' => $request->input('deadline'),
                'pdf_module_name' => $pdfModuleName,
                'pdf_module_data' => $pdfModulePath ?  $pdfModuleName : null,
                'description' => $request->input('description'),
            ]);

            $history = History::create([
                'action' => "Membuat Tugas",
                'table_name' => "Tabel Tugas",
                'user_id' => auth()->user()->id,
                'data_id' => $newTask->id,
                'action_time' => Carbon::now()
            ]);
        
            $history->save();
    
            // Redirect dengan pesan sukses
            return redirect('/tasks')->with('success', 'Task berhasil dikirimkan!');
        } catch (\Exception $e) {
            // Redirect dengan pesan kesalahan dan informasi error
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengirimkan tugas. Error: ' . $e->getMessage());
        }
    }

    // Contoh metode update pada controller
public function updateTask(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'course_id' => 'required|string',
        'status' => 'required|string',
        'deadline' => 'required|date',
        'pdfModule' => 'nullable|mimes:pdf|max:10240',
        'description' => 'required|string',
    ]);

    $task = Task::find($id);
    $pdfModulePath = null;
    $pdfModuleName = null;
    // Menyimpan file PDF jika diunggah
    if ($request->hasFile('pdfModule')) {
        $pdfPath = public_path('storage/pdf_modules/'.$task->pdf_module_data);
        if (isset($task->pdf_module_data)) {
            unlink($pdfPath);
        }

        $pdfModule = $request->file('pdfModule');
        $pdfModulePath = $pdfModule->storeAs('pdf_modules', $pdfModule->hashName() , 'public');
        $pdfModuleName = $pdfModule->hashName();  // Menggunakan hashName untuk nama file
        $task->pdf_module_data = $pdfModulePath ?  $pdfModuleName : null;
        
       
    }

    // Update data lainnya
    $task->title = $request->input('title');
    $task->course_id = $request->input('course_id');
    $task->status = $request->input('status');
    $task->deadline = $request->input('deadline');
    $task->description = $request->input('description');

    $task->save();

    $history = History::create([
        'action' => "Update Tugas",
        'table_name' => "Tabel Tugas",
        'user_id' => auth()->user()->id,
        'data_id' => $task->id,
        'action_time' => Carbon::now()
    ]);

    $history->save();

    return redirect('/tasks')->with('success', 'Task berhasil diperbarui!');
}

    
    
    
    

    public function deleteTask($id)
    {
        try {
            // Ambil task berdasarkan ID
            $task = Task::findOrFail($id);
    
            // Hapus file PDF jika ada
            if ($task->pdf_module_data) {
                $pdfPath = public_path('storage/pdf_modules/'.$task->pdf_module_data);
                if (file_exists($pdfPath)) {
                    unlink($pdfPath);
                }
            }
    
            // Hapus task dari database
            
            $history = History::create([
                'action' => "Hapus Tugas",
                'table_name' => "Tabel Tugas",
                'user_id' => auth()->user()->id,
                'data_id' => $task->id,
                'action_time' => Carbon::now()
            ]);
        
            $history->save();

            $task->delete();
            // Redirect dengan pesan sukses
            return redirect('/tasks')->with('success', 'Task berhasil dihapus!');
        } catch (\Exception $e) {
            // Redirect dengan pesan kesalahan dan informasi error
            return redirect('/tasks')->with('error', 'Terjadi kesalahan saat menghapus task. Error: ' . $e->getMessage());
        }
    }

    public function submitMk(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'course_code' => 'required|string|max:50',
                'sks' => 'required|integer',
                'description' => 'required|string',
            ]);
    
            $newTask = Matakuliah::create([
                'title' => $request->input('title'),
                'user_id' => auth()->user()->id,
                'course_code' => $request->input('course_code'),
                'sks' => $request->input('sks'),
                'description' => $request->input('description'),
            ]);


            $history = History::create([
                'action' => "Buat Mata Kuliah",
                'table_name' => "Tabel Mata Kuliah",
                'user_id' => auth()->user()->id,
                'data_id' => $newTask->id,
                'action_time' => Carbon::now()
            ]);
        
            $history->save();
    
            return redirect('/tasks/mk')->with('success', 'Mata Kuliah Baru Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            return redirect('/tasks/mk')->with('error', 'Gagal menambahkan mata kuliah. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    public function updateMk(Request $request, $course_code)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'sks' => 'required|integer',
        'description' => 'required|string',
    ]);

    $matakuliah = Matakuliah::where('course_code', $course_code)->first();
    if (!$matakuliah) {
        return redirect('/tasks/mk')->with('error', 'Mata kuliah tidak ditemukan.');
    }

    $matakuliah->update([
        'title' => $request->input('title'),
        'sks' => $request->input('sks'),
        'description' => $request->input('description'),
    ]);

    $history = History::create([
        'action' => "Update Mata Kuliah",
        'table_name' => "Tabel Mata Kuliah",
        'user_id' => auth()->user()->id,
        'data_id' => $matakuliah->id,
        'action_time' => Carbon::now()
    ]);

    $history->save();

    return redirect('/tasks/mk')->with('success', 'Mata kuliah berhasil diperbarui!');
}
    

    public function deleteMk($id)
    {
        $task = Matakuliah::find($id);

        if (!$task) {
            return redirect('/tasks/mk')->with('error', 'Mata Kuliah Tidak Ditemukan');
        }


        $history = History::create([
            'action' => "Hapus Mata Kuliah",
            'table_name' => "Tabel Mata Kuliah",
            'user_id' => auth()->user()->id,
            'data_id' => $task->id,
            'action_time' => Carbon::now()
        ]);
    
        $history->save();
        // Hapus record dari database
        $task->delete();

        return redirect('/tasks/mk')->with('success', 'Mata Kuliah Berhasil Di Hapus');
    }
}
