<?php
header("Access-Control-Allow-Origin: *");

const FILENAME = "chat.json";

$json_str = file_get_contents(FILENAME);

date_default_timezone_set('Asia/Hong_Kong');

if (isset($_GET['text']) and strlen($_GET['text']) > 0) {
    $username = $_GET['username'] ?? 'Unknown';
    $text = $_GET['text'];
    $eventId = $_GET['eventId'];
    $timestamp = date('d-m-Y H:i:s');;

    $messages = json_decode($json_str, true); // Convert to an associative array

    if (!isset($messages[$eventId])) {
        $messages[$eventId] = array(); // Initialize an empty array for the event if it doesn't exist
    }

    $messages[$eventId][] = array(
        "who" => $username,
        "text" => $text,
        "timestamp" => $timestamp
    );

    $json_str = json_encode($messages, JSON_PRETTY_PRINT);

    file_put_contents(FILENAME, $json_str);
}
echo $json_str;
