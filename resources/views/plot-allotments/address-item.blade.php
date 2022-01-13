<div class="single-address" data-repeater-item>
    <div class="text-right">
        <a href="javascript:;" data-repeater-delete="" class="btn btn-icon btn-danger btn-sm ">
            <i class="la la-remove"></i>
        </a>
    </div>

    <div class="row form-group">
        <div class="col-lg-6">
            <label>Address <span class="color-red-700">*</span></label>
            <input maxlength="254" type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}" required />
            @error('address')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label>Province <span class="color-red-700">*</span></label>
            <select class="form-control select2" name="province_id" onchange="getProvinceDistricts(this)">
                <option value="">Select Province</option>
                @foreach($provinces as $province)
                    <option {{ old('province_id')== $province->id ? 'selected': '' }} value="{{ $province->id }}"> {{ $province->province_name }} </option>
                @endforeach
            </select>
            @error('province_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-lg-6">
            <label>District <span class="color-red-700">*</span></label>
            <select class="form-control select2 district_ids" name="district_id" onchange="getDistrictTehsils(this)">
                <option value="">Select District</option>
            </select>
            @error('district_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label>City/ Tehsil <span class="color-red-700">*</span></label>
            <select class="form-control select2 tehsile_ids" name="tehsil_id">
                <option value="">Select City</option>
            </select>
            @error('tehsil_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
