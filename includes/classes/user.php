
<?php
    
    include "config/init.php";
    include "includes/functions/alert.php";
    class user{
        private $id;
        private $fullname;
        private $email;
        private $gender;
        private $password;

        private $connection;
        private $alert;

        public function __construct(){
            $this->connection=new init();
            $this->alert=new alert();
        }
        


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of fullname
         */ 
        public function getFullname()
        {
                return $this->fullname;
        }

        /**
         * Set the value of fullname
         *
         * @return  self
         */ 
        public function setFullname($fullname)
        {
                $this->fullname = $fullname;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Set the value of gender
         *
         * @return  self
         */ 
        public function setGender($gender)
        {
                $this->gender = $gender;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        public function register(){
            $fullname=$this->getFullname();
            $email=$this->getEmail();
            $gender=$this->getGender();
            $password=$this->getPassword();

            $register="INSERT INTO `music_library`.`user`(`fullname`,`email`,`gender`,`password`) VALUES('$fullname','$email','$gender','$password')";
            $this->connection->CUD($register);
            return true;
        }


        public function login(){
            session_start();
            $email=$this->getEmail();
            $password=$this->getPassword();

            if(!empty($email)){
                $checkEmail="select * from user where email='$email' ";
            
                if(!$this->connection->checkRows($checkEmail)){
                    $this->alert->alert_danger("Email does not exists");
                }
                else{
                    $user_data=$this->connection->select($checkEmail);
                    foreach($user_data as $userDataRow){
                        $userpassword=$userDataRow['password'];
                        if($password==$userpassword){
                           $_SESSION['id']=$userDataRow["id"];
                           $_SESSION['fullname']=$userDataRow['fullname'];
                           $_SESSION['email']=$userDataRow['email'];
                           echo "<script type='text/javascript'>window.location='dashboard.php';</script> ";
                        }
                        else{
                            $this->alert->alert_danger("Password does not match.Please try again");
                        }
                    }
                }

            }
          
            else if($email="" || $password==""){
                $this->alert->alert_danger("Please fill the email and password field");
            }
        }

        public function selectUser($id){
            $select="select * from user where id='$id' ";
            return $this->connection->select($select);
        }

        public function update($id){
            $fullname=$this->getFullname();
            $email=$this->getEmail();
            $gender=$this->getGender();
            $password=$this->getPassword();
            $update="update `user` SET `fullname`=' $fullname',`email`='$email',`gender`='$gender',`password`='$password' where `id`='$id' ";
            $this->connection->CUD($update);
            echo "<script type='text/javascript'>window.location='includes/functions/logout.php';</script>";
        }



       
    }
?>