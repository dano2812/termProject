<?php

// Destroy
session_start();
session_destroy();
header('Location: index.php');