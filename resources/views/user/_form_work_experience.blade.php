<div class="row default-experience">
    @forelse($user->workExperiences()->latestWorkExperience() as $key => $user_work_experience)
        <div class="row col-12 col-md-12 experience" style="margin-bottom: 20px;">
            <div class="col-12 col-md-12">
                <label class="form-control-label" for="company_{{ $key }}">{{ __('Company') }}</label>
                <input class="form-control" id="company_{{ $key }}" name="company[]" placeholder="Company" type="text"
                       value="{{ $user_work_experience->company }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="industry_{{ $key }}">{{ __('Industry') }}</label>
                <input class="form-control" id="industry_{{ $key }}" name="industry[]" placeholder="Industry"
                       type="text"
                       value="{{ $user_work_experience->industry }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="title_{{ $key }}">{{ __('Title') }}</label>
                <input class="form-control" id="title_{{ $key }}" name="title[]" placeholder="Title" type="text"
                       value="{{ $user_work_experience->title }}">
            </div>

            <div class="col-12 col-md-12">
                <label class="form-control-label" for="job_description_{{ $key }}">{{ __('Description') }}</label>
                <textarea class="form-control" name="job_description[]" rows="4"
                          placeholder="Description">{{ $user_work_experience->description }}</textarea>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="company_{{ $key }}">{{ __('Join Date') }}</label>
                <input class="form-control" id="join_{{ $key }}" name="join[]" placeholder="Join Date" type="date"
                       value="{{ $user_work_experience->join }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-control-label" for="out_{{ $key }}">{{ __('Out Date') }}</label>
                <input class="form-control" id="out_{{ $key }}" name="out[]" placeholder="Out Date" type="date"
                       value="{{ $user_work_experience->out }}">
            </div>

            @if (!$loop->first)
                <div class=" col-md-12" style="padding-bottom: 20px">
                    <a href="#" class="btn btn-danger btn-sm remove" style="position: absolute;">Remove</a>
                </div>
            @endif

            <input class="form-control" name="work_experience_id[]" type="hidden" value="{{ $user_work_experience->id }}">

        </div>
    @empty
        @include('user._work_experience_template')
    @endforelse
</div>

<div class="row col-12 col-md-12">
    <a href="#" id="add-more-experience" style="position: absolute; right: 0;">Add More Experience</a>
</div>

<div style="display: none">
    <div class="row col-12 col-md-12 template-experience">
        @include('user._work_experience_template')
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            const wrapper = $(".default-experience");
            $("#add-more-experience").click(function () {
                let html = $(".template-experience").html();
                debugger
                wrapper.append(
                    '<div class="row col-12 col-md-12 experience" style="margin-bottom: 20px;">' + html + '' +
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
