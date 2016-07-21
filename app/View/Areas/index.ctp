<!-- File: /app/View/Areas/index.ctp -->
<h1>Areas</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Site</th>
				<th>H</th>
				<th>V</th>
    </tr>

    <!-- Here is where we loop through our $finds array, printing out site info -->

    <?php foreach ($areas as $area): ?>
    <tr>
				<td><?php echo $area['Area']['site_subdiv_id']; ?></td>
        <td><?php echo $area['Area']['site_abbrv_cd']; ?></td>
        <td><?php echo $area['Area']['sq_h_coord']; ?></td>
				<td><?php echo $area['Area']['sq_v_coord']; ?></td>
				
				</tr>
    <?php endforeach; ?>
    <?php unset($site); ?>
</table>