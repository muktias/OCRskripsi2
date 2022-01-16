
@extends('layouts.footer')
@extends('layouts.app')
@section('content')

<script type="text/javascript">
    function loadCanvas(id) {
        
	var canvas = document.createElement('canvas');
	div = document.getElementById(id); 
	canvas.width  = 720;
    canvas.height = 360;
    canvas.style.border   = "1px solid";
    canvas.id = "gambar";
	// document.body.appendChild(canvas);

	// some hotfixes... ( ≖_≖)
	// document.body.style.margin = 0;
	// canvas.style.position = 'fixed';

	// get canvas 2D context and set him correct size
	var ctx = canvas.getContext('2d');

	// var img = new Image();
	var img = new Image()
	img.onload = function() 
		{
		canvas.width =  img.width;
		canvas.height = img.height;
	    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
		}
	img.src = 'obat/obat.png';

 //  	ctx.drawImage(img, 1, 1);
	// resize();

	// last known position
	var pos = { x: 0, y: 0 };

	canvas.addEventListener('resize', resize);
	document.addEventListener('mousemove', draw);
	document.addEventListener('mousedown', setPosition);
	document.addEventListener('mouseenter', setPosition);

	
	


	// new position from mouse event
	function setPosition(e) 
		{
		var rect = canvas.getBoundingClientRect();
		  	pos.x = e.clientX-rect.left;
		 	pos.y = e.clientY-rect.top;
			
		}

	// resize canvas
	function resize() 
		{
		  ctx.canvas.width = img.width;
  		  ctx.canvas.height = img.height;
		}

	function draw(e) 
		{
		  // mouse left button must be pressed
		  if (e.buttons !== 1) return;

		  ctx.beginPath(); // begin

		  ctx.lineWidth = document.getElementById("myRange").value;
		  ctx.lineCap = 'round';
		  ctx.strokeStyle = '#ffffff';

		  ctx.moveTo(pos.x, pos.y); // from
		  setPosition(e);
		  ctx.lineTo(pos.x, pos.y); // to

		  ctx.stroke(); // draw it!
		}

		div.appendChild(canvas)
    }
</script>

 <head>
        <title>Erase the Ligature of the Character</title>
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
            <h2 align="center" style="font-weight: 200;">*Erase the ligature of the character</h3>
            <br>
            <div class="slidecontainer">
            	<h3>Eraser diameter</h3>
			  <input type="range" min="1" max="20" value="10" class="slider" id="myRange" style="width: 200px">
			</div>
			<br>
            <div class="row">
                <!-- <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4"> -->
                    <div class="image_area" style="position: relative; display: block;" align="left">
                        <div id="draw" style="position: relative; cursor: crosshair;" align="center"></div>
                        <script > loadCanvas("draw")</script>
                    </div>
                <!-- </div> -->
                <p style="font-size: 24px; font-weight: bold;"><?php echo $result ?></p>
	        </div>
	       <div style="text-align: center; padding-left: 420px"> 
	       	<button type="button" id="iden" class="btn btn-primary" style="background-color: #00BFFF; font-family: 'Montserrat', sans-serif; font-weight: bold; position: absolute;" >Identify</button>
   			</div>
   		</div>
    </body>

<script>
$(document).ready(function(){


    $('#iden').click(function(e){
    	e.preventDefault();
        $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                }
        });

        // canvas = document.getElementById("draw");
            var gambar = document.getElementById("gambar").toDataURL('image/png');
            // document.write(gambar);

        // canvas.toBlob(function(blob){
            // url = URL.createObjectURL(blob);
            // var reader = new FileReader();
            // reader.readAsDataURL(blob);
            // reader.onloadend = function(){
                // var base64data = reader.result;
                $.ajax({

                    type: 'post',
                    url: "/uploadImage",
                    data:
                        {
                           _token: '{{ csrf_token() }}',
                           image: gambar
                        
                        },

                    success: function(data){
                        // document.write("BERHASIL");
                        window.location.replace("/pred");
                        
                    }
                    ,error: function() {
                        document.write("GAGAL");
                        handleError(data.error);
                        
                    }
                });
            // };
        // });
    });
 });

</script>

@endsection

