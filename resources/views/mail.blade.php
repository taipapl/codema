<div class="uk-text-bold">
    @lang('Topic'):{{ $ticket->topic->name }}
</div>
<div>
    @lang('Address email'):{{ $ticket->email }}
</div>

<div>
    @lang('Text'): <br>
    {{ $ticket->text }}


</div>
