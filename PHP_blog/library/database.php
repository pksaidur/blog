<?PHP
//define class
Class Database{
        public $host=DB_HOST;
        public $user=DB_USER;
        public $pass=DB_PASS;
        public $dbname=DB_NAME;

        public $link;
        public $error;
        //Access from private function
        public function __construct(){
                $this->connectDB();

                }
        //for catch/connection databsae
        private function connectDB(){

           $this->link= new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link){
            $this->error="Connection fail".$this->link->connect_error;
            return false;
        }
        }
        //select or read data
        public function select($query){
        $result=$this->link->query($query) or die ($this->link->error.__LINE__);    
         if($result->num_rows>0){
         return $result;
          }else{
             return false;
                }
                }
        //For create row or input data
        public function insert($query){
        $insert_row=$this->link->query($query) or die ($this->link->error.__LINE__);
        if($insert_row){
        return $insert_row;
                } else{
               return false;
                }
        }
        //For update
        public function update($query){
                $update_row=$this->link->query($query) or die ($this->link->error.__LINE__);
                if($update_row){
                        return $update_row;
                        } else{
                         return false;
                                }
        }
        //for Delete
        public function delete($query){
                $delete_row=$this->link->query($query) or die ($this->link->error.__LINE__);
                if($delete_row){
                        return $delete_row;
                } else{
                         return false;
                         }
        }
}
?>
