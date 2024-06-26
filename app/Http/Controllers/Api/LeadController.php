<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;
use App\Mail\MailRestaurant;
use App\Models\Order;
use App\Models\Restaurant;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $restaurant = Restaurant::where('name', $request->restaurant_name)->first();

        $order = Order::where('customer_name', $request->name)->first();

        // validiamo i dati "a mano" per poter gestire la risposta
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'restaurant_name' => 'required|min:2|max:100',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                // la funzione errors() della classe Validator resituisce un array
                // in cui la chiave è il campo soggetto a validazione
                // e il valore è un array di messaggi di errore
                'errors' => $validator->errors()
            ]);
        }

        // salviamo a db i dati inseriti nel form di contatto
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        //$emails = [$request->email, $restaurant->email];
        // inviamo la mail all'admin del sito, passando il nuovo oggetto Lead
        Mail::to($request->email)->send(new NewContact($new_lead));
        Mail::to($restaurant->user->email)->send(new MailRestaurant($new_lead));

        return response()->json([
            'success' => true,
        ]);
    }
}
