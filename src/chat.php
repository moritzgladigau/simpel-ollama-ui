<?php
// Da Ollama hin und wieder laenger braucht um sachen zu beantworten muss man in der "php.ini" die "max_execution_time" erhoehen. Die php.ini kann man mit dem Befaehl '''php --ini''' finden.


// Dateipfad zur Historie
$history_file = 'chat_history.json';

// JSON-Daten von der Anfrage abrufen
$input = json_decode(file_get_contents("php://input"), true);
$message = escapeshellarg($input['message']);

// Überprüfen, ob die Historie-Datei existiert, und laden
if (file_exists($history_file)) {
    $history = json_decode(file_get_contents($history_file), true);
} else {
    // Wenn keine Historie existiert, ein neues Array erstellen
    $history = [];
}

// Neue Benutzeranfrage (dies sollte dynamisch vom Frontend kommen)
$user_message = $message;

// Neue Nachricht zur Historie hinzufügen (Benutzernachricht)
$history[] = [
    'role' => 'user',
    'content' => $user_message
];

// Anfrage an Ollama
$data = json_encode([
    'model' => 'llama3.2',
    'messages' => $history,
    'stream' => false
]);

$url = 'http://localhost:11434/api/chat';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);

// Verarbeite die Antwort
$response_data = json_decode($response, true);
$assistant_reply = $response_data['message']['content'];

// Antwort zur Historie hinzufügen
$history[] = [
    'role' => 'assistant',
    'content' => $assistant_reply
];

// Die aktualisierte Historie in die Datei speichern
file_put_contents($history_file, json_encode($history, JSON_PRETTY_PRINT));

// Ausgabe der Antwort
// echo $assistant_reply;
// Antwort als JSON zurückgeben
echo json_encode(["response" => trim($assistant_reply)]);
?>
