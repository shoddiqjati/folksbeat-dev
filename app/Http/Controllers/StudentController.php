<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use DB;
use DateTime;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        $filter = Request::input('filter');
        $students = Student::where('students.name','LIKE','%'.$filter.'%')->get();
        return view('students.index', compact('students','filter'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $input = Request::all();
        $validation = Validator::make($input, Student::$rules);

        if ($validation->passes())
        {
            Student::create($input);

            return Redirect::route('students.index');
        }

        return Redirect::route('students/create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $student = DB::table('students')->select('*')->where('nis',$id)->first();
        return view('students.edit', ['student' => $student]);
    }

    public function update($id)
    {
        $dt = new DateTime();
        $datenow = $dt->format('Y-m-d H:i:s');
        $input = Request::only('nis','name','is_active');
        $validation = Validator::make($input, Student::$rules);
        if ($validation->passes())
        {
            DB::table('students')->where('nis',$id)->update($input += ['updated_at' => $datenow]);
            
            return Redirect::route('students.index');
        }
        return Redirect::route('students.index')
                    ->withInput()
                    ->withErrors($validation)
                    ->with('message', 'There were validation errors.');

    }

    public function delete($id)
    {
        $student = student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
        /*DB::table('students')->where('barcode',$id)->delete();
        return Redirect::route('students.index');*/
    }

    public function history($id)
    {
        $student = DB::table('students')
                ->select('name')
                ->where('nis','=',$id)
                ->first();

        $histories = DB::table('transactions')
                    ->join('students','transactions.student_id','=','students.nis')
                    ->join('books','transactions.book_id','=','books.barcode')
                    ->join('titles','books.id_title','=','titles.id')
                    ->select('transactions.borrowed_at as borrowed_at', 'transactions.expired_at as expired_at', 'transactions.returned_at as returned_at','students.name as name','books.barcode as barcode','titles.title as title')
                    ->where('students.nis','=', $id)
                    ->get();
                

        return view('students.history', compact('histories','student'));
    }
}
