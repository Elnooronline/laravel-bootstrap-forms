<div class="form-group">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            {{ Form::submit($label, $attributes + ['class' => "btn $className", 'name' => $name]) }}
        </div>
    </div>
</div>

