<div class="col-12 col-md-12">
    <label class="form-control-label">{{ __('Nama Perusahaan') }}</label>
    <input class="form-control" name="company[]" placeholder="Company" type="text"
           value="">
</div>

<div class="col-12 col-md-6">
    <label class="form-control-label">{{ __('Jenis Industri') }}</label>
    <input class="form-control" name="industry[]" placeholder="Industry"
           type="text"
           value="">
</div>

<div class="col-12 col-md-6">
    <label class="form-control-label">{{ __('Jabatan') }}</label>
    <input class="form-control" name="title[]" placeholder="Title" type="text"
           value="">
</div>

<div class="col-12 col-md-12">
    <label class="form-control-label">{{ __('Descripsi') }}</label>
    <textarea class="form-control" name="job_description[]" rows="4"
              placeholder="Description"></textarea>
</div>

<div class="col-12 col-md-6">
    <label class="form-control-label">{{ __('Tanggal Masuk') }}</label>
    <input class="form-control" name="join[]" placeholder="Join Date" type="date"
           value="">
</div>

<div class="col-12 col-md-6">
    <label class="form-control-label">{{ __('Tanggal Keluar') }}</label>
    <input class="form-control" name="out[]" placeholder="Out Date" type="date"
           value="">
</div>

<input class="form-control" name="work_experience_id[]" type="hidden" value="">
