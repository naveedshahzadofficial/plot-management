<div data-repeater-item class="repeater-item">
    <div class="text-right">
        <a href="javascript:;" data-repeater-delete="" class="btn btn-icon btn-danger btn-sm ">
            <i class="la la-remove"></i>
        </a>
    </div>
    <input type="hidden" name="plot_allotment_id" value="{{ $plotAllotment->id }}">
    <div class="row form-group special_zone">
        @hasanyrole('Super Admin|Admin')
        <div class="col-lg-6">
            <label>Special Economic Zone <span class="color-red-700">*</span></label>
            <select class="form-control select2 special_economic_zone_id" name="special_economic_zone_id" onchange="onChangeZone(this)">
                <option value="">Select Economic Zone</option>
                @isset($specialEconomicZones)
                @foreach($specialEconomicZones as $specialEconomicZone)
                    <option {{ old("plot_allocations.{$index}.special_economic_zone_id")== $specialEconomicZone->id ? 'selected': '' }} value="{{ $specialEconomicZone->id }}"> {{ $specialEconomicZone->name }} </option>
                @endforeach
                @endisset
            </select>
            @error("plot_allocations.{$index}.special_economic_zone_id")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        @else
            <input type="hidden" class="special_economic_zone_id" name="special_economic_zone_id" value="{{ auth()->user()->special_economic_zone_id }}">
        @endhasanyrole

            <div class="col-lg-6">
                <label>Plot Type <span class="color-red-700">*</span></label>
                <div class="col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-primary">
                            <input type="radio" name="plot_type" class="plot_type" value="Industrial" {{ old("plot_allocations.{$index}.plot_type")=='Industrial'?'checked':'' }} onchange="onChangeZone(this)">
                            <span></span>Industrial</label>

                        <label class="radio radio-primary">
                            <input type="radio" name="plot_type" class="plot_type" value="Commercial" {{ old("plot_allocations.{$index}.plot_type")=='Commercial'?'checked':'' }} onchange="onChangeZone(this)">
                            <span></span>Commercial</label>

                    </div>
                    @error("plot_allocations.{$index}.plot_type")
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>

    </div>
    <div class="row form-group">
        <div class="col-lg-6">
            <label>Plot No. <span class="color-red-700">*</span></label>
            <select class="form-control select2 plot_id" name="plot_id" onchange="selectPlot(this)">
                <option value="">Select Plot</option>
                @isset($plots)
                    @foreach($plots as $plot)
                        <option {{ old("plot_allocations.{$index}.plot_id")== $plot->id ? 'selected': '' }} value="{{ $plot->id }}"> {{ $plot->plot_no }} </option>
                    @endforeach
                @endisset
            </select>
            @error("plot_allocations.{$index}.plot_id")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            <label>Plot Size (Acres) <span class="color-red-700"></span></label>
            <input readonly maxlength="20" type="text" name="plot_size" class="form-control money_format plot_size" placeholder="Plot Size" value="{{ old("plot_allocations.{$index}.plot_size") }}" />
            @error("plot_allocations.{$index}.plot_size")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-lg-6">
            <label>Rate per Acre (PKR)<span class="color-red-700">*</span></label>
            <input type="number" name="rate_per_acre" class="form-control" placeholder="Rate per Acre" value="{{ old("plot_allocations.{$index}.rate_per_acre") }}" required />
            @error("plot_allocations.{$index}.rate_per_acre")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label>Additional Corner (PKR) <span class="color-red-700"></span></label>
            <input type="number" name="rate_additional_corner" class="form-control" placeholder="Additional Corner" value="{{ old("plot_allocations.{$index}.rate_additional_corner") }}" />
            @error("plot_allocations.{$index}.rate_additional_corner")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row form-group">
        <div class="col-lg-6">
            <label>Additional Main Road (PKR) <span class="color-red-700"></span></label>
            <input type="number" name="rate_additional_main_road" class="form-control" placeholder="Additional Main Road" value="{{ old("plot_allocations.{$index}.rate_additional_main_road") }}" />
            @error("plot_allocations.{$index}.rate_additional_main_road")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
