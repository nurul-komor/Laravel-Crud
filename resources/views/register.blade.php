@extends('layout.main')
@section('main-section')

<div class="container ">
    <a href=" {{ route('customers.index') }}" class="text-right d-block"><button type="button"
            class="btn-secondary btn my-3 ">
            Users</button></a>
    <div class="card">

        <div class="modal-body">
            <h2 class="py-3">{{ $title  }}</h2>
            {!! Form::open([
            "url" => "$url",
            "method" => "post"
            ]) !!}
            @if (isset($method))
            @method($method)
            @endif
            <div class="row">
                <div class="col-md-6">
                    @if (isset($details))
                    <x-input-box label="Enter Username " name="username" type="text" placeholder="Username here..."
                        sign="*" text="{{$details->name}}" />
                    @else
                    <x-input-box label="Enter Username " name="username" type="text" placeholder="Username here..."
                        sign="*" value="old('username')" />
                    @endif
                    <label for="">Gender</label>
                    <select name="gender" class="custom-select">

                        <option selected value="">Gender</option>
                        <option @if (old("gender")=="M" ) {{ 'selected' }} @endif value=" M">Male</option>
                        <option @if (old('gender')=="F" ) {{ 'selected' }} @endif value="F">Female</option>
                        <option @if (old('gender')=="O" ) {{ 'selected' }} @endif value="O">Other</option>
                    </select>
                    @if (isset($details))
                    <x-input-box label="Enter email" name="email" type="email" placeholder="email here..." sign="*"
                        text="{{$details->email}}" />
                    @else
                    <x-input-box label="Enter email" name="email" type="email" placeholder="email here..." sign="*" />
                    @endif

                </div>
                <div class=" col-md-6">
                    <x-input-box label="Enter password" name="password" type="password" placeholder="password here..."
                        sign="*" />
                    <x-input-box label="Enter password" name="confirmPassword" type="password"
                        placeholder="password here..." sign="*" />
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection