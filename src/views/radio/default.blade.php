<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <div class="checkbox">
        <label>
            {{ Form::radio($name, $value, $checked) }} {{ $label }}
        </label>
    </div>
    @if($inlineValidation)
        @if($errors->has($name))
            <strong class="help-block">{{ $errors->first($name) }}</strong>
        @else
            <strong class="help-block">{{ $note }}</strong>
        @endif
    @else
        <strong class="help-block">{{ $note }}</strong>
    @endif
</div>

