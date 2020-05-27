<div class="col-md-12 pb-80">
    <div class="col-md-12">
        <h4 class="text-primary">Access to Dashboard</h4>
    </div>
    <div class="col-md-12 pt-4 text-left profile_checkbox1">
        <div class="col-md-12 pt-4 text-left">
            @if($modules->isNotEmpty())
                @foreach($modules as $module)
                <label class="container_checkbox">{{ $module->module_name }}
                    <input type="checkbox" class="checkbox" name="access_to_dashboard[]" value="{{ $module->id }}" 
                    {{ in_array($module->id, $get_permission) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </label>
                @endforeach
            @endif
        </div>
    </div>
</div>