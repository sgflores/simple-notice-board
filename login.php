<?php 

    if( isset($_SESSION['session-user']) ){ 
        header('location: adminadddstory.php');
    }

    $errMsg = '';
    $email = '';
    $pword = '';

    if(isset($_POST['login'])){

        require_once( realpath(dirname(__FILE__) . '/model.php') );

        $email = $_POST['email'];
        $pword = $_POST['pword'];

        $user = new User();

        $result = $user->login($email, $pword);

        $db = null;

        if( $result !== -1 ){

            $errMsg = '';

            session_start();

            $_SESSION['session-user'] = $result;

            echo "<script> location.href = '/adminaddstory.php'; </script>";

        }else{

            $errMsg = "*** Invalid login credentials ***";

        }



    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Notice Board - Admin Login</title>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/css.php') ); ?>

</head>
<body>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/header.php') ); ?>

    <main role="main" class="container">

    <div class="alert alert-info">
        Email: admin@gmail.com <br>
        Password: admin
    </div>

    <?php if($errMsg) { ?>
        <div class="alert alert-danger">
            <?php echo $errMsg; ?>
        </div>
    <?php } ?>

    <form method="post" action="" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="pword" class="sr-only">Password</label>
        <input type="password" id="pword" name="pword" class="form-control" placeholder="Password" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
    </form>
    
    </main>

    <?php require_once( realpath(dirname(__FILE__) . '/includes/script.php') ); ?>

</body>
</html>