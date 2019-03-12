

<div class="header" id="myHeader">
    
    <div class="textright">

    <a href="#Home">Home</a> 
    <a href="#kalender">Kalender</a> 
    <a href="#contact">Contact</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</div>  </div>

 <div class="logoleft">
        <img src="https://gvimpala.nl/wp-content/uploads/Impala-14-1024x293-1-e1519314257687.jpg" alt="Italian Trulli">
    </div> 

<script>
function myFunction() {
  var x = document.getElementById("myHeader");
  if (x.className === "header") {
    x.className += " responsive";
  } else {
    x.className = "header";
  }
}
</script>
