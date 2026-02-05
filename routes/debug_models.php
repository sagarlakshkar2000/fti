<?php

use Illuminate\Support\Facades\Route;
use Gemini\Laravel\Facades\Gemini;

Route::get('/debug-models-list', function () {
    try {
        $response = Gemini::models()->list();
        return response()->json($response->models);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
