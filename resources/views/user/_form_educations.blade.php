<div class="row default">
    @forelse($user->educations()->latestEducation()->get() as $user_education)
        <div class="row col-12 col-md-12 educations" style="margin-bottom: 20px;">
            <div class="col-12 col-md-12">
                <label class="form-control-label">{{ __('School Name') }}</label>
                <input class="form-control" name="school_name[]" placeholder="School Name" type="text"
                       value="{{ $user_education->school_name }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="education">{{ __('Strata') }}</label>
                <select class="form-control" name="education[]"
                        style="height: calc(2.35rem + 13px);">
                    <option value=""> -- Select Degree --</option>
                    @foreach(App\Enums\Degree::toSelectArray() as $key => $degree)
                        <option value="{{ $key }}"
                            {{ $user_education->degree_id == $key ? 'selected' : '' }}>{{ $degree }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="program_study">{{ __('Program Study') }}</label>
                <select class="form-control" name="program_study[]"
                        style="height: calc(2.35rem + 13px);">
                    <option value=""> -- Select Program Study --</option>
                    @foreach($program_studies as $key => $program_study)
                        <option value="{{ $key }}"
                            {{ $user_education->program_study_id == $key ? 'selected' : '' }}>{{ $program_study }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class=" col-md-6">
                <label class="form-control-label" for="gpa">{{ __('GPA') }}</label>
                <input class="form-control" name="gpa[]" placeholder="GPA" type="text"
                       value="{{ $user_education->gpa }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="education_city">{{ __('Education City') }}</label>
                <select class="form-control" name="education_city[]" style="height: calc(2.35rem + 13px);">
                    <option> -- Select City --</option>
                    @foreach($cities as $key => $city)
                        <option value="{{ $key }}" {{ $user_education->city_id == $key ? 'selected' : '' }}>
                            {{ $city }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class=" col-md-6">
                <label class="form-control-label" for="graduation">{{ __('Year Graduation') }}</label>
                <input class="form-control" max="2018" min="1950" name="graduation[]"
                       placeholder="YYYY" type="number" value="{{ $user_education->graduation }}">
            </div>
            <div class=" col-md-6">
                <label class="form-control-label" for="entry">{{ __('Year Entry') }}</label>
                <input class="form-control" max="2018" min="1950" name="entry[]"
                       placeholder="YYYY" type="number" value="{{ $user_education->entry }}">
            </div>

            @if (!$loop->first)
                <div class=" col-md-12" style="padding-bottom: 20px">
                    <a href="#" class="btn btn-danger btn-sm remove" style="position: absolute;">Remove</a>
                </div>
            @endif

            <input class="form-control" name="education_id[]" type="hidden" value="{{ $user_education->id }}">
        </div>
    @empty
        @include('user._form_educations_template')
    @endforelse
</div>

<div class="row col-12 col-md-12">
    <a href="#" id="add-more" style="position: absolute; right: 0;">Add More Education</a>
</div>

<div style="display: none">
    <div class="row col-12 col-md-12 template">
        @include('user._form_educations_template')
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            const wrapper = $(".default");
            $("#add-more").click(function () {
                let html = $(".template").html();
                wrapper.append(
                    '<div class="row col-12 col-md-12 educations" style="margin-bottom: 20px;">' + html + '' +
                    '<div class=" col-md-12" style="padding-bottom: 20px">' +
                    '<a href="#" class="btn btn-danger btn-sm remove" style="position: absolute;">Remove</a>' +
                    '</div>' +
                    '</div>'
                );
            });

            $(wrapper).on("click", ".remove", function (e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
            });

            document.querySelector("input[type=number]").oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
        });
    </script>
@endpush
