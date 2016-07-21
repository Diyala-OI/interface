<!-- File: /app/View/Levels/index.ctp -->
<h1>Levels</h1>
<!-- Here is where we loop through our $levels array, printing out find info -->
<?php 
foreach ($arch_levels as $level): ?>
Site: <?php echo $level['ArchLevel']['site']; ?><br />
Level id: <?php echo $level['ArchLevel']['level_id']; ?><br />
Area id: <?php echo $level['ArchLevel']['site_subdiv_id']; ?><br />
Level name: <?php echo $level['ArchLevel']['level_name']; ?><br />
<?php 
endforeach; 
unset($arch_levels);
?>
