<?php 

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  $editcontent = "" . $row['content'] . "";
  }


$editcontent = addslashes(preg_replace('`[\r\n]`','\n',$editcontent));

?>


    <form method="post" onsubmit="editor1.prepareSubmit();" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
     <script type="text/javascript">
      var editor1 = new WYSIWYG_Editor('editor1', '<?php echo $editcontent; ?>', '/MP-Admin');
      editor1.display();
     </script>
     <noscript>
      <p style="notSupported">
       Your browser does not support Javascript with your current setings. I am unable to display the editor to you. Check your settings
       and enable Javascript, or use one of the supported web browsers (listed in the right column) to view this page for a demonstration.
      </p>
     </noscript>
     <input type="submit" value="Submit" name="update" /><br /><br />
    </form>