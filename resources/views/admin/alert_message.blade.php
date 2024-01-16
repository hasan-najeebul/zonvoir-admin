<style type="text/css">
  .alert-message{
    width: 500px;
    margin-right: 25px;
    float: right !important;
    position: relative;
    margin-top: -110px;
    z-index: 9999;
  }
  .close-icon-position{
    float: right;
  }
</style>
@if(session('success'))
  <div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
      <div class="alert alert-success alert-dismissible custom-alert-msg alert-message">
        <i class="icon fas fa-times close-icon-position" data-dismiss="alert" aria-hidden="true"></i>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{session('success')}}
      </div>
    </div>
  </div>
@elseif(session('error'))
  <div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
      <div class="alert alert-danger alert-dismissible custom-alert-msg alert-message">
        <i class="icon fas fa-times close-icon-position" data-dismiss="alert" aria-hidden="true"></i>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{session('success')}}
      </div>
    </div>
  </div>
@endif

