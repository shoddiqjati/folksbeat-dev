<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use DB;
use DateTime;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $transactions->toarray();
        return view('transactions.index', compact('transactions','no'));
    }

    public function create()
    {
        $book_id = Book::join('titles','books.id_title','=','titles.id')->where('books.status',1)->where('titles.can_be_borrowed',1)->pluck('barcode','barcode');
        $student_id = Student::pluck('name', 'nis');
        $dt = new DateTime();
        $datenow = $dt->format('d/m/Y');
        return view('transactions.create',compact('book_id','student_id', 'datenow'));
    }

    public function store(Request $request)
    {   
        $borrowed_at = Carbon::now();
        $expired_at = Carbon::now()->addWeek(1);
        $input = Request::only('book_id', 'student_id');
        $validation = Validator::make($input, Transaction::$rules);

        if ($validation->passes())
        {
            DB::table('transactions')->insert(
                [   'book_id' => Request::input('book_id'),
                    'student_id' => Request::input('student_id'),
                    'borrowed_at' => $borrowed_at,
                    'expired_at' => $expired_at,
                    'returned_at' => null
                ]);

            DB::table('books')->where('barcode',Request::input('book_id'))->update(['status'=>0]);
            $book = DB::table('titles')
                    ->join('books','titles.id','=','books.id_title')
                    ->select('titles.availability as availability')
                    ->where('books.barcode',Request::input('book_id'))->first();

            $availability = $book->availability - 1;

            DB::table('titles')
                    ->join('books','titles.id','=','books.id_title')
                    ->where('books.barcode',Request::input('book_id'))
                    ->update(['availability' => $availability]);

            return Redirect::route('transactions.index');
        }

        return Redirect::route('transactions/create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $dt = Carbon::now();
        $datenow = $dt->format('d/m/Y');
        $transaction = DB::table('transactions')->select('*')->where('id',$id)->first();
        $expired_at = Carbon::parse($transaction->expired_at);
        $diff = $dt->diffInDays($expired_at);
        $denda = 0;
        if($diff<0){
            $denda = 3000 * $diff;
        }
        return view('transactions.edit', compact('transaction','datenow', 'denda'));
    }

    public function update($id)
    {
        $dt = new DateTime();
        $datenow = $dt->format('Y-m-d H:i:s');
        $returned_at = Carbon::now();
        $input = Request::only('returned_at');
        $validation = Validator::make($input, Transaction::$rules);
        if ($validation->passes())
        {
            DB::table('transactions')->where('id',$id)->update(['returned_at' => $returned_at]);
            DB::table('books')
                ->join('transactions','books.barcode','=','transactions.book_id')
                ->where('transactions.id',$id)->update(['status'=> 1]);
            $book = DB::table('titles')
                ->join('books','titles.id','=','books.id_title')
                ->join('transactions','books.barcode','=','transactions.book_id')
                ->where('transactions.id',$id)->select('availability')->first();
            $availability = $book->availability + 1;
            DB::table('titles')
                ->join('books','titles.id','=','books.id_title')
                ->join('transactions','books.barcode','=','transactions.book_id')
                ->where('transactions.id',$id)->update(['availability'=> $availability]);
            
            return Redirect::route('transactions.index');
        }
        return Redirect::route('transactions.index')
                    ->withInput()
                    ->withErrors($validation)
                    ->with('message', 'There were validation errors.');

    }

    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index');
        /*DB::table('transactions')->where('barcode',$id)->delete();
        return Redirect::route('transactions.index');*/
    }
}
