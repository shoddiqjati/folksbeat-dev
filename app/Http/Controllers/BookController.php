<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use DB;
use DateTime;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function index()
    {
        $filter = Request::input('filter');
        $books = DB::table('titles')
                ->join('categories','titles.id_category','=','categories.id_category')
                ->where('titles.title','LIKE','%'.$filter.'%')->get();
        return view('books.index', compact('books','filter'));
    }

    public function create()
    {
        $categories = Category::pluck('category', 'id_category');
        return view('books.create', compact('categories'));
    }

/*    public function add($id)
    {
        $dt = new DateTime();
        $datenow = $dt->format('Y-m-d H:i:s');
        $add = Request::input('add');
        $book = DB::table('titles')->select('quantity')->where('id',$id)->first();
        $quantity = $book->quantity + $add;

        DB::table('titles')->where('id',$id)->update(['quantity'=>$quantity,'updated_at' => $datenow]);

        return Redirect::route('books.index');
    }*/

    public function store(Request $request)
    {
        $input = Request::all();
        $category = DB::table('categories')->select('code')->where('id_category','=', Request::input('id_category'))->first();
        $id_title = DB::table('titles')->count();
        $id_title = $id_title + 1;
        if($id_title < 10) {
            $id_title = '00'.strval($id_title);
        } elseif($id_title < 100) {
            $id_title = '0'.strval($id_title);
        } else {
            $id_title = strval($id_title);            
        }
        foreach ($category as $value) {
            $code_category = $category->code;
        }

        $quantity = Request::input('quantity');

        $dt = new DateTime();
        $datenow = $dt->format('Y-m-d H:i:s');

        DB::table('titles')->insert([
                'id' => $code_category.'-'.$id_title,
                'id_category' => Request::input('id_category'),
                'title' => Request::input('title'),
                'author' => Request::input('author'),
                'quantity' => $quantity,
                'availability' => $quantity,
                'can_be_borrowed' => Request::input('can_be_borrowed'),
                'created_at' => $datenow,
                'updated_at' => $datenow
            ]);
        
        for($i=1; $i<=$quantity; $i++)
        {
            if($i < 10) {
                $id = '00'.strval($i);
            } elseif($i < 100) {
                $id = '0'.strval($i);
            } else {
                $id = strval($i);            
            }
            foreach ($category as $value) {
                $code_category = $category->code;
            }

            DB::table('books')->insert([
                'barcode' => $code_category.'-'.$id_title.'-'.$id,
                'id_title' => $code_category.'-'.$id_title,
                'status' => 1,
                'created_at' => $datenow,
                'updated_at' => $datenow
            ]);
        }
        
        return Redirect::route('books.index',['id'=>$id]);

    }

    public function show($id)
    {
        $books = DB::table('books')
                ->join('titles','books.id_title','=','titles.id')
                ->join('categories','titles.id_category','=','categories.id_category')
                ->select('books.barcode as barcode','titles.title as title','titles.author as author','books.status as status','categories.category as category','books.status as status')
                ->where('books.id_title','=',strval($id))
                ->get();
        return view('books.show', compact('books'));

    }

    public function edit($id)
    {
        $categories = Category::pluck('category', 'id_category');
        $book = DB::table('titles')
                ->join('categories','titles.id_category','=','categories.id_category')
                ->select('*')->where('titles.id',$id)->first();
        return view('books.edit', compact('book','categories'));
    }

    public function update($id)
    {
        $dt = new DateTime();
        $datenow = $dt->format('Y-m-d H:i:s');
        $input = Request::only('author','title','id_category','can_be_borrowed','quantity');
        
        $book = DB::table('titles')
                ->select('quantity','id')->where('id',$id)->first();
        $quantity = $book->quantity;

        $category = DB::table('categories')->select('code')->where('id_category','=', Request::input('id_category'))->first();
        
        DB::table('titles')->where('id',$id)->update($input += ['updated_at' => $datenow, 'availability' => Request::input('quantity')]);

        $add = (int)Request::input('quantity') - $quantity ;

        if($add > 0){
            for($i=1; $i<=$add; $i++)
            {
                if($i < 10) {
                    $id = '00'.strval($i+$quantity);
                } elseif($i < 100) {
                    $id = '0'.strval($i+$quantity);
                } else {
                    $id = strval($i+$quantity);            
                }
                foreach ($category as $value) {
                    $code_category = $category->code;
                }

                DB::table('books')->insert([
                    'barcode' => $book->id.'-'.$id,
                    'id_title' => $book->id,
                    'status' => 1,
                    'created_at' => $datenow,
                    'updated_at' => $datenow
                ]);
            }
        }
            
        return Redirect::route('books.index');

    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
        /*DB::table('books')->where('barcode',$id)->delete();
        return Redirect::route('books.index');*/
    }

    public function history($id)
    {
        $book = DB::table('books')
                ->join('titles','books.id_title','=','titles.id')
                ->join('categories','titles.id_category','=','categories.id_category')
                ->select('books.barcode as barcode','titles.title as title','titles.author as author','books.status as status','categories.category as category','books.status as status')
                ->where('barcode','=',$id)
                ->first();

        $histories = DB::table('transactions')
                    ->join('students','transactions.student_id','=','students.nis')
                    ->join('books','transactions.book_id','=','books.barcode')
                    ->join('titles','books.id_title','=','titles.id')
                    ->join('categories','titles.id_category','=','categories.id_category')
                    ->select('students.nis as student','books.barcode as id','transactions.borrowed_at as borrowed_at', 'transactions.expired_at as expired_at', 'transactions.returned_at as returned_at','students.name as name', 'titles.title as title')
                    ->where('books.barcode','=', $id)
                    ->get();
                

        return view('books.history', compact('histories','book'));
    }
}
