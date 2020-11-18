<?php
    require "DBStorage.php";
    $Storage = new DBStorage();

    /*if(isset($_POST['title']))
    {

    }*/

    $projects = $Storage->getAll();
    ?>

<html>
<body>
<?php
    foreach ($projects as $project){ ?>
    <div>
        <h2><?=$project->getTitle()?></h2>
        <p><?=$project->getDescription()?></p>
    </div>
<?php } ?>
}
</body>
</html>

