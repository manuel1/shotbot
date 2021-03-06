<?php
#-------------------------------------------------------------------------
# Module: Shotbot - Module proposant une interface avec l'API du site internet
#           shotbot.fr pour tous les modules de Cms Made Simple.
#
# Version: de Kevin Danezis Aka "Bess"
# Author can be join on the french forum : http://www.cmsmadesimple.fr/forum 
#           or by email : contact [plop] furie [plap] be
#
# The discussion page around the module : N/A
# The author's git page is : http://github.com/besstiolle
# The module's git page is : http://github.com/besstiolle/shotbot
# The module's demo page is : http://www.cmsmadesimple.fr/showroom
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#-------------------------------------------------------------------------
if (!isset($gCms)) exit;

// Verification de la permission
if (! $this->CheckPermission('Set Open Statistics Community Prefs')) {
  return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
}


if(isset($params['create']))
{
	$url = $this->newUrlCapture($params['url']);
	//echo $params['url'].'*<br />';
	//echo $url.'*<br />';
	$code = $this->fopen($url);
	if($code != "OK")
	{
		echo "Erreur en ouvrant l'url $url : ".$code;
		exit;	
	}
}


$admintheme =& $gCms->variables['admintheme'];

$url = $this->getUrlCapture($params['url'],"320");
$reload = $this->CreateLink($id, 'adminTestKey', $returnid, $admintheme->DisplayImage('icons/topfile/shortcut.gif', $this->Lang('reload'),'','','systemicon'), array("url"=>$params['url']));
$backlink = $this->CreateLink($id, 'defaultadmin', $returnid, $admintheme->DisplayImage('icons/system/back.gif', $this->Lang('back'),'','','systemicon'));

echo "<img src='$url' /><br/>$reload<br/>$backlink";

?>