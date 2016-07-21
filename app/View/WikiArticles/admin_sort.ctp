<?php echo $this->Html->css(array('ext-all'));?>
<?php echo $this->Html->script(array('ext-base.js','ext-all.js'));?>
<style type="text/css">
html, body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, input, p, blockquote, th, td {
    padding: none;
}
</style>
<script type="text/javascript">
Ext.onReady(function(){
    var getnodesUrl = '<?php echo $this->Html->url('/admin/wiki_articles/getnodes/');?>';
    var reorderUrl = '<?php echo $this->Html->url('/admin/wiki_articles/reorder/') ?>';
    var reparentUrl = '<?php echo $this->Html->url('/admin/wiki_articles/reparent/') ?>';
  

  var Tree = Ext.tree;
    var tree = new Tree.TreePanel({
        el:'tree-div',
        startCollapsed: false,
        autoScroll:true,
        animate:true,
        enableDD:true,
        containerScroll: true,
        rootVisible: true,
        loader: new Ext.tree.TreeLoader({
            dataUrl:getnodesUrl
        })
    });
    var root = new Tree.AsyncTreeNode({
        text:'<?php echo __('Wiki Articles');?>',
        draggable:false,
        id:'0'
    });
    tree.setRootNode(root);
    tree.render();
    root.expand();
    // track what nodes are moved and send to server to save
    var oldPosition = null;
    var oldNextSibling = null;
    tree.on('startdrag', function(tree, node, event){
        oldPosition = node.parentNode.indexOf(node);
        oldNextSibling = node.nextSibling;
    });
    tree.on('movenode', function(tree, node, oldParent, newParent, position){
        if (oldParent == newParent){
            var url = reorderUrl;
            var params = {'node':node.id, 'delta':(position-oldPosition)};
        } else {
            var url = reparentUrl;
            var params = {'node':node.id, 'parent':newParent.id, 'position':position};
        }
        // we disable tree interaction until we've heard a response from the server
        // this prevents concurrent requests which could yield unusual results
        tree.disable();
        Ext.Ajax.request({
            url:url,
            params:params,
            success:function(response, request) {
                // if the first char of our response is zero, then we fail the operation,
                // otherwise we re-enable the tree
                if (response.responseText.charAt(0) != 1){
                    request.failure();
                } else {
                    tree.enable();
                }
            },
            failure:function() {
                // we move the node back to where it was beforehand and
                // we suspendEvents() so that we don't get stuck in a possible infinite loop
                tree.suspendEvents();
                oldParent.appendChild(node);
                if (oldNextSibling){
                    oldParent.insertBefore(node, oldNextSibling);
                }
                tree.resumeEvents();
                tree.enable();
                alert("Oh no! Your changes could not be saved!");
            }
        });
    });
});
</script>
<div id="tree-div" style="height:400px;"></div>