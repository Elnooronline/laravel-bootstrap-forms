<div class="form-group{{ $errors->has($nameWithoutBrackets) ? ' has-error' : '' }}">
    @if($label)
        {{ Form::label($name, $label, ['class' => 'content-label']) }}
    @endif

    {{ Form::file($name, array_merge(['class' => 'form-control'], $attributes)) }}

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
