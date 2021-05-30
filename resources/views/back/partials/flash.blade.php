@if(Session::has('message'))
<div class="text-success">
    <p>{{Session::get('message')}}</p>
</div>
@endif