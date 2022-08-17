@if(Session::get('error') != null)
<div class="alert alert-danger" style="text-align: center;">
    {{Session::get('error')}}
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
 <ul style="text-align: center">
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
