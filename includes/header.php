<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/index.php">Board</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        
        <?php if( !isset($_SESSION['session-user']) ){  ?>
            <a href="/adminaddstory.php" class="btn btn-outline-success  mr-sm-2"> Add Story</a>
        <?php } else { ?>
            <a href="/logout.php" class="btn btn-outline-success  mr-sm-2"> Logout </a>
        <?php } ?>
        

    </div>

</nav>