<?php
$xml = simplexml_load_file('database.xml');

$members = [];

foreach ($xml->member as $member) {
    $members[] = [
        'id' => (string)$member->id,
        'name' => (string)$member->name,
        'email' => (string)$member->email,
        'joindate' => (string)$member->joindate,
    ];
}

echo json_encode($members);
?>
