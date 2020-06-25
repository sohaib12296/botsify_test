<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use URL;
class imageController extends Controller
{
    //

    public function upload(Request $req){
        
    
        $naming = "test_image".'-'.time().'.'.$req->file('file_image')->getClientOriginalExtension();

        $req->file('file_image')->move(public_path("/images"),$naming); 

        return $this->removeBG($naming,$req->file('file_image')->getClientOriginalExtension());
        
    }

    public function removeBG($image_name,$ext){
        
        
        $client = new GuzzleHttp\Client();
        try{
        $res = $client->post('https://api.remove.bg/v1.0/removebg', [
            'multipart' => [
                [
                    'name'     => 'image_file',
                    'contents' => fopen(public_path('/images')."/".$image_name, 'r')
                ]
            ],
            'headers' => [
                'X-Api-Key' => 'XEprZjGR4Hhvq1T7rEsMHGoT'
            ]
        ]);
            }catch(\Exception $e){
                // return redirect()->route('home')->with('error',$e->getMessage());
                return redirect()->route('home')->with('error',"either the file is too large or service cannot be reached or background could not detected.");
            }

        $fp = fopen(time()."no-bg".$ext, "wb");

        fwrite($fp, $res->getBody());

        fclose($fp);

        return redirect()->route('home')->with('success','Item created successfully!');


    }

    
}
