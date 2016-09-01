<?php
/*------------------------------------------------------------------------
# JA Olyra for Joomla 1.5 - Version 1.4 - Licence Owner JA115059
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die( 'Restricted access' );
defined( 'DS') || define( 'DS', DIRECTORY_SEPARATOR );
include_once (dirname(__FILE__).DS.'ja_vars.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl();?>/css/editor.css" type="text/css" />
<link href="<?php echo $tmpTools->templateurl();?>/css/template_css.css" rel="stylesheet" type="text/css" />

<?php if ($ja_iconmenu) { ?>
<link href="<?php echo $tmpTools->templateurl();?>/ja_iconmenu/ja-iconmenu.css" rel="stylesheet" type="text/css" />
<?php } ?>

<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl();?>/scripts/ja.script.js"></script>

<?php
$tmpTools->genMenuHead();
?>

<?php //if ( $my->id ) { initEditor(); } ?>

<!--[if lte IE 6]>
<style type="text/css">
.clearfix {	height: 1%;}
</style>
<![endif]-->

<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {	display: inline-block;}
</style>
<![endif]-->

<script type="text/javascript">
/*<![CDATA[*/
document.write ('<style type="text\/css">.ja-tab-content{display: none;}\n#ja-hpwrap{height:0;overflow:hidden;visibility:hidden;}<\/style>');
/*]]>*/
</script>

<link href="<?php echo $tmpTools->templateurl();?>/css/colors/<?php echo $tmpTools->getParam(JA_TOOL_COLOR); ?>.css" rel="stylesheet" type="text/css" />



<body id="bd" class="<?php echo $tmpTools->getParam(JA_TOOL_SCREEN)." fs".$tmpTools->getParam(JA_TOOL_FONT);?>">

<ul class="accessibility">
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-content" title="Skip to content">Skip to content</a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-col1" title="">Skip to 1st column</a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-col2" title="">Skip to 2nd column</a></li>
</ul>

<div id="ja-wrapper">
<a name="Top" id="Top"></a>

<!-- BEGIN: MAIN NAVIGATION -->
<div id="ja-mainnavwrap" class="clearfix1">

  <div id="ja-mainnav">
		<?php

		    //echo $tmpTools->getParam(JA_TOOL_MENU);
		    //echo $jamenu->getParam('menutype');
			switch ($tmpTools->getParam(JA_TOOL_MENU)) {
	  			case 1:
	  				$jamenu->genMenu (0);
	  				break;
	  			case 2:
	  				echo "<div class=\"sfmenu-inner\">";
	  					$jamenu->genMenu (0);
	  				echo "</div>";
	  				break;
	  			case 5:
	  				echo "<div class=\"transmenu-inner\">";
	  					$jamenu->genMenu (0);
	  				echo "</div>";
	  				break;
	    		case 6:
	    			$jamenu->genMenu (0);
	    			break;
	  		}

		?>
	</div>

</div>
<!-- END: MAIN NAVIGATION -->

<!-- BEGIN: HEADER -->
<div id="ja-headerwrap">
	<div id="ja-header" class="clearfix1">

		<h1>
			<a href="index.php">
				<?php echo $tmpTools->sitename();?>
			</a>
		</h1>

		<?php if ($tmpTools->getParam(JA_TOOL_ICONMENU)) { ?>
		<div id="ja-topnav"><div class="w1"><div class="w2"><div class="w3 clearfix">
			<?php
			   //include(dirname(__FILE__).DS."ja_iconmenu.php");
			   // echo "888";
				$jamenuicon->genMenu(0,0,0);
			?>
		</div></div></div></div>
		<?php } ?>

	</div>
</div>
<div class="clr">&nbsp;</div>

<!-- END: HEADER -->


<?php
  $spotlight_left = ($this->countModules('user1') || $this->countModules('user2') || $this->countModules('user5'));

  if ($spotlight_left && $this->countModules('user6')) {
?>
<!-- BEGIN: TOPSPOTLIGHT -->
<div id="ja-topslwrap" class="clearfix">
  <div id="ja-topsl">

    <?php
    $spotlight = array ('user1','user2','user5');
    $topsl = $tmpTools->calSpotlight ($spotlight);
    if( $topsl ) {
    ?>
    <div id="ja-topsl-leftwrap">
      <div class="innerpad">
        <div id="ja-topsl-head">
          �&#65533;нформация
        </div>

        <div id="ja-topsl-left">
        <div class="wrap1"><div class="wrap2"><div class="wrap3 clearfix">
          <?php if( $this->countModules('user1') ) {?>
      	  <div class="ja-box<?php echo $topsl['user1']['class']; ?>" style="width: <?php echo $topsl['user1']['width']; ?>;">
      	  	<jdoc:include type="modules" name="user1" style="xhtml" />
      	  </div>
      	  <?php } ?>

      	  <?php if( $this->countModules('user2') ) {?>
      	  <div class="ja-box<?php echo $topsl['user2']['class']; ?>" style="width: <?php echo $topsl['user2']['width']; ?>;">
      	    <jdoc:include type="modules" name="user2" style="xhtml" />
      	  </div>
      	  <?php } ?>

      	  <?php if( $this->countModules('user5') ) {?>
      	  <div class="ja-box<?php echo $topsl['user5']['class']; ?>" style="width: <?php echo $topsl['user5']['width']; ?>;">
      	    <jdoc:include type="modules" name="user5" style="xhtml" />
      	  </div>
      	  <?php } ?>
      	</div></div></div>
        </div>
      </div>
    </div>
    <?php } ?>




    <?php if ( $this->countModules('user6') ) { ?>
    <div id="ja-topsl-right">
      <div class="innerpad">
	      <jdoc:include type="modules" name="user6" style="rounded" />
      </div>
    </div>
    <?php } ?>

   </div>
</div>
<!-- END: TOPSPOTLIGHT -->
<?php } ?>

