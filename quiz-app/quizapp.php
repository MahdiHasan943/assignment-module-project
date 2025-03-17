<?php 

function evaluateQuiz(array $questions, array $answers): int 
{
    $score = 0;
    foreach ($questions as $key => $question) {
        if ($answers[$key] === $question['correct']) {
            $score++;
        }
    }
    return $score;
}

$questions = [
    [
        'question' => 'What is 2+2?',
        'options'  => ['1', '2', '3', '4'],
        'correct'  => '4'
    ],
    [
        'question' => 'What is the capital of France?',
        'options'  => ['Berlin', 'Madrid', 'Paris', 'Rome'],
        'correct'  => 'Paris'
    ],
    [
        'question' => 'Who wrote "Hamlet"?',
        'options'  => ['Shakespeare', 'Dickens', 'Austen', 'Hemingway'],
        'correct'  => 'Shakespeare'
    ]
];

$answers = [];

foreach ($questions as $key => $question) {   
    echo ($key + 1) . ". " . $question['question'] . "\n";
    
    // Display multiple-choice options
    foreach ($question['options'] as $index => $option) {
        echo "  " . ($index + 1) . ". " . $option . "\n";
    }

    // User input
    $user_input = trim(readline("Your answer (enter number): "));

    // Validate input
    if (isset($question['options'][$user_input - 1])) {
        $answers[] = $question['options'][$user_input - 1];
    } else {
        echo "Invalid choice. Skipping this question.\n";
        $answers[] = null; // Store null for invalid responses
    }
}

$score = evaluateQuiz($questions, $answers);

echo "Your total score: $score/" . count($questions) . "\n";

if ($score == count($questions)) {
    echo "Excellent! You got all answers correct! 🎉\n";
} elseif ($score >= 2) {
    echo "Good effort!\n";
} else {
    echo "You need to try more.\n";
}

?>