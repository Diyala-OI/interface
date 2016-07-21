<?php 
    echo $this->Html->scriptBlock( 
        "function selectURL(url) { 
            if (url == '') return false; 

            url = '".Helper::url('/uploads/')."' + url; 

            field = window.top.opener.browserWin.document.forms[0].elements[window.top.opener.browserField]; 
            field.value = url; 
            if (field.onchange != null) field.onchange(); 
            window.top.close(); 
            window.top.opener.browserWin.focus(); 
        }" 
    ); 
?> 

<?php 
    echo $this->Form->create( 
        null, 
        array( 
            'type' => 'file', 
            'url' => array( 
                'action' => 'upload' 
            ) 
        ) 
    ); 
    echo $this->Form->label( 
        'Image.image', 
        'Upload image' 
    ); 
    echo $this->Form->file( 
        'Image.image' 
    );     
    echo $this->Form->end('Upload'); 
?> 

<?php if(isset($images[0])) { 
    $tableCells = array(); 

    foreach($images As $the_image) { 
        $tableCells[] = array( 
            $this->Html->link( 
                $the_image['basename'], 
                '#', 
                array( 
                    'onclick' => 'selectURL("'.$the_image['basename'].'");' 
                ) 
            ), 
            $this->Number->toReadableSize($the_image['size']), 
            date('m/d/Y H:i', $the_image['last_changed']) 
        ); 
    } 

    echo $this->Html->tag( 
        'table', 
        $this->Html->tableHeaders( 
            array( 
                'File name', 
                'Size', 
                'Date created' 
            ) 
        ).$this->Html->tableCells( 
            $tableCells 
        ) 
    ); 
} ?> 