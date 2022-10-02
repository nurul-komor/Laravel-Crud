@extends("layout.main")
@section("main-section")
<div class="container border">
    <form method="post" action="{{$url}}">
        <div class="row  p-1">
            <h4 class="my-2">{{ $title }}</h4>
            @csrf
            @if (isset($method))
            @method('PUT')
            @endif
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="Username" aria-describedby="Username" name="username"
                        value="@if (isset($customer)){{$customer->username}}@endif">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" value="@if (isset($customer))
                            {{$customer->email}}
                        @endif">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="Username" class="form-label">Address</label>
                    <textarea rows="" class="form-control" cols=""
                        name="address">@if (isset($customer)){{$customer->address}}@endif</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="birthday" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" aria-describedby="Username"
                        value="@if(isset($customer)){{$customer->birthday}}@endif">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        aria-describedby="Username">
                </div>
                <div class="mb-3 ">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        aria-describedby="Username">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
</div>
@endsection