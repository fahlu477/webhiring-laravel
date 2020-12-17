{{ csrf_field() }}

<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Full Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
               value="{{ old('name', $user->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('email'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Email
        </label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
               value="{{ old('email', $user->email ?? '') }}">
        @if ($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

@if(request()->route()->getName() === 'admin.user.create')
    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <label>
                @if ($errors->has('password'))
                    <i class="fa fa-times-circle-o"></i>
                @endif
                Password
            </label>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" autofocus>
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <label>
                Retype password
            </label>
            <input type="password" class="form-control" placeholder="Retype password" id="password-confirm"
                   name="password_confirmation">
        </div>
        <div class="col-md-2"></div>
    </div>
@endif

<div class="form-group {{ $errors->has('role_id') || $errors->has('role_id.*') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label> @if ($errors->has('role_id') || $errors->has('role_id.*')) <i class="fa fa-times-circle-o"></i> @endif
            User Role</label>
        @foreach($roles as $key => $role)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="role_id[]" value="{{ $key }}"
                    @if (!empty($user_roles)) {{ in_array($key, $user_roles, true) ? 'checked' : '' }} @endif
                        {{ (old('role_id') === $key ? 'checked' : '') }}>
                    {{ $role }}
                </label>
            </div>
        @endforeach

        @if ($errors->has('role_id'))
            <span class="help-block">{{ $errors->first('role_id') }}</span>
        @elseif($errors->has('role_id.*'))
            <span class="help-block">{{ $errors->first('role_id.*') }}</span>
        @endif

    </div>
    <div class="col-md-2"></div>
</div>
