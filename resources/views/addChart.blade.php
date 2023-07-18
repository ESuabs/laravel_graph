@include('sidebar')
 <br><br><br>
    <div class="col-md-10">
        <h2 class="text-center"> Add Student</h2>
        <form action="{{ URL::route('chart-insert') }}" method="post">
            @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            @if($errors->has('password_again'))
                {{ $errors->first('password_again')}}
             @endif
          <label>Subject</label>
          <input type="text" class="form-control"  name="subject">
        </div>
        <div class="form-group">
            <label>Marks</label>
            <input type="text" class="form-control"  name="marks">
          </div>
        <button type="submit" class="btn btn-default text-center">Submit</button>
    </form>
   <div>

    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
   @endif

   @if(session()->has('success'))
   <div class="alert alert-success">
       {{ session()->get('success') }}
   </div>
  @endif

{{-- 
    <form class="form-vertical" action="" method="POST">
        @csrf
        <div class="module-head">
            <h3>Sign Up</h3>
        </div>
        <div class="module-body">
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="text" placeholder="Name" name="name" value=""> 
                    @if($errors->has('login'))
                        {{ $errors->first('login')}}
                    @endif								
                </div>
            </div>
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="text" name="Subject" placeholder="subject">
                    @if($errors->has('password'))
                        {{ $errors->first('password')}}
                    @endif
                </div>
            </div>
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="text" name="Marks" placeholder="marks">
                    @if($errors->has('password_again'))
                        {{ $errors->first('password_again')}}
                    @endif
                </div>
            </div>
        </div>
        <div class="module-foot">
            <div class="control-group">
                <div class="controls clearfix">
                    <button type="submit" class="btn btn-info pull-right">Create Account</button>
                </div>
            </div>
            <a href="">Already A User?</a>
        </div>
    </form> --}}