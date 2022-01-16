
@extends('layouts.footer')
@extends('layouts.app')
@section('content')



 <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
        <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
        <script src="https://unpkg.com/dropzone"></script>
        <script src="https://unpkg.com/cropperjs"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body >
        <div class="container" align="center" >
            <br>
            <div class="row">
                <!-- <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4"> -->
				 <img src="/obat/obat.png" align="center" style="border: 2px solid #000">
				 <br>
				 <p style="font-size: 24px; font-weight: bold;"><?php echo $result ?></p>
				 <div style="text-align: center; padding-left: 420px">
				 	<button data-toggle="modal" data-target="#myModal"  type="button" class="btn btn-primary" style="background-color: #00BFFF; font-family: 'Montserrat', sans-serif; font-weight: bold; position: absolute; " > Done </button>

				 	<!-- Modal -->
					  <div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title" style="font-weight: bold;">Image will be removed !</h4>
					        </div>
					        <div class="modal-body">
					          <p style="font-weight: bold;"> Proceed to continue ?</p>
					        </div>
					        <div class="modal-footer">
					        	<button type="button" onclick="document.location='/deleteImage'" class="btn btn-primary" style="background-color: #00BFFF; font-family: 'Montserrat' ; font-weight: bold;"> Proceed </button>
					            <button type="button" class="btn btn-default" style="font-family: 'Montserrat' ; font-weight: bold;" data-dismiss="modal">Cancel</button>
					        </div>
					      </div>
					      
					    </div>
					  </div>

				 </div>

                <!-- </div> -->
	        </div>
	       
   		</div>
    </body>





@endsection

