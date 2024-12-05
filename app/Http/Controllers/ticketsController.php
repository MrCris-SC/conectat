<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Message;



class TicketsController extends Controller
{
    public function mostrarTickets(){
        $tickets = Ticket::all();
        $mensajes = Message::latest()->take(5)->get();
        return view('tickets', compact('tickets', 'mensajes'));
        
    }
}