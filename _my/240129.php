<?php
$answer = rand(1, 5);

function Score($answer) {
    switch ($answer) {
        case 1:
            return 5;
        case 2:
            return 4;
        case 3:
        case 4:
            return 3;
        case 5:
            return 5;
    }
}

$score = Score($answer);

// echo "답이 {$answer}일 때 점수는 {$score}입니다.";


$arr = [];

for ($i = 0; $i < 10; $i++) {
    $answer = rand(1, 5); 
    $score = rand(3, 5);

    $arr[] = [
        "answer" => $answer,
        "score" => $score
    ];
}

echo json_encode($arr);

$answer_counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

$max_answer_count = max($answer_counts);
$most_frequent_answer = array_search($max_answer_count, $answer_counts);

if ($most_frequent_answer == 1) {
    $result = "A: ";
} elseif ($most_frequent_answer == 3) {
    $result = "B: ";
} elseif ($most_frequent_answer == 5) {
    $result = "C: ";
}

foreach ($arr as $item) {
    if ($item['answer'] == $most_frequent_answer) {
        $score = $item['score'];
        break;
    }
}

// 결과를 출력합니다.
echo '가장 많이 선택된 답변 번호:'.$most_frequent_answer.'/'.$result . $score;



?>
