<div class="col-12 col-md-12">
    <label class="form-control-label">{{ __('Nama Sekolah') }}</label>
    <input class="form-control" name="school_name[]" placeholder="School Name" type="text"
           value="">
</div>

<div class="col-md-6">
    <label class="form-control-label" for="educations">{{ __('Sekolah') }}</label>
    <select class="form-control" id="educations" name="education[]"
            style="height: calc(2.35rem + 13px);">
        <option value=""> -- Select Degree --</option>
        @foreach(App\Enums\Degree::toSelectArray() as $key => $degree)
            <option value="{{ $key }}">{{ $degree }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6">
    <label class="form-control-label" for="program_study">{{ __('Program Study') }}</label>
    <select class="form-control" name="program_study[]"
            style="height: calc(2.35rem + 13px);">
        <option value=""> -- Select Program Study --</option>
        @foreach($program_studies as $key => $program_study)
            <option value="{{ $key }}">{{ $program_study }}
            </option>
        @endforeach
    </select>
</div>

<div class=" col-md-6">
    <label class="form-control-label" for="gpa">{{ __('Nilai') }}</label>
    <input class="form-control" id="gpa" name="gpa[]" placeholder="GPA" type="text"
           value="">
</div>

<div class="col-12 col-md-6">
    <label class="form-control-label" for="education_city">{{ __('Alamat Sekolah') }}</label>
    <select class="form-control" name="education_city[]" style="height: calc(2.35rem + 13px);">
        <option value=""> -- Select City --</option>
        @foreach($cities as $key => $city)
            <option value="{{ $key }}">{{ $city }}</option>
        @endforeach
    </select>
</div>

<div class=" col-md-6">
    <label class="form-control-label" for="graduation">{{ __('Tahun Kelulusan') }}</label>
    <input class="form-control" max="2018" min="1950" name="graduation[]"
           placeholder="YYYY" type="number">
</div>

<div class=" col-md-6">
    <label class="form-control-label" for="entry">{{ __('Tahun Masuk') }}</label>
    <input class="form-control" max="2018" min="1950" name="entry[]"
           placeholder="YYYY" type="number">
</div>

<input class="form-control" name="education_id[]" type="hidden" value="">
