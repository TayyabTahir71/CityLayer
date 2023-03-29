@if ($crud->hasAccess('export'))
<a  href="{{ url($crud->route.'/export') }}">
<button class="btn btn-primary bg-blue-500 text-white"><i class="la la-save"></i> Export all</button></a>
@endif