<option value="">Select One</option>
@foreach ($areas as $area)
    <option value="{{ $area->id }}" {{ $area->id == $select_id ? 'selected' : '' }}>{{ $area->name }}
    </option>
@endforeach
