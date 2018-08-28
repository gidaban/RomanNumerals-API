<?php

namespace App\Http\Controllers;

use App\Convert;
use App\Http\Resources\Convert as ConvertResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Romans\Filter\IntToRoman;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */


    public function index()
    {
        //
        $converted = Convert::latest()->get();
        return ConvertResource::collection($converted);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return ConvertResource|\Illuminate\Support\MessageBag
     * @throws \Romans\Filter\Exception
     * @throws \Romans\Filter\Exception
     */
    public function store(Request $request)
    {
        $intToRoman = new IntToRoman();
        $validator = Validator::make($request->all(), [
            'integer' => 'required|integer|min:1|max:3999'
        ]);
        if ($validator->fails()) {
            $msg = $validator->errors();
        } else {
            $convert = new Convert();
            $convert->integer = request('integer');
            $convert->converted = $intToRoman->filter(request('converted'));
            $convert->save();
            $msg = new ConvertResource($convert);
        }
        return $msg;
    }

    /**
     *
     */
    public function showTopConverted()
    {
        return Convert::topConverted();
    }
}
