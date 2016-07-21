<!-- File: /app/View/Areas/site.ctp -->
<h1>Areas of <?php echo $site_info['Site']['site_nm']; ?></h1>
<!-- Here is where we loop through our $areas array, printing out site info -->

Hover your mouse on the map and click on the area which interests you.
<img src="/img/maps/map.jpg" alt="Colors" usemap="#areas" />
<map name="areas" id="areas">



<?php foreach ($areas as $area): ?>

<area id="$area['Area']['site_subdiv_id']" shape="" coords="" alt="Green Color" title="" href="Green.htm"  />




<div  class="site-area">
<?php echo $this->Html->link($area['Area']['site_subdiv_nm'], array('controller' => 'areas', 'action' => 'view', $area['Area']['site_subdiv_id'])); ?>
</map>
</div>

<?php endforeach; ?>
<?php unset($area); ?>
