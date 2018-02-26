<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if($label)
        {{ Form::label($name, $label, ['class' => 'content-label']) }}
    @endif

    {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}

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
