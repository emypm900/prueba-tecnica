<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Auth;


class bookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * GET
     * index
     * 
     * Retrieve and display the list of books. 
     * Allows searching through a query parameter (search).
     * 
     * @param  search (optional): Performs a search on the title, author, and publication_year fields.
     * @return View with the list of books in HTML format
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        if($query){
            $books = Book::where('title', 'like', "%$query%")
                        ->orWhere('author', 'like', "%$query%")
                        ->orWhere('publication_year', 'like', "%$query%")
                        ->get();

            return view('book', compact('books'));
        } else {        
            $books = Book::orderBy('title', 'asc')->get();
            return view('book', [
                'books' => $books
            ]);
        }
    }

    /**
     * POST
     * store
     * 
     * Create a new book in the system.
     * 
     * @param  title (required): Title of the book,
     *         author (required): Author of the book,
     *         publication_year (required): Year of publication of the book
     * 
     * @return Redirect to the books view (/books) with a success or error message.
     */
    public function store(Request $request)
    {
        try{
            
            $request->validate([
                'title' => ['required', 'string'],
                'author' => ['required', 'string'],
                'publication_year' => ['required', 'integer'],
            ]);

            $user = \Auth::user();
            $title = $request->input('title');
            $author = $request->input('author');
            $publication_year = $request->input('publication_year');

            $book = new Book();
            $book->user_id = $user->id;
            $book->title = $title;
            $book->author = $author;
            $book->publication_year = $publication_year;
            $book->created_at = now()->format('Y-m-d');
            $book->updated_at = now()->format('Y-m-d');

            $book->save();

            return redirect()->route('book')->with('success', 'Libro creado exitosamente.');
        
        }catch (Exception $e) {
            return redirect()->route('book.create')->with('error', 'Error al crear el libro: ' . $e->getMessage());
        }
    }

    public function show($id) {

    }

    /**
     * POST
     * update
     * 
     * Update the information of an existing book.
     * 
     * @param title (required): New title of the book, 
     *        author (required): New author of the book, 
     *        publication_year (required): New year of publication of the book.
     * 
     * @return Redirect to the books view (/books) with a success or error message.
     */
    public function update(Request $request, $id) {
            
        try{
            $book = Book::find($id);
            $user = Auth::user();

            if ($book->user_id != $user->id) {
                return redirect()->route('book.create')->with('error', 'No tienes permisos para actualizar este libro.');
            }

            $request->validate([
                'title' => ['required', 'string'],
                'author' => ['required', 'string'],
                'publication_year' => ['required', 'integer'],
            ]);

            $book->title = $request->input('title');
            $book->author = $request->input('author');
            $book->publication_year = $request->input('publication_year');
            $book->updated_at = now()->format('Y-m-d');

            $book->save();

            return redirect()->route('book')->with('success', 'Libro actualizado correctamente.');

        } catch (Exception $e) {
            return redirect()->route('book.update')->with('error', 'Error al actualizar el libro: ' . $e->getMessage());
        }

    }

    /**
     * GET
     * destroy
     * 
     * Delete a specific book.
     * 
     * @param id (required): Unique identifier of the book.
     * 
     * @return Redirect to the books view (/books) with a success or error message.
     */
    public function destroy($id) {
        try{
            $user = \Auth::user();
            $book = Book::find($id);
            if($user &&  ($book->user_id == $user->id)){
                $book->delete();

                return redirect()->route('book')->with('success', 'Libro eliminado correctamente.');
            } else {
                return redirect()->route('book')->with('error', 'No tienes permisos para eliminar este libro.');
            }
        
        } catch (Exception $e) {
                return redirect()->route('book')->with('error', 'Error al actualizar el libro: ' . $e->getMessage());

            }


    }

    /**
     * GET
     * create
     * 
     * Display the form to create a new book.
     * 
     * @return View of the creation form in HTML format.
     */
    public function create(){
        $books = Book::orderBy('id', 'desc')->get();
        return view('book.create', [
            'books' => $books
        ]);
    }

    /**
     * GET
     * edit
     * 
     * Display the form to edit an existing book.
     * 
     * @param id (required): Unique identifier of the book to edit.
     * 
     * @return View of the creation form in HTML format.
     */
    public function edit($id){
        $book = Book::find($id);

        return view('book.edit', compact('book'));
    }
}
