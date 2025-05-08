<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $joindate = $_POST['joindate'] ?? '';

    $xml = simplexml_load_file('database.xml');
    $found = false;

    foreach ($xml->member as $member) {
        if ((string)$member->id === $id) {
            $member->name = $name;
            $member->email = $email;
            $member->joindate = $joindate;
            $found = true;
            break;
        }
    }

    if ($found) {
        $xml->asXML('database.xml');
        echo "success";
    } else {
        echo "not_found";
    }
}
?>
