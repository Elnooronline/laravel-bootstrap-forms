<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <div class="row">
        @if($label)
            {{ Form::label($name, $label, ['class' => 'content-label col-md-2']) }}
        @else
            <div class="col-md-2"></div>
        @endif

        <div class="col-md-10">

            {{ Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}

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
    </div>
</div>
