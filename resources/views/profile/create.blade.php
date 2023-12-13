@extends('layout.main')

@section('content')
    <!-- Your dashboard content goes here -->
    <div class="row">
        <div class="edit-profile">
            <div class="row">

                <div class="col-xl-10">

                    <form class="card" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Create Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <!-- Hidden input for user ID -->
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Company">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input class="form-control" type="email" name="email" placeholder="Email">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Designation</label>
                                        <input class="form-control" type="text" placeholder="designation"
                                            name="designation">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Bio</label>

                                        <textarea class="form-control" name="bio" rows="5" placeholder="Enter About your Bio"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Website links</label>
                                        <input class="form-control" name="website" type="text" placeholder="website">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="profile_photo">Profile Photo</label>
                                    <input type="file" name="profile_photo" id="profile_photo" class="form-control-file">

                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        </div>

    </div>
@endsection
