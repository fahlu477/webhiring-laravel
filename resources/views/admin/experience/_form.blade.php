{{ csrf_field() }}

<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Experience Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Experience Name" name="name"
               value="{{ old('name', $experience->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('minimum_experience_of_year') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('minimum_experience_of_year'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Minimum Experience of Year
        </label>
        <input type="number" class="form-control" id="grade" placeholder="Enter Minimum Experience of Year" name="minimum_experience_of_year"
               value="{{ old('minimum_experience_of_year', $experience->minimum_experience_of_year ?? '') }}">
        @if ($errors->has('minimum_experience_of_year'))
            <span class="help-block">{{ $errors->first('minimum_experience_of_year') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('maximum_experience_of_year') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('maximum_experience_of_year'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Maximum Experience of Year
        </label>
        <input type="number" class="form-control" id="grade" placeholder="Enter Maximum Experience of Year" name="maximum_experience_of_year"
               value="{{ old('maximum_experience_of_year', $experience->maximum_experience_of_year ?? '') }}">
        @if ($errors->has('maximum_experience_of_year'))
            <span class="help-block">{{ $errors->first('maximum_experience_of_year') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>
