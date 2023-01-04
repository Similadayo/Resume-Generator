<?php

namespace App\Http\Controllers;

use App\Models\educations;
use App\Models\experiences;
use App\Models\resume;
use App\Models\skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = resume::all();
        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resumes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resume = Resume::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    
        // Create education entries for the resume
        foreach ($request->education as $education) {
            $education = educations::create([
                'resume_id' => $resume->id,
                'school' => $education['school'],
                'degree' => $education['degree'],
                'field_of_study' => $education['field_of_study'],
                'start_date' => $education['start_date'],
                'end_date' => $education['end_date'],
            ]);
        }
    
        // Create experience entries for the resume
        foreach ($request->experience as $experience) {
            $experience = experiences::create([
                'resume_id' => $resume->id,
                'company' => $experience['company'],
                'position' => $experience['position'],
                'start_date' => $experience['start_date'],
                'end_date' => $experience['end_date'],
                'description' => $experience['description'],
            ]);
        }
    
        // Create skill entries for the resume
        foreach ($request->skills as $skill) {
            $skill = skills::create([
                'resume_id' => $resume->id,
                'name' => $skill['name'],
                'level' => $skill['level'],
            ]);
        }
    
        // Redirect to the show view
        return redirect()->route('resumes.show', $resume->id);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
