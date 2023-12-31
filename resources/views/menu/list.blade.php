@extends('layouts.app')

@section('content')
<style>
    .dropdown-menu .nav-item a { color: #000 !important; }
    /* 
    .dropdown-toggle:after { content: none; }
    .dropdown-menu .dropdown-menu { margin-left: 0; margin-right: 0; }
    .dropdown-menu li { position: relative }
    .nav-item .submenu { display: none; position: absolute; left: 100%; top: -7px; }
    .dropdown-menu>li:hover { background-color: #f1f1f1; }
    .dropdown-menu>li:hover>.submenu { display: block; } */
</style>
@if(!$menulist->isEmpty())
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav mr-auto">
        @each('menu.submenu', $menulist, 'menu')
    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">


$(document).on('click', '.dropdown-menu',function(e){
    $.preventDefault();
    $('.dropdown-menu a').click(($event) => {
            $event.preventDefault();
            console.log($(this).next('.submenu').length);
            if ($(this).next('.submenu').length) {
                $(this).next('.submenu').toggle();
            }
            $('.dropdown').on('hide.bs.dropdown', () => $(this).find('.submenu').hide());
        });
})

  
    
</script>
@endif
@endsection

