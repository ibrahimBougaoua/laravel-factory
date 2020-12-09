@if(Session::has('success'))
<div class="col-md-12">
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  <strong>{{ Session::get('success') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endif