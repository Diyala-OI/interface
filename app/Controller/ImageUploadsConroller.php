<?php  
class ImageuploadsController extends AppController { 

    var $name = 'Imageuploads'; 

    var $uses = array('Imageupload'); 

    var $helpers = array( 
        'Html', 
        'Form', 
        'Js', 
        'Number' // Used to show readable filesizes 
    ); 

    function admin_index() { 
        $this->layout = 'admin';
        $this->set( 
            'images', 
            $this->Imageupload->readFolder(WWW_ROOT.DS.'uploads') 
        ); 
    } 

    function admin_upload() { 
        // Upload an image 
        if (!empty($this->data)) { 
            // Validate and move the file 
            if($this->Imageupload->upload($this->data)) { 
                $this->Session->setFlash('The image was successfully uploaded.'); 
            } else { 
                $this->Session->setFlash('There was an error with the uploaded file.'); 
            } 
             
            $this->redirect( 
                array( 
                    'action' => 'index' 
                ) 
            ); 
        } else { 
            $this->redirect( 
                array( 
                    'action' => 'index' 
                ) 
            ); 
        } 
    } 
} 
?> 