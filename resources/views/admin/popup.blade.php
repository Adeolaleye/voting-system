  
 {{-- modal add Nominees --}}
 <div class="modal fade" id="addnominees" tabindex="-2" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0 mb-0">
            <div class="card-header bg-white pb-5">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="text-muted text-center mb-1 mt-1">
                <h2>Add Nominees</h2>
                <small>Fill Details Appropiately</small>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST">
                <div class="form-group mb-3">
                  <select class="form-control mb-3">
                    @foreach ($contestantcat as $categories)
                    <option>{{ $categories }}</option>
                    @endforeach
                  </select>
                  <input class="form-control" placeholder="Fullname" type="text">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- modal add categories --}}
<div class="modal fade" id="addcategory" tabindex="-2" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0 mb-0">
            <div class="card-header bg-white pb-5">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="text-muted text-center mb-1 mt-1">
                <h2>Add Category</h2>
                <small>Fill Field Appropiately</small>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              {{-- @if(session()->get('message'))
              <div class="alert alert-success" role="alert" style="width: 100%;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <p class="text-center"> {{ session()->get('message')}} </p>
              </div>
              @endif --}}
              <form role="form" method="POST" action="{{ route('addcat') }}">
                <div class="form-group mb-3">
                  <input class="form-control" placeholder="Enter Category" type="text" name="contestantcategories">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Submit</button>
                </div>
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
{{-- Delete Cat Modal  --}}
<div class="modal fade" id="deletecategory" tabindex="-2" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="delete_modal" method="POST" >
          <div class="modal-body"><input type="text" id="delete_id">
            This will delete the caegory and the nominees {{ $cont->contestantcategories }}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="ok_button">Go Back</button>
            <button type="submit" class="btn btn-primary">Go Ahead</button>
          </div>
          {{ method_field('DELETE') }}
          @csrf
        </form>
    </div>
  </div>
</div>

  @section('scripts')
    <script>
      // $(document).ready( function() {
      //   $('#cat').on('click','.deletebtn', function(){

      //   })''
      // })
      // var cat_del;

      // $(document).on('click', '.deletebtn', function(){
      //   cat_del = $(this).attr('id');
      //   $('deletecategory').modal('show');
      // });
      // $('#ok_button').click(function(){
      //   $.ajax({
      //     url:"/sample/destroy/"+cat_del,
      //     beforeSend:function(){
      //       $('#ok_button').text('Deleting...');
      //     },
      //     success:function(data)
      //     {
      //       setTimeout(function(){
      //         $('#deletecategory').modal('hide');
      //         reload();
      //         alert('Deleted');
      //       }, 2000);
      //     }
      //   })
      // })
    </script>
      
  @endsection