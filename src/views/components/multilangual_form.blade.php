@php($id = uniqid('__multilangual-form-', true))
<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        @multilangualForm
        <li role="presentation" class="{{ $loop->index == 0 ? 'active' : '' }}">
            <a href="#{{ $id.$locale->code }}" aria-controls="{{ $id.$locale->code }}" role="tab" data-toggle="tab">
                {{ $locale->name }}
            </a>
        </li>
        @endMultilangualForm
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" style="margin-top: 10px;">
        @multilangualForm
        <div role="tabpanel" class="tab-pane{{ $loop->index == 0 ? ' active' : '' }}" id="{{ $id.$locale->code }}">
            @stack($uniqid.$locale->code)
        </div>
        @endMultilangualForm
    </div>
</div>