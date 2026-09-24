<?php
// Total possible score across all 7 subjects (same for both classes)
define('TOTAL_MAX', 475);

// Subject => max score, for each class
function getScienceSubjects() {
    return [
        "Khmer" => 75,
        "Math" => 125,
        "Biology" => 75,
        "History" => 50,
        "Chemistry" => 75,
        "Physics" => 75,
        "English" => 50
    ];
}

function getSocialSubjects() {
    return [
        "Khmer" => 125,
        "Math" => 75,
        "Environmental Science" => 50,
        "History" => 75,
        "Geography" => 75,
        "Moral Civics" => 75,
        "English" => 50
    ];
}

// Determine grade based on percentage of TOTAL_MAX
function getGrade($total) {
    $percent = ($total / TOTAL_MAX) * 100;
    if ($percent >= 90) return "A";
    elseif ($percent >= 80) return "B";
    elseif ($percent >= 70) return "C";
    elseif ($percent >= 60) return "D";
    elseif ($percent >= 50) return "E";
    else return "F";
}
?>