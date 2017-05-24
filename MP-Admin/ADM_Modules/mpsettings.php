<?php 


function mpfetchshard($mpoption) {
    global $con;
    global $dbprefix;

    $query = "SELECT value FROM " . $dbprefix . "shared WHERE mpoption='" . $mpoption . "'";

    $result = $con->query($query);

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $value = $row['value'];
    }

    return $value;
}

$maintenance = mpfetchshard('maintenance');
$selectedpage = mpfetchshard('defaultpage');
$selectedtheme = mpfetchshard('theme');

$editcommoncode = mpfetchshard('sideboard');

$editcommoncode = addslashes(preg_replace('`[\r\n]`','',$editcommoncode));
$editcommoncode = stripcslashes($editcommoncode);
$editcommoncode = htmlentities("" . $editcommoncode . "", ENT_QUOTES);


$query = "SELECT * FROM " .$dbprefix . "pages";
$pages = $con->query($query);
?>

<script type="text/javascript" src="MP-Admin/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		elements : "ajaxfilemanager",
		theme : "advanced",
		relative_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		file_browser_callback : "ajaxfilemanager",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		// template_replace_values : {
		//	username : "Some User",
		//	staffid : "991234"
		//}
	});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "MP-Admin/plugins/ajaxfilemanager/ajaxfilemanager.php";
			var view = 'detail';
			switch (type) {
				case "image":
				view = 'thumbnail';
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "MP-Admin/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });

/*            return false;			
			var fileBrowserWindow = new Array();
			fileBrowserWindow["file"] = ajaxfilemanagerurl;
			fileBrowserWindow["title"] = "Ajax File Manager";
			fileBrowserWindow["width"] = "782";
			fileBrowserWindow["height"] = "440";
			fileBrowserWindow["close_previous"] = "no";
			tinyMCE.openWindow(fileBrowserWindow, {
			  window : win,
			  input : field_name,
			  resizable : "yes",
			  inline : "yes",
			  editor_id : tinyMCE.getWindowArg("editor_id")
			});
			
			return false;*/
		}
</script>
<!-- /TinyMCE -->

<h1>MagicPage Settings</h1>

<form name="settings" action="/?adm=go&action=submitsettings" method="post">
<h2>Site Settings</h2>
<table border=1 width="80%">
<tr>
<td>Site Name:</td>
<td width="80%"><input type="text" name="sitename" style="width: 95%;" value="<?php echo mpfetchshard('sitename'); ?>" /></td>
</tr>

<tr>
<td>Site Tagline:</td>
<td width="80%"><input type="text" name="sitetagline" style="width: 95%;" value="<?php echo mpfetchshard('sitetagline'); ?>" /></td>
</tr>

<tr>
<td>Site Owner (for &copy; line):</td>
<td width="80%"><input type="text" name="orgname" style="width: 95%;" value="<?php echo mpfetchshard('orgname'); ?>" /></td>
</tr>

<tr>
<td>Site Description:</td>
<td><input type="text" name="description" style="width: 95%;" value="<?php echo mpfetchshard('site_description') ?>" /></td>
</tr>

<tr>
<td>Meta Tags:</td>
<td><input type="text" name="tags" style="width: 95%;" value="<?php echo mpfetchshard('site_metatags') ?>" /></td>
</tr>

<tr>
<td>Site URL:</td>
<td><input type="text" name="url" style="width: 95%;" value="<?php echo mpfetchshard('siteurl') ?>" /></td>
</tr>

<tr>
<td>Theme:</td>
<td>
<select name="theme">
<?php
$dirs = glob($pathfolder . "" . $themes . "/*", GLOB_ONLYDIR);
foreach($dirs as $dir)
{
$themeitem = basename($dir);
if ($themeitem == $selectedtheme) {
    echo "<option value=\"" . $themeitem .  "\" selected>" . $themeitem . "</option>
";
} else {
    echo "<option value=\"" . $themeitem .  "\">" . $themeitem . "</option>
";
}
}
 ?>
</select>
</td>
</tr>

<tr>
<td>Default Page:</td>
<td><select name="defaultpage">
<?php
while ($row = $pages->fetch(PDO::FETCH_ASSOC))
{
$pagefolder = $row['urlfolder'];
if ($pagefolder == $selectedpage){
echo "<option value=\"" . $row['urlfolder'] . "\" selected>" . $row['title'] . "</option>
";
} else {
echo "<option value=\"" . $row['urlfolder'] . "\">" . $row['title'] . "</option>
";
}
}
?>
</select></td>
</tr>
<tr>
<td>Maintenance Mode:</td>
<td>
<input type="checkbox" name="maintenance" value="1" <?php if ($maintenance == "1") { echo "checked"; } ?> /><br />
</td>
</tr>
<tr>
<td>Maintenance Mode Override Password:</td>
<td>
<input type="text" name="maintenancepass" style="width: 95%;" value="<?php echo mpfetchshard('mmoverride') ?>" /><br />
</td>
</tr>

</table>

<h2>Common Page Text</h2>

			<textarea id="elm1" name="elm1" rows="20" cols="80" style="width: 80%">
<?php echo $editcommoncode; ?>
			</textarea>

<button name="go">Save</button>

</form>
