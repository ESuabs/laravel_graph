@include('sidebar')

<section class="content" style="margin-left:20px;margin-right:20px">
   <div class="product-index" align="right">
      <div align="right">
        <h4 class="float-right"><a href="{{url('/chartView/create')}}" class="btn btn-primary">Add Data</a></h4>
        <h2 class="text-center">Student Details</h2>
         <div class="box box-success">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
           @endif
            <div class="box box-solid table-responsive">
               <div class="box-body">
                  <div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">
                     <div id="w4" class="grid-view">
                        <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Student Name</th>
                                 <th>Student Subject</th>
                                 <th>Student Marks</th>
                                 <th class="action-column">Action Take</th>
                              </tr>
                    
                           </thead>
                           <tbody id="table_data">
                             {{$i = 1}}
                            @foreach($post as $row) 
                              <tr>
                                 <td>{{ $i++}}</td>
                                 <td>{{ $row->student_name }}</td>
                                 <td>{{ $row->student_subject }}</td>
                                 <td>{{ $row->student_marks }}</td>
                                 <td> 
                                    <form action="{{ route('student-delete', $row->id) }}" method="GET">
                                        @csrf
                                     <input type="hidden" name="deleteID" id="branch" value="{{ $row->id }}">
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                      <button type="submit" class="btn btn-primary">Edit</button>
                                   </form>
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
         @if(session()->has('error'))
           <div class="alert alert-danger">
             {{ session()->get('error') }}
          </div>
        @endif
      </div>
   </div>
   {{ $post->links() }}   {{--Pagination code  --}}
</section>
</body>

<script>
    $(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>