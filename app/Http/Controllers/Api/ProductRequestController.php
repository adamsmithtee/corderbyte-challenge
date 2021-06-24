<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UploadRequest;
use App\Http\Traits\FileUpload;
use App\Models\ProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductRequestController extends Controller
{
    use FileUpload;

    private $uploadedPath = "upload/product_requests";

    /**
     * @return mixed
     */
    public function productUploads()
    {
        $picture = ProductRequest::latest()->paginate(30);
        return $picture;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function productUploadByUser($id){
        $products = ProductRequest::where('user_id', $id)->first();
        return $products;
    }

    /**
     * @param UploadRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function storeProductRequest(UploadRequest $request) //product owner upload request with option of adding image
    {
        $formName = 'image';
        if ($request->hasFile($formName)) {
            $fileSize = $request->file($formName)->getSize();
            if ($fileSize > 1000000) {
                return $this->respondWithError([], 'File size greater than 1mb');
            }
            $fileName = $this->fileValidate($request, $formName);
        }
        $title = $request->title;
        $payload = array_merge($request->validated(), [
            'slug_title' => Str::slug($title),
            'image' => $fileName ?? null,
            'request' => 'pending',
            'user_id' => auth()->user()->id
        ]);
        try{
            $data = ProductRequest::create($payload);
        }catch (\Exception $e){
            return $this->respondWithError([], $e->getMessage());
        }
        return $this->respondWithSuccess($data, 'Request sent');
    }

    /**
     * @return string
     */
    private function getUploadedPath(): string
    {
        return $this->uploadedPath;
    }

}
