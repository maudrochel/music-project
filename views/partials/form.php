<?php
    $query = $pdo->query("SELECT * FROM users");
    $user = $query->fetch();
    $_SESSION["id"] = $user->id;

    if(isset($_POST['submit_email']))
    {
        if(!empty($_POST['email'])){
            $prepare = $pdo->prepare('UPDATE users SET email= ? WHERE id= '.$user->id.'');
            $prepare->execute(array($_POST['email']));
            header("location: settings");
        } else {
            ?>
            <span class="error">Missing email</span>
            <?php
        }
    }

    if(isset($_POST['submit_password']))
    {
        if(!empty($_POST['password'])){
            $prepare = $pdo->prepare('UPDATE users SET password = ? WHERE id= '.$user->id.'');
            $prepare->execute(array($password = password_hash($_POST['password'], PASSWORD_DEFAULT)));
            header("location: settings");
        } else {
            ?>
            <span class="error">Missing password</span>
            <?php
        }
    }

    if(isset($_POST['submit_name']))
    {
        if(!empty($_POST['name'])){
            $prepare = $pdo->prepare('UPDATE users SET name= ? WHERE id= '.$user->id.'');
            $prepare->execute(array($_POST['name']));
            header("location: settings");
        } else {
            ?>
            <span class="error">Missing name</span>
            <?php
        }
    }

    if(isset($_POST['submit_description']))
    {
        if(!empty($_POST['description'])){
            $prepare = $pdo->prepare('UPDATE users SET description = ? WHERE id= '.$user->id.'');
            $prepare->execute(array($_POST['description']));
            header("location: settings");
        } else {
            ?>
            <span class="error">Missing description</span>
            <?php
        }
    }
?>