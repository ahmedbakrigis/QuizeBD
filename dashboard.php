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
session_start();
if (isset($_SESSION['name'])){
error_reporting("E_ALL & ~E_NOTTIC");
$con = new PDO("mysql:host=localhost;dbname=quize", "root", "");
$stmn = $con->query("Select * FROM `quizetybe`  ORDER BY `quizetybe`.`Quize_ID` ASC");
$count = $stmn->rowCount();
$id = 1;
if ($count){
if ($_GET['box'] == 'edit') {
    $q_id = intval($_GET['id']);
    $tybe = new quizetybe();
    if (isset($_POST['edit'])) {
        $name = $_POST['tybe'];
        $tybe->UpdateQuize($name, $q_id);
        header("Location: dashboard.php");
    }
    ?>
    <!-- Edit -->
    <div class="container">
        <form class="card-panel" action="" method="post">
            <div class="row">
                <div class="col s12">
                    <div class="card-title">
                        <h3 class="center-align">Edit</h3>
                    </div>
                    <div class="card-content" action="" method="get">
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <input id="icon_prefix" type="text" class="validate" name="tybe"
                                       value="<?php $tybe->Select($q_id); ?>"
                                >
                                <label for="icon_prefix">Edit Quize Tybe</label>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s2 offset-s2 ">
                                        <button class="btn btn-block" name="edit">Edit</button>
                                    </div>
                                    <div class="col s2 offset-s2">
                                        <a href="dashboard.php">
                                            <span class="btn btn-block">Cancel</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <?php
} elseif ($_GET['box'] == 'delete') {
    $id = intval($_GET['id']);
    $del = new quizetybe();
    $del->Delete($id);

    header("Location: dashboard.php");
}
else{
?>
<div class="container">
    <table class="tab">
        <tr class="red-text center-align">
            <td>ID</td>
            <td>Quize</td>
            <td>Edit || Delete</td>
        </tr>
        <tr class="center-align light-blue-text">
            <?php
            while ($row = $stmn->fetch(PDO::FETCH_OBJ)) {
                echo '
          <tr>
          <td>' . $id++ . '</td>
          <td>' . $row->Quize_Name . '</td>
          <td><a href="dashboard.php?box=edit&id=' . $row->Quize_ID . '">Edit</a> ||
           <a href="dashboard.php?box=delete&id=' . $row->Quize_ID . '">Delete</a> </td>
          </tr>
         ';
            }
            }
            }
            }else{
                echo "Sorry You Can't Come This Page Directly You Are Redirect To LogInl";
                header("Refresh:5,url=index.html");
            }
            ?>
        </tr>
    </table>
</div>
<div class="container">
    <div class="row">
        <div class="col m2 offset-m5">
            <a href="quizetype.php"><button class="btn btn-block">
                    <i style="font-size: x-large; color: orange" class="material-icons">home</i></button></a>
        </div>
    </div>
</div>
<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>

</body>
</html>


