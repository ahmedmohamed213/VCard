@include('Admin.assets.header')
@include('Admin.assets.navbar')
<div class="container-floud  ml-5">
    <div class="row ml-5">
        <div class="col-12 col-lg-12 ">
            <div class="card  m-5">
                <a class="btn btn-primary mt-3" href="{{ route('profile.create') }}">Add profile</a>

                <div class="card-header">
                    <h3 class="card-title ">profile</h3>


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
                                <th>Name</th>
                                <th>Title</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Facebook</th>
                                <th>linkedin</th>
                                <th>github</th>
                                <th>profile Pic</th>
                                <th>View Peofile</th>

                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->profile_name }}</td>
                                    <td>{{ $profile->profile_title }}</td>
                                    <td>{{ $profile->email }}</td>
                                    <td>{{ $profile->phone }}</td>
                                    <td>{{ $profile->facebook }}</td>
                                    <td>{{ $profile->linkedin }}</td>
                                    <td>{{ $profile->github }}</td>
                                    <td>{{ $profile->profile_pic }}</td>
                                    <td>
                                        <a href="{{ route('profile.index', [$profile->profile_name]) }}">
                                            <button class="btn btn-primary" type="submit">View</button>

                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('profile.delete') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $profile->id }}">
                                            <button class="btn btn-danger" type="submit">delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('profile.edit', [$profile->id]) }}">
                                            <button class="btn btn-success" type="submit">update</button>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('Admin.assets.footer')
