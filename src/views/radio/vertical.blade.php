<div class="form-group{{ $errors->has($nameWithoutBrackets) ? ' has-error' : '' }}">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
            <label>
                {{ Form::radio($name, $value, $checked) }} {{ $label }}
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
</div>
