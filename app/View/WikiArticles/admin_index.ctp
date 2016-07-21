<div class="articles">
 <table id="admin-index">
        <thead>
            <tr>
                <th class="header" ><?php echo __('Title'); ?></th>
                <th ><?php echo __('Published'); ?></th>
                <th ><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article):
                $rowId = "node-" . $article['WikiArticle']['id'];
                $childClass = (intval($article['WikiArticle']['parent_id']) > 0) ? "child-of-node-" . $article['WikiArticle']['parent_id'] : "";
                ?>
                <tr id="<?php echo $rowId; ?>" class="<?php echo $childClass; ?>">
                    <td>
                        <?php
                        echo $this->Html->link($article['WikiArticle']['title'], array('action'=>'view','admin'=>false, $article['WikiArticle']['url']));
                        ?>
                    </td>
                    <td>
                     <?php
													echo $this->Html->image('/img/allow-' . intval($article['WikiArticle']['published']) . '.png', array(
															"alt" => "Publish or unpublish",
															'url' => array('controller' => 'wiki_articles', 'action' => 'publish', $article['WikiArticle']['id'])
													));                          
                            ?>
                        </span>&nbsp;&nbsp;
                    </td>
                    <td>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['WikiArticle']['id']), array('class' => 'btn btn-mini btn-primary')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['WikiArticle']['id']), __('Are you sure you want to delete %s?', $article['WikiArticle']['title'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

