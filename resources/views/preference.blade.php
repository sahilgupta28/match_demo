@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Preference') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('preference.update') }}" class="multi-range-field">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="annual_income" class="col-md-4 col-form-label text-md-right">{{ __('Min Annual Income') }}</label>

                            <div class="col-md-6">
                                <input id="annual_income" type="number" class="form-control @error('annual_income[0]') is-invalid @enderror" name="annual_income[0]" value="{{ old('annual_income[0]', !empty($data['annual_income']) ? $data['annual_income'][0] : null ) }}" required autocomplete="annual_income" autofocus>
                                @error('annual_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="annual_income1" class="col-md-4 col-form-label text-md-right">{{ __('Max Annual Income') }}</label>

                            <div class="col-md-6">
                                <input id="annual_income1" type="number" class="form-control @error('annual_income') is-invalid @enderror" name="annual_income[]" value="{{ old('annual_income', !empty($data['annual_income']) ? $data['annual_income'][1] : null) }}" required autocomplete="annual_income" autofocus>
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
                                <select id="occupation" class="form-control" name='occupation[]' multiple>
                                    <option value={{ config('constants.OCCUPATION.PRIVATE_JOB') }} @if(!empty($data['occupation']) && in_array(config('constants.OCCUPATION.PRIVATE_JOB'), $data['occupation'])) selected @endif>Private Job</option>
                                    <option value={{ config('constants.OCCUPATION.GOVERNMENT_JOB') }} @if(!empty($data['occupation']) && in_array(config('constants.OCCUPATION.GOVERNMENT_JOB'), $data['occupation'])) selected @endif>Government Job</option>
                                    <option value={{ config('constants.OCCUPATION.BUSINESS') }} @if(!empty($data['occupation']) && in_array(config('constants.OCCUPATION.BUSINESS'), $data['occupation'])) selected @endif>Business</option>
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
                                <select id="family_type" class="form-control" name="family_type[]" multiple>
                                    <option value={{ config('constants.FAMILY_TYPE.JOINT') }} @if(!empty($data['family_type']) && in_array(config('constants.FAMILY_TYPE.JOINT'), $data['family_type'])) selected @endif>Joint family</option>
                                    <option value={{ config('constants.FAMILY_TYPE.NUCLEAR') }} @if(!empty($data['family_type']) && in_array(config('constants.FAMILY_TYPE.NUCLEAR'), $data['family_type']))  selected @endif>Nuclear family</option>
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
                                <select id="manglik" class="form-control" name='manglik[]' multiple>
                                    <option value={{ config('constants.MANGLIK.YES') }} @if(!empty($data['manglik']) && in_array(config('constants.MANGLIK.YES'), $data['manglik'])) selected @endif>Yes</option>
                                    <option value={{ config('constants.MANGLIK.NO') }} @if(!empty($data['manglik']) && in_array(config('constants.MANGLIK.NO'), $data['manglik'])) selected @endif>No</option>
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
