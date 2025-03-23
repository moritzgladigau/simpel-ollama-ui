<?php

// JSON-Daten von der Anfrage abrufen
$input = json_decode(file_get_contents("php://input"), true);
$message = escapeshellarg($input['message']);

$command = "/usr/local/bin/ollama run phi3 " . $message;

// Befehl ausführen und Ausgabe erfassen
$output = shell_exec($command);

// Antwort als JSON zurückgeben
echo json_encode(["response" => trim($output)]);

?>
