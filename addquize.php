<?php
spl_autoload_register(function ($c){

    require $c.".php";
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
 if (isset($_POST['addquize'])){
  $add=$_POST['tybe'];
   $errors=array();
   $success=$add." Has Been Added";
  if (empty($add)){
    $errors[]="Pleaze Enter The Quize Tybe";
  }else{
      $ins=new quizetybe();
      $ins->InsertQuize($add);
      $ins=clone ($ins);
  }
 }
?>
<div class="container">
  <div class="card-panel" style="margin-top: 200px">
   <div class="card-title">
     <h2 class="center-align red-text">Add Quize</h2>
     </div>
     <div class="card-content">
      <div class="row">
  <form class="col s8 offset-s2" method="post" action="">
    <fieldset>
        <?php
        if (isset($success)){
            echo '
            <div style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6
           " class=" center-align">'.$success.'</div>
           ';

        }
        // Show Error
        if (isset($errors)){
          foreach ($errors as $error){
           echo '
           <div style="color: #a94442;background-color: #f2dede;border-color: #ebccd1
           " class=" center-align">'.$error.'</div>
           ';
          }
        }
        ?>
       <div class="row">
           <div class="input-field col s6 offset-s3">
               <input id="icon_prefix" type="text" class="validate" name="tybe">
               <label for="icon_prefix">Add Quize Tybe</label>
           </div>
         </div>
        <div class="row">
         <div class="input-field col s3 offset-s2">
          <button name="addquize" class="btn btn-block">Add</button>
         </div>
            <div class="input-field col s3 offset-s2">
            <a href="quizetype.php" >
             <i style="font-size: x-large; " class="material-icons btn btn-block">home</i></a>
            </div>
        </div>
    </fieldset>
    </form>
    </div>

        </div>
    </div>
</div>
<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>

</body>
</html>


