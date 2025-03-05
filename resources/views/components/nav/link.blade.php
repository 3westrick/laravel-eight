<a href="{{ route($route) }}" @class(['nav-link', 'active' => $is_active]) @if($is_active) aria-current="page" @endif>
    {{$slot}}
</a>