@extends("layout.main")
@section("main-section")
@include("layout.modal")
<div class="container">
    <a href=" {{ route('customers.create') }}"><button type="button" class="btn-primary btn my-3 float-right">Add
            User</button></a>
    {{-- <a href="{{ route('customer.create') }}">Link</a> --}}
    <div class="table-responsive ">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $index = 1;
                @endphp
                @foreach ($customers as $customer)

                <tr class="">
                    <th>{{$index++}}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    @if ($customer->gender == "M" )
                    <td>{{ "Male" }}</td>
                    @elseif($customer->gender == "F")
                    <td>{{ "Female" }}</td>
                    @else
                    <td>{{ "Others" }}</td>

                    @endif


                    @if ($customer->status == 1 )
                    <td>
                        <p class="bg-success d-inline-block p-1 m-0 rounded text-light">{{ "Active" }}</p>
                    </td>
                    @else($customer->status == 0)
                    <td>
                        <p class="bg-success d-inline-block p-1 m-0 rounded text-light">{{ "inactive" }}</p>
                    </td>
                    @endif
                    <td class="d-flex justify-content-center">
                        <a href="{{  '/customers/'.$customer->id  }}/edit" style="text-decoration:none">
                            <i class="fa fa-pencil mr-1 bg-primary text-light rounded"
                                style="font-size:20px;padding: 10px" aria-hidden="true"></i>
                        </a>
                        <!-- <a href="{{ url('customers.edit',['id'=>$customer->id])  }}" style="text-decoration:none"
                            id="edit">
                            <i class="fa fa-pencil mr-1 bg-primary text-light rounded"
                                style="font-size:20px;padding: 10px" aria-hidden="true"></i>
                        </a> -->
                        {!! Form::open([
                        'url' => "customers/$customer->id ",
                        'method' => 'post',
                        'style' => 'display:inline-block;margin-botton:2px'
                        ]) !!}
                        {{-- <form action="{{ url('/customers',$customer->id) }}" method="POST"> --}}
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger rounded"><i class="fa fa-trash text-light "
                                style="font-size:20px;" aria-hidden="true"></i></button>

                        {{-- </form> --}}
                        {!! Form::close() !!}
                        {{-- <a href="{{ $customer->id}}">

                        </a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection