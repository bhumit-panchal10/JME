<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display category listing.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store category.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'sort_desicription' => 'nullable|string',
        ], [
            'name.required' => 'Category name is required.',
            'name.max' => 'Category name may not be greater than 255 characters.',

            'image.image' => 'Please select a valid image.',
            'image.mimes' => 'Image must be a JPG, JPEG, PNG, WEBP or GIF file.',
            'image.max' => 'Image size may not be greater than 2 MB.',
        ]);

        try {

            $category = new Category();

            $category->name = $request->name;

            // Slug automatically generated from name
            $category->slugname = Str::slug($request->name);

            $category->sort_desicription = $request->sort_desicription;

            /**
             * Upload image to:
             * public/categories
             */
            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . '_' . uniqid() . '.' .
                    $image->getClientOriginalExtension();

                // Don't use public_path()
                $destinationPath = FolderPath('categories');

                // Create folder if it doesn't exist
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move image
                $image->move($destinationPath, $imageName);

                // Save only filename in DB
                $category->image = $imageName;
            }

            $category->save();

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category added successfully.');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong. ' . $e->getMessage());
        }
    }

    /**
     * Update category.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'sort_desicription' => 'nullable|string',
        ], [
            'name.required' => 'Category name is required.',
            'name.max' => 'Category name may not be greater than 255 characters.',

            'image.image' => 'Please select a valid image.',
            'image.mimes' => 'Image must be a JPG, JPEG, PNG, WEBP or GIF file.',
            'image.max' => 'Image size may not be greater than 2 MB.',
        ]);

        try {

            $category = Category::where('id', $id)->firstOrFail();
            $category->name = $request->name;
            $category->meta_title = $request->meta_tittle;
            $category->meta_description = $request->meta_description;
            $category->head = $request->head;
            $category->body = $request->body;

            // Slug automatically regenerated from name
            $category->slugname = Str::slug($request->name);

            $category->sort_desicription = $request->sort_desicription;

            if ($request->hasFile('image')) {

                /*
            |--------------------------------------------------------------------------
            | Root Folder Path
            |--------------------------------------------------------------------------
            */
                $destinationPath = FolderPath('categories');

                /*
            |--------------------------------------------------------------------------
            | Remove Old Image
            |--------------------------------------------------------------------------
            */
                if (!empty($category->image)) {

                    $oldImagePath = $destinationPath . '/' . $category->image;

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                /*
            |--------------------------------------------------------------------------
            | Create Folder If Not Exists
            |--------------------------------------------------------------------------
            */
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                /*
            |--------------------------------------------------------------------------
            | Upload New Image
            |--------------------------------------------------------------------------
            */
                $image = $request->file('image');

                $imageName = time() . '_' . uniqid() . '.' .
                    $image->getClientOriginalExtension();

                $image->move($destinationPath, $imageName);

                $category->image = $imageName;
            }

            $category->save();

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $category = Category::where('id', $id)->firstOrFail();

            /*
        |--------------------------------------------------------------------------
        | Remove Category Image
        |--------------------------------------------------------------------------
        */
            if (!empty($category->image)) {

                $imagePath = FolderPath('categories') . '/' . $category->image;

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Hard delete
            $category->delete();

            return response()->json([
                'status' => true,
                'message' => 'Category deleted successfully.',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete category.',
            ], 500);
        }
    }

    /**
     * Hard delete multiple categories.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|integer',
        ]);

        try {

            $categories = Category::whereIn('id', $request->ids)->get();

            foreach ($categories as $category) {

                /*
            |--------------------------------------------------------------------------
            | Remove Category Image
            |--------------------------------------------------------------------------
            */
                if (!empty($category->image)) {

                    $imagePath = FolderPath('categories') . '/' . $category->image;

                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }

                // Hard delete
                $category->delete();
            }

            return response()->json([
                'status' => true,
                'message' => 'Selected categories deleted successfully.',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete selected categories.',
            ], 500);
        }
    }
}
