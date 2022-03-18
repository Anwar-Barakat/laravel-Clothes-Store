<p class="mg-b-10">{{ __('translation.category_level') }}</p>
<select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
    <option value="0" {{ !empty($category) && $category->parent_id == 0 ? 'selected' : '' }}>
        {{ __('translation.main_cat') }}</option>
    @if (!empty($categories))
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ !empty($category) && $category->parent_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}</option>
            @if (!empty($cat->subCategories))
                @foreach ($cat->subCategories as $subcategory)
                    <option value="{{ $subcategory->id }}">
                        &nbsp;&raquo;&nbsp; {{ $subcategory->name }}
                    </option>
                @endforeach
            @endif
        @endforeach
    @endif
</select>
@error('parent_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
