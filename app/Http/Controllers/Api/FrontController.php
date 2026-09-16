<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PushNotificationController;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Testimonial;
use App\Models\TestMaster;
use App\Models\PackageMaster;
use App\Models\Specialty;
use App\Models\Habit;
use App\Models\Symptom;
use App\Models\Risk;
use App\Models\ContactUsInquiry;
use App\Models\PackageInquiry;
use App\Models\NewsLetters;
use App\Models\MetaData;
use App\Models\CmsMaster;

use Google\Service\Monitoring\Custom;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\BaseURL;

class FrontController extends Controller
{

    public function cmslist(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required'
            ]);
            $cmsmaster = CmsMaster::where('id', $request->id)->first();
            return response()->json([
                'message' => 'successfully CmsMaster fetched...',
                'success' => true,
                'data' => $cmsmaster,
            ], 200);
        } catch (\Throwable $th) {
            // If there's an error, rollback any database transactions and return an error response.
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    public function search(Request $request)
    {
        try {

            $search = $request->search;

            if (empty($search)) {
                return response()->json([
                    "success" => false,
                    "message" => "Please provide search parameter"
                ]);
            }

            // ===============================
            // 1️⃣ Search Tests
            // ===============================
            $tests = TestMaster::where('name', 'LIKE', '%' . $search . '%')
                ->get();

            $testData = [];
            $testIds = [];

            foreach ($tests as $test) {

                $testIds[] = $test->id; // collect test ids

                $testData[] = [
                    "id" => $test->id,
                    "name" => $test->name,
                    "title" => $test->title,
                    "amount" => $test->amount,
                ];
            }

            // ===============================
            // 2️⃣ Search Packages
            // ===============================
            $packages = PackageMaster::where('name', 'LIKE', '%' . $search . '%')
                ->orWhereIn('id', function ($query) use ($testIds) {
                    $query->select('package_id')
                        ->from('package_tests')
                        ->whereIn('test_ids', $testIds);
                })
                ->get();

            $packageData = [];

            foreach ($packages as $pack) {
                $packageData[] = [
                    "id" => $pack->id,
                    "name" => $pack->name,
                    "slugname" => $pack->slugname,
                    "rate" => $pack->rate,
                    "image" => asset('uploads/Package/' . $pack->image),

                ];
            }

            return response()->json([
                "success" => true,
                "search_keyword" => $search,
                "tests" => $testData,
                "packages" => $packageData
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "error" => $th->getMessage()
            ]);
        }
    }

    public function packagelist(Request $request)
    {
        try {

            $specialty = $request->specialty;   // array
            $habit     = $request->habit;       // array
            $symptom   = $request->symptom;     // array
            $risk      = $request->risk;        // array

            $packageQuery = PackageMaster::query();

            // ✅ Check if any filter is applied
            if (!empty($specialty) || !empty($habit) || !empty($symptom) || !empty($risk)) {

                $tests = TestMaster::query();

                // Specialty filter (JSON column)
                if (!empty($specialty)) {
                    $tests->where(function ($q) use ($specialty) {
                        foreach ($specialty as $id) {
                            $q->orWhereJsonContains('Specialty_id', (string)$id);
                        }
                    });
                }

                // Habit filter
                if (!empty($habit)) {
                    $tests->where(function ($q) use ($habit) {
                        foreach ($habit as $id) {
                            $q->orWhereJsonContains('Habit_id', (string)$id);
                        }
                    });
                }

                // Symptom filter
                if (!empty($symptom)) {
                    $tests->where(function ($q) use ($symptom) {
                        foreach ($symptom as $id) {
                            $q->orWhereJsonContains('Symptom_id', (string)$id);
                        }
                    });
                }

                // Risk filter
                if (!empty($risk)) {
                    $tests->where(function ($q) use ($risk) {
                        foreach ($risk as $id) {
                            $q->orWhereJsonContains('Risk_id', (string)$id);
                        }
                    });
                }

                $testIds = $tests->pluck('id');

                // If no matching tests → return empty
                if ($testIds->isEmpty()) {
                    return response()->json([
                        'message' => 'No package found',
                        'success' => false,
                        'data' => [],
                    ], 200);
                }

                // Filter packages based on test_ids
                $packageQuery->whereHas('tests', function ($q) use ($testIds) {
                    $q->whereIn('Test_master.id', $testIds);
                });
            }

            // ✅ Get packages (filtered or full list)
            $package = $packageQuery->with('tests')->orderBy('id', 'desc')->get();

            $data = [];

            foreach ($package as $pack) {
                $tests = [];

                foreach ($pack->tests as $test) {
                    $tests[] = [
                        "id" => $test->id,
                        "name" => $test->name,
                        "title" => $test->title,
                        "amount" => $test->amount
                    ];
                }
                $data[] = [
                    "id" => $pack->id,
                    "name" => $pack->name,
                    "title" => $pack->title,
                    "rate" => $pack->rate,
                    "slugname" => $pack->slugname,
                    "description" => $pack->description,
                    "image" => asset('uploads/Package/' . $pack->image),
                    "tests" => $tests
                ];
            }

            return response()->json([
                'message' => 'successfully package fetched...',
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'error' => $th->getMessage()
            ], 500);
        }
    }

    // public function packageDetail(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'slug' => 'required'
    //         ]);

    //         $package = PackageMaster::with(['tests', 'packageDescription'])
    //             ->where('slugname', $request->slug)
    //             ->first();

    //         if (!$package) {
    //             return response()->json([
    //                 "success" => false,
    //                 "message" => "Package not found"
    //             ]);
    //         }

    //         // Format Test Data
    //         $testData = [];
    //         foreach ($package->tests as $test) {
    //             $testData[] = [
    //                 "id" => $test->id,
    //                 "name" => $test->name,
    //                 "title" => $test->title,
    //                 "amount" => $test->amount
    //             ];
    //         }

    //         return response()->json([
    //             "success" => true,
    //             "data" => [
    //                 "id" => $package->id,
    //                 "name" => $package->name,
    //                 "title" => $package->title,
    //                 "rate" => $package->rate,
    //                 "Preparation" => $package->Preparation,
    //                 "TurnaroundTime" => $package->TurnaroundTime,
    //                 "slugname" => $package->slugname,
    //                 "description_text" => $package->description ?? null,

    //                 "who_should_consider_it" => $package->packageDescription->Who_should_consider_it ?? null,
    //                 "what_it_helps_with" => $package->packageDescription->What_it_helps_with ?? null,
    //                 "how_often_to_repeat" => $package->packageDescription->How_often_to_repeat ?? null,

    //                 "tests" => $testData
    //             ]
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             "success" => false,
    //             "error" => $th->getMessage()
    //         ]);
    //     }
    // }

    public function packageDetail(Request $request)
    {
        try {
            $request->validate([
                'slug' => 'required'
            ]);

            $packages = PackageMaster::with(['tests', 'packageDescription'])
                ->where('slugname', $request->slug)
                ->get();

            if ($packages->isEmpty()) {
                return response()->json([
                    "success" => false,
                    "message" => "Package not found"
                ]);
            }

            $data = [];

            foreach ($packages as $package) {

                $testData = [];

                foreach ($package->tests as $test) {
                    $testData[] = [
                        "id" => $test->id,
                        "name" => $test->name,
                        "title" => $test->title,
                        "amount" => $test->amount
                    ];
                }

                $data[] = [
                    "id" => $package->id,
                    "name" => $package->name,
                    "title" => $package->title,
                    "rate" => $package->rate,
                    "Preparation" => $package->Preparation,
                    "TurnaroundTime" => $package->TurnaroundTime,
                    "slugname" => $package->slugname,
                    "description_text" => $package->description ?? null,

                    "meta_title" => $package->meta_title,
                    "meta_keyword" => $package->meta_keyword,
                    "meta_desc" => $package->meta_desc,
                    "head" => $package->head,
                    "body" => $package->body,

                    "who_should_consider_it" => $package->packageDescription->Who_should_consider_it ?? null,
                    "what_it_helps_with" => $package->packageDescription->What_it_helps_with ?? null,
                    "how_often_to_repeat" => $package->packageDescription->How_often_to_repeat ?? null,

                    "tests" => $testData
                ];
            }

            return response()->json([
                "success" => true,
                "data" => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "error" => $th->getMessage()
            ]);
        }
    }

    public function packageTestlist(Request $request)
    {
        try {

            $PackageMaster = PackageMaster::orderBy('id', 'desc')->get()->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'slugname'  => $item->slugname,

                ];
            });

            $TestMaster = TestMaster::orderBy('id', 'desc')->get()->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                ];
            });

            return response()->json([
                'message' => 'Data fetched successfully...',
                'success' => true,
                'data' => [
                    'Package' => $PackageMaster,
                    'Test'      => $TestMaster
                ]
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function RightHealthpackagelist(Request $request)
    {
        try {

            $specialties = Specialty::orderBy('id', 'desc')->get()->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => $item->image ? asset('uploads/Specialty/' . $item->image) : null,
                ];
            });

            $habits = Habit::orderBy('id', 'desc')->get()->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => $item->image ? asset('uploads/Habit/' . $item->image) : null,
                ];
            });

            $symptoms = Symptom::orderBy('id', 'desc')->get()->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => $item->image ? asset('uploads/Symptom/' . $item->image) : null,
                ];
            });

            $risks = Risk::orderBy('id', 'desc')->get()->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => $item->image ? asset('uploads/Risk/' . $item->image) : null,
                ];
            });

            return response()->json([
                'message' => 'Data fetched successfully...',
                'success' => true,
                'data' => [
                    'specialties' => $specialties,
                    'habits'      => $habits,
                    'symptoms'    => $symptoms,
                    'risks'       => $risks,
                ]
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function ContactUs_inquiry(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required',
                'mobile' => 'required|digits:10',
                'department' => 'required',
                'email' => 'required',
                'message' => 'nullable',
            ]);
            $Customerdata = [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'department' => $request->department,
                'email' => $request->email,
                'message' => $request->message ?? '',
                'created_at' => now(),
            ];

            $ContactUsInquiry = ContactUsInquiry::create($Customerdata);
            $sendEmailDetails = DB::table('sendemaildetails')->where(['id' => 4])->first();
            if (!$sendEmailDetails) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email configuration not found.'
                ], 404);
            }
            $msg = [
                'FromMail' => $sendEmailDetails->strFromMail,
                'Title' => $sendEmailDetails->strTitle,
                'ToEmail' => 'ai.dev.laravel10@gmail.com',
                'Subject' => $sendEmailDetails->strSubject ?? '',
            ];
            $data = [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'department' => $request->department,
                'email' => $request->email,
                'message' => $request->message ?? '',
            ];
            Mail::send('emails.contactusmail', ['data' => $data], function ($message) use ($msg) {
                $message->from($msg['FromMail'], $msg['Title']);
                $message->to($msg['ToEmail'])->subject($msg['Subject']);
            });
            Mail::send('emails.patient_thankyou', ['data' => $data], function ($message) use ($data, $sendEmailDetails) {
                $message->from($sendEmailDetails->strFromMail, $sendEmailDetails->strTitle);
                $message->to($data['email'])->subject('Thank You For Contacting Us');
            });
            DB::commit();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Inquiry Add Successfully.',
                ],
                200,
            );
        } catch (ValidationException $e) {
            DB::rollBack();
            // Format validation errors as a single string
            $errorMessage = implode(', ', Arr::flatten($e->errors()));

            return response()->json(
                [
                    'success' => false,
                    'message' => $errorMessage,
                ],
                422,
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(
                [
                    'success' => false,
                    'error' => $th->getMessage(),
                ],
                500,
            );
        }
    }

    public function Package_Test_inquiry(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'whatsapp_no' => 'required',
                'email' => 'required',
                'query' => 'nullable',
                'type' => 'nullable',
            ]);
            $PackageTestdata = [
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'whatsapp' => $request->input('whatsapp_no'),
                'email' => $request->input('email'),
                'query' => $request->input('query'),
                'type' => $request->input('type') ?? '',
                'created_at' => now(),
            ];
            $PackageInquiry = PackageInquiry::create($PackageTestdata);
            $sendEmailDetails = DB::table('sendemaildetails')->where(['id' => 4])->first();
            if (!$sendEmailDetails) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email configuration not found.'
                ], 404);
            }
            $msg = [
                'FromMail' => $sendEmailDetails->strFromMail,
                'Title' => $sendEmailDetails->strTitle,
                'ToEmail' => 'ai.dev.laravel10@gmail.com',
                'Subject' => $sendEmailDetails->strSubject ?? '',
            ];
            $data = [
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'whatsapp' => $request->input('whatsapp_no'),
                'email' => $request->input('email'),
                'query' => $request->input('query'),
                'type' => $request->input('type') ?? '',
            ];
            Mail::send('emails.PackageTestInquirymail', ['data' => $data], function ($message) use ($msg) {
                $message->from($msg['FromMail'], $msg['Title']);
                $message->to($msg['ToEmail'])->subject($msg['Subject']);
            });
            Mail::send('emails.Packagepatient_thankyou', ['data' => $data], function ($message) use ($data, $sendEmailDetails) {
                $message->from($sendEmailDetails->strFromMail, $sendEmailDetails->strTitle);
                $message->to($data['email'])->subject('Thank You For Contacting Us');
            });
            DB::commit();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Inquiry Add Successfully.',
                ],
                200,
            );
        } catch (ValidationException $e) {
            DB::rollBack();
            // Format validation errors as a single string
            $errorMessage = implode(', ', Arr::flatten($e->errors()));

            return response()->json(
                [
                    'success' => false,
                    'message' => $errorMessage,
                ],
                422,
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(
                [
                    'success' => false,
                    'error' => $th->getMessage(),
                ],
                500,
            );
        }
    }

    public function faqlist(Request $request)
    {
        try {
            $Faqs = Faq::orderby('faqid', 'desc')->get();
            $data = [];
            foreach ($Faqs as $Faq) {
                $data[]  = array(
                    "faqid" => $Faq->faqid,
                    "question" => $Faq->question,
                    "answer" => $Faq->answer,
                );
            }

            return response()->json([
                'message' => 'successfully Faqs fetched...',
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            // If there's an error, rollback any database transactions and return an error response.
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function testimoniallist(Request $request)
    {
        try {
            $Testimonial = Testimonial::orderby('id', 'desc')->get();
            $data = [];
            foreach ($Testimonial as $Test) {
                $data[]  = array(
                    "id" => $Test->id,
                    "name" => $Test->name,
                    "designation" => $Test->designation,
                    "city" => $Test->city,
                    "Title" => $Test->title,
                    "photo" => asset('uploads/testimonial/' . $Test->photo)
                );
            }

            return response()->json([
                'message' => 'successfully Testimonial fetched...',
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function Newseventlist(Request $request)
    {
        try {
            $NewsLetters = NewsLetters::orderby('id', 'desc')->get();
            $data = [];
            foreach ($NewsLetters as $News) {
                $data[]  = array(
                    "id" => $News->id,
                    "date" => $News->date,
                    "Title" => $News->title,
                    "image" => asset('uploads/NewsLetters/' . $News->image)
                );
            }

            return response()->json([
                'message' => 'successfully News Events fetched...',
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function testlist(Request $request)
    {
        try {

            $TestMaster = TestMaster::orderby('id', 'desc')->get();
            $data = [];
            foreach ($TestMaster as $Test) {
                $data[]  = array(
                    "id" => $Test->id,
                    "name" => $Test->name,
                    "title" => $Test->title,
                    "amount" => $Test->amount

                );
            }

            return response()->json([
                'message' => 'successfully Test fetched...',
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function blogs(Request $request)
    {
        try {
            $request->validate([
                'flag' => 'nullable',
            ]);
            if ($request->flag) {
                $blogs = Blog::orderBy('blogId', 'desc')->take(3)->get();
            } else {

                $blogs = Blog::orderBy('blogId', 'desc')->get();
            }

            $data = [];
            foreach ($blogs as $ourTeam) {
                $data[]  = array(
                    "blogId" => $ourTeam->blogId,
                    "blogTitle" => $ourTeam->strTitle,
                    "slugname" => $ourTeam->strSlug,
                    "blogDescription" => $ourTeam->strDescription,
                    "date" => $ourTeam->date,
                    "blogImage" => asset('uploads/Blog/' . $ourTeam->strPhoto)
                );
            }


            return response()->json([
                'message' => 'successfully blogs fetched...',
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            // If there's an error, rollback any database transactions and return an error response.
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function seo(Request $request)
    {
        try {
            $request->validate([
                'slug' => 'required',
            ]);

            $MetaData = MetaData::where('slugname', $request->slug)->first();

            return response()->json([
                'message' => 'successfully MetaData fetched...',
                'success' => true,
                'data' => $MetaData,
            ], 200);
        } catch (\Throwable $th) {
            // If there's an error, rollback any database transactions and return an error response.
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function blog_details(Request $request)
    {
        try {

            $request->validate(
                [
                    'slugname' => 'required'
                ]
            );

            $blog = Blog::where(['isDelete' => 0, 'iStatus' => 1, 'strSlug' => $request->slugname])->first();

            $data = array(
                "blogId" => $blog->blogId,
                "blogTitle" => $blog->strTitle,
                "slugname" => $blog->strSlug,
                "blogDescription" => $blog->strDescription,
                "date" => $blog->date,
                "metaTitle" => $blog->metaTitle,
                "metaKeyword" => $blog->metaKeyword,
                "metaDescription" => $blog->metaDescription,
                "head" => $blog->head,
                "body" => $blog->body,
                "blogImage" => asset('uploads/Blog/' . $blog->strPhoto)
            );

            // ============================
            // Related Blogs
            // ============================
            $relatedBlogs = Blog::where('isDelete', 0)
                ->where('iStatus', 1)
                ->where('blogId', '!=', $blog->blogId)
                ->orderBy('blogId', 'desc')
                ->take(3)
                ->get();

            $relatedData = [];

            foreach ($relatedBlogs as $rel) {
                $relatedData[] = [
                    "blogId" => $rel->blogId,
                    "blogTitle" => $rel->strTitle,
                    "slugname" => $rel->strSlug,
                    "blogDescription" => $rel->strDescription,
                    "date" => $rel->date,
                    "metaTitle" => $rel->metaTitle,
                    "metaKeyword" => $rel->metaKeyword,
                    "metaDescription" => $rel->metaDescription,
                    "head" => $rel->head,
                    "body" => $rel->body,
                    "blogImage" => asset('uploads/Blog/' . $rel->strPhoto)
                ];
            }

            return response()->json([
                'message' => 'successfully blog detail fetched...',
                'success' => true,
                'data' => $data,
                'related_blogs' => $relatedData
            ], 200);
        } catch (\Throwable $th) {
            // If there's an error, rollback any database transactions and return an error response.
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
