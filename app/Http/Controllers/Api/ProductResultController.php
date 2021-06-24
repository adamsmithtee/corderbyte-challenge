<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductResultRequest;
use App\Models\ImageThumb;
use App\Models\ProductResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;

class ProductResultController extends Controller
{
    private $uploadedPath = "upload/product_results";

    /**
     * @param ProductResultRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function storeResult(ProductResultRequest $request) //photographer upload result of pictures taken for product owners to see
    {
        if($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $extension = time() . rand(1111, 9999) . '.' . $file->getClientOriginalExtension();
            $thumb = Image::make($file->getRealPath())->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $destinationPath = public_path($this->getUploadedPath());
            $file->move($destinationPath, $extension);
            $thumb->save($destinationPath . '/thumbnail_' . $extension);

            $title = $request->title;
            $payload = array_merge($request->validated(), [
                'slug_title' => Str::slug($title),
                'image' => $extension,
                'image_thumbnail' => 'thumbnail_' . $extension,
                'created_by' => auth()->user()->id,
            ]);
            $data = ProductResult::create($payload);
            $this->saveThumbnail($payload);
            return $this->respondWithSuccess($data, "upload Successful");
        }
        return $this->respondWithError([], "Error Uploading");
    }

    /**
     * @return string
     */
    private function getUploadedPath(): string
    {
        return $this->uploadedPath;
    }

    /**
     * @param array $payload
     */
    public function saveThumbnail(array $payload): void
    {
        $image = new ImageThumb();
        $image->product_owner = $payload['product_owner'];
        $image->image_thumbnail = $payload['image_thumbnail'];
        $image->product_request_id = $payload['product_request_id'];
        $image->save();
    }

}
