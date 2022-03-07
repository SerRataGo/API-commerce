<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{

    public function StoreReview(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'product_id'=>'required',
            'comment'=>'required|min:3'
        ]);
        $review=new Review;
        $review->user_id=$request->user_id;
        $review->product_id=$request->product_id;
        $review->comment=$request->comment;
        $review->save();
        return response()->json("Comment stored to be reviewed");
    }

    public function PendingReview()
    {
        $matchQuery=['status'=>'0'];
        $reviews=Review::where($matchQuery)->get();
        return ReviewResource::collection($reviews);
    }

    public function ApproveReview($review_id)
    {
        $review=Review::find($review_id);
        $review->status="1";
        $review->save();
        return response()->json("Review approved");
    }

    public function AllReviewsApproved()
    {
        $matchQuery=['status'=>'1'];
        $reviews=Review::where($matchQuery)->get();
        return ReviewResource::collection($reviews);
    }

    public function DeleteReview($id)
    {
        Review::destroy($id);
        return response()->json("Review Deleted");
    }

    public function GetProductReviews($product_id){
        $matchQuery=['product_id'=>$product_id,'status'=>"1"];
        $reviews=Review::where($matchQuery)->get();
        return ReviewResource::collection($reviews);
    }

}
