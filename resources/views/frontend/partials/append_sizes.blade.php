<label for="required_size">{{ __('frontend.required_size') }}:</label>
<select name="required_size" id="required_size" class="form-control" required>
    <option value="">{{ __('frontend.choose') }}</option>
    @if (isset($productSizes) && !empty($productSizes))
        @forelse ($productSizes as $productSize)
            <option value="{{ $productSize->size }}">{{ $productSize->size }}</option>
        @empty
            <option value="">{{ __('frontend.no_sizes') }}</option>
        @endforelse
    @endif

</select>
@error('required_size')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
