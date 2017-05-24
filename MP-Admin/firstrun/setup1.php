<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Welcome to MagicPage - First Run Setup</title>
 </head>
 <body>
  <h1>Hi, I don't think we've met.</h1>
  <p>I am MagicPage, if you are seeing this page in your browser, then I have been sucessfully installed on this server.</p>
  <p>I just need a little be more information from you before your website is ready to manage.</p>
  <form>
   <p>Firstly, I need to know what server my database will be installed on. <i>(It's usually the same one I am installed on. If this so, just leave the default value if it is.)</i></p>
   <input type="text" name="dbhost" value="localhost" />
   <p>Great, now I need the username for the database application. <i>(Ask your hosting provider if you're unsure of this)</i></p>
   <input type="text" name="dbuser" value="" />
   <p>Ok, now I need the password for the database.</p>
   <input type="password" name="dbpassword" value="password" />
   <p>Now I need to know the name of the database I'm going to be looking up</p>
   <input type="text" name="dbdatabase" value="" />
   <p>Finally, some hosting providers only give their clients one database. To allow MagicPage to run alongside other applications, I can add prefix to each table to keep it seperate from other tables in the same database. <i>(Default value is usually fine here)</i></p>
   <input type="text" name="dbprefix" value="MP_" />
   <button value="submit">Submit</button>
  </form>
 </body>
</html>