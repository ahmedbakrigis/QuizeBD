<!DOCTYBE html>
<html>
<head>
    <link href="materialize.min.css" rel="stylesheet">
</head>
<body style="background-color: #b3e5fc ">
<?php
error_reporting("E_ALL & ~E_NOTTIC");
session_start();
if (isset($_SESSION['name'])) {

    ?>
    <div class="container">
        <div class="card-panel" style="margin-top: 200px">
            <div class="card-title">
                <h2 class="center-align red-text">Control Panel</h2>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col s3">
                        <a href="quizetype.php">
                            <button class="btn btn-block">Quize Tybe</button>
                        </a>
                    </div>
                    <div class="col s3">
                        <a href="Qoution.php">
                            <button class="btn btn-block">Qoutions</button>
                        </a>
                    </div>
                    <div class="col s3">
                        <a href="answer.php">
                            <button class="btn btn-block">Answers</button>
                        </a>
                    </div>
                    <div class="col s3">
                        <a href="adminpanel.php">
                            <button class="btn btn-block">Admin Panel</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
} else{
    echo "Sorry You Can't Come This Page Directly You Are Redirect To LogInl";
    header("Refresh:5,url=index.html");
}
?>
<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>

</body>
</html>




