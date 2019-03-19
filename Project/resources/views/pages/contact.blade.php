@extends('layout.layout')


@section('content')

<!-- <div class="form">
    <p class="FText"> Contacteer ons,</p>
    <p class="FText1"> Of kom langs voor een kop koffie</p>
  <form action="">

    <label for="fname"></label>
    <input class="Pixel" type="text" id="fname" name="firstname" placeholder="Voornaam">
    <input  type="text"class="form-control" placeholder="Voornaam">

    <label for="lname"></label>
    <input type="text" id="lname" name="lastname" placeholder="Achternaam">

    <label for="email"></label>
    <input type="text" id="email" name="email" placeholder="E-mail">
    

    <label for="bericht"></label>
    <textarea id="bericht" name="subject" placeholder="Uw bericht" style="height:200px"></textarea>

    
    

    
  </form>
</div> -->

<div class="container">
    <div class="card ">
        <div class="card-header text-center">
            <h2>Contacteer ons</h2>
        </div>
        <div class="form-group ml-2">
        <label>Voornaam</label>
        <input  type="text"class="form-control" placeholder="Voornaam">

    </div>
    <div class="form-group ml-2">
        <label>Achternaam</label>
        <input  type="text"class="form-control" placeholder="Achternaam">

    </div>
    <div class="form-group ml-2">
        <label>Email</label>
        <input  type="text"class="form-control" placeholder="Email">

</div>
    <div class="form-group ml-2">
    <label> Bericht</label>
    <textarea class="form-control" id="subject" name="subject" placeholder="Uw bericht" style="height:170px"></textarea>
    <div>
        <input class="btn btn-primary" type="submit" value="submit">
</div>
    </div>
   
</div>




<footer>


</footer>
 





@endsection