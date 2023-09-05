@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Menu</h2>
                <a class="btn btn-primary" href="{{ route('menus.index') }}">
                    List</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('menus.update',$menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="menu_name" value="{{ $menu->menu_name }}" class="form-control">
                    @error('menu_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" class="form-control" value="{{ $menu->slug }}">
                    @error('slug')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @php 
            $selected_parent =   $menu->parent_id;
            @endphp
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Parent Menu</strong>
                    <select class="form-control" name="parent_id">
                        <option value="0">Please select parent menu</option>
                        @foreach($menus as $menu_data)
                        
                         <option value="{{$menu_data->id}}" {{($selected_parent == $menu_data->id)?'selected':''}}>{{$menu_data->menu_name}}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-check">
                <label class="form-check-label">Is Active</label>
                <input class="form-check-input" type="checkbox" id="check1" name="is_active" value="1" {{$menu->is_active ==1 ?'checked':''}} >
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Font Size</strong>
                    <input type="number" name="font_size" class="form-control" placeholder="Enter Font Size" value="{{ $menu->font_size}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Font Color</strong>
                    <input type="text" name="font_color" class="form-control" placeholder="Enter Font color : #000" value="{{$menu->color}}">
                </div>
            </div>
              
              
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>


@endsection

