<?php



    // You'll have to read php://input to get data from a post with content type text/plain
    $rawPost  = file_get_contents('php://input');


    $result = substr($rawPost, 132, strlen($rawPost)-176);

    $result = str_replace('\\','/',$result);

    // Save the txt
    $response = file_put_contents('../scenes/saved_scene.json', $result);

    if ($response!=false)
        echo 'Saved';
    else
        echo 'Not saved';
?>





