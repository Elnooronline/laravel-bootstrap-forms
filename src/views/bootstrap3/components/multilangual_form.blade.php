<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        @multilangualForm
        <li role="presentation" class="{{ $loop->index == 0 ? 'active' : '' }}">
            <a href="#{{ $uniqid.$locale->code }}" aria-controls="{{ $uniqid.$locale->code }}" role="tab" data-toggle="tab">
                <img src="{{ $locale->flag }}" alt="">
                {{ $locale->name }}
            </a>
        </li>
        @endMultilangualForm
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" style="margin-top: 10px;">
        @multilangualForm
        <div role="tabpanel" class="tab-pane{{ $loop->index == 0 ? ' active' : '' }}" id="{{ $uniqid.$locale->code }}">
            @stack($uniqid.$locale->code)
        </div>
        @endMultilangualForm
    </div>
</div>