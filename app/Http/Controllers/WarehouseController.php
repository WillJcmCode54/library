<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        $books = Book::select('books.*','warehouse.real_quantity AS quantity')
                    ->join('warehouse','warehouse.book_id','=','book.id')
                    ->orderBy("id","desc")->get();
        return view("warehouse.index",compact("books"));
    }
}
