<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //GET All
    public function index(){
        return response() -> json(Book::all(), 200);
    }

    //GET Once
    public function read($id){
        $data = Book::find($id);
        if(is_null($data)){
            return response() -> json(['message'=>'Book not found!'], 404);
        }
        else{
            return response() -> json($data, 200);
        }
    }

    //POST
    public function create(Request $request){
        $data = Book::create($request->all());
        return response($data, 201);
    }

    //PUT
    public function update(Request $request, $id){
        $books = Book::find($id);
        $data = $request->all();
        $books->update($data);
        return response()->json(["message" => "records updated successfully"], 200);
    }

    //DELETE
    public function delete($id){
        $product = Book::find($id);
        Book::destroy($id);
        return response()->json(["message" => "Deleted successfully"], 200);;
    }
}
