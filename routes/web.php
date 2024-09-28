<?php

use App\Events\MessageSent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/broadcast", function (\Illuminate\Http\Request $request) {
    try{
        broadcast(new MessageSent("Server :: " . $request["message"]));
        return [
            "success" => true,
            "data" => [
                $request["message"]
            ],
        ];
    }catch (\Exception $e){
        return  [
            "success" => false,
            "message" => $e->getMessage(),
        ];
    }
});

Route::post("/receive", function () {
});
