<?php
require 'AllQuize.php';

class quizetybe extends AllQuize
{
    public $quize_id;
    public $quize_name;

    public function Delete($id){
        $this->quize_id=$id;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $del="DELETE FROM `quizetybe` WHERE `quizetybe`.`Quize_ID` = '$id'";
        $this->con->query($del);
    }
    public function __toString()
    {
        return sprintf('quize_name: %s',$this->quize_name);
    }
    public function Select($id)
    {
        $this->quize_id = $id;
      $this->con=new PDO($this->sdn,$this->user,$this->pass);
     $sel="SELECT `Quize_Name` FROM `quizetybe` WHERE `Quize_ID`=?";
     $stmn=$this->con->prepare($sel);
     $stmn->bindParam(1,$id,PDO::PARAM_INT);
     $stmn->execute();
     $row=$stmn->fetch(PDO::FETCH_OBJ);
     echo $row->Quize_Name;
    }
    public function SelectQuize(){
        $conn=$this->con;
        $conn=new PDO($this->sdn,$this->user,$this->pass);
        $sel="SELECT `Quize_ID`, `Quize_Name` FROM `quizetybe`";
        $stmn= $conn->prepare($sel);
        $stmn->execute();
        while ($row=$stmn->fetch(PDO::FETCH_OBJ)){
          $row->Quize_ID ."<br>";
        }

    }
    public function SelectAll()
    {
        $conn=$this->con;
        $conn=new PDO($this->sdn,$this->user,$this->pass);
        $sel="SELECT * FROM `quizetybe`";
        $stmn= $conn->prepare($sel);
        $stmn->execute();
        while ($row=$stmn->fetch(PDO::FETCH_OBJ)){
            echo '
            <option value="'.$row->Quize_ID.'">'.$row->Quize_Name.'</option>
            
            ';
    }
    }
    public function SelectAllByID($id)
    {
        $this->quize_id=$id;

        $this->con= new PDO($this->sdn,$this->user,$this->pass);
        $sel="SELECT * FROM `quizetybe` WHERE `Quize_ID`=?";
        $stmn= $this->con->prepare($sel);
        $stmn->bindParam(1,$id,PDO::PARAM_INT);
        $stmn->execute();
        while ($row=$stmn->fetch(PDO::FETCH_OBJ)){
            echo '
            <option value="'.$row->Quize_ID.'">'.$row->Quize_Name.'</option>
            
            ';
        }
    }


    public function InsertQuize($name)
    {
        $this->quize_name=$name;
        try{
            $this->con=new PDO($this->sdn,$this->user,$this->pass);
            $ins="INSERT INTO `quizetybe`(`Quize_Name`) VALUES(?)";
            $stmn=$this->con->prepare($ins);
            $stmn->bindParam(1,$name,PDO::PARAM_STR);
            $stmn->execute();
        }catch (Exception $e){
            echo "Error: ".$e->getMessage();
        }

    }
    public function UpdateQuize($name,$id)
    {
        $this->quize_id=$id;
        $this->quize_name=$name;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $upd="UPDATE `quizetybe` SET `Quize_Name` =? WHERE `quizetybe`.`Quize_ID` =? ";
        $stmn=$this->con->prepare($upd);
        $stmn->bindParam(1,$name,PDO::PARAM_STR);
        $stmn->bindParam(2,$id,PDO::PARAM_INT);
        $stmn->execute();

    }
}

