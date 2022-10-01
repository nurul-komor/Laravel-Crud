<div class="form-group">
    <label for="exampleInputEmail1">{{ $label }} <span class="text-danger">{{$sign}}</span></label>
    <input type="{{$type}}" class="form-control" id="{{ $label }}" placeholder="{{$placeholder}}" name="{{$name}}"
        value="{{$text}}">
    @error($name)

    <span class="text-danger">{{$message}}</span>
    @enderror
</div>