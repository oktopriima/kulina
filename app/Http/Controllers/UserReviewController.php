<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserReview;
use Validator;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(UserReview::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' =>'required|integer|min:1|max:5',
            'review' => 'required'
        ]);

        if ($validator->passes()) {
            $model = new UserReview($request->all());

            if(!$model->save()){
                return response()->json(['error' => 'Fail add new records.'], 400);    
            }
            return response()->json(['success'=>'Added new records.'], 201);
        }

        return response()->json(['error'=>$validator->errors()->all()], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = UserReview::findOrFail($id);

        return response()->json([
            'data' => $model
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' =>'required|integer|min:1|max:5',
            'review' => 'required'
        ]);

        if ($validator->passes()) {
            $model = UserReview::findOrFail($id);

            $model->order_id = $request->order_id;
            $model->product_id = $request->product_id;
            $model->user_id = $request->user_id;
            $model->rating = $request->rating;
            $model->review = $request->review;

            if(!$model->save()){
                return response()->json(['error' => 'Fail update records.'], 400);    
            }
            return response()->json(['success'=>'Records updates.'], 200);
        }

        return response()->json(['error'=>$validator->errors()->all()], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = UserReview::findOrFail($id); 
        $model->delete();
        return response()->json(['success'=>'Records deleted'], 200);

    }
}
