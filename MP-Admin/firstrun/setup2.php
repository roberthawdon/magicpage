<?php

$fullpath = getcwd();

$mppath = preg_replace('/MP-Admin$/', '', $fullpath);

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Welcome to MagicPage - First Run Setup</title>
 </head>
 <body>
  <h1>Welcome to MagicPage.</h1>
     <h2>Checking configuration.</h2>
     <p>Please check the following is correct:</p>
     <p><strong><em>To Do: Test database connection</em></strong></p>
     <?php include("dbsetup.php"); ?>
     <form name="firstrun2" method="post">
           <input type="hidden" name="completed" value="2" />
           <hr />
           <p><em>Note: The following shouldn't need editing</em></p>
           <p>Install Path<br />
           <input type="text" name="mppath" value="<?php echo $mppath; ?>" /></p>
           <p>Common Directory<br />
           <input type="text" name="mpcommon" value="MP-Common" /></p>
           <p>Theme Directory<br />
           <input type="text" name="mpthemes" value="MP-Themes" /></p>
           <p><button value="submit">Next</button></p>
     </form>
 </body>
</html>
