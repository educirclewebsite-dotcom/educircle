<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\University;

$uni = University::find(8);
if ($uni) {
    $uni->description = '<p>La Trobe University is a world-class institution known for its commitment to social justice and academic excellence. With campuses across Victoria, including the main Melbourne Bundoora campus, it offers a vibrant student life and strong industry connections in fields such as Health, Education, Business, and IT. La Trobe is consistently ranked among the top 1% of universities globally and is a leader in research that makes a real-world impact.</p>';
    $uni->save();
    echo "University ID 8 updated successfully.";
} else {
    echo "University ID 8 not found.";
}
