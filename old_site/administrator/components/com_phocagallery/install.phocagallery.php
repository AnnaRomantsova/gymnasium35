<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.filesystem.folder' );

function com_install() {
	
	$folder[0][0]	=	'images' . DS . 'phocagallery' . DS ;
	$folder[0][1]	= 	JPATH_ROOT . DS .  $folder[0][0];
	$folder[1][0]	=	'images' . DS . 'phocagallery' . DS . 'avatars' . DS;
	$folder[1][1]	= 	JPATH_ROOT . DS .  $folder[1][0];
	
	$message = '';
	$error	 = array();
	foreach ($folder as $key => $value)
	{
		if (!JFolder::exists( $value[1]))
		{
			if (JFolder::create( $value[1], 0755 ))
			{
				@JFile::write($value[1].DS."index.html", "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>");
			//	@JFile::write($value[1].DS.".htaccess", "deny from all");
				$message .= '<p><b><span style="color:#009933">Folder</span> ' . $value[0] 
						   .' <span style="color:#009933">created!</span></b></p>';
				$error[] = 0;
			}	 
			else
			{
				$message .= '<p><b><span style="color:#CC0033">Folder</span> ' . $value[0]
						   .' <span style="color:#CC0033">creation failed!</span></b> Please create it manually.</p>';
				$error[] = 1;
			}
		}
		else//Folder exist
		{
			$message .= '<p><b><span style="color:#009933">Folder</span> ' . $value[0] 
						   .' <span style="color:#009933">exists!</span></b></p>';
			$error[] = 0;
		}
	}
	
	$message .= '<p>Пожалуйста, выберите, если вы хотите установить или обновить компонент Phoca Gallery. Нажмите кнопку Установить для установки Phoca Gallery. Если вы щелкните на Установка и у вас уже была установлена предыдущая версия Phoca Gallery, то все данные в базе данных будут удалены. Если вы нажмете на Обновить, предыдущие данные Phoca Gallery останутся.</p>';
	

	?>
	<div style="padding:20px;border:1px solid #b36b00;background:#fff">
		<a style="text-decoration:underline" href="http://www.phoca.cz/" target="_blank"><?php
			echo  JHTML::_('image.site', 'icon-phoca-logo.png', 'components/com_phocagallery/assets/images/', NULL, NULL, 'Phoca.cz');
		?></a>
		<div style="position:relative;float:right;">
			<?php echo  JHTML::_('image.site', 'logo-phoca.png', 'components/com_phocagallery/assets/images/', NULL, NULL, 'Phoca.cz');?>
		</div>
		<p>&nbsp;</p>
		<?php echo $message; ?>
		<div style="clear:both">&nbsp;</div>
		<div style="text-align:center"><center><table border="0" cellpadding="20" cellspacing="20">
			<tr>
				<td align="center" valign="middle">
					<a href="index.php?option=com_phocagallery&amp;controller=phocagalleryinstall&amp;task=install"><?php
					echo JHTML::_('image.site',  'install.png', '/components/com_phocagallery/assets/images/', NULL, NULL, 'Install' );
					?></a>
				</td>
				
				<td align="center" valign="middle">
					<a href="index.php?option=com_phocagallery&amp;controller=phocagalleryinstall&amp;task=upgrade"><?php
					echo JHTML::_('image.site',  'upgrade.png', '/components/com_phocagallery/assets/images/', NULL, NULL, 'Upgrade' );
					?></a>
				</td>
			</tr>
		</table></center></div>
		
		<p>&nbsp;</p><p>&nbsp;</p>
		<p>
		<a href="http://phocagallery.ru" target="_blank">Русский сайт PhocaGallery</a><br />
		</p>
		
		<p>&nbsp;</p>
		<p><center><a style="text-decoration:underline" href="http://phocagallery.ru/" target="_blank">www.phocagallery.ru</a></center></p>		
<?php	
}
?>