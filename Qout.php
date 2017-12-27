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
$qoution=new qoutions();
$ans=new answers();
?>
<div id="div0" >
    <!-- Card Panel -->

        <!-- Card tittle -->

         <h3 class="center-align orange-text">Start the Quiz</h3>

        <!-- Card tittle -->
         <!-- Row -->

          <p class="center-align">Good luck!</p>
      <button  class="btn btn-large orange white-text center " onclick="start()" id="btn0">Start</button>


            <!-- Row -->

    <!-- Card Panel -->

</div>
<div id="div1" style="display: none" class="container">

            <h3 class="center-align orange-text">Qoutions In PHP</h3>

                    <!-- Input Qoution -->

                     <h5 name="qout"><?php $qoution->SelectQoutName(1)?></h5>

                    <!-- Input Qoution -->

                <!-- Coll -->
                <!-- Nexr Coll -->
                 <div class="row">
                    <p class="col m6">
                        <input type="radio" id="sel" name="ans" value="1">
                        <label for="sel"><?php $ans->SelectFirst(1) ?></label>
                    </p>


                <!-- Nexr Coll -->
                <!-- Last Coll -->

                    <p class="col m6">
                        <input type="radio" id="sel1" name="ans" value=2">
                        <label for="sel1"><?php $ans->SelectSecond(1)?></label>
                    </p>
                 </div>
                <!-- Last Coll -->

            <!-- Row -->
            <!-- Last Row -->


                    <button class="btn btn-block center" id="btn1">Next</button>


            <!-- Last Row -->
    <!-- Card Panel -->
</div>
<div id="div2" style="display: none" class="container">
    <!-- Card Panel -->
        <!-- Card tittle -->
            <h5 class="center-align orange-text">Qoutions In PHP</h5>
        <!-- Card tittle -->
            <!-- Row -->
                <!-- Coll -->
                    <!-- Input Qoution -->
                        <h4 name="qout"><?php $qoution->SelectQoutName(2)?></h4>
                        <!--
                      <input type="text" name="" value="">
                      -->
                    <!-- Input Qoution -->
                <!-- Coll -->
                <!-- Nexr Coll -->
                  <div class="row">
                    <p class="col m6">
                        <input type="radio" id="sel2" name="ans1" value="1">
                        <label for="sel2"><?php $ans->SelectFirst(2) ?></label>
                    </p>

                <!-- Nexr Coll -->
                <!-- Last Coll -->
                    <p class="col m6">
                        <input type="radio" id="sel3" name="ans1" value="2">
                        <label for="sel3"><?php $ans->SelectSecond(2)?></label>
                    </p>
                  </div>
                <!-- Last Coll -->
            <!-- Row -->
            <!-- Last Row -->
                    <button class="btn btn-block" id="btn2">Next</button>
            <!-- Last Row -->
    <!-- Card Panel -->
</div>
<div id="div3" style="display: none" class="container">
    <!-- Card Panel -->
        <!-- Card tittle -->
            <h5 class="center-align orange-text">Qoutions In PHP</h5>
        <!-- Card tittle -->
            <!-- Row -->
                <!-- Coll -->
                    <!-- Input Qoution -->
                        <h4 name="qout"><?php $qoution->SelectQoutName(3)?></h4>
                    <!-- Input Qoution -->
                <!-- Coll -->
                <!-- Nexr Coll -->
                <div class="row">
                  <p class="col m6">
                       <input type="radio" id="sel4" name="ans2" value="1">
                        <label for="sel4"><?php $ans->SelectFirst(3) ?></label>
                    </p>

                <!-- Nexr Coll -->
                <!-- Last Coll -->
                    <p class="col m6">

                        <input type="radio" id="sel5" name="ans2" value="2">
                        <label for="sel5"><?php $ans->SelectSecond(3)?></label>
                    </p>

                </div>
                <!-- Last Coll -->
            <!-- Row -->
            <!-- Last Row -->
                    <button class="btn btn-block" id="btn3">Next</button>
            <!-- Last Row -->
    <!-- Card Panel -->
</div>
<div id="div4" style="display: none" class="container">
    <!-- Card Panel -->
        <!-- Card tittle -->
            <h5 class="center-align orange-text">Qoutions In PHP</h5>
        <!-- Card tittle -->
            <!-- Row -->
                <!-- Coll -->
                    <!-- Input Qoution -->
                        <h4 name="qout"><?php $qoution->SelectQoutName(4)?></h4>
                    <!-- Input Qoution -->
                <!-- Coll -->
                <!-- Nexr Coll -->
                <div class="row">
                    <p class="col m6">
                        <input type="radio" id="sel6" name="ans3" value="1">
                        <label for="sel6"><?php $ans->SelectFirst(4) ?></label>
                    </p>

                <!-- Nexr Coll -->
                <!-- Last Coll -->
                    <p class="col m6">
                        <input type="radio" id="sel7" name="ans3" value="2">
                        <label for="sel7"><?php $ans->SelectSecond(4)?></label>
                    </p>
                </div>
                <!-- Last Coll -->
            <!-- Row -->
            <!-- Last Row -->
                    <button class="btn btn-block" onclick="stop()" id="btn4">Finsh</button>
            <!-- Last Row -->
    <!-- Card Panel -->
</div>
<div id="div5" style="display: none" class="container">

    <p class="center-align"></p>
    <span class="center-align ">Result:</span><br>
    <span id="show_result"></span>/4<br>
    <span  id="paresent"></span>%<br>
    <span  id="study"></span><br>
    <span style="font-size: 18px; font-family: Arial,Tahoma; font-weight: bold">Time Spend</span><br>
    <span  id="timespend"></span><br>
    <input type="submit" id="tot_result" class="btn-large orange white-text " value="Show Result">
     <a  href="quez.php">
       <span class="white-text orange btn-large">Return Quiz</span>
     </a>
    <div id="show_results" class="container" style="display: none">
        <h4 class="blue-text center">Result</h4>
        <div >
            <h4 class="orange-text center">First Answer</h4>
            <span id="first_result"></span>
        </div>
        <div>
            <h4 class="orange-text center">Second Answer</h4>
            <span id="second_result"></span>
        </div>
        <div>
            <h4 class="orange-text center">Theard Answer</h4>
            <span id="theard_result"></span>
        </div>
        <div>
            <h4 class="orange-text center">Fourth Answer</h4>
            <span id="fourth_result"></span>
        </div>
    </div>
</div>

<div id="showtime" class="container">
    <span id='time' class='right'> 00:00</span>
    <span class="right orange-text">Time Spand=</span>

</div>


<script src="jquery-3.2.1.min.js"></script>
<script src="materialize.min.js"></script>
<script src="qoution.js"></script>
<script src="main.js"></script>
</body>
</html>