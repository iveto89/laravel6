<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function store(): void
    {
        Book::create($this->validateRequest());
    }

    /**
     * @param Book $book
     */
    public function update(Book $book): void
    {
        $book->update($this->validateRequest());
    }

    /**
     * @return mixed
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
