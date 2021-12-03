<div wire:ignore>
    <form action="{{ route('dropzone') }}" method="post" class="dropzone" {{ $attributes }}>
    @csrf
    </form>
    {{-- <div class="dropzone" {{ $attributes }}></div> --}}
</div>

@push('jss')
   <script>

       document.addEventListener('DOMContentLoaded', function(){
            @this.on('modalOpen', function(){

            })
       })

        Dropzone.options.{{ $attributes['id'] }} = {
            maxFilesize: {{ $attributes['max-file-size'] ?? 2 }},
            maxFiles: {{ $attributes['max-files'] ?? 'null' }},
            dictDefaultMessage: "Arrastre o seleccione las imagenes",
            paramName: "{{ $attributes['paramName'] }}",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            params: {
                // size: {{ $attributes['max-file-size'] ?? 2 }},
                // model_id: {{ $attributes['model-id'] ?? 0 }},
                collection_name: "default"
            },
            success: function (file, response) {
                console.log(file)
                console.log(response)
                document.addEventListener("livewire:load", () => {
                    
                }
                // @this.addMedia(response.media)
            },
            error: function (file, response) {
                console.log(response)
                file.previewElement.classList.add('dz-error')
                let message = $.type(response) === 'string' ? response : response.errors.file
                return _.map(file.previewElement.querySelectorAll('[data-dz-errormessage]'), r => r.textContent = message)
            }
                //     removedfile: function (file) {
                //         file.previewElement.remove()

                //         if (file.status === 'error') {
                //             return;
                //         }

                //         if (file.xhr) {
                //             var response = JSON.parse(file.xhr.response)
                // @this.removeMedia(response.media)
                //         } else {
                // @this.removeMedia(file)

                //             if (this.options.maxFiles !== null) {
                //                 this.options.maxFiles++
                //             }
                //         }
                //     },

        }

    </script>
@endpush
