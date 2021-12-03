
<div wire:ignore style="max-width: 100%;" >
        @if(isset($attributes['multiple']))
            <div id="{{ $attributes['id'] }}-btn-container" class="mb-3">
                <button type="button" class="btn btn-info btn-sm select-all-button">Seleccionar Todos</button>
                <button type="button" class="btn btn-info btn-sm deselect-all-button">Deseleccionar todos</button>
            </div>
        @endif
        {{-- {{ $attributes['modalTipo'] }} --}}
        <select class="select2 form-control" data-placeholder="{{ __('Seleccione su opción') }}" {{ $attributes }}>
            @if(!isset($attributes['multiple']))
                <option value="null">Seleccione</option>
            @endif
            @foreach($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
</div>

@push('jss')
<script>
        // $("#tipo_novedad_id option[value=2]").attr('selected', 'selected');
        // $('#tipo_novedad_id').on('change',function(){
        //     console.log($('#tipo_novedad_id').find(":selected").text());
        // });

    document.addEventListener("livewire:load", () => {
        let el = $('#{{ $attributes['id'] }}')
        let buttonsId = '#{{ $attributes['id'] }}-btn-container'

        function initButtons() {
            $(buttonsId + ' .select-all-button').click(function (e) {
                el.val(_.map(el.find('option'), opt => $(opt).attr('value')))
                el.trigger('change')
            })

            $(buttonsId + ' .deselect-all-button').click(function (e) {
                el.val([])
                el.trigger('change')
            })
        }

        function initSelect () {
            initButtons()
            el.select2({
                // theme: "bootstrap-5",
                // containerCssClass:  $('#{{ $attributes['modalTipo'] }}'),
                // dropdownCssClass: $('#{{ $attributes['id'] }}'),
                dropdownParent: $('#{{ $attributes['modalTipo'] }}').parent(),
                placeholder: '{{ __('Seleccione su opción') }}',
                // allowClear: !el.attr('required'),
                allowClear: false

            })
        }

        initSelect()

        Livewire.hook('message.processed', (message, component) => {
            initSelect()
        });

        el.on('change', function (e) {
            let data = $(this).select2("val")
            if (data === "null") {
                data = null
            }

            console.log('{{ $attributes['wire:model'] }}');
            if('{{ $attributes['wire:model'] }}' != ""){
                console.log('yep')
                @this.set('{{ $attributes['wire:model'] }}', data)
            }
        });
    });
</script>
@endpush
