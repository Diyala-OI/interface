<!-- File: /app/View/Finds/index.ctp -->
<h1>Finds</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Find Number</th>
        <th>Season</th>
    </tr>

    <!-- Here is where we loop through our $finds array, printing out find info -->

    <?php foreach ($finds as $find): ?>
    <tr>
        <td><?php echo $find['Find']['find_id']; ?></td>
        <td>
            <?php echo $this->Html->link($find['Find']['fdno'], array('controller' => 'finds', 'action' => 'view', $find['Find']['find_id'])); ?>
        </td>
        <td><?php echo $find['Find']['season']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($find); ?>
</table>