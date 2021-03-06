<?php 
  include 'app.php'; // import php files
  
  $authUser = new AuthUser(); // get auth user
  $authUser->Authenticate('All');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  
<title><?php print _("Content"); ?> - <?php print $authUser->SiteName; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- css -->
<link href="<?php print FONT; ?>" rel="stylesheet" type="text/css">
<link href="<?php print BOOTSTRAP_CSS; ?>" rel="stylesheet">
<link type="text/css" href="css/app.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/content.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/editor.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/messages.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/dialog.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/list.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/prettify.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/dropzone.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link href="<?php print JQUERYUI_CSS; ?>" rel="stylesheet">
<link href="<?php print FONTAWESOME_CSS; ?>" rel="stylesheet">

<!-- head -->
<script src="js/helper/head.min.js"></script>

</head>

<body data-currpage="content" data-domain="<?php print $authUser->Domain; ?>" data-appurl="<?php print APP_URL; ?>">

<?php include 'modules/menu.php'; ?>

<!-- messages -->
<input id="msg-saving" value="<?php print _("Saving content..."); ?>" type="hidden">
<input id="msg-saved" value="<?php print _("Content successfully saved"); ?>" type="hidden">
<input id="msg-saving-error" value="<?php print _("There was a problem saving content, please try again"); ?>" type="hidden">
<input id="msg-draft-saving" value="<?php print _("Saving draft..."); ?>" type="hidden">
<input id="msg-draft-saved" value="<?php print _("Draft successfully saved"); ?>" type="hidden">
<input id="msg-draft-error" value="<?php print _("There was a problem saving the draft, please try again"); ?>" type="hidden">
<input id="msg-settings-saving" value="<?php print _("Saving settings..."); ?>" type="hidden">
<input id="msg-settings-saved" value="<?php print _("Settings successfully saved"); ?>" type="hidden">
<input id="msg-settings-error" value="<?php print _("There was a problem saving settings, please try again"); ?>" type="hidden">
<input id="msg-draft-saved-preview" value="<?php print _("Draft saved, launching preview"); ?>" type="hidden">

<section class="main">

	<div id="editor-menu"></div>
	<!-- /#editor-menu -->
 
    <div id="editor-container">
        <div id="desc" class="container" data-bind="html: content"></div>
    </div>
    <!-- /#editor-container -->
    
    <div id="actions">
    <?php if($authUser->Role=='Admin'){ ?>
        <button class="primary-button" type="button" data-bind="click: saveContent"><?php print _("Save and Publish"); ?></button>
        <button class="secondary-button" type="button" data-bind="click: saveDraft"><?php print _("Save Draft"); ?></button>
	<?php } ?>
	<?php if($authUser->Role=='Contributor'){ ?>
        <button class="primary-button" type="button" data-bind="click: saveDraft"><?php print _("Save"); ?></button>
	<?php } ?>
        <button class="tertiary-button offset-left" type="button" onclick="javascript:history.back()"><i class="fa fa-reply"></i> <?php print _("Return"); ?></button>
    </div>
    <!-- /#actions -->
    
</section>
<!-- /.main -->

<p id="contentLoading" data-bind="visible: contentLoading()" class="inline-status"><i class="fa fa-spinner fa-spin"></i> <?php print _("Loading content..."); ?></p>

<div id="previewMessage">
<?php if($authUser->Role=='Admin'){ ?>
  <button class="tertiary-button" data-bind="click: saveContent"><?php print _("Save Content"); ?></button>
<?php } ?>
  <button class="tertiary-button" data-bind="click: hidePreview"><i class="fa fa-reply"></i> <?php print _("Return to Editor"); ?></button>
</div>

<div id="previewContainer">
  <iframe id="preview" src=""></iframe>
</div>  
  
<div id="overlay"></div>  

<?php include 'modules/dialogs/imagesDialog.php'; ?>

<?php include 'modules/dialogs/slideshowDialog.php'; ?>

<?php include 'modules/dialogs/elementConfigDialog.php'; ?>

<?php include 'modules/dialogs/blockConfigDialog.php'; ?>

<?php include 'modules/dialogs/fieldDialog.php'; ?>

<?php include 'modules/dialogs/skuDialog.php'; ?>

<?php include 'modules/dialogs/listDialog.php'; ?>

<?php include 'modules/dialogs/linkDialog.php'; ?>

<?php include 'modules/dialogs/featuredDialog.php'; ?>

<?php include 'modules/dialogs/pluginsDialog.php'; ?>

<?php include 'modules/dialogs/configPluginsDialog.php'; ?>

<?php include 'modules/dialogs/pageSettingsDialog.php'; ?>

<?php include 'modules/dialogs/htmlDialog.php'; ?>

<?php include 'modules/dialogs/codeBlockDialog.php'; ?>

<?php include 'modules/dialogs/filesDialog.php'; ?>

<?php include 'modules/dialogs/fontAwesomeDialog.php'; ?>

<div id='aviary-modal'></div>

<div id="overlay"></div>

</body>

<!-- helper -->
<script type="text/javascript" src="<?php print JQUERY_JS; ?>"></script>
<script type="text/javascript" src="<?php print JQUERYUI_JS; ?>"></script>
<script type="text/javascript" src="<?php print BOOTSTRAP_JS; ?>"></script>
<script type="text/javascript" src="<?php print KNOCKOUT_JS; ?>"></script>
<script type="text/javascript" src="js/helper/moment.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/flipsnap.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/prettify.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/dropzone.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>

<!-- plugins -->
<script type="text/javascript" src="js/plugins/jquery.ui.touch-punch.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/plugins/jquery.paste.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/plugins/jquery.respondEdit.js?v=<?php print VERSION; ?>"></script>

<!-- app -->
<script type="text/javascript" src="js/global.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/messages.js?v=<?php print VERSION; ?>"></script>

<!-- dialogs -->
<script type="text/javascript" src="js/dialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/fontAwesomeDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/loadLayoutDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/pluginsDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/configPluginsDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/pageSettingsDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/codeBlockDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/htmlDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/imagesDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/filesDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/listDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/featuredDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/linkDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/fieldDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/skuDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/slideshowDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/elementConfigDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/blockConfigDialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialogs/aviaryDialog.js?v=<?php print VERSION; ?>"></script>

<!-- page -->
<script type="text/javascript" src="js/viewModels/models.js?v=<?php print VERSION; ?>" defer="defer"></script>
<script type="text/javascript" src="js/viewModels/contentModel.js?v=<?php print VERSION; ?>" defer="defer"></script>

</html>