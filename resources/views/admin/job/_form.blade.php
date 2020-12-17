{{ csrf_field() }}

<div class="form-group @if ($errors->has('name')) has-error @elseif (old('name')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('name'))
                <i class="fa fa-check"></i>
            @endif
            Job Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Job Name" name="name"
               value="{{ old('name', $job->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group @if ($errors->has('function')) has-error @elseif (old('function')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('function'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('function'))
                <i class="fa fa-check"></i>
            @endif
            Job Function
        </label>
        <input type="text" class="form-control" id="function" placeholder="Enter Job Function" name="function"
               value="{{ old('function', $job->function ?? '') }}">
        @if ($errors->has('function'))
            <span class="help-block">{{ $errors->first('function') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group @if ($errors->has('education_id')) has-error @elseif (old('education_id')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('education_id'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('education_id'))
                <i class="fa fa-check"></i>
            @endif
            Last Education
        </label>
        <select name="education_id" class="form-control {{ $errors->has('education_id') ? ' has-error' : '' }}">
            <option> -- Select Last Education --</option>
            @foreach($educations as $key => $education)
                <option value="{{ $key }}" @if (!empty($job)) {{ $job->education_id == $key ? 'selected' : '' }} @endif
                    {{ (old('education_id') === (string) $key ? 'selected' : '') }}> {{ $education }}</option>
            @endforeach
        </select>
        @if ($errors->has('education_id'))
            <span class="help-block">{{ $errors->first('education_id') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group @if ($errors->has('experience_id')) has-error @elseif (old('experience_id')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('experience_id'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('experience_id'))
                <i class="fa fa-check">{{ old('experience_id') }}</i>
            @endif
            Job Experience
        </label>
        <select name="experience_id" class="form-control {{ $errors->has('experience_id') ? ' has-error' : '' }}">
            <option> -- Select Job Experience --</option>
            @foreach($experiences as $key => $experience)
                <option value="{{ $key }}" @if (!empty($job)) {{ $job->experience_id == $key ? 'selected' : '' }} @endif
                    {{ (old('experience_id') === (string) $key ? 'selected' : '') }}> {{ $experience }}</option>
            @endforeach
        </select>
        @if ($errors->has('experience_id'))
            <span class="help-block">{{ $errors->first('experience_id') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group @if ($errors->has('program_study_id')) has-error @elseif (old('program_study_id')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('program_study_id'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('program_study_id'))
                <i class="fa fa-check">{{ old('program_study_id') }}</i>
            @endif
            Program Study
        </label>
        <select name="program_study_id" class="form-control {{ $errors->has('program_study_id') ? ' has-error' : '' }}">
            <option> -- Select Program Study --</option>
            @foreach($program_studies as $key => $program_study)
                <option value="{{ $key }}" @if (!empty($job)) {{ $job->program_study_id == $key ? 'selected' : '' }} @endif
                    {{ (old('program_study_id') === (string) $key ? 'selected' : '') }}> {{ $program_study }}</option>
            @endforeach
        </select>
        @if ($errors->has('program_study_id'))
            <span class="help-block">{{ $errors->first('program_study_id') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group @if ($errors->has('description')) has-error @elseif (old('description')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('description'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('name'))
                <i class="fa fa-check"></i>
            @endif
            Job Description
        </label>
        <textarea class="textarea" placeholder="Job Description" name="description"
                  style="width: 100%; height: 200px; font-size: 12px;  padding: 10px; border: 1px solid #dddddd;">{!! old('description', $job->description ?? '') !!}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

<div class="form-group @if ($errors->has('minimum_age')) has-error @elseif (old('minimum_age')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <label>
            @if ($errors->has('minimum_age'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('minimum_age'))
                <i class="fa fa-check"></i>
            @endif
            Minimum Age
        </label>
        <input type="number" class="form-control" id="minimum_age" placeholder="Enter Minimum Age" name="minimum_age"
               value="{{ old('minimum_age', $job->minimum_age ?? '') }}">
        @if ($errors->has('minimum_age'))
            <span class="help-block">{{ $errors->first('minimum_age') }}</span>
        @endif
    </div>
    <div class="col-md-4">
        <label>
            @if ($errors->has('maximum_age'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('maximum_age'))
                <i class="fa fa-check"></i>
            @endif
            Maximum Age
        </label>
        <input type="number" class="form-control" id="maximum_age" placeholder="Enter Maximum Age" name="maximum_age"
               value="{{ old('maximum_age', $job->maximum_age ?? '') }}">
        @if ($errors->has('maximum_age'))
            <span class="help-block">{{ $errors->first('maximum_age') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group @if ($errors->has('job_time')) has-error @elseif (old('job_time')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('job_time'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('job_time'))
                <i class="fa fa-check"></i>
            @endif
            Job Time
        </label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="job_time" name="job_time">
            @if ($errors->has('job_time'))
                <span class="help-block">{{ $errors->first('job_time') }}</span>
            @endif
        </div>
        <input type="hidden" class="form-control pull-right" id="start" name="start">
        <input type="hidden" class="form-control pull-right" id="end" name="end">

    </div>
</div>

<div class="form-group @if ($errors->has('published')) has-error @elseif (old('published')) has-success @endif">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('published'))
                <i class="fa fa-times-circle-o"></i>
            @elseif(old('published'))
                <i class="fa fa-check"></i>
            @endif
            Published
        </label>
        <select name="published" class="form-control">
            <option value="0" @if (!empty($job)) {{ $job->published === false ? 'selected' : '' }} @endif
                {{ (old('published') == false ? 'selected' : '') }}>Draft</option>
            <option value="1" @if (!empty($job)) {{ $job->published === true ? 'selected' : '' }} @endif
                {{ (old('published') == true ? 'selected' : '') }}>Published</option>
        </select>

        @if ($errors->has('published'))
            <span class="help-block">{{ $errors->first('published') }}</span>
        @endif
    </div>
</div>

@push('header.javascript')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('template/adminLte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- date-range-picker -->
    <link rel="stylesheet" href="{{ asset('template/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@push('footer.javascript')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('template/adminLte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- date-range picker -->
    <script src="{{ asset('template/adminLte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('template/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();
            let job_time = $('input[name="job_time"]');
            job_time.daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            job_time.on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                $('input[name="start"]').val(job_time.data('daterangepicker').startDate);
                $('input[name="end"]').val(job_time.data('daterangepicker').endDate);
            });
            job_time.on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
                $('input[name="start"]').val('');
                $('input[name="end"]').val('');
            });

            // get values and create Date objects
            let start = "{{ old('start', !empty($job) ? $job->open->format('m/d/Y') : '' ?? '') }}";
            let close = "{{ old('end', !empty($job) ? $job->close->format('m/d/Y') : '' ?? '') }}";
            if (start !== '' && close !== '') {
                $('input[name="start"]').val(start);
                $('input[name="end"]').val(close);
                job_time.daterangepicker({ startDate: start, endDate: close });
            }
        });
    </script>
@endpush
