
@extends('layouts.footer')
@extends('layouts.app')
@section('content')
    
<html>
    <head>
        <title>Crop Image Before Upload using CropperJS with PHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
        <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
        <script src="https://unpkg.com/dropzone"></script>
        <script src="https://unpkg.com/cropperjs"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <style>

               
        </style>


    </head>
    <body>
        <div class="container" align="center" >
            <br>
            <h1 align="center" style="font-weight: 1000;">Identifikasi Nama Obat Tulisan Tangan</h1>
            <h3 align="center" style="font-weight: 500;">*unggah hanya nama obat</h3>
            <br>
            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">
                    <div class="image_area">
                        

                        <form method="post" action="javascript:void(0)">
                            @csrf
                            <label for="upload_image">
                                <img src="images/hm.png" id="uploaded_image" class="img-responsive img-circle" />
                                <div class="overlay" >
                                    <div class="text1" >Unggah Gambar</div>
                                </div>
                                <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                            </label>
                        </form>

                    </div>
                </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img class="img-fluid" src="" id="sample_image" / style="height:100%; width: 100%;">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                
                                <!-- <input type="hidden" name="image1" value=""> -->
                                <!-- <button class="btn btn-primary submit-button" type="submit" id="submit-button">Crop</button> -->
                                <!-- <input type="submit" name="crop" id="crop" class="btn btn-primary" value="Crop"> -->
                                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>     

        </div>
    </body>
</html>

<script>

$(document).ready(function(){

    var $modal = $('#modal');
    var image = document.getElementById('sample_image');
    var cropper;


    $('#upload_image').change(function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            $modal.modal('show');
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: NaN,
            viewMode: 3,
            preview:'.preview'
        });
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });

    // $('#upload_form').on('submit', function(event){
    $('#crop').click(function(e){  
        e.preventDefault();
        $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                }
        });
        canvas = cropper.getCroppedCanvas({
            width:image.width,
            height:image.height
        });
       
        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            // var jpegFile = canvas.toDataURL("image/jpeg");
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                // document.write(base64data);
                // var png = base64data.toDataURL();


                $.ajax({

                    type: 'post',
                    url: "/uploadImage",
                    data:
                        {
                           _token: '{{ csrf_token() }}',
                           image: base64data
                        
                        },
                    // dataType: "json",
                    // contentType: false,
                    // cache: false,
                    // processData: false,

                    success: function(data){
                        // document.write("BERHASIL");
                        window.location.replace("/draw");
                        
                    }
                    ,error: function() {
                        document.write("GAGAL");
                        handleError(data.error);
                        
                    }
                });
            };
        });
    });
    
});
</script>





@endsection



