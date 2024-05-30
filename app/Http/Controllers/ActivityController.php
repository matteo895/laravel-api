<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    // Metodo per visualizzare le attività
    public function index()
    {
        // Recupera tutte le attività dal modello Activity
        $activities = Activity::all();

        // Restituisci la vista 'activities.index' passando le attività recuperate
        return view('activities.index', compact('activities'));
    }
}
