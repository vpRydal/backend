<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
       $contacts=Contact::all();
       if (!$contacts){
           return new Response(json_encode(['error'=>true,'message'=>'No contacts']),404);
       }
        return new Response(json_encode($contacts));
    }
}
