@extends('layouts.shop')

@section('content')
    <section class="wrapper bg-light">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container my-8">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('My Profile') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.updateProfile') }}">
                                @csrf
                                <div class="form-group my-2">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ auth()->user()->name }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="email">Email</label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ auth()->user()->email }}" required autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="phone_number">Phone Number</label>
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ auth()->user()->phone_number }}" required
                                        aria-describedby="textHelp">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary my-2">
                                    {{ __('Update Profile') }}
                                </button>
                            </form>
                        </div>
                        <div class="card-header">{{ __('My Address') }}</div>
                        <div class="card-body">
                            @if (auth()->user()->street_address)
                                <p class="text-success">Address is set to: {{ auth()->user()->street_address }},
                                    {{ auth()->user()->city }}, {{ auth()->user()->postal_code }}</p>
                            @else
                                <p class="text-warning">Address is not set yet.</p>
                            @endif

                            <form method="POST" action="{{ route('profile.updateAddress') }}">
                                @csrf
                                <div class="form-group my-2">
                                    <label for="street_address">Street Address</label>
                                    <input id="street_address" type="text"
                                        class="form-control @error('street_address') is-invalid @enderror"
                                        name="street_address"
                                        value="{{ old('street_address', auth()->user()->street_address) }}" required
                                        autofocus>

                                    @error('street_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="city">City</label>
                                    <select id="city" class="form-control @error('city') is-invalid @enderror"
                                        name="city" required>
                                        <option value="">Select City</option>
                                        <option value="Jakarta"
                                            {{ old('city', auth()->user()->city) === 'Jakarta' ? 'selected' : '' }}>Jakarta
                                        </option>
                                        <option value="Surabaya"
                                            {{ old('city', auth()->user()->city) === 'Surabaya' ? 'selected' : '' }}>
                                            Surabaya</option>
                                        <option value="Bandung"
                                            {{ old('city', auth()->user()->city) === 'Bandung' ? 'selected' : '' }}>Bandung
                                        </option>
                                        <option value="Denpasar"
                                            {{ old('city', auth()->user()->city) === 'Denpasar' ? 'selected' : '' }}>
                                            Denpasar</option>
                                        <option value="Medan"
                                            {{ old('city', auth()->user()->city) === 'Medan' ? 'selected' : '' }}>Medan
                                        </option>
                                        <option value="Palembang"
                                            {{ old('city', auth()->user()->city) === 'Palembang' ? 'selected' : '' }}>
                                            Palembang</option>
                                        <option value="Batam"
                                            {{ old('city', auth()->user()->city) === 'Batam' ? 'selected' : '' }}>Batam
                                        </option>
                                        <option value="Semarang"
                                            {{ old('city', auth()->user()->city) === 'Semarang' ? 'selected' : '' }}>
                                            Semarang</option>
                                        <option value="Yogyakarta"
                                            {{ old('city', auth()->user()->city) === 'Yogyakarta' ? 'selected' : '' }}>
                                            Yogyakarta</option>
                                    </select>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="postal_code">Postal Code</label>
                                    <input id="postal_code" type="text"
                                        class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                        value="{{ old('postal_code', auth()->user()->postal_code) }}" required>

                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary my-2">
                                    {{ __('Update Address') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
