<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Listing
    |--------------------------------------------------------------------------
    */

    public function getServicesByCategory($category_id)
    {
        $services = Service::where('category_id', $category_id)
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
    public function index()
    {
        $blogs = Blog::with([
            'category',
            'service'
        ])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'admin.blogs.index',
            compact('blogs')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Add Page
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.blogs.add-edit',
            compact('categories')
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
                'category_id' => [
                    'required',
                    'exists:categories,id'
                ],

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:2048'
                ],

                'service_id' => [
                    'required',

                    Rule::exists(
                        'services',
                        'id'
                    )->where(
                        function ($query) use ($request) {

                            $query->where(
                                'category_id',
                                $request->category_id
                            );
                        }
                    ),
                ],

                'image.image' =>
                'Please select a valid image.',

                'image.mimes' =>
                'Image must be JPG, JPEG, PNG, WEBP or GIF.',

                'image.max' =>
                'Image size may not be greater than 2 MB.',

                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'description' => [
                    'nullable',
                    'string'
                ],

                'meta_tittle' => [
                    'nullable',
                    'string',
                    'max:255'
                ],

                'meta_description' => [
                    'nullable',
                    'string'
                ],

                'head' => [
                    'nullable',
                    'string'
                ],

                'body' => [
                    'nullable',
                    'string'
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

                'name.required' =>
                'Blog name is required.',

                'name.max' =>
                'Blog name may not be greater than 255 characters.',

                'meta_tittle.max' =>
                'Meta title may not be greater than 255 characters.',
            ]
        );

        try {

            $blog = new Blog();

            $blog->category_id =
                $request->category_id;

            $blog->service_id =
                $request->service_id;

            $blog->name =
                $request->name;

            /*
            |--------------------------------------------------------------------------
            | Slug Generated From Name
            |--------------------------------------------------------------------------
            */
            $blog->slugname =
                Str::slug($request->name);

            $blog->description =
                $request->description;

            $blog->meta_tittle =
                $request->meta_tittle;

            $blog->meta_description =
                $request->meta_description;

            $blog->head =
                $request->head;

            $blog->body =
                $request->body;

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName =
                    time()
                    . '_'
                    . Str::random(6)
                    . '.'
                    . $image->getClientOriginalExtension();

                $destinationPath = FolderPath('blogs');

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

                $blog->image = $imageName;
            }

            $blog->save();

            return redirect()
                ->route('admin.blogs.index')
                ->with(
                    'success',
                    'Blog added successfully.'
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
    | Edit Page
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $blog = Blog::where(
            'id',
            $id
        )
            ->firstOrFail();

        $categories = Category::orderBy(
            'name',
            'asc'
        )->get();

        $services = Service::where(
            'category_id',
            $blog->category_id
        )
            ->orderBy(
                'name',
                'asc'
            )
            ->get();

        return view(
            'admin.blogs.add-edit',
            compact(
                'blog',
                'categories',
                'services'
            )
        );
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

                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,gif',
                    'max:2048'
                ],

                'service_id' => [
                    'required',

                    Rule::exists(
                        'services',
                        'id'
                    )->where(
                        function ($query) use ($request) {

                            $query->where(
                                'category_id',
                                $request->category_id
                            );
                        }
                    ),
                ],

                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'description' => [
                    'nullable',
                    'string'
                ],

                'meta_tittle' => [
                    'nullable',
                    'string',
                    'max:255'
                ],

                'meta_description' => [
                    'nullable',
                    'string'
                ],

                'head' => [
                    'nullable',
                    'string'
                ],

                'body' => [
                    'nullable',
                    'string'
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

                'name.required' =>
                'Blog name is required.',

                'name.max' =>
                'Blog name may not be greater than 255 characters.',

                'meta_tittle.max' =>
                'Meta title may not be greater than 255 characters.',

                'image.image' =>
                'Please select a valid image.',

                'image.mimes' =>
                'Image must be JPG, JPEG, PNG, WEBP or GIF.',

                'image.max' =>
                'Image size may not be greater than 2 MB.',
            ]
        );

        try {

            $blog = Blog::where(
                'id',
                $id
            )
                ->firstOrFail();

            $blog->category_id =
                $request->category_id;

            $blog->service_id =
                $request->service_id;

            $blog->name =
                $request->name;

            /*
            |--------------------------------------------------------------------------
            | Update Slug From Name
            |--------------------------------------------------------------------------
            */
            $blog->slugname =
                Str::slug($request->name);

            $blog->description =
                $request->description;

            $blog->meta_tittle =
                $request->meta_tittle;

            $blog->meta_description =
                $request->meta_description;

            $blog->head =
                $request->head;

            $blog->body =
                $request->body;

            if ($request->hasFile('image')) {

                /*
                |--------------------------------------------------------------------------
                | Delete Old Image
                |--------------------------------------------------------------------------
                */
                if (!empty($blog->image)) {

                    $oldImagePath =
                        FolderPath('blogs') . '/' . $blog->image;

                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }


                /*
            |--------------------------------------------------------------------------
            | Upload New Image
            |--------------------------------------------------------------------------
            */
                $image = $request->file('image');

                $imageName =
                    time()
                    . '_'
                    . Str::random(6)
                    . '.'
                    . $image->getClientOriginalExtension();

                $destinationPath =
                    FolderPath('blogs');

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

                $blog->image = $imageName;
            }

            $blog->save();

            return redirect()
                ->route('admin.blogs.index')
                ->with(
                    'success',
                    'Blog updated successfully.'
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

            $blog = Blog::where(
                'id',
                $id
            )
                ->firstOrFail();

            $blog->delete();

            return response()->json([
                'status' => true,
                'message' =>
                'Blog deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' =>
                'Unable to delete blog.'
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
            ]
        ]);

        try {

            Blog::whereIn(
                'id',
                $request->ids
            )->delete();

            return response()->json([
                'status' => true,
                'message' =>
                'Selected blogs deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' =>
                'Unable to delete selected blogs.'
            ], 500);
        }
    }
}
