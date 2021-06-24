<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageThumb;
use App\Models\ProductRequest;
use App\Models\ProductResult;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function viewAllProductsResult()
    {
        $products = ProductResult::where('product_owner', auth()->user()->id)->get();
        return $this->respondWithSuccess($products, 'Successful');
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function viewResultOfProduct($slug)
    {
        $pr_id = ProductRequest::where('slug_title', $slug)->first();

        $product = ProductResult::with('photographer:id,username')->where('product_request_id', $pr_id->id)
            ->where('is_approve', true)
            ->first();
        return $this->respondWithSuccess($product, 'Successful');
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendThumbnail($slug)
    {
        $pr_id = ProductRequest::where('slug_title', $slug)->first();
        $image = ImageThumb::where('product_request_id', $pr_id->id)->first();
        return $this->respondWithSuccess($image, 'Successful');

    }

    /**
     * @param $slug
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function approveThumbnail($slug, Request $request)
    {
        $data = $request->approve;
        $pr_id = ProductRequest::where('slug_title', $slug)->first();
        $image = ImageThumb::where('product_request_id', $pr_id->id)->first();
        $image->is_approve = $data;
        $image->save();
        $product = ProductResult::where('product_request_id', $pr_id->id)->first();
        $product->is_approve = $data;
        $product->save();
        return $this->respondWithSuccess([], $data==true ? 'You approved the thumbnail' : 'You disapproved the thumbnail');
    }
}
