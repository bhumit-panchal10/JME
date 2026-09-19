<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PhotoGalleryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Listing
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $photoGalleries = PhotoGallery::with([
            'category',
            'service'
        ])
            ->orderBy('id', 'desc')
            ->paginate(10);


        /*
        |--------------------------------------------------------------------------
        | Category Dropdown
        |--------------------------------------------------------------------------
        | Primary key = id
        | Second column = name
        | Order by name ASC
        */
        $categories = Category::orderBy(
            'name',
            'asc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | We intentionally do NOT load all services.
        |--------------------------------------------------------------------------
        | Services will be loaded category-wise using AJAX.
        */

        return view(
            'admin.photo-gallery.index',
            compact(
                'photoGalleries',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Category Wise Services
    |--------------------------------------------------------------------------
    */
    public function getServicesByCategory($category_id)
    {
        $services = Service::where(
            'category_id',
            $category_id
        )
            ->orderBy('name', 'asc')
            ->get([
                'id',
                'name'
            ]);


        return response()->json([
            'status' => true,
            'services' => $services
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_id' => [
                    'required',
                    'exists:categories,id'
                ],

                /*
                |--------------------------------------------------------------------------
                | Service must belong to selected Category
                |--------------------------------------------------------------------------
                */
                'service_id' => [
                    'required',

                    Rule::exists('services', 'id')
                        ->where(function ($query) use ($request) {

                            $query->where(
                                'category_id',
                                $request->category_id
                            );
                        }),
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:2048'
                ],
            ],
            [
                'category_id.required' =>
                'Category is required.',

                'category_id.exists' =>
                'Selected category is invalid.',


                'service_id.required' =>
                'Service is required.',

                'service_id.exists' =>
                'Selected service does not belong to selected category.',


                'image.image' =>
                'Please select a valid image.',

                'image.mimes' =>
                'Image must be JPG, JPEG, PNG, WEBP or GIF.',

                'image.max' =>
                'Image size may not be greater than 2 MB.',
            ]
        );


        try {

            $photoGallery = new PhotoGallery();

            $photoGallery->category_id =
                $request->category_id;

            $photoGallery->service_id =
                $request->service_id;


            /*
            |--------------------------------------------------------------------------
            | Image Upload
            |--------------------------------------------------------------------------
            | Folder:
            | public/photo-gallery
            */
            if ($request->hasFile('image')) {

                $image =
                    $request->file('image');


                /*
                |--------------------------------------------------------------------------
                | Replace filename using timestamp
                |--------------------------------------------------------------------------
                */
                $imageName =
                    time()
                    . '_'
                    . Str::random(6)
                    . '.'
                    . $image->getClientOriginalExtension();


               $destinationPath = FolderPath('photo-gallery');

                /*
                |--------------------------------------------------------------------------
                | Create folder if not available
                |--------------------------------------------------------------------------
                */
                if (!File::exists($destinationPath)) {

                    File::makeDirectory(
                        $destinationPath,
                        0755,
                        true
                    );
                }


                $image->move(
                    $destinationPath,
                    $imageName
                );


                $photoGallery->image =
                    $imageName;
            }


            $photoGallery->save();


            return redirect()
                ->route(
                    'admin.photo-gallery.index'
                )
                ->with(
                    'success',
                    'Photo added successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. '
                        . $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
    public function update(
        Request $request,
        $id
    ) {

        $request->validate(
            [
                'category_id' => [
                    'required',
                    'exists:categories,id'
                ],
                'service_id' => [
                    'required',

                    Rule::exists('services', 'id')
                        ->where(function ($query) use ($request) {

                            $query->where(
                                'category_id',
                                $request->category_id
                            );
                        }),
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:2048'
                ],
            ],
            [
                'category_id.required' =>
                'Category is required.',

                'category_id.exists' =>
                'Selected category is invalid.',


                'service_id.required' =>
                'Service is required.',

                'service_id.exists' =>
                'Selected service does not belong to selected category.',


                'image.image' =>
                'Please select a valid image.',

                'image.mimes' =>
                'Image must be JPG, JPEG, PNG, WEBP or GIF.',

                'image.max' =>
                'Image size may not be greater than 2 MB.',
            ]
        );


        try {
            $photoGallery =
                PhotoGallery::where(
                    'id',
                    $id
                )->firstOrFail();


            $photoGallery->category_id =
                $request->category_id;

            $photoGallery->service_id =
                $request->service_id;


            if ($request->hasFile('image')) {

                if (!empty($photoGallery->image)) {

                    $oldImagePath = FolderPath('photo-gallery') . '/' . $photoGallery->image;

                    if (
                        File::exists(
                            $oldImagePath
                        )
                    ) {

                        File::delete(
                            $oldImagePath
                        );
                    }
                }
                $image =
                    $request->file('image');


                $imageName =
                    time()
                    . '_'
                    . Str::random(6)
                    . '.'
                    . $image->getClientOriginalExtension();


                $destinationPath = FolderPath('photo-gallery');

                if (!File::exists($destinationPath)) {

                    File::makeDirectory(
                        $destinationPath,
                        0755,
                        true
                    );
                }

                $image->move(
                    $destinationPath,
                    $imageName
                );


                $photoGallery->image =
                    $imageName;
            }


            $photoGallery->save();


            return redirect()
                ->route(
                    'admin.photo-gallery.index'
                )
                ->with(
                    'success',
                    'Photo updated successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. '
                        . $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Single Hard Delete
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | Single Delete Using Primary Key
            |--------------------------------------------------------------------------
            */
            $photoGallery =
                PhotoGallery::where(
                    'id',
                    $id
                )->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | Unlink Image
            |--------------------------------------------------------------------------
            */
            if (!empty($photoGallery->image)) {

                $imagePath = FolderPath('photo-gallery') . '/' . $photoGallery->image;

                if (
                    File::exists(
                        $imagePath
                    )
                ) {

                    File::delete(
                        $imagePath
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Hard Delete
            |--------------------------------------------------------------------------
            */
            $photoGallery->delete();


            return response()->json([
                'status' => true,

                'message' =>
                'Photo deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json(
                [
                    'status' => false,

                    'message' =>
                    'Unable to delete photo.'
                ],
                500
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Bulk Hard Delete
    |--------------------------------------------------------------------------
    */
    public function bulkDelete(
        Request $request
    ) {

        $request->validate([
            'ids' => [
                'required',
                'array'
            ],

            'ids.*' => [
                'required',
                'integer'
            ],
        ]);


        try {

            $photoGalleries =
                PhotoGallery::whereIn(
                    'id',
                    $request->ids
                )->get();


            foreach (
                $photoGalleries
                as
                $photoGallery
            ) {

                /*
                |--------------------------------------------------------------------------
                | Unlink Image
                |--------------------------------------------------------------------------
                */
                if (!empty($photoGallery->image)) {

                   $imagePath = FolderPath('photo-gallery') . '/' . $photoGallery->image;

                    if (
                        File::exists(
                            $imagePath
                        )
                    ) {

                        File::delete(
                            $imagePath
                        );
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | Hard Delete
                |--------------------------------------------------------------------------
                */
                $photoGallery->delete();
            }


            return response()->json([
                'status' => true,

                'message' =>
                'Selected photos deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json(
                [
                    'status' => false,

                    'message' =>
                    'Unable to delete selected photos.'
                ],
                500
            );
        }
    }
}
