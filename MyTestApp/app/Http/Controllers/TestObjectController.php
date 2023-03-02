<?php

namespace App\Http\Controllers;

use App\Models\TestObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestObjectController extends Controller
{
    public function setData(Request $request)
    {
        // Authenticate user based on token in header
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        // Check if request is GET or POST
            // Save object to database
            $data = $request->input('data');
            $object = TestObject::find($request->input('id'));

            if($object){
                if($object->user_id == $user->id){
                    $object->fill(json_decode($data, true));
                    $object->user_id = $user->id;
                    $object->save();
                    // Return object ID and processing time and memory
                    $id = $object->id;
                    $processing_time = microtime(true) - LARAVEL_START;
                    $memory_usage = memory_get_usage(true) / 1024 / 1024;
                    $response = [
                        'id' => $id,
                        'processing_time' => $processing_time,
                        'memory_usage' => $memory_usage,
                    ];
                    return response()->json($response);
                } else{
                    return response()->json(['message' => 'Invalid id'], 410);
                }
            }else{
                return response()->json(['message' => 'Invalid id'], 410);
            }

    }
    public function createData(Request $request)
    {
        // Authenticate user based on token in header
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
            // Save object to database
            $data = $request->input('data');
            $object = new TestObject();
            $object->fill(json_decode($data, true));
            $object->user_id = $user->id;
            $object->save();
            // Return object ID and processing time and memory
            $id = $object->id;
            $processing_time = microtime(true) - LARAVEL_START;
            $memory_usage = memory_get_usage(true) / 1024 / 1024;
            $response = [
                'id' => $id,
                'processing_time' => $processing_time,
                'memory_usage' => $memory_usage,
            ];
            return response()->json($response);
    }
}
