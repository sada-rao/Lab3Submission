<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Account Sign Up</h1>
     <h4 class="error">   <?php
            if(isset($_GET['error']))
            echo $_GET['error'];
        ?></h4>
    <form action="display_results.php" method="post">

    <fieldset>
    <legend>Account Information</legend>
        <label>E-Mail:</label>
        <input type="text" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']?>" class="textbox"/>
        <br />

        <label>Password:</label>
        <input type="password" name="password" value="<?php if(isset($_GET['password'])) echo $_GET['password']?>" class="textbox"/>
        <br />

        <label>Phone Number:</label>
        <input type="text" name="phone" value="<?php if(isset($_GET['phone'])) echo $_GET['phone']?>" class="textbox"/>
    </fieldset>

    <fieldset>
    <legend>Settings</legend>

        <p>How did you hear about us?</p>
        <input type="radio" name="heard_from" value="Search Engine" />
        Search engine<br />
        <input type="radio" name="heard_from" value="Friend" />
        Word of mouth<br />
        <input type=radio name="heard_from" value="Other" />
        Other<br />

        <p>Would you like to receive announcements about new products
           and special offers?</p>
        <input type="checkbox" name="wants_updates" value="<?php if(isset($_GET['want_updates'])) isset($_GET['want_updates']); ?>"/>YES, I'd like to receive
        information about new products and special offers.<br />

        <p>Contact via:</p>
        <select name="contact_via">
                <option value="select">Please Select..</option>
                <option value="email">Email</option>
                <option value="text">Text Message</option>
                <option value="phone">Phone</option>
        </select>

        <p>Comments:</p>
        <textarea name="comments" rows="4" cols="50">
            <?php
                if(isset($_GET['comments'])){
                    echo $_GET['comments'];
                }
            ?>
        </textarea>
    </fieldset>

    <input type="submit" name="send" value="Submit" />

    </form>
    <br />
    </div>
</body>
</html>