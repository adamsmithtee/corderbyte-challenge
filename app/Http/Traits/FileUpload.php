<?php


namespace App\Http\Traits;


trait FileUpload
{
    public function fileValidate(\Illuminate\Http\Request $request, string $formName): string
    {
        $fileFinalName = time() . rand(1111, 9999) . '.' . $request->file($formName)->getClientOriginalExtension();
        $request->file($formName)->move($this->getUploadedPath(), $fileFinalName);
        return $fileFinalName;
    }
}
