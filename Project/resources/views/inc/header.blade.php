
@extends('layout.layout')
@section('content')

<div class="header">
  <b>Login</b> | <b>Nog geen account? registreer dan hier!</b>

  <div class="right">
    <i class="fa fa-facebook"></i>
  </div>
  <div class="container">
    
    
  </div>
  
</div>

  <div class="container">

      <div class="right">
          <a href="javascript:void(0);" class="icon visible-mobile" onclick="myFunction()">
            <i class="fa fa-bars fa-4x" ></i>
          </a></div>

  <img class="displayed hidden-mobile" src="https://gvimpala.nl/wp-content/uploads/Impala-14-1024x293-1-e1519314257687.jpg">
  <img class="displayed visible-mobile" src="https://gvimpala.nl/wp-content/uploads/LustrumLogo2018-3-e1519314202794.jpg" >

  

</div>


<div class="menu hidden-mobile w-100" id="myMenu">
    
    
        
        
        <a href="#Home">Home</a> 
        <a href="#kalender">Kalender</a> 
        <a href="#contact">Contact</a>
        
   
    
      
</div>


<!--<div class="buttonposition">
<button type="button" class="btn btn-success">Login</button>
<button type="button" class="btn btn-primary">Registreren</button>
</div> -->


<script>
function myFunction() {
var x = document.getElementById("myMenu");
if (x.className === "menu") {
  x.className += " responsive";
} else {
  x.className = "menu";
}
}
</script>   
@endsection

