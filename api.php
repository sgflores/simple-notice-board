<?php
    
    require_once( realpath(dirname(__FILE__) . '/models/Story.php') );

    $story = new Story();

    $result = $story->all();

    $story = null;

	echo json_encode($result);
    
