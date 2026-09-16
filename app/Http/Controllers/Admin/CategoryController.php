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

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('categories');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $image->move($destinationPath, $imageName);

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

            // Slug automatically regenerated from name
            $category->slugname = Str::slug($request->name);

            $category->sort_desicription = $request->sort_desicription;

            if ($request->hasFile('image')) {

                /**
                 * Remove old image.
                 */
                if (!empty($category->image)) {

                    $oldImagePath = public_path(
                        'categories/' . $category->image
                    );

                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                /**
                 * Upload new image.
                 */
                $image = $request->file('image');

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('categories');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

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

    /**
     * Hard delete single category.
     */
    public function destroy($id)
    {
        try {

            $category = Category::where('id', $id)->firstOrFail();

            /**
             * Unlink category image.
             */
            if (!empty($category->image)) {

                $imagePath = public_path(
                    'categories/' . $category->image
                );

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
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

                /**
                 * Remove image.
                 */
                if (!empty($category->image)) {

                    $imagePath = public_path(
                        'categories/' . $category->image
                    );

                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
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
