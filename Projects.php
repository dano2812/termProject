<?php
    require "DBStorage.php";
    $Storage = new DBStorage();

    $edit = FALSE;
    $editIdx = -1;
    $editId = -1;

    $errName = false;
    $errDescription = false;
    $errId = false;

    $projects = $Storage->getAllProjects();

    for($i = 0; $i < count($projects); $i++)
    {
        $id = $projects[$i]->getId();
        $str = "edit$id";
        if (isset($_POST[$str])) {
            $editIdx = $i;
            $editId = $id;
            $edit = TRUE;
            $projects = $Storage->getAllProjects();
            break;
        }
    }

    if(isset($_POST['Name']) && isset($_POST['Description']))
    {
        $errName = empty($_POST['Name']);
        $errDescription = empty($_POST['Description']);

        if(!$errName && !$errDescription)
        {
            $Storage->saveProject($Storage->createProject($_POST['Name'], $_POST['Description']));
            $projects = $Storage->getAllProjects();
        }
    }

    if(isset($_POST['NameEdit']) && isset($_POST['DescriptionEdit']) && isset($_POST['ID']) &&
        !empty($_POST['NameEdit']) && !empty($_POST['DescriptionEdit']) && !empty($_POST['ID']))
    {
        $errName = empty($_POST['NameEdit']);
        $errDescription = empty($_POST['DescriptionEdit']);
        $errId = is_integer($_POST['ID']);

        if(!$errName && !$errDescription && !$errId)
        {
            $Storage->updateProject($_POST['ID'], $_POST['NameEdit'], $_POST['DescriptionEdit']);
            $projects = $Storage->getAllProjects();
        }

    }

    for($i = 0; $i < count($projects); $i++)
    {
        $id = $projects[$i]->getId();
        $str = "delete$id";
        if (isset($_POST[$str])) {
            $Storage->deleteProjectById($_POST[$str]);
            $projects = $Storage->getAllProjects();
            break;
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DK-Semestralny projekt Projects</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="Projects.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<?php
    require "head.php"
?>

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

<div  class="leftMiddle">
    <?php
    if(!$edit) { ?>
        <form action="Projects.php" method="post">
            <div class="form-group projname">
                <label for="ProjName" >Project name</label>
                <input type="text" name="Name" class="form-control" id="ProjName" aria-describedby="emailHelp" placeholder="Template project">

                <?php
                if($errName) {?>
                    <small id="passwordHelp" class="text-danger">Project name can't be empty!</small>
                <?php
                }?>
            </div>
            <div class="form-group projdesription">
                <label for="ProjDescription">Project description</label>
                <input type="text" name="Description" class="form-control" id="ProjDescription" placeholder="Template description">
                <?php
                if($errDescription) {?>
                    <small id="passwordHelp" class="text-danger">Project description can't be empty!</small>
                    <?php
                }?>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    <?php
    }?>

    <?php
    foreach ($projects as $project){ ?>
        <div>
            <?php
            if(!$edit) { ?>
                    <div class="projdesription">
                        <h2><?=$project->getTitle()?></h2>
                        <p><?=$project->getDescription()?></p>
                    </div>
                <form action="Projects.php" method="POST" id="form1">
                    <?php
                    $id = $project->getId();?>
                    <input type="hidden" name="edit<?=$id?>" value="<?=$id?>" />
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

                <form action="Projects.php" method="POST" id="form2">
                    <input type="hidden" name="delete<?=$id?>" value="<?=$id?>" />
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            <?php
            } else {
                $id = $project->getId();
                if($editId == $id){ ?>
                    <form action="Projects.php" method="post">
                        <div class="form-group ">
                            <label for="ProjNameEdit">Project name</label>
                            <input type="text" name="NameEdit" id="ProjNameEdit" class="form-control projname" value="<?=$project->getTitle()?>">
                            <?php
                            if($errName) {?>
                                <small id="passwordHelp" class="text-danger">Project name can't be empty!</small>
                                <?php
                            }?>
                        </div>
                        <div class="form-group ">
                            <label for="ProjDescriptionEdit">Project Description</label>
                             <input type="text" name="DescriptionEdit" id="ProjDescriptionEdit" class="form-control projdesription" value="<?=$project->getDescription()?>">
                             <input type="hidden" name="ID" value="<?=$project->getId()?>" />
                            <?php
                            if($errDescription) {?>
                                <small id="passwordHelp" class="text-danger">Project description can't be empty!</small>
                                <?php
                            }?>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                    <form action="Projects.php" method="POST" id="form1">
                        <input type="hidden" name="delete<?=$project->getId()?>" value="<?=$project->getId()?>" />
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                <?php
                } else {?>
                        <div class="projdesription">
                            <h2><?=$project->getTitle()?></h2>
                            <p><?=$project->getDescription()?></p>
                        </div>
                    <form action="Projects.php" method="POST" id="form1">
                        <?php
                        $id = $project->getId();
                        ?>
                        <input type="hidden" name="edit<?=$id?>" value="<?=$id?>" class="form-control projname"/>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form action="Projects.php" method="POST" id="form1">
                        <input type="hidden" name="delete<?=$id?>" value="<?=$id?>" class="form-control projdesription"/>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                <?php
                    }
                }?>
            <?php } ?>
        </div>
</div>

</body>
</html>

