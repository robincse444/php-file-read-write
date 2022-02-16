<?php
require_once 'vendor/autoload.php';

use \App\classes\FileUpload;
use \App\classes\Auth;

if (isset($_GET['pages']))
{
    if ($_GET['pages'] == 'file-upload')
    {
        include 'pages/fileUpload.php';

    }
    elseif ($_GET['pages'] == 'view-students')
    {
        $fileUpload = new FileUpload();
        $students = $fileUpload->getAllStudentInfo();
        include 'pages/viewStudents.php';
    }
    elseif ($_GET['pages'] == 'login')
    {

        include 'pages/login.php';
    }
    elseif ($_GET['pages'] == 'logout')
    {

        $auth = new Auth();
        $auth->logout();
    }

}
elseif (isset($_POST['loginBtn']))
{
    $fileUpload = new FileUpload($_POST, $_FILES);
    $message = $fileUpload->index();
    include 'pages/fileUpload.php';

}


elseif (isset($_POST['btn']))
{
    $auth = new Auth($_POST);
    $auth->login();
    //include 'pages/fileUpload.php';

}
