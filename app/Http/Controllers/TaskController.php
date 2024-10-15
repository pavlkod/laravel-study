<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 123;
        Post::create($request->only(['title', 'description']));

        $request->validate([
            'title' => 'required|unique:recipes|max:125',
            'body' => 'required',
        ]);
        // Рецепт действителен; продолжить, чтобы сохранить его
        // Создать и сохранить новый контакт из ввода пользователя
        $contact = new Contact();
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->email = $request->input('email');
        $contact->save();
        //or
        return redirect('tasks')->with(['error' => true, 'message' => 'Whoops! ']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $id;

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:recipes|max:125',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('recipes/create')
            ->withErrors($validator)
            ->withinput();
        }
        // Рецепт действителен; продолжить, чтобы сохранить его

        return 'zzz';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
