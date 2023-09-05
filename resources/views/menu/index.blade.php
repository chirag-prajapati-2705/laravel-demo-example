@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-3">
                <div class="form-group row">
                    <h2>Menu</h2>
                </div>
            </div>
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('menus.create') }}"> Create Menu</a>
            </div>
        </div>
        <div class="col-md-6">
            <form action="search" method="GET" role="search" class="form-inline mr-auto" style="margin-top: 10px">
                <div class="row">
                    @php 
                    $search = (request()->get('search') == null)?'':request()->get('search');
                    @endphp
                    <div class="col-md-10 mx-auto">
                        <div class="search-element">
                            <input type="text" class="form-control" type="search" placeholder="Search by name" 
                            name="search"
                            value = {{$search}}>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            @if(!empty($search))
                            <a class="btn btn-primary" href="{{route('menus.index')}}" >Clear</a>
                            @endif
                    </div>
                
                </div>
                </form>
        </div>
     
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Order</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @if(!$menus->isEmpty())
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->menu_name }}</td>
                        <td>{{ $menu->slug }}</td>
                        <td>{{ $menu->sort_order }}</td>
                        <td>{{ $menu->getStatus() }}</td>
                        <td>
                            <form action="{{ route('menus.destroy',$menu->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('menus.edit',$menu->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr><td></td><td></td><td>No records found</td></tr>
                
                @endif
        </tbody>
    </table>
    {{-- {!! $menus->links() !!} --}}
</div>

  
@endsection

