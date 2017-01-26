<?php
    // start ensures that it is asynchronous called
    $output = shell_exec('test_segment.bat');
    print_r($output);
?>