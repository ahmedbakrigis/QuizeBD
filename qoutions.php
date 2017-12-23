<?php
class qoutions extends quizetybe
{
  public $qout_id;
  public $qout_name;
  public $quiz_id;

    public function __toString()
    {
        return sprintf('qout_name: %s',$this->qout_name);
    }

    public function Delete($id)
    {
        $this->qout_id=$id;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $this->con->query("DELETE FROM `qoutions` WHERE `Qout_ID`=$id");
    }
    public function Select($id)
    {
        $this->qout_id=$id;
        try{
            $this->con=new PDO($this->sdn,$this->user,$this->pass);
            $sel=$this->con->query("SELECT * FROM qoutions WHERE 'Qout_ID'=$id");
            $sel->fetch(PDO::FETCH_OBJ);
            $sel->Qout_Name;

        }catch (Exception $e){
            echo "Error: ".$e."<br>";
        }
    }
    public function SelectByQuizid($id){
        $this->quiz_id=$id;
     $this->con=new PDO($this->sdn,$this->user,$this->pass);
     $sel="SELECT * FROM `qoutions` WHERE `quize_ID`=?";
     $stmn=$this->con->prepare($sel);
     $stmn->bindParam(1,$id,PDO::PARAM_INT);
     $stmn->execute();
     while ($row=$stmn->fetch(PDO::FETCH_OBJ)){
         echo
         '
          <option value="'.$row->Qout_ID.'">'.$row->Qout_Name.'</option>
         ';
     }
    }
public function SelectQoutName($id){
  $this->qout_id=$id;
  $this->con=new PDO($this->sdn,$this->user,$this->pass);
  $sel="SELECT `Qout_Name` FROM `qoutions`WHERE`Qout_ID`=? ";
  $stmn=$this->con->prepare($sel);
  $stmn->bindParam(1,$id,PDO::PARAM_INT);
  $stmn->execute();
  $row=$stmn->fetch(PDO::FETCH_OBJ);
  echo $row->Qout_Name;
}

public function InsertQoution($name, $quizeid)
    {
        $this->qout_name=$name;
        $this->quiz_id=$quizeid;
        try{
            $this->con=new PDO($this->sdn,$this->user,$this->pass);
            $ins="INSERT INTO `qoutions` (`Qout_Name`, `quize_ID`)
             VALUES ( ?, ?)";
            $stmn=$this->con->prepare($ins);
            $stmn->bindParam(1,$name,PDO::PARAM_STR);
            $stmn->bindParam(2,$quizeid,PDO::PARAM_INT);
            $stmn->execute();
        }catch (Exception $e){
            echo "Error: ".$e->getMessage();
        }
    }
 public function UpdateQoutName($name,$id){
    $this->qout_name=$name;
    $this->qout_id=$id;
    $this->con=new PDO($this->sdn,$this->user,$this->pass);
    $upd="UPDATE `qoutions` SET `Qout_Name`=? WHERE `Qout_ID`=? ";
    $stmn=$this->con->prepare($upd);
    $stmn->bindParam(1,$name,PDO::PARAM_STR);
    $stmn->bindParam(2,$id,PDO::PARAM_INT);
    $stmn->execute();
    }


    public function UpdateQoution($id, $name, $quizeid)
    {
        $this->qout_id=$id;
        $this->quize_id=$quizeid;
        $this->qout_name=$name;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $upd="UPDATE `qoutions` SET `Qout_Name` =?,`quize_ID` = ? WHERE `qoutions`.`Qout_ID` = ? ";
        $stmn=$this->con->prepare($upd);
        $stmn->bindParam(1,$name,PDO::PARAM_STR);
        $stmn->bindParam(2,$quizeid,PDO::PARAM_INT);
        $stmn->bindParam(3,$id,PDO::PARAM_INT);
        $stmn->execute();
    }

}