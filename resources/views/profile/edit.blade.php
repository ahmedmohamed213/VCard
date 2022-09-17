@include('Admin.assets.header')
@include('Admin.assets.navbar')

<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-12 col-lg-12  m-5">

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
            <!-- form start -->

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $profiles->id }}">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" value="{{ $profiles->profile_name }}" class="form-control"
                            name="profile_name" id="exampleInputName">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTitle1">title</label>
                        <input type="text" value="{{ $profiles->profile_title }}" class="form-control"
                            name="profile_title" id="exampleInputtitle1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" value="{{ $profiles->email }}" class="form-control" name="email"
                            id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhome1">Phone</label>
                        <input type="text" value="{{ $profiles->phone }}" class="form-control" name="phone"
                            id="exampleInputphone1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputfacebook">Facebook</label>
                        <input type="text" value="{{ $profiles->facebook }}" class="form-control" name="facebook"
                            id="exampleInputfacebook1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLinkedin1">Linkedin</label>
                        <input type="text" value="{{ $profiles->linkedin }}" class="form-control" name="linkedin"
                            id="exampleInputlinkedin1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputgithub1">Github</label>
                        <input type="text" value="{{ $profiles->github }}" class="form-control" name="github"
                            id="exampleInputgithub1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">profile Pic</label>
                        <input type="file" value="{{ $profiles->profile_pic }}" name="profile_pic"
                            class="form-control" id="exampleInputImage">
                    </div>




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@include('Admin.assets.footer')
