<!DOCTYPE html>
<html>
 <head>
  <title>Welcome to MagicPage - First Run Setup</title>
 </head>
 <body>
  <h1>Welcome to MagicPage.</h1>
  <p>There's just a few things needed to get your brand new website ready for use.</p>
  <form name="firstrun1" method="post">
   <input type="hidden" name="completed" value="1" />
   <p>Firstly, which database software will you be using?<br />
   <select name="dbsoftware">
      <option value="mysql">MySQL/MariaDB</option>
   </select></p>
   <p>Where is the database located?<br />
   <input type="text" name="dbhost" value="localhost" /></p>
   <p>Now the username for the database software.<br />
   <input type="text" name="dbuser" value="" /></p>
   <p>And the password for the database.<br />
   <input type="password" name="dbpassword" value="password" /></p>
   <p>Right, and what's the name of the database?<br />
   <input type="text" name="dbdatabase" value="" /></p>
   <p>Finally, some hosting providers only give their clients one database. To allow MagicPage to run alongside other applications, a prefix can be added to each table to keep it seperate from other tables in the same database. <i>(Default value is usually fine here)</i><br />
   <input type="text" name="dbprefix" value="MP_" /></p>
   <p><button value="submit">Next</button></p>
  </form>
 </body>
</html>
