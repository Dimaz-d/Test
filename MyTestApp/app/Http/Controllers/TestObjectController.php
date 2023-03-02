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
        if (! $user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $data = $request->input('data');
        $object = TestObject::where('user_id', $user->id)->where('id', $request->get('id'))->first();
        if (is_null($object)) {
            return response()->json(['message' => 'Invalid id'], 410);
        }
        // Edit object in database
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

    public function createData(Request $request)
    {
        // Authenticate user based on token in header
        $user = Auth::guard('api')->user();
        if (! $user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        // Save object to database
        $object = new TestObject();
        $data = $request->get('data');
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

    public function destroy(Request $request)
    {
        TestObject::destroy($request->post('id'));
        return response()->json(['message' => 'Item Deleted'], 200);
    }
}
