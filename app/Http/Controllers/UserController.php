<?php

namespace App\Http\Controllers;

use App\Http\Requests\Home\UserStoreRequest;
use App\Jobs\SendEmailApplyJob;
use App\Models\Apply;
use App\Models\Job;
use App\Models\ProgramStudy;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserProfile;
use App\Models\UserWorkExperience;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Indonesia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user            = Auth::user() ?? null;
        $user            = User::findOrFail($user->id ?? null);
        $cities          = Indonesia::allCities()->pluck('name', 'id')->sortBy('name');
        $districts       = Indonesia::allDistricts()->sortBy('name')->pluck('name', 'id');
        $program_studies = ProgramStudy::pluck('name', 'id');

        return view('user.index', compact('user', 'cities', 'districts', 'program_studies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function store(Request $request)
    {
        $user         = Auth::user();
        $user_profile = $user->profile;

        // Store User
        $user->name = $request->input('name');
        $user->save();

        // Store User Profile
        $user_profile->birth_place_id    = $request->input('birth_place');
        $user_profile->religion_id       = $request->input('religion');
        $user_profile->marital_status_id = $request->input('marital_status');
        $user_profile->no_identity       = $request->input('no_identity');
        $user_profile->birth_date        = $request->input('birth_date');
        $user_profile->gender            = $request->input('gender');
        $user_profile->gender            = $request->input('gender');
        $user_profile->current_address   = $request->input('current_address');
        $user_profile->address           = $request->input('address');
        $user_profile->save();

        // Store User Education
        UserEducation::whereUserId($user->id)
            ->whereNotIn('id', array_filter($request->input('education_id')))
            ->delete();
        for ($i = 0; $i < count($request->input('education')); $i++) {
            $school_name    = $request->input('school_name')[$i];
            $degree         = $request->input('education')[$i];
            $program_study  = $request->input('program_study')[$i];
            $gpa            = $request->input('gpa')[$i];
            $education_city = $request->input('education_city')[$i];
            $graduation     = $request->input('graduation')[$i];
            $entry          = $request->input('entry')[$i];

            $profile_id     = $request->input('education_id')[$i];
            $user_education = UserEducation::find($profile_id);

            if (!empty($school_name) && !empty($degree) && !empty($program_study) && !empty($gpa) && !empty($education_city) && !empty($graduation) && !empty($entry)) {
                if (empty($user_education)) { $user_education = new UserEducation(); }
                $user_education->school_name      = $school_name;
                $user_education->degree_id        = $degree;
                $user_education->program_study_id = $program_study;
                $user_education->gpa              = $gpa;
                $user_education->city_id          = $education_city;
                $user_education->graduation       = $graduation;
                $user_education->entry            = $entry;
                $user_education->user()->associate($user);
                $user_education->save();
            }
        }


        // Store User Work Experience
        UserWorkExperience::whereUserId($user->id)
            ->whereNotIn('id', array_filter($request->input('work_experience_id')))
            ->delete();
        for ($i = 0; $i < count($request->input('work_experience_id')); $i++) {
            $company         = $request->input('company')[$i];
            $industry        = $request->input('industry')[$i];
            $title           = $request->input('title')[$i];
            $job_description = $request->input('job_description')[$i];
            $join            = $request->input('join')[$i];
            $out             = $request->input('out')[$i];

            $user_work_experience_id = $request->input('work_experience_id')[$i];
            $work_experience = UserWorkExperience::find($user_work_experience_id);

            if (!empty($company) && !empty($industry) && !empty($title) && !empty($job_description) && !empty($join) && !empty($out)) {
                if (empty($work_experience)) { $work_experience = new UserWorkExperience(); }
                $work_experience->company = $company;
                $work_experience->industry = $industry;
                $work_experience->title = $title;
                $work_experience->description = $job_description;
                $work_experience->join = $join;
                $work_experience->out = $out;
                $work_experience->user()->associate($user);
                $work_experience->save();
            }
        }

        return redirect()->route('user.index')->with('alert', [
            'alert' => 'success',
            'message' => 'User Data Successfully Update!'
        ]);
    }

    public function apply(Request $request)
    {
        $job          = Job::findOrFail($request->input('job_id'));
        $user         = Auth::user();
        $user_profile = $user->profile;
        $validation   = true;

        $apply = Apply::whereUserId($user->id)->whereJobId($job->id)->first();
        if (!empty($apply)) {
            return redirect()->back()->with('alert', [
                'alert' => 'error',
                'message' => 'kamu sudah melamar pekerjaan ini!'
            ]);
        }

        if (empty($user_profile->birth_place_id)) {
            $validation = false;
        } elseif (empty($user_profile->religion_id)) {
            $validation = false;
        } elseif (empty($user_profile->marital_status_id)) {
            $validation = false;
        } elseif (empty($user_profile->no_identity)) {
            $validation = false;
        } elseif (empty($user_profile->birth_date)) {
            $validation = false;
        } elseif (empty($user_profile->gender)) {
            $validation = false;
        } elseif (empty($user_profile->current_address)) {
            $validation = false;
        } elseif (empty($user_profile->address)) {
            $validation = false;
        }

        if (!$validation) {
            return redirect()->back()->with('alert', [
                'alert' => 'error',
                'message' => 'Please Complete Data Profile!'
            ]);
        }

        $this->applyJob($job, $user);

        return redirect()->route('home')->with('alert', [
            'alert' => 'success',
            'message' => 'Successfully Applied Job!'
        ]);
    }

    private function applyJob(Job $job, User $user)
    {
        $user_profile         = $user->profile;
        $user_education       = $user->educations()->latestEducation()->first();
        $user_experiences     = $user->workExperiences;
        $user_work_experience = 0;

        $score_degree     = 0;
        $score_education  = 0;
        $score_experience = 0;
        $score_age        = 0;
        $status           = false;

        // Condition Degree
        if ($user_education->degree_id == $job->education_id) {
            $score_degree = 1;
        }

        // Condition Education
        if ($user_education->program_study_id == $job->program_study_id) {
            $score_education = 1;
        }

        // Condition Experience
        $experience = $job->experience;
        foreach ($user_experiences as $user_experience) {
            $in  = Carbon::parse($user_experience->join);
            $out = Carbon::parse($user_experience->out);
            $year_experience = $in->diff($out)->y;
            $user_work_experience += $year_experience;
        }

        if ($user_work_experience <= $experience->minimum_experience_of_year && $user_work_experience <= $experience->maximum_experience_of_year) {
            $score_experience = 1;
        }

        // Condition Age
        $user_age = Carbon::parse($user_profile->birth_date)->diff(Carbon::now())->y;
        if ($user_age <= $job->minimum_age && $user_age >= $job->maximum_age) {
            $score_age = 1;
        }

        $user_score = $score_degree + $score_education + $score_experience + $score_age;

        if ($user_score >= 3) {
            $status = true;
        }

        $apply = new Apply();
        $apply->user_id          = $user->id;
        $apply->job_id           = $job->id;
        $apply->score_degree     = $score_degree;
        $apply->score_education  = $score_education;
        $apply->score_experience = $score_experience;
        $apply->score_age        = $score_age;
        $apply->status           = $status;
        $apply->save();

        SendEmailApplyJob::dispatch($job, $user)->delay(90);
    }
}
