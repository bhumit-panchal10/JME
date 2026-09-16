<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FAQ Listing
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $faqs = Faq::with('service')
            ->orderBy('id', 'desc')
            ->paginate(10);

        /*
        |--------------------------------------------------------------------------
        | Service Dropdown
        |--------------------------------------------------------------------------
        | Value: services.id
        | Text : services.name
        | Order: name ASC
        */
        $services = Service::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.faqs.index',
            compact(
                'faqs',
                'services'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store FAQ
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate(
            [
                'service_id' => [
                    'required',
                    'exists:services,id'
                ],

                'question' => [
                    'required',
                    'string',
                    'max:500'
                ],

                'answer' => [
                    'nullable',
                    'string'
                ],
            ],
            [
                'service_id.required' =>
                'Service is required.',

                'service_id.exists' =>
                'Selected service is invalid.',

                'question.required' =>
                'Question is required.',

                'question.max' =>
                'Question may not be greater than 500 characters.',
            ]
        );

        try {

            $faq = new Faq();

            $faq->service_id =
                $request->service_id;

            $faq->question =
                $request->question;

            $faq->answer =
                $request->answer;

            $faq->save();

            return redirect()
                ->route('admin.faqs.index')
                ->with(
                    'success',
                    'FAQ added successfully.'
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
    | Update FAQ
    |--------------------------------------------------------------------------
    */
    public function update(
        Request $request,
        $id
    ) {

        $request->validate(
            [
                'service_id' => [
                    'required',
                    'exists:services,id'
                ],

                'question' => [
                    'required',
                    'string',
                    'max:500'
                ],

                'answer' => [
                    'nullable',
                    'string'
                ],
            ],
            [
                'service_id.required' =>
                'Service is required.',

                'service_id.exists' =>
                'Selected service is invalid.',

                'question.required' =>
                'Question is required.',

                'question.max' =>
                'Question may not be greater than 500 characters.',
            ]
        );

        try {

            /*
            |--------------------------------------------------------------------------
            | Edit using Primary Key
            |--------------------------------------------------------------------------
            */
            $faq = Faq::where(
                'id',
                $id
            )
                ->firstOrFail();

            $faq->service_id =
                $request->service_id;

            $faq->question =
                $request->question;

            $faq->answer =
                $request->answer;

            $faq->save();

            return redirect()
                ->route('admin.faqs.index')
                ->with(
                    'success',
                    'FAQ updated successfully.'
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

            $faq = Faq::where(
                'id',
                $id
            )
                ->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | Hard Delete
            |--------------------------------------------------------------------------
            */
            $faq->delete();

            return response()->json([
                'status' => true,
                'message' => 'FAQ deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Unable to delete FAQ.'
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

            Faq::whereIn(
                'id',
                $request->ids
            )->delete();

            return response()->json([
                'status' => true,
                'message' =>
                'Selected FAQs deleted successfully.'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' =>
                'Unable to delete selected FAQs.'
            ], 500);
        }
    }
}
