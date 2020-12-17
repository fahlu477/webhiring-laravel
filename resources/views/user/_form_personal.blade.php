<div class="row">
    <div class="col-12 col-md-6">
        <label class="form-control-label">{{ __('No Identitas') }}</label>
        <input class="form-control" name="no_identity" placeholder="No Identity" type="text"
               value="{{ $user->profile->no_identity }}">
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="gender">{{ __('Jenis Kelamin') }}</label>
        <select name="gender" id="gender" class="form-control" style="height: calc(2.35rem + 13px);">
            <option value=""> -- Select Gender --</option>
            <option value="Male"
                {{ $user->profile->gender == 'Male'   ? 'selected' : '' }}>{{ __('Male') }}
            </option>
            <option value="Female"
                {{ $user->profile->gender == 'Female' ? 'selected' : '' }}>{{ __('Female') }}
            </option>
        </select>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="name">{{ __('Nama') }}</label>
        <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="{{ $user->name }}">
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="email">{{ __('E-mail') }}</label>
        <input class="form-control" id="email" name="email" placeholder="E-mail" readonly type="email"
               value="{{ $user->email }}">
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="birth_place">{{ __('Tempat Lahir') }}</label>
        <select class="form-control" id="birth_place" name="birth_place" style="height: calc(2.35rem + 13px);">
            <option value=""> -- Select City --</option>
            @foreach($cities as $key => $city)
                <option value="{{ $key }}"
                    {{ $user->profile->birth_place_id == $key ? 'selected' : '' }}>{{ $city }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="birth_date">{{ __('Tanggal Lahir') }}</label>
        <input class="form-control" id="birth_date" name="birth_date" placeholder="Birth Date" type="date"
               value="{{ !empty($user->profile->birth_date) ? $user->profile->birth_date->format('Y-m-d') : '' }}">
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="marital_status">{{ __(' Status') }}</label>
        <select class="form-control" id="marital_status" name="marital_status" style="height: calc(2.35rem + 13px);">
            <option value=""> -- Select Marital Status --</option>
            @foreach(App\Enums\MaritalStatus::toSelectArray() as $key => $marital_status)
                <option value="{{ $key }}"
                    {{ $user->profile->marital_status_id == $key ? 'selected' : '' }}>{{ $marital_status }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-control-label" for="religion">{{ __('Agama') }}</label>
        <select class="form-control" id="religion" name="religion" style="height: calc(2.35rem + 13px);">
            <option value=""> -- Select Religion --</option>
            @foreach(App\Enums\Religion::toSelectArray() as $key => $religion)
                <option value="{{ $key }}"
                    {{ $user->profile->religion_id == $key ? 'selected' : '' }}>{{ $religion }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label class="form-control-label" for="address">{{ __('Alamat') }}</label>
        <textarea name="address" class="form-control" id="address" rows="2"
                  placeholder="Message">{{ $user->profile->address }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-control-label" for="current_address">{{ __('Alamat Sekarang') }}</label>
        <textarea name="current_address" class="form-control" id="current_address" rows="2"
                  placeholder="Message">{{ $user->profile->current_address }}</textarea>
    </div>
</div>

@push('scripts')
    <script>
        const birth_place = $("#birth_place");
        birth_place
            .focus(function () {
                this.size = 200;
                birth_place.attr("style", "height: calc(10rem + 13px);")
            })
            .blur(function () {
                this.size = 1;
                birth_place.attr("style", "height: calc(2.35rem + 13px);")
            })
            .change(function () {
                this.size = 1;
                this.blur();
                birth_place.attr("style", "height: calc(2.35rem + 13px);")
            })
    </script>
@endpush
