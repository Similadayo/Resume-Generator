@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Resume</div>

                <div class="card-body">
                    <form method="POST" action="">
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

                            <div class="education-form mt-5">
                                <h3 class="text-center mb-4">Education</h3>
                                <div class="form-group row mb-4">
                                    <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
                                    <div class="col-md-6">
                                        <input type="text" id="school" class="form-control @error('school') is-invalid @enderror" name="education[school]" value="{{ old('education.school') }}" required autocomplete="school">
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
                                        <input type="text" id="degree" class="form-control @error('degree') is-invalid @enderror" name="education[degree]" value="{{ old('education.degree') }}" required autocomplete="degree">
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
                                        <input type="text" id="field_of_study" class="form-control @error('field_of_study') is-invalid @enderror" name="education[field_of_study]" value="{{ old('education.field_of_study') }}" required autocomplete="field_of_study">
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
                                        <input type="date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" name="education[start_date]" value="{{ old('education.start_date') }}" required autocomplete="start_date">
                                        @error('education.start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group experience-form row">
                                    <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>
                                    <div class="col-md-6">
                                        <div class="form-row align-items-center">
                                            <div class="col-auto">
                                                <input type="text" name="experience[title][]" class="form-control mb-2" placeholder="Title">
                                                <input type="text" name="experience[company][]" class="form-control mb-2" placeholder="Company">
                                                <input type="text" name="experience[location][]" class="form-control mb-2" placeholder="Location">
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" name="experience[start_date][]" class="form-control mb-2" placeholder="Start Date">
                                                <input type="text" name="experience[end_date][]" class="form-control mb-2" placeholder="End Date">
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-primary mb-2 add-experience">
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