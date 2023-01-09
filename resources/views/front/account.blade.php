@extends('layouts.frontend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="account-content">

        <div class="container">

            <div class="heading">
                <h2>Hey ali, welcome back!</h2>
            </div>


            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Your Orders</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Information</button>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="tap-content">
                        <h3>Your Orders</h3>
                        <div class="row RecentlyAdded">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Email</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\Order::where('user_id',auth()->id())->orderby('id','desc')->get() as $key =>$item)
                                        
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><a href="{{ route('get_order',$item->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a></td>

                                    </tr>
                                    @endforeach

                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Email</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="tap-content">

                            <h3>Account Information</h3>

                            <form action="">
                                <input type="text" class="form-control" placeholder="First Name">
                                <input type="text" class="form-control" placeholder="Last Name">
                                <input type="text" class="form-control" placeholder="Gmail">
                                <input type="text" class="form-control" placeholder="Address">

                                <button class="btn ">update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
