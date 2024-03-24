<?php 

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user = new User();
    if($row = $user->where(['email'=>$_POST['email']]))
    {
        authenticate($row[0]);
        redirect('home');
    }
    else
    {
        $errors['email'] = "wrong email";
    }
}

require views_path('auth/login');

