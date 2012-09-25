<?php
$this->pageTitle = $page->title;
$this->breadcrumbs = $this->getBreadCrumbs();
?>
<h1><?php echo $page->title;?></h1>

<?php if (substr($page->body,0,5)=='<?php')
{

    $a=substr($page->body,5,strlen($page->body)-5);
    $c=strrpos($a,'?>');
    $a=substr($a,0,$c-1);
    eval($a);

} else
{
   ?>
<p><?php echo $page->body;?></p>
    <?php } ?>