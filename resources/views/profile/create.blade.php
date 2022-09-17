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

            <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="profile_name" id="exampleInputName"
                            placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTitle1">title</label>
                        <input type="text" class="form-control" name="profile_title" id="exampleInputtitle1"
                            placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhome1">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputphone1"
                            placeholder="Enter phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputfacebook">Facebook</label>
                        <input type="url" class="form-control" name="facebook" id="exampleInputfacebook1"
                            placeholder="Enter facebook">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLinkedin1">Linkedin</label>
                        <input type="url" class="form-control" name="linkedin" id="exampleInputlinkedin1"
                            placeholder="Enter linkedin">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputgithub1">Github</label>
                        <input type="url" class="form-control" name="github" id="exampleInputgithub1"
                            placeholder="Enter github">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">profile Pic</label>
                        <input type="file" name="profile_pic" class="form-control" id="exampleInputImage">
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
