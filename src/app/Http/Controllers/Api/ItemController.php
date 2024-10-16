<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function upload(Request $request, Item $item)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->image->getRealPath());
        $url = $uploadedFileUrl->getSecurePath();
        $publicId = $uploadedFileUrl->getPublicId();

        $item->img_url = $url;
        $item->img_public_id = $publicId;
        $item->save();

        return response()->json(['success' => 'Image uploaded successfully.']);
    }
}
