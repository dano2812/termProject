<?php
require "DBStorage.php";
$Storage = new DBStorage();
$projects = $Storage->getAllProjects();
$editId = -1;
$isAdmin = false;

foreach($projects as $project)
{
    if(isset($_POST[$project->getId()]))
    {
        $project->setEdit(true);
        $editId = $project->getId();
    }
    else
    {
        $project->setEdit(false);
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
    <script src="jquery-3.2.1.min.js"></script>
    <script src="project.js"></script>
</head>
<body>

<?php
require "head.php";

if (isset($_SESSION['uname']))
{
    $isAdmin = $Storage->isAdmin($_SESSION['uname']);
}
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

<div  class="leftMiddle" >
    <div class="">
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3 projdesription">
            <a class="navbar-brand" href="#">Projects</a>
        </nav>
        <div class="projdesription overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light " data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
            <?php
            if($isAdmin){?>
                <h1 class="h3 mb-3 fw-normal">New project</h1>
                <label for="txt_pname" class="visually-hidden projname">Project name</label>
                <input type="text" class="form-control projname" id="txt_pname" name="txt_pname" placeholder="Project name" required="" autofocus="">
                <label for="txt_dsc" class="visually-hidden">Desription</label>
                <input type="text" class="form-control projname" id="txt_dsc" name="txt_dsc" placeholder="Project description" required="">
                <div id="message" class="text-danger"></div>
                <input class="btn btn-primary" value="Save" type="button" name="Save_btn" id="Save_btn">
            <?php } ?>
            <?php
            foreach ($projects as $project){
                if($project->getId() == $editId) {?>
                    <div>
                        <label for="txt_pename" class="visually-hidden projname" >Project name</label>
                        <input type="text" class=" form-control projname" id="txt_pename" name="<?=$project->getId()?>" value="<?=$project->getTitle()?>" required="" autofocus="">
                        <label for="txt_edsc" class="visually-hidden">Desription</label>
                        <input type="text" class=" form-control projname" id="txt_edsc" name="<?=$project->getId()?>" value="<?=$project->getDescription()?>" required="">
                        <div id="message" class="text-danger"></div>
                        <input class=" btn btn-primary" value="Save" type="button" name="<?=$project->getId()?>" id="SaveEdit_btn">
                    </div>
                <?php } else { ?>
                    <h4 id="<?=$project->getId()?>"><?=$project->getTitle()?></h4>
                    <p><?=$project->getDescription()?></p>
                <?php } ?>
                <?php
                if($isAdmin && !($project->getId() == $editId)) { ?>
                    <form action="ProjectsAlt.php" method="post">
                        <button type="submit" class="btn btn-primary" name="<?=$project->getId()?>" id = "Edit_btn">Edit</button>
                    </form>
                    <button type="submit" class="btn btn-primary" name="<?=$project->getId()?>" id = "Delete_btn">Delete</button>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

</body>