@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        @if($errors->all())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                              </div>
                            @endforeach
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="genre"
                                      id="genre"
                                      value="male"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1"> Masculino </label>
                                  </div>

                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="genre"
                                      id="genre"
                                      value="female"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1"> Feminino </label>
                                  </div>

                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="genre"
                                      id="genre"
                                      value="other"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1"> Outro </label>
                                  </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <input type="text" class="form-control" id="phone" name="phone" placeholder="(99) 9999-9999" required="required" value="{{ old('phone') }}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Genre" class="col-md-4 col-form-label text-md-right">{{ __('Situation') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="situation"
                                      id="situation"
                                      value="t"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1"> Ativo </label>
                                  </div>

                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="situation"
                                      id="situation"
                                      value="f"
                                    />
                                    <label class="form-check-label" for="flexRadioDefault1"> Inativo </label>
                                  </div>

                            </div>
                        </div>


                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
