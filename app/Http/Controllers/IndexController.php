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
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $convertered = Convert::latest()->get();
        return ConvertResource::collection($convertered);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
            $convert->integer = $request->integer;
            $convert->converted = $intToRoman->filter($request->integer);
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
