var sgpa1=0;
var sgpa2=0;
var sgpa3=0;
var sgpa4=0;
var sgpa5=0;
var sgpa6=0;
var sgpa7=0;
var sgpa8=0;
var credits1=0;
var credits2=0;
var credits3=0;
var credits4=0;
var credits5=0;
var credits6=0;
var credits7=0;
var credits8=0;
var cgpa = 0;
var totalcredits=0;
$(document).ready(function(){
  $('html').addClass("animated slideInRight");
  $('#other').click(function(){
    $('form').reset();
  });
  $('#submit').click(function(ev){
    ev.preventDefault();
    sgpa1=$("#sgpa1").val();
    if(sgpa2==='')
      sgpa2=0;
    sgpa2=$("#sgpa2").val();
    if(sgpa2==='')
      sgpa2=0;
    sgpa3=$("#sgpa3").val();
    if(sgpa3==='')
      sgpa3=0;
    sgpa4=$("#sgpa4").val();
    if(sgpa4==='')
      sgpa4=0;
    sgpa5=$("#sgpa5").val();
    if(sgpa5==='')
      sgpa5=0;
    sgpa6=$("#sgpa6").val();
    if(sgpa6==='')
      sgpa6=0;
    sgpa7=$("#sgpa7").val();
    if(sgpa7==='')
      sgpa7=0;
    sgpa8=$("#sgpa8").val();
    if(sgpa8==='')
      sgpa8=0;
    credits1 = $('#credits1').val();
    if(credits1==='')
      credits1=0;
    credits2 = $('#credits2').val();
    if(credits2==='')
      credits2=0;
    credits3 = $('#credits3').val();
    if(credits3==='')
      credits3=0;
    credits4 = $('#credits4').val();
    if(credits4==='')
      credits4=0;
    credits5 = $('#credits5').val();
    if(credits5==='')
      credits5=0;
    credits6 = $('#credits6').val();
    if(credits6==='')
      credits6=0;
    credits7 = $('#credits7').val();
    if(credits7==='')
      credits7=0;
    credits8 = $('#credits8').val();
    if(credits8==='')
      credits8=0;
    totalcredits = parseInt(credits1)+parseInt(credits2)+parseInt(credits3)+parseInt(credits4)+parseInt(credits5)+parseInt(credits6)+parseInt(credits7)+parseInt(credits8);
    cgpa = sgpa1*credits1 + sgpa2*credits2 + sgpa3*credits3 + sgpa4*credits4 + sgpa5*credits5 + sgpa6*credits6 + sgpa7*credits7 + sgpa8*credits8;
    //console.log(totalcredits);
    cgpa = cgpa/totalcredits;
    cgpa = cgpa.toFixed(2);
    console.log(cgpa);
    $('#result').html("Your CGPA is " +String(cgpa));
  });
});