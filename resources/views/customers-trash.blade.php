@extends("layout.main")
@section("main-section")
@if (session()->has("status"))
          

<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{  session("status")  }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    @endif
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{ route('customers.index') }}"><button class="btn btn-primary float-end" type="submit">
                Customers</button></a>
    </div>
    <h6></h6>
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
                                    class="btn btn-primary">Delete</button></a>
                            <a href="{{ url('customer/restore') }}/{{$customer->id}}"> <button type="submit"
                                class="btn btn-danger">Restore</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            {{ $customers->links() }}
        </div>
       
       
            
            
    </div>
</div>
@endsection