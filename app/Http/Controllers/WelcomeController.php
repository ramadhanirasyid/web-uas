<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use PDF;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Pesanan';

        confirmDelete();

        return view('employee.index', ['pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Employee';
        $positions = Position::all();
        return view('employee.create', compact('pageTitle', 'positions'));
    }

    public function store(Request $request)
    {
        // dd($request->file('file_data'));
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'jenis' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'layanan' => 'required',
            'file_data' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file_data');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // Store File
            $file->store('public/files');

            // Associate filenames with the employee model
            $employee = new Employee;
            $employee->firstname = $request->name;
            $employee->lastname = $request->jenis;
            $employee->email = $request->email;
            $employee->age = $request->phone;
            $employee->position_id = $request->layanan;
            $employee->original_filename = $originalFilename;
            $employee->encrypted_filename = $encryptedFilename;
            $employee->save();
        } else {
            // If no file is uploaded, save the employee without the filenames
            $employee = new Employee;
            $employee->firstname = $request->name;
            $employee->lastname = $request->jenis;
            $employee->email = $request->email;
            $employee->age = $request->phone;
            $employee->position_id = $request->layanan;
            $employee->save();
        }

        Alert::success('Added Successfully', 'Employee Data Added Successfully.');

        return redirect()->route('welcome');
    }
}
