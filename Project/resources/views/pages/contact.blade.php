@extends('layout.layout')


@section('content')

<body>
<div class="container">
    <div class="card ">
        <div class="card-header text-center">
             <h2>Contact ons</h2>
        </div>
            <div class="row">
    
                 <div class="col-5">
          
          

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
                <textarea class="form-control" id="subject" name="subject" placeholder="Uw bericht" style="width:100%;height:170px"></textarea>
                </div>
    
                <div>
                <input class="btn btn1 btn-primary" type="submit" value="Verzenden">
                <input class="btn btn1 btn-secondary" type="reset"  value="Annuleren">
                </div>
    
   

              
         


            </div>

            <div class="col-2">
            
                    

                    
                    
                </div>
                <div class="col-4">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Bavoortseweg%2027a%20&t=&z=15&ie=UTF8&iwloc=&output=embed"
                     frameborder="0" ></iframe></div><style>
                     .mapouter{position:relative;text-align:left;height:594px;width:200px;margin-top:5px;}.gmap_canvas {overflow:hidden;background:none!important;height:594px;width:496px;}</style></div>
                    </div>


                    </div>
            </div>
        </div>  
    </div> 
</div>

</body>






@endsection