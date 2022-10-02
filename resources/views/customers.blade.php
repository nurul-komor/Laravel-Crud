@extends("layout.main")
@section("main-section")
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{ route('customer.create') }}"><button class="btn btn-primary float-end" type="submit">Create
                Customer</button></a>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">birthday</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)

                    <tr class="">
                        <td scope="row">{{ $customer->username }}</td>
                        <td>{{ $customer->birthday }}</td>
                        <td style="max-width: 170px">{{ $customer->address }}</td>
                        @if ($customer->status = 1)
                        <td>
                            <p class="text-light p-1 bg-success rounded d-inline-block">{{ 'active' }}</p>
                            @else
                            <p class="text-light p-1 bg-yellow rounded d-inline-block">{{ 'inactive' }}</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/') }}/customer/edit/{{$customer->id}}"><button type="submit"
                                    class="btn btn-primary">Edit</button></a>
                            <a href="customer/{{$customer->id}}" <button type="submit"
                                class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection