<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;




class InstructorController extends Controller
{

    public function my_courses()
    {
        $course  = Course::join('users', 'courses.user_id', '=', 'users.id')
            ->with('category')
            ->where('courses.user_id', Auth::id())
            ->get();
        return view('instructor.my-courses', compact('course'));
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {

            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'language' => 'required',
                'description' => 'required',
                'banner' => 'required',
            ]);

            Course::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'language' => $request->language,
                'title' => $request->title,
                'description' => $request->description,
                'banner' => $request->file('banner')->store('image', 'public'),
            ]);
            $course = Course::latest('created_at')->first(); // Get the latest created course
            $course->slug = Str::slug($request->title) . '-' . substr($course->id, 0, 10);;
            $course->save();

            return redirect()->route('dashboard')->with('success', 'Course Created Successfuly');
        } else {
            $category  = Category::all();
            return view('instructor.course-form', compact('category'));
        }
    }


    public function course($slug)
    {
        $course = Course::join('users', 'courses.user_id', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->where('courses.slug', $slug)
            ->select('courses.id', 'courses.title', 'courses.description', 'categories.name AS category_name', 'courses.banner', 'courses.slug' , 'courses.language', 'courses.created_at', 'courses.updated_at', 'users.name')
            ->first();
        $video = Video::where('course_id', $course->id)->get();
        return view('instructor.course', compact('course', 'video'));
    }


    public function apply_store(Request $request, $id)
    {
        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required',
                'expertise' => 'required',
                'profile' => 'required',
                'biography' => 'required',
            ]);

            Applicant::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'expertise' => $request->expertise,
                'profile' => $request->file('profile')->store('image', 'public'),
                'biography' => $request->biography,
            ]);
            // $course = Course::latest('created_at')->first(); // Get the latest created course
            // $course->slug = Str::slug($request->title) . '-' . substr($course->id, 0, 10);;
            // $course->save();

            return redirect()->route('dashboard')->with('success', 'Applied Successfuly');
        } else {
            $category  = Category::all();
            return view('instructor.apply-form', compact('category',));
        }
    }


    public function edit(Request $request, $slug)
    {

        if ($request->method() == 'PUT') {
            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'language' => 'required',
                'description' => 'required',
            ]);

            $course = Course::where('slug', $slug)->first();
            if ($request->hasFile('banner')) {
                Storage::delete($course->banner);
                $course->banner = $request->file('banner')->store('image', 'public');
            }

            Course::where('slug', $slug)->update([
                'category_id' => $request->category,
                'language' => $request->language,
                'title' => $request->title,
                'description' => $request->description,
                'banner' => $course->banner,
            ]);

            $course = Course::latest('updated_at')->first(); // Get the latest created course
            $course->slug = Str::slug($request->title) . '-' . substr($course->id, 0, 10);;
            $course->save();

            return redirect(route('course', ['slug' => $course->slug]))->with('success', 'Course Updated Successfuly');
        } else {

            $course  = Course::where('slug', $slug)->first();
            $category  = Category::all();
            return view('instructor.course-form', compact('category', 'course'));
        }
    }


    public function destroy($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course->image) {
            Storage::delete($course->image);
        }
        $course->delete();
        return redirect()->route('dashboard')->with('success', 'Course Deleted Successfuly');;
    }


    // VIDEO
    public function store_vid(Request $request, $id)
    {
        if ($request->method() == 'POST') {

            $request->validate([
                'title' => 'required',
                'url' => 'required',
            ]);
            Video::create([
                'course_id' => $id,
                'title' => $request->title,
                'url' => $request->url,
            ]);

            $video = Video::latest('created_at')->first(); // Get the latest created video
            $video->slug = Str::slug($request->title) . '-' . substr($video->id, 0, 10);;
            $video->save();
            $redirect = Course::where('id', $video->course_id)->first();

            return redirect(route('course', ['slug' => $redirect->slug]))->with('success', 'Video Created Successfuly');;
        } else {
            return view('instructor.video-form');
        }
    }


    public function video($slug)
    {
        $video = Video::where('slug', $slug)->first();
        $videos = Video::where('course_id', $video->course_id)->get();
        return view('instructor.video', compact('video', 'videos'));
    }


    public function edit_vid(Request $request, $slug)
    {
        if ($request->method() == 'PUT') {

            $request->validate([
                'title' => 'required',
                'url' => 'required',
            ]);

            Video::where('slug', $slug)->update([
                'title' => $request->title,
                'url' => $request->url,
            ]);

            $video = Video::latest('updated_at')->first(); // Get the latest updated video
            $video->slug = Str::slug($request->title) . '-' . substr($video->id, 0, 10);;
            $video->save();
            $redirect = Course::where('id', $video->course_id)->first();

            return redirect(route('course', ['slug' => $redirect->slug]))->with('success', 'Video Updated Successfuly');;
        } else {
            $video  = Video::where('slug', $slug)->first();
            return view('instructor.video-form', compact('video'));
        }
    }


    public function destroy_vid($slug)
    {
        $video = Video::where('slug', $slug)->first();
        $video->delete();
        return redirect()->back()->with('success', 'Video Deleted Successfuly');;
    }


    public function enrolled_courses(){
        $enrolled = Enrollment::with('user','course')
        ->where('user_id', Auth::id())
        ->get();

        return view('instructor.enrollments', compact('enrolled'));
    }
}
