<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use Auth;


class reviewController extends Controller
{
    public function __construct()
{
    $this->middleware('auth', ['except' => ['index']]);
}

    /**
     * GET
     * index
     * 
     * Retrieve and display the list of reviews. 
     * 
     * @return View with the list of reviews in HTML format
     */
    public function index()
    {
        $reviews = Review::orderBy('rating', 'desc')->get();
        return view('review', [
            'reviews' => $reviews
        ]);
    }

    /**
     * POST
     * store
     * 
     * Create a new review for a specific book
     * 
     * @param book_id (required): ID of the book for which the review is being created,
     *        title (required): Title of the review.
     *        review_text (required): Text content of the review.
     *        rating (required): Numeric rating for the review.
     * 
     * @return Redirect to the reviews view (/reviews) with a success or error message.
     */
    public function store(Request $request)
    {
        try{
            
            $request->validate([
                'book_id' => ['required'],
                'title' => ['required', 'string'],
                'review_text' => ['required', 'string'],
                'rating' => ['required', 'integer'],
            ]);

            $user = \Auth::user();
            $book_id = $request->input('book_id');
            $review_text = $request->input('review_text');
            $title = $request->input('title');
            $rating = $request->input('rating');

            $review = new Review();
            $review->user_id = $user->id;
            $review->book_id = $book_id;
            $review->review_text = $review_text;
            $review->title = $title;
            $review->rating = $rating;
            $review->created_at = now()->format('Y-m-d');
            $review->updated_at = now()->format('Y-m-d');

            $review->save();

            return redirect()->route('review')->with('success', 'Review creada exitosamente.');
        
        }catch (exception $e) {
            return redirect()->route('review.create')->with('error', 'Error al crear la review: ' . $e->getMessage());
        }
    }

    public function show($id) {

    }

    /**
     * POST
     * update
     * 
     * Update the information of an existing review.
     * 
     * @param book_id (required): New book ID for the review,
     *        title (required): New title of the review,
     *        review_text (required): New text content of the review,
     *        rating (required):  New numeric rating for the review.
     * 
     * @return Redirect to the reviews view (/reviews) with a success or error message.
     */
    public function update(Request $request, $id) {
            
        try{
            $review = Review::find($id);
            $user = Auth::user();

            if ($review->user_id != $user->id) {
                return redirect()->route('review.create')->with('error', 'No tienes permisos para actualizar esta review.');
            }

            $request->validate([
                'book_id' => ['required'],
                'title' => ['required', 'string'],
                'review_text' => ['required', 'string'],
                'rating' => ['required', 'integer'],
            ]);

            $review->book_id = $request->input('book_id');
            $review->review_text = $request->input('review_text');
            $review->title = $request->input('title');
            $review->rating = $request->input('rating');
            $review->updated_at = now()->format('Y-m-d');

            $review->save();

            return redirect()->route('review')->with('success', 'Review actualizada exitosamente.');

        } catch (Exception $e) {
            return redirect()->route('review.update')->with('error', 'Error al actualizar la review: ' . $e->getMessage());
        }

    }

     /**
     * GET
     * destroy
     * 
     * Delete a specific review.
     * 
     * @param id (required): Unique identifier of the review.
     * 
     * @return Redirect to the reviews view (/reviews) with a success or error message.
     */
    public function destroy($id) {
        try{
            
            $user = \Auth::user();
            $review = Review::find($id);
            if($user &&  ($review->user_id == $user->id)){
                $review->delete();

                return redirect()->route('review')->with('success', 'Review eliminada correctamente.');
            } else {
                return redirect()->route('review')->with('error', 'No tienes permisos para eliminar esta review.');
            }
                
        } catch (Exception $e) {    
            return redirect()->route('review')->with('error', 'Error al actualizar la review: ' . $e->getMessage());
        }
    }

    /**
     * GET
     * create
     * 
     * Display the form to create a new review.
     * 
     * @return View of the creation form in HTML format.
     */
    public function create(){
        $books = Book::orderBy('id', 'desc')->get();
        return view('review.create', [
            'books' => $books
        ]);
    }

    /**
     * GET
     * edit
     * 
     * Display the form to edit an existing review.
     * 
     * @param id (required): Unique identifier of the review to edit.
     * 
     * @return View of the edit form in HTML format.
     */
    public function edit($id){
        $books = Book::orderBy('id', 'desc')->get();
        $review = Review::find($id);

        return view('review.edit', compact('review', 'books'));
    }

}
