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
    ?>
    <div class="container">
        <div class="card-panel" style="margin-top: 200px">
            <div class="card-title">
                <h2 class="center-align red-text">Quize Tybe</h2>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col s4">
                        <a href="addquize.php">
                            <button class="btn btn-block">
                                <i style="font-size: x-large; color: orange" class=" material-icons">add</i>Add Quize
                            </button>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="dashboard.php">
                            <button class="btn btn-block">
                                <i style="font-size: x-large; color: orange" class=" material-icons">visibility</i> Show
                                All
                            </button>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="select.php">
                            <button class="btn btn-block">
                                <i style="font-size: x-large; color: orange" class="material-icons">home</i></button>
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
<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>

</body>
</html>



