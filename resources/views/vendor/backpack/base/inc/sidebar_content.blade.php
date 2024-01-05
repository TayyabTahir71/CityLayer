
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>{{ trans('backpack::base.dashboard') }}</a></li>


<li class="nav-item"><a class="nav-link" href="{{ backpack_url('place') }}"><i class="nav-icon la la-road"></i> Place</a></li>
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('openspace') }}"><i class="nav-icon la la-street-view"></i> Openspaces</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('building') }}"><i class="nav-icon la la-city"></i> Buildings</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"> <img src="{{ asset('img/flag/England.png') }}" class="nav-icon" width="25px"> Tags</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('opinion') }}"> <img src="{{ asset('img/flag/England.png') }}" class="nav-icon" width="25px"> Opinions</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('space-tag') }}"> <img src="{{ asset('img/flag/England.png') }}" class="nav-icon" width="25px"> Usage</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('comment-en') }}"> <img src="{{ asset('img/flag/England.png') }}" class="nav-icon" width="25px"> Comments</a></li> --}}
<a class="text-gray-600">____________________</a>
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag-de') }}"><img src="{{ asset('img/flag/Germany.png') }}" class="nav-icon" width="25px">  Tags</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('opinion-de') }}"><img src="{{ asset('img/flag/Germany.png') }}" class="nav-icon" width="25px"> Opinion</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('space-tag-de') }}"><img src="{{ asset('img/flag/Germany.png') }}" class="nav-icon" width="25px"> Usage</a></li> --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('comment-de') }}"> <img src="{{ asset('img/flag/Germany.png') }}" class="nav-icon" width="25px"> Comments</a></li> --}}

    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i><span>Users</span></a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> Settings</a>
    <ul class="nav-dropdown-items">
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('setting') }}"><i class="nav-icon la la-envelope"></i> <span>Email settings</span></a></li> --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('pages') }}"><i class="nav-icon la la-file"></i>Pages</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>Files</span></a></li>
    </ul>
</li>


