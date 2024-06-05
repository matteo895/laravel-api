<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Activity;
use Illuminate\Support\Facades\Log;

class ApiActivityController extends Controller
{
    public function index()
    {
        $jsonFilePath = storage_path('app/attivita.json');

        if (File::exists($jsonFilePath)) {
            $jsonData = file_get_contents($jsonFilePath);
            $activities = json_decode($jsonData, true);

            foreach ($activities as $activity) {
                Log::info('Processing activity:', $activity);

                $existingActivity = Activity::where('name', $activity['nome'])->first();

                if ($existingActivity) {
                    // Aggiornare l'attività esistente
                    $existingActivity->update([
                        'description' => $activity['descrizione'],
                        'date' => $activity['data'],
                        'time' => $activity['ora'],
                        'image' => $activity['immagine']
                    ]);
                } else {
                    // Creare una nuova attività
                    Activity::create([
                        'name' => $activity['nome'],
                        'description' => $activity['descrizione'],
                        'date' => $activity['data'],
                        'time' => $activity['ora'],
                        'image' => $activity['immagine']
                    ]);
                }
            }

            return view('activities.index', ['activities' => Activity::all()]);
        } else {
            return response()->json(['error' => 'File attivita.json non trovato'], 404);
        }
    }
}
