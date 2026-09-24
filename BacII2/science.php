<?php
session_start();
require 'functions.php';

$subjects = getScienceSubjects  ();

if (!isset($_SESSION['science_students'])) {
    $_SESSION['science_students'] = [];
}

// Clear the table
if (isset($_GET['reset'])) {
    $_SESSION['science_students'] = [];
    header("Location: science.php");
    exit;
}

// Add a new student on submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $scores = [];
    $total = 0;

    foreach ($subjects as $subject => $max) {
        $score = (float)$_POST[$subject];
        $score = max(0, min($score, $max)); // clamp within 0..max
        $scores[$subject] = $score;
        $total += $score;
    }

    $average = $total / count($subjects);
    $grade = getGrade($total);

    $_SESSION['science_students'][] = [
        'name' => $name,
        'scores' => $scores,
        'total' => $total,
        'average' => $average,
        'grade' => $grade
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Class</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Science Class</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="social.php">Social Science Class</a>
    </nav>

    <form method="post">
        <label>Student Name</label>
        <input type="text" name="name" required>

        <?php foreach ($subjects as $subject => $max): ?>
            <label><?php echo $subject; ?> (0 - <?php echo $max; ?>)</label>
            <input type="number" step="0.5" name="<?php echo $subject; ?>" min="0" max="<?php echo $max; ?>" required>
        <?php endforeach; ?>

        <button type="submit">Add Student</button>
    </form>

    <?php if (count($_SESSION['science_students']) > 0): ?>
        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <?php foreach ($subjects as $subject => $max): ?>
                    <th><?php echo $subject; ?></th>
                <?php endforeach; ?>
                <th>Total</th>
                <th>Average</th>
                <th>Mark</th>
            </tr>
            <?php foreach ($_SESSION['science_students'] as $i => $student): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <?php foreach ($student['scores'] as $score): ?>
                        <td><?php echo $score; ?></td>
                    <?php endforeach; ?>
                    <td><?php echo $student['total']; ?> / <?php echo TOTAL_MAX; ?></td>
                    <td><?php echo round($student['average'], 2); ?></td>
                    <td class="grade-<?php echo $student['grade']; ?>"><?php echo $student['grade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a class="reset-link" href="science.php?reset=1">Clear all records</a>
    <?php else: ?>
        <p>No students added yet.</p>
    <?php endif; ?>
</body>
</html>