<div id="ja-containerwrap">
	<div id="ja-container" class="clearfix">

		<!-- BEGIN: CONTENT -->
		<div id="ja-mainbody<?php echo $divid; ?>">
		<div id="ja-book-tl" class="clearfix"><div id="ja-book-bl" class="clearfix">

  		<div id="ja-contentwrap" class="clearfix">
  			<div id="ja-content">
<!--
	  		  <?php if ($tmpTools->isFrontPage()) {?>
					<div id="ja-pathway">
						<jdoc:include type="module" name="breadcrumbs" />
					</div><div class="clr"></div>
					<?php } ?>
-->
  				<jdoc:include type="component" />
  				<?php if ( $this->countModules('banner') ) { ?>
  				<div id="ja-banner">
  					<jdoc:include type="modules" name="banner" style="raw" />
  				</div>
  				<?php } ?>

  			</div>
  		</div>

  		<?php if ($ja_left) { ?>
    		<!-- BEGIN: LEFT COLUMN -->
    		<div id="ja-col1">
    		  <div class="innerpad">
<!--
    		  <?php if ($hasSubnav) { ?>

                               <div id="ja-subnav" class="moduletable">
    				<h3><?php global $menuname; echo $menuname; ?></h3>
    				<?php $jamenu->genMenu (1,2);	?>



    			</div>
    			<?php } ?>


-->

    			<jdoc:include type="modules" name="left" style="xhtml" />
    			</div>
    		</div>
    		<!-- END: LEFT COLUMN -->
  		<?php } ?>

 		</div></div>
		</div>
  	<!-- END: CONTENT -->

		<?php if ($ja_right) { ?>
  		<!-- BEGIN: RIGHT COLUMN -->
  		<div id="ja-col2">
  		  <div class="innerpad">
				<jdoc:include type="modules" name="right" style="rounded" />
				</div>
  		</div>
  		<!-- END: RIGHT COLUMN -->
		<?php } ?>
	</div>
</div>

<!-- BEGIN: FOOTER -->
<?
if ($_SERVER['REQUEST_URI']=='/' || $_SERVER['REDIRECT_URL'] =='/')
{?>
<?}?>
<div id="ja-footerwrap">
<br>
<jdoc:include type="modules" name="footer" style="rounded1" />
<br>
</div>
	<div id="ja-footer" class="clearfix">

	  <small>
			<?php include_once( dirname(__FILE__).DS.'footer.php' ); ?>
		</small>
	<div class="clr"></div>

	</div>
</div>

<!-- END: FOOTER -->
<br />
</div>

<!-- BEGIN: USER TOOLS -->
<script type="text/javascript">
/* <![CDATA[ */
  tool_height = 0;
  tool_done = 1;
  tool_timeoutid = 0;
  change_value = 20;
  tool_change = 0;
  tool_interval = 20;
  var tool_elem;

  function tool_init () {
	  tool_elem = document.getElementById ('ja-usertools');
  }

  function doopen() {
	tool_change = change_value;
	tool_timeoutid = setTimeout ("doanim()", 30);
  }

  function doclose() {
	tool_change = -change_value;
	tool_timeoutid = setTimeout ("doanim()", 30);
  }

  function doanim() {
	if (tool_timeoutid)
	{
		clearTimeout (tool_timeoutid);
	}

	tool_height += tool_change;
	tool_done = 0;
	if (tool_change > 0)
	{
		if (tool_height > tool_elem.scrollHeight) {
			tool_height = tool_elem.scrollHeight;
			tool_done = 1;
		}
	} else {
		if (tool_height < 0) {
			tool_height = 0;
			tool_done = 1;
		}
	}
	tool_elem.style.height = tool_height + "px";
	if (!tool_done)
	{
		tool_timeoutid = setTimeout ("doanim()", tool_interval);
		tool_done = 1;
	}
  }

	jaAddEvent (window, 'load', tool_init);
/* ]]> */
</script>

<?php if ($tmpTools->getParam(JA_TOOL_USER)) {
	if ($supported_browsers) {
		echo "<div id=\"jausertoolswrap\" style=\"position: fixed; bottom: 15px; right: 15px;\">";
	} else {
		?>
		<div id="jausertoolswrap" style="position: absolute; top: expression( ( -15 - jausertoolswrap.offsetHeight + ( document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight ) + ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ) ) + 'px' ); right: 15px;">
		<?php
	}
?>
		<div style="position:relative;display:block;" onmouseover="doopen()" onmouseout="doclose()">
		<span class="ja-sitetool">[+]</span>
		<div id="ja-usertools">
			<?php $tmpTools->genToolMenu($tmpTools->getParam(JA_TOOL_USER) & 7,'gif'); /*screen tool*/ ?>
		</div>
		</div>
	</div>
<?php } ?>
<!-- END: USER TOOLS -->
<jdoc:include type="modules" name="debug" style="raw" />
</body>


</html>