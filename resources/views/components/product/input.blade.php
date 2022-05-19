<div class="form-group ">
    <label for="" class="fw-bold  label_font_size">
                  {{$attributes->get('label')}} <span class="text-danger">*</span>
             </label>

<input 
    
    {{ $attributes->merge(['id' => ($attributes->get('name') . '_inp'), 'class' => 'form-control  input_border_color py-3' , 'type' => $attributes->get('type'), 'placeholder' => $attributes->get('placeholder') ?? Str::title(Str::of($attributes->get('name'))->replace('_', ' ')), 'value' => old($attributes->get('name'))]) }}

/>
  </div>
@error($attributes->get('name')) <div class="small text-danger"> <i class="fa fa-times-circle"></i> {{ $message }}</div> @enderror
