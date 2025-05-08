<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    $xml = simplexml_load_file('database.xml');
    $index = 0;
    $found = false;

    foreach ($xml->member as $member) {
        if ((string)$member->id === $id) {
            unset($xml->member[$index]);
            $found = true;
            break;
        }
        $index++;
    }

    if ($found) {
        $xml->asXML('database.xml');
        echo "deleted";
    } else {
        echo "not_found";
    }
}
?>
