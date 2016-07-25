<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-dark">
<div class="container-fullwidth clearfix">
<h1><?php echo $wikiArticle['WikiArticle']['title']; ?></h1>
<?php
// breacrumb - to prepare
/*
					<?php // echo $this->Html->getCrumbs(' > ', 'Home'); ?>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Pages</a></li>
      <li class="active">100% Full Width Layout</li>
    </ol>
*/
?>
  </div>
</section><!-- #page-title end -->


<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap">

    <div class="container-fullwidth clearfix">
      	<?php echo $this->Session->flash(); ?>
      <?php echo $wikiArticle['WikiArticle']['body']; ?>
      <span>Author(s) : <?php
      $i=0;
      foreach($wikiArticle['Author'] as $author){
      if ($i!=0){echo ", ";}
      echo $author['AuthorTitle']['title'].' '.$author['first_name'].' '.$author['last_name'];
      $i++;
      }
      ?></span>
      <br />
      <span>Last modified : <?php
      $timestamp = strtotime($wikiArticle['WikiArticle']['modified']);
      echo (date('Y-m-d',$timestamp)) ?></span>


      <div class="clear"></div>

    </div>


</section><!-- #content end -->
