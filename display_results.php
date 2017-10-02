<?php
    // get the data from the form
$error = "";


    if(isset($_POST['email'])){
        $email = $_POST['email'];

        if(empty($email)){
            $error.="*Please enter Email <br/>";
            header('Location: index.php?error='.$error.'&phone='.$_POST['phone'].'&password='.$_POST['password'].'&heard_from='.$_POST['heard_from'].
                '&wants_updates='.$_POST['wants_updates'].'&contact_via='.$_POST['contact_via'].'&comments='.$_POST['comments']);
        }

    else{
        if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
            $error.="*Please enter valid Email <br/>";
            header('Location: index.php?error='.$error.'&phone='.$_POST['phone'].'&password='.$_POST['password'].'&heard_from='.$_POST['heard_from'].
                '&wants_updates='.$_POST['wants_updates'].'&contact_via='.$_POST['contact_via'].'&comments='.$_POST['comments']);
        }
    }

       //header('Location: index.php?error=Please enter details&test=123');
    }
    if(isset($_POST['password'])){
        $pass = $_POST['password'];
        if(strlen($pass) < 4){
            $error.="*Please enter password with more than 4 characters <br/>";
            header('Location: index.php?error='.$error.'&phone='.$_POST['phone'].'&email='.$_POST['email'].'&heard_from='.$_POST['heard_from'].
                '&wants_updates='.$_POST['wants_updates'].'&contact_via='.$_POST['contact_via'].'&comments='.$_POST['comments']);
         }
    }
    $pattern = "/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/";
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
        if(!preg_match($pattern,$phone)){
            $error.="*Enter valid phone number(999-999-9999)<br/>";
            header('Location: index.php?error='.$error.'&password='.$_POST['password'].'&email='.$_POST['email'].'&heard_from='.$_POST['heard_from'].
                '&wants_updates='.$_POST['wants_updates'].'&contact_via='.$_POST['contact_via'].'&comments='.$_POST['comments']);
        }
    }
    if(!isset($_POST['heard_from'])){
        $error.="*Please select how did you hear about us<br/>";
        header('Location: index.php?error='.$error.'&password='.$_POST['password'].'&email='.$_POST['email'].'&phone='.$_POST['phone'].
            '&wants_updates='.$_POST['wants_updates'].'&contact_via='.$_POST['contact_via'].'&comments='.$_POST['comments']);
    }

    $comment = $_POST['comments'];
    $comment = nl2br($comment,false);
    //var_dump($_POST);
    // get the rest of the data for the form

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button

    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br />

        <label>Password:</label>
        <span><?php echo ($_POST['password']); ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo ($_POST['phone']); ?></span><br />

        <label>Heard From:</label>
        <span><?php
                if(isset($_POST['heard_from']))
                    echo $_POST['heard_from'];
                else
                    echo "N/A";
            ?></span><br />

        <label>Send Updates:</label>
        <span><?php
                if(isset($_POST['wants_updates']))
                    echo "YES";
                else
                    echo "NO";
            ?></span><br />

        <label>Contact Via:</label>
        <span><?php echo ($_POST['contact_via']); ?></span><br /><br />

        <span>Comments:</span><br />
        <span><?php echo ($_POST['comments']); ?></span><br />
        
        <p>&nbsp;</p>
    </div>
</body>
</html>