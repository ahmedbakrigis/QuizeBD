<?php
spl_autoload_register(function ($c){
    require $c.'.php';
})
?>
<!DOCTYBE html>
<html>
<head>
    <link href="materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="background-color: #b3e5fc ">
<?php
 $ans=new answers();
 $id=1;
error_reporting("E_ALL & ~E_NOTTIC");
$conn=new PDO("mysql:host=localhost;dbname=quize","root","");
$selAll="SELECT `Ans_ID`, `Quize_Name`,`Qout_Name`,`First_Ans`,`Second_Ans`,`Corect_Ans`
FROM `answers`
JOIN `quizetybe`
ON
`quizetybe`.`Quize_ID`=`answers`.`quize_ID`
JOIN `qoutions`
ON
`qoutions`.`Qout_ID`=`answers`.`qout_ID`";
$stmn=$conn->prepare($selAll);
$stmn->execute();
if ($_GET['box']=='edit') {
 $id = intval($_GET['id']);
if (isset($_POST['editans'])){
 $first=$_POST['first'];
 $second=$_POST['second'];
 $correct=$_POST['correct'];
 $ans->UpdateAnswers($first,$second,$correct,$id);
 header("Location: showall.php");
}
 ?>
 <div class="container">
  <form class="card-panel" method="post" action="">
   <div class="row">
    <div class="col m6 offset-m3">
     <div class="input-field">
      <span class="red-text">First Answer</span>
       <input type="text" name="first" id="st" value="<?php  $ans->SelectFirst($id)?>">

         <span class="red-text">Second Answer</span>
         <input type="text" name="second" id="nd" value="<?php  $ans->SelectSecond($id)?>">
         <span class="red-text">Correct Answer</span>
      <input type="text" name="correct" id="co" value="<?php  $ans->SelectCorrectAnswer($id)?>">
     </div>
    </div>
   </div>
   <div class="row">
    <div class="col m4 offset-m2">
     <button class="btn btn-block" name="editans">Edit</button>
    </div>
    <div class="col m4 offset-m2">
     <a href="showall.php">
      <span class="btn btn-block">Cancel</span>
     </a>
    </div>
   </div>
  </form>
 </div>
 <?php
}elseif ($_GET['box']=='delete'){
    $id=intval($_GET['id']);
   $ans->Delete($id);
   header("Location: showall.php");
}
else{
?>

 <div class="row">
  <div style="margin-top: 100px" class="col m12">
    <table class="tab">
    <tr  style="border: 2px solid #000000" class="red-text center-align">
    <td style="border: 2px solid #000000">ID</td>
     <td style="border: 2px solid #000000">Quize Tybe</td>
     <td style="border: 2px solid #000000">Qoution</td>
     <td style="border: 2px solid #000000">First Answer</td>
     <td style="border: 2px solid #000000">Second Answer</td>
     <td style="border: 2px solid #000000">Correct Answer</td>
     <td style="border: 2px solid #000000">Edit || Delete</td>
   </tr>
     <?php
     while ($row=$stmn->fetch(PDO::FETCH_OBJ)) {
         echo
             '
       <tr style="border: 2px solid #000000">
       <td style="border: 2px solid #000000">' . $id++ . '</td>
      <td style="border: 2px solid #000000">' . $row->Quize_Name . '</td>
      <td style="border: 2px solid #000000">' . $row->Qout_Name . '</td>
      <td style="border: 2px solid #000000">' . $row->First_Ans . '</td>
      <td style="border: 2px solid #000000">' . $row->Second_Ans . '</td>
      <td style="border: 2px solid #000000">' . $row->Corect_Ans . '</td>
       <td style="border: 2px solid #000000"><a href="showall.php?box=edit&id=' . $row->Ans_ID . '">Edit</a> ||
       <a href="showall.php?box=delete&id=' . $row->Ans_ID . '">Delete</a>
       </td>
       </tr>
      ';
     }
     }
      ?>
   </table>
  </div>
   <div class="row">
     <div class="col m2 offset-m5" style="margin-top: 20px">
             <a href="answer.php"><button class="btn btn-block">
       <i style="font-size: x-large; color: orange" class="material-icons">home</i></button></a>
         </div>
     </div>

</div>
<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>

</body>
</html>
<?php
/*
while ($row = $stmn->fetch(PDO::FETCH_OBJ)) {
    echo
        '
      <td>' . $id++ . '</td>
      <td>' . $row->Quize_Name . '</td>
      <td>' . $row->Qout_Name . '</td>
      <td>' . $row->First_Ans . '</td>
      <td>' . $row->Second_Ans . '</td>
      <td>' . $row->Corect_Ans . '</td>
       <td><a href="showall.php?box=edit&id=' . $row->Ans_ID . '">Edit</a> ||
       <a href="showall.php?box=delete&id=' . $row->Ans_ID . '">Delete</a>
       </td>
      ';
}

}*/
?>

