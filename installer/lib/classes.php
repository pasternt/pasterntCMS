<?php
    class Check {
        
        private $phpversion = '5.4.0';

        public function checkPHP(){
            if (version_compare(phpversion(), $this->phpversion, '<')) {
                return FALSE;
            }else{
                return TRUE;
            }
        }

        public function checkCurl(){
            
            if  (in_array  ('curl', get_loaded_extensions())) {
                return true;
            }
            else {
                return false;
            }
        }
        public function checkMCRYPT(){
            
            if  (in_array  ('mcrypt', get_loaded_extensions())) {
                return TRUE;
            }
            else {
                return false;
            }
        }

        public function checkAll(){
            if($this->checkPHP() && $this->checkCurl() && $this->checkMCRYPT()){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function rrmdir($dir) { 
           if (is_dir($dir)) { 
             $objects = scandir($dir); 
             foreach ($objects as $object) { 
               if ($object != "." && $object != "..") { 
                 if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
               } 
             } 
             reset($objects); 
             rmdir($dir); 
           } 
     }
    }

?>