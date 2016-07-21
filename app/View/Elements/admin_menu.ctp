<ul>
<li><?php
echo $this->Html->link(
    'List Articles',
    array(
        'controller' => 'wiki_articles',
        'action' => 'index',
        'admin' => true
    )
);
?></li>
<li><?php
echo $this->Html->link(
    'Sort Articles',
    array(
        'controller' => 'wiki_articles',
        'action' => 'sort',
        'admin' => true
    )
);
?></li>

<li><?php
echo $this->Html->link(
    'Add an Article',
    array(
        'controller' => 'wiki_articles',
        'action' => 'add',
        'admin' => true
    )
);
?></li>
<li>
<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true));?>
</li>
</ul>
