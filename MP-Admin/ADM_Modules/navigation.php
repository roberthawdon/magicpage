<?php

if ($logincookie == 'true'){
echo "<ul> 
<li><a href=\"/\">Main Site</a></li> 
</ul>
<ul>
<li><a href=\"/?adm=go\">Admin Page</a></li>
<li><a href=\"/?adm=go&action=pages\">Edit Pages</a></li>
<li><a href=\"/?adm=go&action=navigation\">Edit Navigation</a></li>
</ul>
<ul>
<li><a href=\"/?adm=go&action=settings\">MagicPage Settings</a></li>
<li><a href=\"/?adm=go&action=plugins\">Plug-ins</a></li>
<li><a href=\"/?adm=go&action=themeadmin\">Theme Specific Settings</a></li>
<li><a href=\"/?adm=go&action=usersettings\">User Settings</a></li>
</ul>
<ul>
<li><a href=\"/?adm=go&action=logout\">Logout</a></li>
</ul>";
} else {
echo "<ul> 
<li><a href=\"/\">Main Site</a></li> 
</ul>";
}

?>
