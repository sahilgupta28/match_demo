@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', Auth::user()->first_name) }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob', Auth::user()->dob) }}" required autocomplete="dob" autofocus>
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="{{ config('constants.GENDER.MALE') }}" @if(auth()->user()->gender == config('constants.GENDER.MALE')) checked @endif>
                                <label class="form-check-label" for="gender1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="{{ config('constants.GENDER.FEMALE') }}" @if(auth()->user()->gender == config('constants.GENDER.FEMALE')) checked @endif>
                                <label class="form-check-label" for="gender2">
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="annual_income" class="col-md-4 col-form-label text-md-right">{{ __('annual income') }}</label>

                            <div class="col-md-6">
                                <input id="annual_income" type="number" class="form-control @error('annual_income') is-invalid @enderror" name="annual_income" value="{{ old('annual_income', Auth::user()->annual_income) }}" required autocomplete="annual_income" autofocus>
                                @error('annual_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>
                            <div class="col-md-6">
                                <select id="occupation" class="form-control" name='occupation'>
                                    <option value={{ config('constants.OCCUPATION.PRIVATE_JOB') }} @if(auth()->user()->occupation == config('constants.OCCUPATION.PRIVATE_JOB')) selected @endif>Private Job</option>
                                    <option value={{ config('constants.OCCUPATION.GOVERNMENT_JOB') }} @if(auth()->user()->occupation == config('constants.OCCUPATION.GOVERNMENT_JOB')) selected @endif>Government Job</option>
                                    <option value={{ config('constants.OCCUPATION.BUSINESS') }} @if(auth()->user()->occupation == config('constants.OCCUPATION.BUSINESS')) selected @endif>Business</option>
                                </select>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="family_type" class="col-md-4 col-form-label text-md-right">{{ __('FAMILY TYPE') }}</label>

                            <div class="col-md-6">
                                <select id="family_type" class="form-control" name="family_type">
                                    <option value={{ config('constants.FAMILY_TYPE.JOINT') }} @if(auth()->user()->family_type == config('constants.FAMILY_TYPE.JOINT')) selected @endif>Joint family</option>
                                    <option value={{ config('constants.FAMILY_TYPE.NUCLEAR') }} @if(auth()->user()->family_type == config('constants.FAMILY_TYPE.NUCLEAR')) selected @endif>Nuclear family</option>
                                </select>

                                @error('family_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="manglik" class="col-md-4 col-form-label text-md-right">{{ __('Manglik') }}</label>

                            <div class="col-md-6">
                                <select id="manglik" class="form-control" name='manglik'>
                                    <option value={{ config('constants.MANGLIK.YES') }} @if(auth()->user()->manglik == config('constants.MANGLIK.YES')) selected @endif>Yes</option>
                                    <option value={{ config('constants.MANGLIK.NO') }} @if(auth()->user()->manglik == config('constants.MANGLIK.NO')) selected @endif>No</option>
                                </select>

                                @error('manglik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
