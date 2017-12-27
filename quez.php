<!DOCTYBE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>QUize</title>
    <link href="materialize.min.css" rel="stylesheet">


</head>
<body style="margin-top: 200px" class="blue-grey">
<div class="container">
    <div class="row">
        <div class="col m12">
            <div  class="card ">
                <div class="card-content blue-grey-text center">
                    <?php
                    error_reporting("E_ALL & ~E_NOTTIC");
                    session_start();
                    if (isset($_SESSION['name'])){
                        if ($_SESSION['name']=='admin'){
                            echo "<h3 class='card-tittle'>Well Come ".$_SESSION['name']."</h3>";
                            echo "
                     <div id='result'>
                       <h5>Choose the quiz you want to test in</h5>
                       <button id='php' class='btn  btn-large orange white-text'>PHP Quiz</button>
                       <a href='adminpanel.php'>
                       <span class='btn btn-large orange white-text'>Admin Panel</span>
                      </a>
                    </div>
                       
                    ";
                        }else {
                            echo "<h3 class='card-tittle'>Well Come " . $_SESSION['name'] . "</h3>";
                            echo "
                     <div id='result'>
                       <h5>Choose the quiz you want to test in</h5>
                       <button id='php' class='btn  btn-large orange white-text'>PHP Quiz</button>
                    </div>
                       
                    ";
                        }

                    }
                    else{
                        echo "So You Can't Come This Page Directly You Are Redirect To LogInl";
                        header("Refresh:5,url=index.html");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="jquery-3.1.1.min.js"></script>
<script src="materialize.min.js"></script>
<script src="main.js"></script>
<script src="qoution.js"></script>

</body>
</html>