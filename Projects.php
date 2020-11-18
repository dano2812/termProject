<?php
    require "DBStorage.php";
    //require "Project.php";
    $Storage = new DBStorage();

    $edit = false;
    $editIdx = -1;
    $editId = -1;


    if(isset($_POST['Name']) && isset($_POST['Description']))
    {
        $Storage->saveProject($Storage->createProject($_POST['Name'], $_POST['Description']));
    }

    $projects = $Storage->getAll();

    for($i = 0; $i < count($projects); $i++)
    {
        $id = $projects[$i]->getId();
        $str = "delete$id";
        if (isset($_POST[$str])) {
            $Storage->deleteProjectById($_POST[$str]);
            $projects = $Storage->getAll();
            break;
        }
    }

    for($i = 0; $i < count($projects); $i++)
    {
        $id = $projects[$i]->getId();
        $str = "edit$id";
        if (isset($_POST[$str])) {
            $editIdx = $i;
            $editId = $id;
            $edit = true;
            $projects = $Storage->getAll();
            break;
        }
    }

    ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>DK-Semestralny projekt Projects</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="home.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body>

<div class="pageWrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Projects.php">Projects <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.html">Contact <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="career.html">Career <span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login </button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sing Up </button>
            </form>
        </div>

    </nav>
</div>

<div class="split left">
    <div class="centered">
        <h2>DK</h2>
        <p>Term Project</p>
    </div>
</div>

<div class="split right">
    <div class="centered">
        <h2>DK</h2>
        <p>Term Project</p>
    </div>
</div>

<div  class="centered">
    <?php
    if(!$edit) { ?>
    <form action="Projects.php" method="post">
        <label>Project Name</label>
        <input type="text" name="Name">
        <label>Project Description</label>
        <input type="text" name="Description">
        <input type="submit" value="Save">
    </form>
    <?php
    }?>

    <?php
    foreach ($projects as $project){ ?>
        <div>
            <?php
            if(!$edit) { ?>
                <h2><?=$project->getTitle()?></h2>
                <p><?=$project->getDescription()?></p>

                <form action="Projects.php" method="POST" id="form1">
                    <?php
                    $id = $project->getId();?>
                    <input type="hidden" name="edit<?=$id?>" value="<?=$id?>" />
                    <button type="submit">Edit</button>
                </form>

                <form action="Projects.php" method="POST" id="form1">
                    <input type="hidden" name="delete<?=$id?>" value="<?=$id?>" />
                    <button type="submit">Delete</button>
                </form>


            <?php
            } else {
                $id = $project->getId();
                if($editId == $id){ ?>
                    <form action="Projects.php" method="post">
                        <label>Project Name</label>
                         <input type="text" name="Name" value="<?=$project->getTitle()?>">
                        <label>Project Description</label>
                        <input type="text" name="Description" value="<?=$project->getDescription()?>">
                        <input type="submit" value="Save">
                    </form>

                    <form action="Projects.php" method="POST" id="form1">
                        <input type="hidden" name="delete<?=$project->getId()?>" value="<?=$project->getId()?>" />
                        <button type="submit">Delete</button>
                    </form>
                <?php
                } else {?>
                    <h2><?=$project->getTitle()?></h2>
                    <p><?=$project->getDescription()?></p>

                    <form action="Projects.php" method="POST" id="form1">
                        <?php
                        $id = $project->getId();?>
                        <input type="hidden" name="edit<?=$id?>" value="<?=$id?>" />
                        <button type="submit">Edit</button>
                    </form>

                    <form action="Projects.php" method="POST" id="form1">
                        <input type="hidden" name="delete<?=$id?>" value="<?=$id?>" />
                        <button type="submit">Delete</button>
                    </form>
                <?php
                    }
                }?>


            <?php } ?>
        </div>

</div>



</body>
</html>
