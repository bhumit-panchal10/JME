<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\OurClient;
use App\Models\Service;
use App\Models\VideoGallery;
use App\Models\PhotoGallery;
use App\Models\Inquiry;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{

    public function index(Request $request)
    {
        try {
            $categories = Category::with('services')
                ->orderBy('id', 'asc')
                ->take(5)
                ->get();
            $blogs = Blog::with('category')
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();
            $ourclients = OurClient::get();
            return view('frontview.index', compact('categories', 'blogs', 'ourclients'));
        } catch (\Throwable $th) {
            Log::error('Home Page Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);
            return redirect()->back()->withInput()->with('error', 'Failed to load homepage. Please try again.');
        }
    }

    public function about(Request $request)
    {
        try {
            return view('frontview.about');
        } catch (\Throwable $th) {
            Log::error('About Page Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);
            return redirect()->back()->withInput()->with('error', 'Failed to load about page.');
        }
    }

    public function photogallery(Request $request)
    {
        try {
            $photogallery = photogallery::latest('id')->paginate(8);
            return view('frontview.photo_gallery', compact('photogallery'));
        } catch (\Throwable $th) {
            Log::error('About Page Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);
            return redirect()->back()->withInput()->with('error', 'Failed to load about page.');
        }
    }

    public function videogallery(Request $request)
    {
        try {
            $video_gallery = videogallery::latest('id')->paginate(9);
            return view('frontview.video_gallery', compact('video_gallery'));
        } catch (\Throwable $th) {
            Log::error('About Page Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);
            return redirect()->back()->withInput()->with('error', 'Failed to load about page.');
        }
    }


    public function blog(Request $request)
    {
        //$seo = MetaData::where('id', '=', '2')->first();
        $blogs = Blog::orderBy('id', 'asc')
            ->paginate();

        return view('frontview.blog', compact('blogs'));
    }

    public function blog_detail(Request $request, $slugname)
    {
        $Blog = Blog::with('service')->orderBy('id', 'asc')
            ->where(['slugname' => $slugname])
            ->first();

        $RecentBlog = Blog::orderBy('id', 'asc')
            ->where('slugname', '!=', $slugname)
            ->take(4)
            ->get();

        return view('frontview.blog_detail', compact('Blog', 'RecentBlog'));
    }

    public function contactus(Request $request)
    {
        try {
            return view('frontview.contact');
        } catch (\Throwable $th) {
            Log::error('Contact Page Load Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to load contact page. Please try again.');
        }
    }

    public function service(Request $request, $slugname = null)
    {
        try {
            if ($slugname) {
                $Category = Category::where('slugname', $slugname)->first();
                $Services = Service::where('category_id', $Category->id)->paginate();
            } else {
                $Services = Service::paginate();
            }
            return view('frontview.service', compact('Services', 'Category'));
        } catch (\Throwable $th) {
            Log::error('Contact Page Load Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to load contact page. Please try again.');
        }
    }

    public function servicedetail(Request $request, $slugname = null)
    {
        try {
            $service = \App\Models\Service::with('photoGalleries')
                ->where('slugname', $slugname)
                ->firstOrFail();
            $faqs = Faq::where('service_id', $service->id)->get();
            $blogs = Blog::where('service_id', $service->id)->get();
            $videos = VideoGallery::where('service_id', $service->id)->get();
            return view('frontview.service_detail', compact('service', 'faqs', 'blogs', 'videos'));
        } catch (\Throwable $th) {
            Log::error('Contact Page Load Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to load contact page. Please try again.');
        }
    }

     public function contact_us_store(Request $request)
    {
        // try {

        $request->validate(
            [
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'mobile' => 'required',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'captcha' => 'required'
            ],
            [
                'captcha.captcha' => 'Invalid captcha code.'
            ]
        );
        $data = array(
            'name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'comment' => $request->message,
            "strIp" => $request->ip(),
            "created_at" => now()
        );
        Inquiry::create($data);

        $SendEmailDetails = DB::table('sendemaildetails')->where(['id' => 1])->first();
        if ($SendEmailDetails) {
            $msg = [
                'FromMail' => $SendEmailDetails->strFromMail,
                'Title' => $SendEmailDetails->strTitle,
                'ToEmail' => $SendEmailDetails->ToMail,
                'Subject' => $SendEmailDetails->strSubject
            ];

            // ✅ Send email
           $mail =  Mail::send('emails.contactusmail', ['data' => $data], function ($message) use ($msg) {
                $message->from($msg['FromMail'], $msg['Title']);
                $message->to($msg['ToEmail'])->subject($msg['Subject']);
            });
        }

        return redirect()->route('thankyou');
        // } catch (\Throwable $th) {
        //     Log::error('Contact Form Submission Error: ' . $th->getMessage(), [
        //         'request_data' => $request->all(),
        //         'exception' => $th
        //     ]);

        //     return redirect()->back()
        //         ->withInput()
        //         ->with('error', 'Something went wrong while submitting the form. Please try again later.');
        // }
    }
    
     public function thankyou()
    {
        try {
            return view('thankyouPage');
        } catch (\Throwable $th) {
            Log::error('Contact Thank You Page Load Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to load the thank you page. Please try again.');
        }
    }

    public function contactthankyou()
    {
        try {
            return view('frontview.contactthankyou');
        } catch (\Throwable $th) {
            Log::error('Contact Thank You Page Load Error: ' . $th->getMessage(), [
                'exception' => $th
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to load the thank you page. Please try again.');
        }
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function cms_pages($slugname)
    {
        try {
            $datas = OtherPages::where(['iStatus' => 1, 'isDelete' => 0, 'slugname' => $slugname])->first();

            return view('frontview.cms_pages', compact('datas'));
        } catch (\Throwable $th) {
            Log::error('CMS Page Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Page not found or unavailable.');
        }
    }

    public function Frontlogout(Request $request)
    {
        try {
            $request->session()->forget(['customer_id']);

            return redirect()->route('front.index');
        } catch (\Throwable $th) {
            Log::error('Logout Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Failed to logout.');
        }
    }
}
