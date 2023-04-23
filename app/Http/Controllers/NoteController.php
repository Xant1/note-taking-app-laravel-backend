<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteResource;
use App\Models\NoteModel;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return Response
     */
    public function index()
    {
        $notes = NoteModel::all();
        return response()->json($notes);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        

        $request->validate([
            'notes' => 'required|max:255',
        ]);
        
        $note = NoteModel::create($request->all());
        
       
        return response()->json($note, 201);
    }

    /**
     * Display the specified task.
     *
     * @param  NoteModel  $task
     * @return Response
     */
    public function show(NoteModel $note)
    {
        return response()->json([
            'notes'=>$note
        ]);
    }

    /**
     * Update the specified task in storage.
     *
     * @param  Request  $request
     * @param  NoteModel  $task
     * @return Response
     */
    public function update(Request $request, NoteModel $note)
    {
        $request->validate([
            'notes' => 'required|max:255',
        ]);

        $note->update($request->all());
        return response()->json($note, 200);
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  NoteModel  $task
     * @return Response
     */
    public function destroy(NoteModel $note)
    {
        $note->delete();
        return response()->json(null, 204);
    }
}