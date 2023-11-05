<?php
header("Access-Control-Allow-Origin: *");

const FILENAME = "chat.json";

$json_str = file_get_contents(FILENAME);

if (isset($_GET['text'])) {
    $username = $_GET['username'] ?? 'Unknown';
    $text = $_GET['text'];
    $eventId = $_GET['eventId'];

    $messages = json_decode($json_str, true); // Convert to an associative array

    if (!isset($messages[$eventId])) {
        $messages[$eventId] = array(); // Initialize an empty array for the event if it doesn't exist
    }

    $messages[$eventId][] = array(
        "who" => $username,
        "text" => $text
    );

    // Keep latest 20 messages only for each event
    while (count($messages[$eventId]) > 20) {
        array_shift($messages[$eventId]);
    }

    $json_str = json_encode($messages, JSON_PRETTY_PRINT);

    file_put_contents(FILENAME, $json_str);
}
echo $json_str;
