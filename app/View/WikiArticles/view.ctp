<div class="content-wrap">
<div class="container clearfix">


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

    </div>    </div>
