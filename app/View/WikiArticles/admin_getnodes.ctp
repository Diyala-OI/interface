<?php
$data = array();
foreach ($nodes as $node){
    $data[] = array(
        "text" => $node['WikiArticle']['title'],
        "id" => $node['WikiArticle']['id'],
        "cls" => "folder",
        "leaf" => ($node['WikiArticle']['lft'] + 1 == $node['WikiArticle']['rght'])
    );
}
echo json_encode($data);
?>