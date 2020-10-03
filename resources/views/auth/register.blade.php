@extends('layouts.app')

@section('content')
<form method="POST" id="regForm" action="{{ route('register') }}">
@csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card tab">
                    <div class="card-header">Step 1 - Personal Information</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">Nickname</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">Sex</label>

                            <div class="col-md-2">
                                <input id="sex" type="radio" name="sex" value="Male"> 
                                <label class="col-form-label text-md-right">Male</label>
                            </div>
                            <div class="col-md-2">
                                <input id="sex" type="radio" name="sex" value="Female">
                                <label class="col-form-label text-md-right">Female</label>
                            </div>

                            @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary float-right next-btn">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card tab">
                    <div class="card-header">Step 2 - Determining Chronotype</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="chronotype" type="radio" name="chronotype" value="Lion"> 
                                <label class="col-form-label text-md-right">Lion</label>
                            </div>
                            <div class="col-md-6">
                                <input id="chronotype" type="radio" name="chronotype" value="Bear">
                                <label class="col-form-label text-md-right">Bear</label>
                            </div>
                            <div class="col-md-6">
                                <input id="chronotype" type="radio" name="chronotype" value="Wolf">
                                <label class="col-form-label text-md-right">Wolf</label>
                            </div>
                            <div class="col-md-6">
                                <input id="chronotype" type="radio" name="chronotype" value="Dolphin">
                                <label class="col-form-label text-md-right">Dolphin</label>
                            </div>

                            @error('chronotype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <a href="#">Know your Chronotype</a>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary float-right next-btn">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card tab">
                    <div class="card-header">Step 3 - Nutrition</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="diet" type="radio" name="diet" value="Normal Diet"> 
                                <label class="col-form-label text-md-right">Normal Diet</label>
                            </div>
                            <div class="col-md-6">
                                <input id="diet" type="radio" name="diet" value="Vegetarian">
                                <label class="col-form-label text-md-right">Vegetarian</label>
                            </div>
                            <div class="col-md-6">
                                <input id="diet" type="radio" name="diet" value="Pescatarian">
                                <label class="col-form-label text-md-right">Pescatarian</label>
                            </div>
                            @error('diet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary float-right next-btn">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card tab">
                    <div class="card-header">Step 4 - Fitness</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">Weight (in kilograms)</label>
                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">Height (in centimeters)</label>
                            <div class="col-md-6">
                                <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" autofocus>
                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary float-right next-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
