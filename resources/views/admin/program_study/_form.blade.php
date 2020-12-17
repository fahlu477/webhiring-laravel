{{ csrf_field() }}

<div class="form-group @if ($errors->has('name')) has-error @elseif (old('name')) has-success @endif"">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('name'))
                <i class="fa fa-check"></i>
            @endif
            Program Study Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Program Study" name="name"
               value="{{ old('name', $program_study->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>
