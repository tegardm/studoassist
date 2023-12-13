<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Task;
use Carbon\Carbon;
use App\Models\Matakuliah;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //


    public function index() {
        $late_tasks = Task::where('deadline', '<', Carbon::now())
        ->where('status','!=','done')
        ->get();

        $data = [
            "users"=>User::all(),
            "tasks"=>Task::all(),
            "matakuliah"=>Matakuliah::all()    
                ];
    
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('dashboard.index', compact('data','late_tasks'));
    }

    public function matakuliah() {
        

        $data = Matakuliah::all();
    
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('dashboard.matakuliah', compact('data'));
    }

    public function allTasks() {
        

        $data = Task::all();
    
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('dashboard.tasks', compact('data'));
    }

    public function users() {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $users = User::all();
        return view('dashboard.user.index', compact(['users']));
    }

    public function deleteUser($id) {
        $user = User::find($id);
    
        if (!$user) {
            return redirect('/dashboard/users')->with('error', 'User Tidak Ditemukan');
        }
    
        // Hapus catatan terkait di tabel history
        \App\Models\History::where('user_id', $id)->delete();
    
        // Hapus tugas terkait
        Task::where('user_id', $id)->delete();
    
        // Hapus pengguna
        $user->delete();
    
        return redirect('/dashboard/users')->with('success', 'User Berhasil Di Hapus');
    }


    

    public function userShow($id) {
        $data = [
            "tasks"=>Task::where('user_id',$id)->get(),
            "matakuliah"=>Matakuliah::where('user_id',$id)->get()   
                ];

        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $user = User::where('id',$id)->first();
        return view('dashboard.user.show',compact('user','data'));
    }

    public function userTasks($id) {
        $data = Task::where('user_id',$id)->get();
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $user = User::where('id',$id)->first();

        return view('dashboard.user.tasks',compact('user','data'));

    }



    public function userTask($id,$title) {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $user = User::where('id',$id)->first();
        $task = Task::where('title', $title)
        ->where('user_id', $id)
        ->first();
        return view('dashboard.user.task',compact('user','task'));
    }

    public function userMk($id) {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $data = Matakuliah::where('user_id',$id)->get();

        $user = User::where('id',$id)->first();
        return view('dashboard.user.mk',compact('user','data'));
    }

    public function deleteMk($id)
    {
        $task = Matakuliah::find($id);

        if (!$task) {
            return redirect('/dashboard/users')->with('error', 'Mata Kuliah Tidak Ditemukan');
        }
        // Hapus record dari database
        $task->delete();

        return redirect('/dashboard/users')->with('success', 'Mata Kuliah Berhasil Di Hapus');
    }

    public function history() {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        $data = History::all();
        return view('dashboard.history',compact('data'));
    }

    public function deleteTask($id,$title)
    {
        try {
            // Ambil task berdasarkan ID
            $task = Task::where('title', $title)
        ->where('user_id', $id)
        ->first();
    
            // Hapus file PDF jika ada
            if ($task->pdf_module_data) {
                $pdfPath = public_path('storage/pdf_modules/'.$task->pdf_module_data);
                if (file_exists($pdfPath)) {
                    unlink($pdfPath);
                }
            }
    
            // Hapus task dari database
            $task->delete();
    
            // Redirect dengan pesan sukses
            return redirect("/dashboard/users/".$id."/tasks")->with('success', 'Task berhasil dihapus!');
        } catch (\Exception $e) {
            // Redirect dengan pesan kesalahan dan informasi error
            return redirect("/dashboard/users/".$id."/tasks")->with('error', 'Terjadi kesalahan saat menghapus task. Error: ' . $e->getMessage());
        }
    }
}
