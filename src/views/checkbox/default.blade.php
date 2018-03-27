<div class="form-group{{ $errors->has($nameWithoutBrackets) ? ' has-error' : '' }}">
    <div class="checkbox">
        <label>
            {{ Form::checkbox($name, $value, $checked) }} {{ $label }}
        </label>
    </div>
    @if($inlineValidation)
        @if($errors->has($nameWithoutBrackets))
            <strong class="help-block">{{ $errors->first($nameWithoutBrackets) }}</strong>
        @else
            <strong class="help-block">{{ $note }}</strong>
        @endif
    @else
        <strong class="help-block">{{ $note }}</strong>
    @endif
</div>

