<?php
spl_autoload_register(function ($c){
    require $c.'.php';
})

?>
<!DOCTYBE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Qoution And Answer</title>
    <link href="materialize.min.css" rel="stylesheet">
</head>
<body style="margin-top: 200px" class="blue-grey">
<?php
error_reporting("E_ALL & ~E_NOTTIC");
session_start();
if (isset($_SESSION['name'])) {

 ?>
  <div class="container">
        <div class="card-panel">
            <div class="card-title">
                <h3 class="center-align">Select What Would You Go ?????</h3>
            </div>
            <div class="card-action">
                <div class="row">
                    <div class="col m4 offset-m1">
                        <a href="quez.php">
                            <span class="btn btn-large orange white-text">Quiz </span>
                        </a>
                    </div>
                    <div class="col m4 offset-m1">
                        <a href="select.php">
                            <span class="btn btn-large orange white-text">Admin page </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php
}else{
    echo "Sorry You Can't Come This Page Directly You Are Redirect To LogInl";
    header("Refresh:5,url=index.html");
}
?>

<script src="jquery-3.2.1.min.js"></script>
<script src="/materialize.min.js"></script>
<script src="qoution.js"></script>
<script src="main.js"></script>
</body>
</html>