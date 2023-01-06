@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Resume</div>

                <div class="card-body">
                    <form method="POST" id="resume-form" action="">
                        @csrf

                        <div class="form-group p-2 m-2 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2 m-2 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2 m-2 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2 m-2 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div id="education-container">
                                <div id="education-template" class="education-form mt-5">
                                    <h3 class="text-center mb-4">Education</h3>
                                    <div class="form-group row mb-4">
                                        <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
                                        <div class="col-md-6">
                                            <input type="text" id="school" class="form-control @error('school') is-invalid @enderror" name="education[0][school]" value="{{ old('education.school') }}" required autocomplete="school">
                                            @error('education.school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="degree" class="col-md-4 col-form-label text-md-right">Degree</label>
                                        <div class="col-md-6">
                                            <input type="text" id="degree" class="form-control @error('degree') is-invalid @enderror" name="education[0][degree]" value="{{ old('education.degree') }}" required autocomplete="degree">
                                            @error('education.degree')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="field_of_study" class="col-md-4 col-form-label text-md-right">Field of Study</label>
                                        <div class="col-md-6">
                                            <input type="text" id="field_of_study" class="form-control @error('field_of_study') is-invalid @enderror" name="education[0][field_of_study]" value="{{ old('education.field_of_study') }}" required autocomplete="field_of_study">
                                            @error('education.field_of_study')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                        <div class="col-md-6">
                                            <input type="date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" name="education[0][start_date]" value="{{ old('education.start_date') }}" required autocomplete="start_date">
                                            @error('education.start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-8 mt-3 pt-3">
                                            <button class="btn btn-primary float-end" id="add-experience-button" onclick="addEducation(event)">
                                                <i class="fas fa-plus"></i> Add Education
                                            </button>
                                        </div>
                                    </div>
                                    <div class="education-container"></div>
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="experience-container">
                                    <div class="experience-form mt-5" id="experience-template">
                                        <h3 class="text-center mb-4">Experience</h3>
                                        <div class="form-group row mb-4">
                                            <label for="company" class="col-md-4 col-form-label text-md-right">Comapny</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company" class="form-control @error('company') is-invalid @enderror" name="experience[0][company]" value="{{ old('experience.company') }}" required autocomplete="company">
                                                @error('experience.company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                            <div class="col-md-6">
                                                <input type="text" id="position" class="form-control @error('position') is-invalid @enderror" name="experience[0][position]" value="{{ old('experience.position') }}" required autocomplete="position">
                                                @error('experience.position')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                            <div class="col-md-6">
                                                <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="experience[0][description]" value="{{ old('experience.description') }}" required autocomplete="description" cols="25" rows="10"></textarea>
                                                @error('experience.description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 p-2">
                                            <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                            <div class="col-md-6">
                                                <input type="date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" name="experience[0][start_date]" value="{{ old('experience.start_date') }}" required autocomplete="start_date">
                                                @error('experience.start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row mt-4 p-2">
                                                <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                                <div class="col-md-6">
                                                    <input type="date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" name="experience[end_date][]" value="{{ old('experience.end_date') }}" autocomplete="end_date">
                                                    @error('experience.end_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-3 pt-3">
                                                <button class="btn btn-primary" id="add-experience-button" onclick="addExperience(event)">
                                                    <i class="fas fa-plus"></i> Add Experience
                                                </button>
                                            </div>
                                        </div>
                                        <div class="experience-container"></div>
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="skill-container">
                                    <div class="skill-form mt-5" id="skill-template">
                                        <h3 class="text-center mb-4">Skills</h3>
                                        <div class="form-group row mb-4">
                                            <label for="company" class="col-md-4 col-form-label text-md-right">Skill</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company" class="form-control @error('name') is-invalid @enderror" name="skill[0][name]" value="{{ old('skill.name') }}" required autocomplete="company">
                                                @error('skill.company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                            <div class="col-md-6">
                                                <input type="number" id="level" class="form-control @error('position') is-invalid @enderror" name="skill[0][level]" value="{{ old('skill.level') }}" required autocomplete="position">
                                                @error('skill.level')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-8 mt-3 pt-3">
                                                <button class="btn btn-primary" id="add-skill-button" onclick="addSkill(event)">
                                                    <i class="fas fa-plus"></i> Add Skill
                                                </button>
                                            </div>
                                        </div>
                                        <div class="skill-container"></div>
                                        @error('skill')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create Resume') }}
                                        </button>
                                    </div>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>