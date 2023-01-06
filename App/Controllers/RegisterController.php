<?php
require "../App/Models/UserModel.php";
class RegisterController {

    /**
     * $usermodel
     */
    public $usermodel;

    public $name;
    public $email;
    public $password;
    public $confirm_password;

    public function __construct($name, $email, $pass, $cpass) {
        $this->name = $this->sanitaze($name);
        $this->email = $email;
        $this->pass = $pass;
        $this->cpass = $cpass;
      
    }
    
    /**
     * sanitaze()
     */
    public function sanitaze($data) {
        $reg = preg_replace("/\s+/", " ", $data);

        $reg = preg_replace("/^\s*/", "", $reg);
        $data = $reg;
        return $data;
    }

    /**
     * verifyControl()
     */
    public function verifyControl() {
    $this->usermodel = new UserModel();
      $res = $this->usermodel->verify($this->email);
      $count = count($res);
       if($count>0) {
        header("Location:/register?msg=user_existant&name=$this->name");
        exit();
        } 
        else {
            $this->emptyInputs();
            $this->verifyPassword();
            $this->verifyEmail();
               $insert = $this->usermodel->insertUser($this->name,  $this->email, $this->password);
               header("Location:/login");
               exit();
        }
    }

    public function emptyInputs() {

        if(empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->password) || empty($this->confirm_password)){
            header("Location:/register?msg=emptyinput&name=$this->name&email=$this->email");
            exit();
        } 
            else{
            return false;
        }

    }

    /**
     * verifyPassword()
     */
    public function verifyPassword() {

        if ($this->password !== $this->confirm_password) {
            header("Location:/register?msg=MotDePasseNonIdentique&name=$this->name&email=$this->email");
            exit();
       } 
       return false;

    }

    /**
     * verifyEmail()
     */
    public function verifyEmail() {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            header("Location:/register?msg=CeUtilisateur ExisteD
            éja&firstname=$this->firstname&lastname=$this->lastname");
            exit();
        }
        return false;
        
    }

    /**
     * getting()
     */
    public function getting() {

        
        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["submit"])) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $cpass = $_POST["cpass"];

            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->cpass = $cpass;

        
        // $controller = new Controller($name, $email, $pass, $cpass);
        $controller->verifyControl();
        } 
        else {
            header("Location:/register.php?msg=error");
            exit();
        }
    }


}