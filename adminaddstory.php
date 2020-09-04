<?php 
    
    session_start(); 
       
    if( !isset($_SESSION['session-user']) ){ 
        header('location: login.php');
    }

    $errMsg = '';
    $errStat = '';

    if(isset($_POST['submit'])){
        
        require_once( realpath(dirname(__FILE__) . '/models/Story.php') );

        $name = $_POST['name'];
        $content = $_POST['content'];

        $story = new Story();

        $result = $story->save(['name' => $name, 'content' => $content]);

        $db = null;

        if( $result == 'success' ){
            
            $errStat = 'success';
            $errMsg = 'New Story has been added!';

        }else{
            $errStat = 'error';
            $errMsg = "*** Something went wrong ***";

        }


    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Notice Board - Admin Add Story</title>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/css.php') ); ?>

</head>
<body>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/header.php') ); ?>

    <main role="main" class="container">

        <?php if($errMsg) { ?>
            <div class="alert  <?php echo $errStat == 'success' ? 'alert-success' : 'alert-danger' ?>" >
                <?php echo $errMsg; ?>
            </div>
        <?php } ?>

        <form method="post" action="" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Post A Story</h1>
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" name="name" value="" class="form-control" placeholder="Name" required autofocus>
            <br>
            <label for="content" class="sr-only">Content</label>
            <div class="form-group">
                <textarea id="editor" name="content" placeholder="Content"></textarea>
            </div>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
        </form>
        
    
    </main>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/script.php') ); ?>
        
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
        selector: 'textarea#editor',
        menubar: false
    });
    </script>

</body>
</html>