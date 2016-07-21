<?php  
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Imageupload extends AppModel { 

    var $name = 'Imageupload'; 

    var $validate = array( 
        'imageupload' => array( 
            'rule' => array( 
                'validFile', 
                array( 
                    'required' => true, 
                    'extensions' => array( 
                        'jpg', 
                        'jpeg', 
                        'gif', 
                        'png' 
                    ) 
                ) 
            ) 
        ) 
    ); 

    var $useTable = false; 

    function readFolder($folderName = null) { 
        $folder = new Folder($folderName); 
        $images = $folder->read( 
            true, 
            array( 
                '.', 
                '..', 
                'Thumbs.db' 
            ), 
            true 
        ); 
        $images = $images[1]; // We are only interested in files 

        // Get more infos about the images 
        $retVal = array(); 
        foreach ($images as $the_image) 
        { 
            $the_image = new File($the_image); 
            $retVal[] = array_merge( 
                $the_image->info(), 
                array( 
                    'size' => $the_image->size(), 
                    'last_changed' => $the_image->lastChange() 
                ) 
            ); 
        } 

        return $retVal; 
    } 

    function upload($data = null) { 
        $this->set($data); 

        if(empty($this->data)) { 
            return false; 
        } 

        // Validation 
        if(!$this->validates()) { 
            return false; 
        } 
        //print_r($this->data);
        // Move the file to the uploads folder 
        if(!move_uploaded_file($this->data['Imageupload']['Image']['image']['tmp_name'], WWW_ROOT.DS.'img/wiki'.DS.$this->data['Imageupload']['Image']['image']['name'])) { 
            return false; 
        } 

        return true; 
    } 



    function validFile($check, $settings) { 
        $_default = array( 
            'required' => false, 
            'extensions' => array( 
                'jpg', 
                'jpeg', 
                'gif', 
                'png' 
            ) 
        ); 

        $_settings = array_merge( 
            $_default, 
            ife( 
                is_array($settings), 
                $settings, 
                array() 
            ) 
        ); 

        // Remove first level of Array 
        $_check = array_shift($check); 

        if($_settings['required'] == false && $_check['size'] == 0) { 
            return true; 
        } 

        // No file uploaded. 
        if($_settings['required'] && $_check['size'] == 0) { 
            return false; 
        } 

        // Check for Basic PHP file errors. 
        if($_check['error'] !== 0) { 
            return false; 
        } 

        // Use PHPs own file validation method. 
        if(is_uploaded_file($_check['tmp_name']) == false) { 
            return false; 
        } 

        // Valid extension 
        return Validation::extension( 
            $_check, 
            $_settings['extensions'] 
        ); 
    } 
} 
?> 