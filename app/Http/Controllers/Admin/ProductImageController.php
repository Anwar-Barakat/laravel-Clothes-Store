<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductAttachmentsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductImageController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Product $product)
    {
        $productData = Product::select('id', 'name', 'color', 'code')->find($product->id);
        return view('admin.products.attachments.add', ['product' => $productData]);
    }


    public function store(StoreProductAttachmentsRequest $request)
    {
        if ($request->isMethod('post')) {
            $product    = Product::findOrFail($request->product_id);

            if ($request->hasFile('image')) {
                $images = $product->addMultipleMediaFromRequest(['image'])->each(function ($image) {
                    $image->toMediaCollection('product_attachments');
                });
            }
            Session::flash('message', __('msgs.product_attachments_add'));
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $media = Media::whereId($id)->first();
        $media->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.product_attachment_delete'));
        return redirect()->back();
    }

    public function destroyAllProductAttachments($id)
    {
        Media::where(['model_id' => $id, 'collection_name' => 'product_attachments'])->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.product_attachments_delete'));
        return redirect()->back();
    }

    public function download($id)
    {
        return Media::where('id', $id)->first();
    }
}