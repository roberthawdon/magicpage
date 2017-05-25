<?php 

/**
 * OP-EZY MagicPage Common Navigation Module, Version 0.2.0
 * Fetches navigation details from database.
 * Based on work by Final Websites dot Com - Dynamic PHP navigation list: http://www.finalwebsites.com/tutorials/dynamic-navigation-list.php
 */

$query = "SELECT id, label, link_url, parent_id FROM " . $dbprefix . "navigation ORDER BY parent_id, id ASC"; 
$result = $con->query($query);
while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
    if ($obj['parent_id'] == 0) {
        $parent_menu[$obj['id']]['label'] = $obj['label'];
        $parent_menu[$obj['id']]['link'] = $obj['link_url'];
    } else {
        $sub_menu[$obj['id']]['parent'] = $obj['parent_id'];
        $sub_menu[$obj['id']]['label'] = $obj['label'];
        $sub_menu[$obj['id']]['link'] = $obj['link_url'];
        $parent_menu[$obj['parent_id']]['count']++;
    }
}

function dyn_menu_folded($parent_array, $sub_array, $qs_val = "menu", $main_id = "nav", $sub_id = "sub", $extra_style = "top_link") {
    $menu = "<ul id=\"".$main_id."\">\n";
    foreach ($parent_array as $pkey => $pval) {
        if (!empty($pval['count'])) {
            $menu .= "  <li class=\"top\"><a href=\"".$pval['link']."\" id=\"M" .$pkey . "\" class=\"".$extra_style."\"><span class=\"down\">".$pval['label']."</span></a>\n";
        } else {
            $menu .= "  <li class=\"top\"><a href=\"".$pval['link']."\" class=\"".$extra_style."\"><span>".$pval['label']."</span></a></li>\n";
        }
	   if ($pval['count'] > 0) {
            $menu .= "<ul class=\"".$sub_id."\">\n";
            foreach ($sub_array as $sval) {
                if ($pkey == $sval['parent']) { //
                    $menu .= "<li><a href=\"".$sval['link']."\">".$sval['label']."</a></li>\n";
                }
            }
            $menu .= "</ul></li>\n";
	}
    }
    $menu .= "</ul>\n";
    return $menu;
}

echo dyn_menu_folded($parent_menu, $sub_menu, "menu", "nav", "sub");

?>
