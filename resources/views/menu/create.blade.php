@extends('layouts.app')

@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Create Menu</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menus.index') }}"> List</a>
            </div> --}}
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="menu_name" class="form-control" placeholder="Menu Name" value="{{old('menu_name')}}">
                    @error('menu_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug</strong>
                    <input type="text" name="slug" class="form-control" placeholder="Menu Slug" value="{{old('slug')}}">
                    @error('slug')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Parent Menu</strong>
                    <select class="form-control" name="parent_id">
                        <option value="0">Please select parent menu</option>
                        @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->menu_name}}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12"><div class=" form-group">
                <label class="form-check-label">Is Active</label>
                <input class="form-check-input" type="checkbox" id="check1" name="is_active" value="1">
              </div>
            </div>
            
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Font Size</strong>
                    <input type="number" name="font_size" class="form-control" placeholder="Enter Font Size" value="{{old('font_size')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Font Color</strong>
                    <input type="text" name="font_color" class="form-control" placeholder="Enter Font color : #000" value="{{old('font_color')}}">
                </div>
            </div>
              
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>

@endsection

