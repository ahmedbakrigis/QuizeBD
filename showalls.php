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
if (isset($_SESSION['name'])) {
    error_reporting("E_ALL & ~E_NOTTIC");
    $qoution = new qoutions();
    $id = 1;
    $conn = new PDO("mysql:host=localhost;dbname=quize", "root", "");
    $stmn = $conn->prepare("SELECT `Qout_ID`,`quize_Name`,`Qout_Name` FROM `qoutions` 
JOIN `quizetybe`
ON
`quizetybe`.`Quize_ID`=`qoutions`.`quize_ID`
ORDER BY `Qout_ID`");
    $stmn->execute();
    if ($_GET['box'] == 'edit') {
        $id = intval($_GET['id']);
        if (isset($_POST['edit'])) {
            $qout = $_POST['editqout'];
            $qoution->UpdateQoutName($qout, $id);
            header("Location: showalls.php");
            echo "Updated" . $qout;

        }
        ?>
        <div class="container">
            <form class="card-panel" method="post" action="">
                <div class="row">
                    <div class="col m4 offset-m4">
                        <div class="card-content">
                            <div class="input-field">
                                <label for="mytext">Edit Qoution</label>
                                <input type="text" id="mytext" name="editqout"
                                       value="<?php
                                       $qoution->SelectQoutName($id); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="col m4 offset-m1">
                                <div class="card-action">
                                    <button class="btn btn-block" name="edit">Edit</button>
                                </div>
                            </div>
                            <div class="col m4 offset-m1">
                                <a href="showalls.php">
                                    <span class="btn btn-block">Cancel</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
    } elseif ($_GET['box'] == 'delete') {
        $id = intval($_GET['id']);
        $qoution->Delete($id);
        header("Location: showalls.php");
    } else {
        ?>
        <div class="container">
        <table class="tab">
        <tr class="red-text center-align">
            <td>ID</td>
            <td>Quize Tybe</td>
            <td>Qoution</td>
            <td>Edit || Delete</td>
        </tr>
        <tr class="center-align light-blue-text">
        <?php
        while ($row = $stmn->fetch(PDO::FETCH_OBJ)) {
            echo '
          <tr>
          <td>' . $id++ . '</td>
          <td>' . $row->quize_Name . '</td>
          <td>' . $row->Qout_Name . '</td>
          <td><a href="showalls.php?box=edit&id=' . $row->Qout_ID . '">Edit</a> ||
           <a href="showalls.php?box=delete&id=' . $row->Qout_ID . '">Delete</a> </td>
          </tr>
         ';
        }
    }
    ?>
    </tr>
    </table>

    </div>
    <div class="row">
        <div class="col m2 offset-m5">
            <a href="Qoution.php">
                <button class="btn btn-block">
                    <i style="font-size: x-large; color: orange" class="material-icons">home</i></button>
            </a>
        </div>
    </div>
    <?php
}else{
    echo "Sorry You Can't Come This Page Directly You Are Redirect To LogInl";
    header("Refresh:5,url=index.html");
}
?>
<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>

</body>
</html>

