<?php
// Dateipfad zur Historie
$history_file = 'chat_history.json';

// Überprüfen, ob die Historie-Datei existiert, und laden
if (file_exists($history_file)) {
    $history = json_decode(file_get_contents($history_file), true);
} else {
    // Wenn keine Historie existiert, ein neues Array erstellen
    $history = [];
}

// Neue Benutzeranfrage (dies sollte dynamisch vom Frontend kommen)
$user_message = "What is your name again?";

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
echo $assistant_reply;
?>
