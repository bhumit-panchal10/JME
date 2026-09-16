<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videoGalleries = VideoGallery::with([
            'category',
            'service'
        ])
            ->orderBy('id', 'desc')
            ->paginate(10);

        $categories = Category::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.video-gallery.index',
            compact(
                'videoGalleries',
                'categories'
            )
        );
    }


    public function getServicesByCategory($category_id)
    {
        $services = Service::where(
            'category_id',
            $category_id
        )
            ->orderBy(
                'name',
                'asc'
            )
            ->get([
                'id',
                'name'
            ]);

        return response()->json([
            'status' => true,
            'services' => $services
        ]);
    }


    public function store(Request $request)
    {
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

                'url' => [
                    'required',
                    'url',
                    'max:500'
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

                'url.required' =>
                'Video URL is required.',

                'url.url' =>
                'Please enter a valid video URL.',

                'url.max' =>
                'Video URL may not be greater than 500 characters.',
            ]
        );

        try {

            $videoGallery = new VideoGallery();

            $videoGallery->category_id =
                $request->category_id;

            $videoGallery->service_id =
                $request->service_id;

            $videoGallery->url =
                $request->url;

            $videoGallery->save();

            return redirect()
                ->route(
                    'admin.video-gallery.index'
                )
                ->with(
                    'success',
                    'Video added successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' . $e->getMessage()
                );
        }
    }


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

                'url' => [
                    'required',
                    'url',
                    'max:500'
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

                'url.required' =>
                'Video URL is required.',

                'url.url' =>
                'Please enter a valid video URL.',

                'url.max' =>
                'Video URL may not be greater than 500 characters.',
            ]
        );

        try {

            $videoGallery = VideoGallery::where(
                'id',
                $id
            )
                ->firstOrFail();

            $videoGallery->category_id =
                $request->category_id;

            $videoGallery->service_id =
                $request->service_id;

            $videoGallery->url =
                $request->url;

            $videoGallery->save();

            return redirect()
                ->route(
                    'admin.video-gallery.index'
                )
                ->with(
                    'success',
                    'Video updated successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' . $e->getMessage()
                );
        }
    }


    public function destroy($id)
    {
        try {

            $videoGallery = VideoGallery::where(
                'id',
                $id
            )
                ->firstOrFail();

            $videoGallery->delete();

            return response()->json([
                'status' => true,
                'message' => 'Video deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete video.'
            ], 500);
        }
    }


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

            VideoGallery::whereIn(
                'id',
                $request->ids
            )->delete();

            return response()->json([
                'status' => true,
                'message' => 'Selected videos deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete selected videos.'
            ], 500);
        }
    }
}
