<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class WelcomeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function removeBackground(Request $request)
    {
        $this->validate($request, [
            'is_smooth' => 'required|in:0,1',
            'file' => 'required|image|max:2000'
        ]);
        try {
            $requestData = $request->except('file', '_token');
            $requestData['api-key'] = env('API_IMAGE_PROCESSING_SERVICE_API_KEY');
            $pathForRawImage = 'raw-image';
            $pathForImageResult = 'result-image';
            $imageName = uniqid(date('Ymd-')) . '.png';
            Storage::putFileAs($pathForRawImage, $request->file('file'), $imageName);
            $response = Http::attach('file', file_get_contents(Storage::path($pathForRawImage . '/' . $imageName)), $imageName)
                ->post(env('API_IMAGE_PROCESSING_SERVICE_URL'), $requestData);
            $imageFile = $response->body();
            $fullPath = $pathForImageResult . '/' . $imageName;
            Storage::put($fullPath, $imageFile);
            return Storage::download($fullPath);
        } catch (Exception $e) {
            throw new Exception('Oops something was wrong!');
        }
    }
}
