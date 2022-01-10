<div data-repeater-item>
    <div class="text-right">
        <a href="javascript:;" data-repeater-delete="" class="btn btn-icon btn-danger btn-sm ">
            <i class="la la-remove"></i>
        </a>
    </div>
    <div class="row form-group">
        <div class="col-lg-6">
            <label>New Plot No. <span class="color-red-700">*</span></label>
            <input maxlength="10" type="text" name="plot_no" class="form-control money_format" placeholder="Plot No." value="{{ old("new_plots.{$index}.plot_no") }}" required />
            @error("new_plots.{$index}.plot_no")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label>New Plot Size (Acres) <span class="color-red-700">*</span></label>
            <input maxlength="20" type="text" name="plot_size" class="form-control money_format" placeholder="Plot Size" value="{{ old("new_plots.{$index}.plot_size") }}" required />
            @error("new_plots.{$index}.plot_size")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-lg-6">
            <label>Latitude <span class="color-red-700"></span></label>
            <input type="number" name="latitude" class="form-control" placeholder="latitude" value="{{ old("new_plots.{$index}.latitude") }}"  />
            @error("new_plots.{$index}.latitude")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label>Longitude <span class="color-red-700"></span></label>
            <input type="number" name="longitude" class="form-control" placeholder="Longitude" value="{{ old("new_plots.{$index}.longitude") }}" />
            @error("new_plots.{$index}.longitude")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
