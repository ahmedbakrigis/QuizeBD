$(function () {

    // Event Zero Div
  $("#btn0").click(function () {
    $("#div0").css("display","none");
      $("#div1").css("display","block");

  })
    // Event First Div
$("#btn1").click(function () {
    $("#div1").css("display","none");
    $("#div2").css("display","block");
});
    // Event Second Div

    $("#btn2").click(function () {
        $("#div2").css("display","none");
        $("#div3").css("display","block");
    })
    // Event Theard Div

    $("#btn3").click(function () {
        $("#div3").css("display","none");
        $("#div4").css("display","block");
    })
    // Event Fourth Div
    $("#btn4").click(function () {
    //Cash The Variables
     var ans1=($("input:radio[name=ans]:checked").val()),
         ans2=($("input:radio[name=ans1]:checked").val()),
         ans3=($("input:radio[name=ans2]:checked").val()),
         ans4=($("input:radio[name=ans3]:checked").val()),
        result=0,
       show=$("#study");
        //******************************************************************
   // To Display None And Display Block The Next Div

    $("#div4").css("display","none");
    $("#showtime").css("display","none");
    $("#div5").css("display","block");

        //  $("#timespend").css("display","block")
        //*********************************************************************
    // Check Value Of The Div
   if(ans1=="2")
   {
      result=result+1;
   }
   if(ans2=="1")
   {
         result = result + 1;
   }
    if(ans3=="2")
    {
        result=result+1;
    }
    if(ans4=="1")
    {
         result=result+1;
    }
        var tot=result/4*100;
     //************************************************************************
       // Check The Result
        if(result>=3){
            $("p").text("Bravo You Are Complete This Course Successfully");
            $("#show_result").text(result);
            $("#paresent").text(tot);
            }else if (result==2){
            $("p").text("\n" +
                "Good You Are Complete This Course If You Revision The Course This Better For You");
            $("#show_result").text(result);
            $("#paresent").text(tot);
            }else if (result<2){
                $("p").text(" Sorry You Dont Complete THis Course You Should Revision The Course");
                $("#show_result").text(result);
                $("#paresent").text(tot);
            }
            //*************************************************************************
         // Time Spend
       $("#timespend").text(time);
     //********************************************************************************
        // TO Sheck What You Shoul To Study

         if(ans1!=='1'&&ans2!=='2'&&ans3!=='1'&&ans4!=='2'){
            show.text('');
         }
         else if(ans1!=='1'&&ans2!=='2'){
             show.text('You  Should Revition The Syntax');
         }
        if(ans1!=='1'&&ans2!=='2'&&ans3!=='1'&&ans4!=='2'){
            show.text('');
        }
         else if(ans3!=='1'&&ans4!=='2'){
            show.text('You Should Revition The Variables');
        }
    //*********************************************************************************
     //Eveent in button result
   $("#tot_result").click(function () {
       // Show and hide result
       $(this).toggleClass("active");
       if($(this).hasClass("active")){
           $(this).val("Show Result");
          $("#show_results").css("display","none")
       }else
       {
           $(this).val("Hide Result");
           $("#show_results").css("display","block");
       }
      // ****************************************************************************
       // Check The answeer corect or  rong
       if(ans1=="2")
       {
           $("#first_result").css("color","#1edc1e");
           $("#first_result").text("Correct Anweer!");
       }else
       {
           $("#first_result").css("color","red");
           $("#first_result").text("Rong Anweer!");
       }

       if(ans2=="1")
       {
           $("#second_result").css("color","#1edc1e");
           $("#second_result").text("Correct Anweer!");
       }else
       {
           $("#second_result").css("color","red");
           $("#second_result").text("Rong Anweer!");
       }
       if(ans3=="2")
       {
           $("#theard_result").css("color","#1edc1e");
           $("#theard_result").text("Correct Anweer!")
       }else
       {
           $("#theard_result").css("color","red");
           $("#theard_result").text("Rong Anweer!");
       }
       if(ans4=="1")
       {
           $("#fourth_result").css("color","#1edc1e")
           $("#fourth_result").text("Correct Anweer!")

       }else
       {
           $("#fourth_result").css("color","red");
           $("#fourth_result").text("Rong Anweer!")
       }

   })

})
    //**************************************************************************
    //
});
// **********************************************************************
// Stop Watsh
var status=0;// 0 stop 1 running
var time=0;
function start() {
    status=1;
    timer();
}
function stop() {
    status=0;
}
function timer() {
    if (status==1){
        setTimeout(function () {
            time++;
            var min=Math.floor(time/100/60);
            var second=Math.floor((time/100));
            if (min<10){
                min="0"+min
            }
            if (second>=60){
                second=second%60;
            }
            if (second<10){
                second="0"+second;
            }
            document.getElementById('time').innerHTML=min+":"+second;
            document.getElementById('timespend').innerHTML=min+":"+second;

            timer();
        },10)
    }
}


