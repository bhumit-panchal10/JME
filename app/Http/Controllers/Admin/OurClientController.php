<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurClientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Listing
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $ourClients = OurClient::orderBy(
            'id',
            'desc'
        )->paginate(10);

        return view(
            'admin.our-clients.index',
            compact('ourClients')
        );
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
                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:2048'
                ],
            ],
            [
                'name.required' =>
                'Client name is required.',

                'name.max' =>
                'Client name may not be greater than 255 characters.',

                'image.image' =>
                'Please select a valid image.',

                'image.mimes' =>
                'Image must be jpg, jpeg, png, webp or gif.',

                'image.max' =>
                'Image size must not be greater than 2 MB.',
            ]
        );

        try {

            $ourClient = new OurClient();

            $ourClient->name =
                $request->name;


            /*
            |--------------------------------------------------------------------------
            | Image Upload
            |--------------------------------------------------------------------------
            */
            if ($request->hasFile('image')) {

                $image =
                    $request->file('image');

                $imageName =
                    time() . '.' .
                    $image->getClientOriginalExtension();

                $uploadPath =
                    public_path('our-client');


                if (!File::exists($uploadPath)) {

                    File::makeDirectory(
                        $uploadPath,
                        0755,
                        true
                    );
                }


                $image->move(
                    $uploadPath,
                    $imageName
                );

                $ourClient->image =
                    $imageName;
            }


            $ourClient->save();


            return redirect()
                ->route(
                    'admin.our-clients.index'
                )
                ->with(
                    'success',
                    'Client added successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' .
                        $e->getMessage()
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
                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:2048'
                ],
            ],
            [
                'name.required' =>
                'Client name is required.',

                'name.max' =>
                'Client name may not be greater than 255 characters.',

                'image.image' =>
                'Please select a valid image.',

                'image.mimes' =>
                'Image must be jpg, jpeg, png, webp or gif.',

                'image.max' =>
                'Image size must not be greater than 2 MB.',
            ]
        );

        try {

            $ourClient = OurClient::where(
                'id',
                $id
            )
                ->firstOrFail();


            $ourClient->name =
                $request->name;


            /*
            |--------------------------------------------------------------------------
            | Replace Image
            |--------------------------------------------------------------------------
            */
            if ($request->hasFile('image')) {

                /*
                |--------------------------------------------------------------------------
                | Remove Old Image
                |--------------------------------------------------------------------------
                */
                if (!empty($ourClient->image)) {

                    $oldImage =
                        public_path(
                            'our-client/' .
                                $ourClient->image
                        );

                    if (File::exists($oldImage)) {

                        File::delete($oldImage);
                    }
                }


                $image =
                    $request->file('image');

                $imageName =
                    time() . '.' .
                    $image->getClientOriginalExtension();

                $uploadPath =
                    public_path('our-client');


                if (!File::exists($uploadPath)) {

                    File::makeDirectory(
                        $uploadPath,
                        0755,
                        true
                    );
                }


                $image->move(
                    $uploadPath,
                    $imageName
                );


                $ourClient->image =
                    $imageName;
            }


            $ourClient->save();


            return redirect()
                ->route(
                    'admin.our-clients.index'
                )
                ->with(
                    'success',
                    'Client updated successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' .
                        $e->getMessage()
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

            $ourClient = OurClient::where(
                'id',
                $id
            )
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | Delete Image
            |--------------------------------------------------------------------------
            */
            if (!empty($ourClient->image)) {

                $imagePath =
                    public_path(
                        'our-client/' .
                            $ourClient->image
                    );

                if (File::exists($imagePath)) {

                    File::delete($imagePath);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Hard Delete
            |--------------------------------------------------------------------------
            */
            $ourClient->delete();


            return response()->json([
                'status' => true,
                'message' =>
                'Client deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' =>
                'Unable to delete client.'
            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Bulk Hard Delete
    |--------------------------------------------------------------------------
    */
    public function bulkDelete(Request $request)
    {
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

            $ourClients = OurClient::whereIn(
                'id',
                $request->ids
            )->get();


            foreach ($ourClients as $ourClient) {

                /*
                |--------------------------------------------------------------------------
                | Remove Image
                |--------------------------------------------------------------------------
                */
                if (!empty($ourClient->image)) {

                    $imagePath =
                        public_path(
                            'our-client/' .
                                $ourClient->image
                        );

                    if (File::exists($imagePath)) {

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
                $ourClient->delete();
            }


            return response()->json([
                'status' => true,
                'message' =>
                'Selected clients deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' =>
                'Unable to delete selected clients.'
            ], 500);
        }
    }
}
