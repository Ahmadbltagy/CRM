<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    public function index($customerId){
        return Note::where('customer_id', $customerId)->get();
    }

    public function showById($customerId, $id){
        return Note::find($id) ?? response()->json(["Status"=>"Not founded"], Response::HTTP_NOT_FOUND);
    }


    public function create(Request $request, $customerId){
        $note = new Note();
        $note->note = $request->note;
        $note->customer_id = $customerId;
        $note->save();
        return $request;
    }



    public function update(Request $request,$customerId,$id){
        $note = Note::find($id);
        
        if(!$note){
            return response()->json(['status'=>"Not founded"], Response::HTTP_NOT_FOUND);
        }
        if($note->customer_id !== $customerId){
            return response()->json(['status'=>"Invalid Date"], Response::HTTP_BAD_REQUEST);
            
        }

        $note->name = $request->name;
        $note->save();
        return response()->json(["Status"=>"Updated Successfully"], Response::HTTP_OK);
    }

    public function delete(Request $request,$customerId ,$id){
        $note = Note::find($id);
        
        if(!$note){
            return response()->json(['status'=>"Not founded"], Response::HTTP_NOT_FOUND);
        }

        if($note->customer_id !== $customerId){
            return response()->json(['status'=>"Invalid Date"], Response::HTTP_BAD_REQUEST);
            
        }

        $note->delete();
        return response()->json(["Status"=>"Deleted Successfully"], Response::HTTP_OK);

    }
    

}
