<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/header.php'); ?>
<?Main::pageViews('Page B');?>

<?$file = $_SERVER["DOCUMENT_ROOT"].'/test.exe';?>
<a href="<?=$file?>" id="downloadFile" class="btn btn-lg btn-primary btn-block" download>Download</a>
<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/footer.php');?>
