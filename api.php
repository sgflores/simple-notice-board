<?php
    
    require_once( realpath(dirname(__FILE__) . '/model.php') );

    // $postdata = file_get_contents("php://input");
    
    $story = new Story();

    $result = $story->all();

    $story = null;

	echo json_encode($result);
    
