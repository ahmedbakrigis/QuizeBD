<?php
class answers extends quizetybe
{
    public $ans_id;
    public $ans_stans;
    public $ans_ndans;
    public $ans_correct;
    public function __toString()
    {
        return sprintf('ans_stans: %s,ans_ndans: %s,ans_correct: %s',
            $this->ans_stans,$this->ans_ndans,$this->ans_correct);
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
    public function SelectQoutandAns($id){
        $this->ans_id=$id;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $sel="SELECT  `Qout_Name`,`First_Ans`,`Second_Ans`
        FROM `answers`
        JOIN `qoutions`
        ON
        `qoutions`.`Qout_ID`=`answers`.`qout_ID`
        WHERE `Ans_ID`=?";
      $stmn=$this->con->prepare($sel);
      $stmn->bindParam(1,$id,PDO::PARAM_INT);
      $stmn->execute();
       while ($row=$stmn->fetch(PDO::FETCH_ASSOC)){
           echo
           '
             
             <div class="col m12">
             <h5>'.$row['Qout_Name'].'</h5>
             </div>
             
           ';
           echo
           '
           
           <p>
          <div class="col md4 offset-m2">
           <input type="radio" id="sel1" name="ans" value="'.$row['First_Ans'].'">
           <label for="sel1">'.$row['First_Ans'].'</label>
           </div>
           </p>
           ';
           echo
           '
            <p>
           <div class="col md4 offset-m2">
           <input type="radio" id="sel2" name="ans" value="'.$row['Second_Ans'].'">
           <label class="" for="sel2">'.$row['Second_Ans'].'</label>
           </div>
           </p>
           ';

       }

    }
public  function SelectFirst($id){
  $this->ans_id=$id;
  $this->con=new PDO($this->sdn,$this->user,$this->pass);
  $sel=" SELECT `First_Ans` FROM `answers` WHERE `Ans_ID`=? ";
  $stmn=$this->con->prepare($sel);
  $stmn->bindParam(1,$id,PDO::PARAM_INT);
  $stmn->execute();
  $row=$stmn->fetch(PDO::FETCH_OBJ);
  echo $row->First_Ans;

}
    public  function SelectSecond($id){
        $this->ans_id=$id;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $sel=" SELECT `Second_Ans` FROM `answers` WHERE `Ans_ID`=? ";
        $stmn=$this->con->prepare($sel);
        $stmn->bindParam(1,$id,PDO::PARAM_INT);
        $stmn->execute();
        $row=$stmn->fetch(PDO::FETCH_OBJ);
        echo $row->Second_Ans;

    }
    public  function SelectCorrectAnswer($id){
        $this->ans_id=$id;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $sel=" SELECT `Corect_Ans` FROM `answers` WHERE `Ans_ID`=? ";
        $stmn=$this->con->prepare($sel);
        $stmn->bindParam(1,$id,PDO::PARAM_INT);
        $stmn->execute();
        $row=$stmn->fetch(PDO::FETCH_OBJ);
        echo $row->Corect_Ans;

    }

    public function Delete($id)
    {
        $this->ans_id=$id;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
      $del="DELETE FROM `answers` WHERE `Ans_ID`=$id";
      $this->con->exec($del);
    }

    public function InsertAnswers($quizeid, $qoutid, $st_ans, $nd_ans, $cor_ans)
    {
        $this->quize_id=$quizeid;
        $this->qout_id=$qoutid;
        $this->ans_stans=$st_ans;
        $this->ans_ndans=$nd_ans;
        $this->ans_correct=$cor_ans;
        $this->con=new PDO($this->sdn,$this->user,$this->pass);
        $ins="INSERT INTO `answers` (`quize_ID`, `qout_ID`, `First_Ans`, `Second_Ans`, `Corect_Ans` )
     VALUES ( ?,?,?,?,?) ";
        $stmn=$this->con->prepare($ins);
        $stmn->bindParam(1,$quizeid,PDO::PARAM_INT);
        $stmn->bindParam(2,$qoutid,PDO::PARAM_INT);
        $stmn->bindParam(3,$st_ans,PDO::PARAM_STR);
        $stmn->bindParam(4,$nd_ans,PDO::PARAM_STR);
        $stmn->bindParam(5,$cor_ans,PDO::PARAM_STR);
        $stmn->execute();

    }
    public function UpdateAnswers( $st_ans, $nd_ans, $correct_ans,$id)
    {
       $this->ans_stans=$st_ans;
       $this->ans_ndans=$nd_ans;
       $this->ans_correct=$correct_ans;
       $this->ans_id=$id;
       $this->con=new PDO($this->sdn,$this->user,$this->pass);
       $upd="UPDATE `answers` SET `First_Ans` =?, `Second_Ans` =?,
      `Corect_Ans` =? WHERE `answers`.`Ans_ID` =? ";
       $stmn=$this->con->prepare($upd);
        $stmn->bindParam(1,$st_ans,PDO::PARAM_STR);
        $stmn->bindParam(2,$nd_ans,PDO::PARAM_STR);
        $stmn->bindParam(3,$correct_ans,PDO::PARAM_STR);
        $stmn->bindParam(4,$id,PDO::PARAM_INT);
        $stmn->execute();

    }

}