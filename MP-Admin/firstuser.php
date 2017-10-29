<?php

if ($_POST['completed'] == "3") {
    include('MP-Admin/ADM_Modules/applyuser.php');
    die;
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Welcome to MagicPage - First Run Setup</title>
 </head>
 <body>
  <h1>Welcome to MagicPage.</h1>
     <h2>Create an administrator account.</h2>
     <form name="firstrun2" method="post">
           <input type="hidden" name="completed" value="3" />
           <input type="hidden" name="delete" value="false" />
           <input type="hidden" name="firstname" value="Administrator" />
           <input type="hidden" name="lastname" value="Account" />
           <input type="hidden" name="admin" value="1" />
           <input type="hidden" name="type" value="new" />
           <p>User Name:<br />
           <input type="text" name="username" value="admin" /></p>
           <p>Password:<br />
           <input type="password" name="password1" /></p>
           <p>Confirm Password:<br />
           <input type="password" name="password2" /></p>
           <p>Notes on passwords:<br />
    We don't place restrictions on passwords, but we recommend the following:</p>
    <ul>
    <li>Should be <strong>no shorter than</strong> 8 characters. - There is no upper limit restriction.</li>
<li>Should contain <strong>at least</strong> a mixture of upper and lower case charaters, numbers, and symbols. - MagicPage supports the full unicode character set.</li>
<li>Should not be the same password used on other online accounts. - We're confident the MagicPage password storage system is secure, we can't vouch for other services, so sharing passwords should be avoided.</li>
<li>We recommend the use of a password manager to generate and store strong passwords.</li>
</ul>
           <p>Email address:<br />
           <input type="text" name="email" /></p>
           <p><button value="submit">Next</button></p>
     </form>
 </body>
</html>