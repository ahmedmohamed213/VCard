@include('Admin.assets.header')
{{-- @include('Admin.assets.navbar') --}}

<a href="{{ route('logout') }}" class="nav-link">


    <p>logout</p>
</a>
{{-- </li> --}}
<div class="container">
    <div class="row ">
        <div class="col-12 col-lg-12 ">
            <div class="card  m-5">

                <div class="card-header">
                    <h3 class="card-title ">Show All Users</h3>


                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif


                @if (Session::has('done'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('done') }}
                    </div>
                @endif
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Showprofile</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> <a class="btn btn-success"
                                            href="{{ route('admin.show_user_profile', $user->id) }}">Show
                                            Profile</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- @include('Admin.assets.footer') --}}
