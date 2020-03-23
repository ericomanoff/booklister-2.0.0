<?php

namespace App\Http\Controllers;
use App\BookList;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function index()
    {
      $booklists = BookList::all();

      return  response()->json($booklists);
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);

      $booklist = BookList::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
      ]);

      return response()->json($booklist, 201);
    }

    public function show($id)
    {
      $booklist = BookList::find($id);
      $books = $booklist->books()->orderBy('order')->get();
      $booklist->books = $books;
      return response()->json($booklist);
    }

}
