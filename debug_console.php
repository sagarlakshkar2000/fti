<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

try {
    $response = Gemini\Laravel\Facades\Gemini::models()->list();
    $output = "";
    foreach ($response->models as $model) {
        $output .= "ID: " . $model->name . "\n";
        $output .= "SupportedMethods: " . implode(', ', $model->supportedGenerationMethods) . "\n\n";
    }
    file_put_contents('models_list_direct.txt', $output);
    echo "Done.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
