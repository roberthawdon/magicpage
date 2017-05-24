<?php 

$query = "SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'";
$result = $con->query($query);

while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  $pagetitle = "" . $row['title'] . "";
  $editcontent = "" . $row['content'] . "";
  }

$editcontent = addslashes(preg_replace('`[\r\n]`','',$editcontent));

$editcontent = stripcslashes($editcontent);
$pagetitle = stripcslashes($pagetitle);
$pagetitle = html_entity_decode("" . $pagetitle . "", ENT_QUOTES);
$editcontentcode = htmlentities("" . $editcontent . "", ENT_QUOTES);

$newpage = $_POST["btnNewPage"];

if ($newpage == 'true') {
echo "<h1>New Page</h1>";
}
else {
echo "<h1>Edit Page</h1>";
}

?>

<script type="text/javascript" src="MP-Admin/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		elements : "ajaxfilemanager",
		theme : "advanced",
		relative_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,codeprotect",

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

<form action="/?adm=go&action=submit&page=<?php echo $viewpage; ?>" name="editfrm" method="post">
		<div>
			<input type="hidden" name="newflag" value="<?php echo $newpage; ?>" />
			<input type="text" name="title" style="width: 80%; border: 1; border-style: solid; font-size: 2em;" value="<?php echo $pagetitle;?>" />
		</div>
<!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
		<div>
			<textarea id="elm1" name="elm1" rows="20" cols="80" style="width: 80%">
<?php echo $editcontentcode; ?>
			</textarea>
		</div>

		<!-- Some integration calls -->
<!--		<a href="javascript:;" onclick="tinyMCE.get('elm1').show();return false;">[Show]</a>
		<a href="javascript:;" onclick="tinyMCE.get('elm1').hide();return false;">[Hide]</a>
		<a href="javascript:;" onclick="tinyMCE.get('elm1').execCommand('Bold');return false;">[Bold]</a>
		<a href="javascript:;" onclick="alert(tinyMCE.get('elm1').getContent());return false;">[Get contents]</a>
		<a href="javascript:;" onclick="alert(tinyMCE.get('elm1').selection.getContent());return false;">[Get selected HTML]</a>
		<a href="javascript:;" onclick="alert(tinyMCE.get('elm1').selection.getContent({format : 'text'}));return false;">[Get selected text]</a>
		<a href="javascript:;" onclick="alert(tinyMCE.get('elm1').selection.getNode().nodeName);return false;">[Get selected element]</a>
		<a href="javascript:;" onclick="tinyMCE.execCommand('mceInsertContent',false,'<b>Hello world!!</b>');return false;">[Insert HTML]</a>
		<a href="javascript:;" onclick="tinyMCE.execCommand('mceReplaceContent',false,'<b>{$selection}</b>');return false;">[Replace selection]</a> -->
		<div>
			<input type="text" name="pagename" style="width: 80%; border: 1; border-style: solid;" value="<?php echo $viewpage;?>" />
		</div>
<script>
function for_submit() {
var newhtml;
newhtml = (getXHTML(trim(document.getElementById('elm1').value)));
document.getElementById('varid').value = newhtml;
return true;
}
</script>
<input type="submit" onClick="for_submit()">
<?php
if ($newpage != 'true') {
echo "<button name=\"deletepage\" value=\"true\">Delete Page</button>";
}
?>
</form>

