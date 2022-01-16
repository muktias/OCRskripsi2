<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Image;
use File;

class GaleriController extends Controller

{
    /**
     * Listing Of images gallery
     *

     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $image = Image::make($request->get('image'));
        $image->save(public_path().'/obat/obat.png');

        
    }

    public function draw()
    {
      
      shell_exec("python " . app_path(). "\Http\Controllers\HTR\Tes_sdw.py " );
      $result = shell_exec("python " . app_path(). "\Http\Controllers\HTR\Tes_bwL.py " );
    	return view('draw')->with('result',$result);;
    }

    public function predict()
    {
      $string = "";
      
      $result = shell_exec("python " . app_path(). "\Http\Controllers\HTR\Test_emnistL.py " . escapeshellarg($string));
      return view('modelpredict')->with('result',$result);
    }

    /**

     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function destroy()
    {
    	//$image_path = public_path('/images/'.$request->input('gambar')); unlink($image_path); 
        File::delete(public_path().'/obat/obat.png');
        // Gallery::find($id)->delete();
        
    	return view('welcome')
    		->with('success','Image removed successfully.');	
    }

}