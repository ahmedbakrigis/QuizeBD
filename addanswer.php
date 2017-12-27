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
$ans=new answers();
$qout=new qoutions();
session_start();
if (isset($_SESSION['name'])) {

    ?>
    <div class="container">
        <form class="form-horizontal" method="post" action="">
            <fieldset>
                <div class="row">
                    <div class="col-md-6 col-lg-offset-3" style="display: block;">
                        <!--  Select -->
                        <div class="form-group" style="position: static;">
                            <label for="select-1">Select</label>
                            <select class="form-control" id="select-1" name="type">
                                <?php

                                $ans->SelectAll();
                                ?>
                            </select>

                        </div>

                        <div class="form-group" style="position: static;">
                            <div class="row">
                                <div class="col-md-4 col-md-offset4">
                                    <button class="btn btn-success" name="select">Select</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <?php
    if (isset($_POST['select'])) {
        $qu_type = $_POST['type'];

        ?>
        <div class="container">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4 col-lg-offset-2">
                                <label for="sel1">Selected Quize</label>
                                <select class="form-control" id="sel1" name="quizid">
                                    <?php

                                    $ans->SelectAllByID($qu_type);
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 col-lg-offset-2">
                                <label for="sel2">Select Qoution</label>
                                <select id="sel2" class="form-control" name="sel2">
                                    <?php
                                    $qout->SelectByQuizid($qu_type);
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input class="form-control" type="text" id="st_ans" name="first"
                                       placeholder="Please Enter First Answer">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" id="nd_ans" name="second"
                                       placeholder="Please Enter Second Answer">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" id="rd_ans" name="correct"
                                       placeholder="Please Enter Correct Answer">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="position: static;">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <button class="btn btn-success" name="addanswer">Add</button>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <a href="answer.php">
                                    <span style="font-size: xx-large" class="glyphicon glyphicon-home"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <?php
    }
    if (isset($_POST['addanswer'])) {
        $quizeid = $_POST['quizid'];
        $qoutid = $_POST['sel2'];
        $st = $_POST['first'];
        $first=filter_var($st,FILTER_SANITIZE_STRING);
        $nd = $_POST['second'];
        $second=filter_var($nd,FILTER_SANITIZE_STRING);
        $co = $_POST['correct'];
        $correct=filter_var($co,FILTER_SANITIZE_STRING);
        $errors = array();
        $success = "Successfull";
        if (empty($first) || empty($second) || empty($correct)) {
            $errors[] = "All Fuilds Required";
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo
                        '
       <div class="alert alert-danger">' . $error . '</div>
      ';
                }
            }
        } else {
            $ans->InsertAnswers($quizeid, $qoutid, $first, $second, $correct);
            $ans = clone ($ans);
            echo
                '
    <div class="alert alert-success">' . $success . '</div>
   ';
        }
    }
}else{

    echo "Sorry You Can't Come This Page Directly You Are Redirect To LogInl";
    header("Refresh:5,url=index.html");
}
?>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>


