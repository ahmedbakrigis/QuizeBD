<?php
spl_autoload_register(function ($c){
    require $c.'.php';
})
?>
<!DOCTYBE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body >
<?php
session_start();
if (isset($_SESSION['name'])) {
    $qouttion = new qoutions();
    if (isset($_POST['add'])) {
        $select = $_POST['type'];
        $sel=filter_var($select,FILTER_SANITIZE_STRING);
        $qouts = $_POST['qoution'];
        $qout=filter_var($qouts,FILTER_SANITIZE_STRING);
        $errors = array();
        if (empty($qout) || empty($sel)) {
            $errors[] = "All Fields Requred";
        } else {
            $qouttion->InsertQoution($qout, $sel);
            $sussess = $qout . " Has Been Added";
            $qouttion = clone ($qouttion);
        }
    }


    ?>
    <div class="container">
        <form class="form-horizontal" method="post" action="">
            <fieldset>
                <?php
                if (isset($sussess)) {
                    echo
                        '
            <div style="margin-top: 30px" class="alert alert-success" >' . $sussess . '</div>
            ';
                }
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        echo
                            '
             <div style="margin-top: 30px" class="alert alert-danger">' . $error . '</div>
             ';
                    }
                }
                ?>
                <!-- Text Input -->
                <div class="row">
                    <div class="col-md-6 col-lg-offset-3" style="display: block;">
                        <!--  Select -->
                        <div class="form-group" style="position: static;">
                            <label for="select-1">Select</label>
                            <select class="form-control" id="select-1" name="type">
                                <?php

                                $qouttion->SelectAll();
                                ?>
                            </select>
                        </div>

                        <!-- Add Qoution -->
                        <div class="form-group" style="position: static;">
                            <label for="input-id-2">Qoutiom</label>
                            <input class="form-control" name="qoution" id="input-id-2"
                                   placeholder="Enter Qoution" type="text">
                        </div>
                        <!-- Button -->
                        <div class="form-group" style="position: static;">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <button class="btn btn-success" name="add">Add</button>
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                    <a href="Qoution.php">
                                        <span style="font-size: xx-large" class="glyphicon glyphicon-home"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <?php
}else{
    echo "Sorry You Can't Come This Page Directly You Are Redirect To LogInl";
    header("Refresh:5,url=index.html");
}
?>

 <script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>


