@if ((count($menu->children) > 0) AND ($menu->parent_id > 0))
<li class="nav-item dropdown">
    <a href="{{ url($menu->slug) }}" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
        {{ $menu->menu_name }}
        @if(count($menu->children) > 0) 
        <i class="fa fa-caret-right"></i>
        @endif
    </a>
    @else
<li class="nav-item @if($menu->parent_id === 0 && count($menu->children) > 0) dropdown @endif">

    @php 
    $color = '';
    $font_size ='';

    if(!empty($menu->color))
    {
        $color .= "color:$menu->color !important";
    }

    if(!empty($menu->font_size))
    {
        $font_size .= "font-size:$menu->font_size !important";
    }

  



    @endphp
    <a style="{{$color}};{{$font_size}}" href="{{ url($menu->slug) }}" class="nav-link dropdown-toggle" data-toggle="dropdown">
        {{ $menu->menu_name }} 
        @if(count($menu->children) > 0) 
            <i class="fa fa-caret-down"></i>
        @endif
    </a>
    @endif
    @if (count($menu->children) > 0)
    <ul class="@if($menu->parent_id !== 0 && (count($menu->children) > 0)) submenu @endif dropdown-menu" aria-labelledby="dropdownBtn">
        @foreach($menu->children as $menu)
        @include('menu.submenu', $menu)
        @endforeach
    </ul>
    @endif
</li>