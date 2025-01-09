<form method="post" action="{{route('upload')}}" enctype="multipart/form-data">

    @csrf();
    <input type="file" name="file">
    <input type="submit" name="submit">
    
</form>