<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $joindate = $_POST['joindate'] ?? '';

    $xml = simplexml_load_file('database.xml');

    // Check for duplicate ID
    foreach ($xml->member as $member) {
        if ((string)$member->id === $id) {
            echo "duplicate";
            exit;
        }
    }

    $newMember = $xml->addChild('member');
    $newMember->addChild('id', $id);
    $newMember->addChild('name', $name);
    $newMember->addChild('email', $email);
    $newMember->addChild('joindate', $joindate);

    $xml->asXML('database.xml');
    echo "success";
}
?>
