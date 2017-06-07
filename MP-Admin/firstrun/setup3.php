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
           <p>User Name:<br />
           <input type="text" name="mpuser" value="administrator" /></p>
           <p>Password:<br />
           <input type="password" name="mppassword1" /></p>
           <p>Confirm Password:<br />
           <input type="password" name="mppassword2" /></p>
           <p>Notes on passwords:<br />
    We don't place restrictions on passwords, but we recommend the following:</p>
    <ul>
    <li>Should be <strong>no shorter than</strong> 8 characters. - There is no upper limit restriction.</li>
<li>Should contain <strong>at least</strong> a mixture of upper and lower case charaters, numbers, and symbols. - MagicPage supports the full unicode character set.</li>
<li>Should not be the same password used on other online accounts. - We're confident the MagicPage password storage system is secure, we can't vouch for other services, so sharing passwords should be avoided.</li>
<li>We recommend the use of a password manager to generate and store strong passwords.</li>
</ul>
           <p>Email address:<br />
           <input type="text" name="mpemail" /></p>
           <p><button value="submit">Next</button></p>
     </form>
 </body>
</html>