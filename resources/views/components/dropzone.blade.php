<div wire:ignore>
    <form action="{{ route('dropzone') }}" method="post" class="dropzone" {{ $attributes }}>
    @csrf
    <input type="hidden" value="a" name="val">
    </form>
    {{-- <div class="dropzone" {{ $attributes }}></div> --}}
</div>

@push('jss')
   <script>

       alert(@this.filterStateIn)
       var eee = localStorage.setItem('valSuccess', false);

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
                console.log(file.upload)
                console.log(response)
                if(file.upload != null){
                    console.log('Upload')
                    localStorage.setItem('valSuccess', true)
                    document.dispatchEvent('livewire:load');
                }
                // valueUpload = 'upload';
                // @this.addMedia(response.media)
            },
            error: function (file, response) {
                console.log(response)
                file.previewElement.classList.add('dz-error')
                let message = $.type(response) === 'string' ? response : response.errors.file
                return _.map(file.previewElement.querySelectorAll('[data-dz-errormessage]'), r => r.textContent = message)
            },

            init: function() {
                this.on("success", function(file, responseText) {

                    document.addEventListener('livewire:load', function(){
                        console.log('neh')
                    })
                })
                document.addEventListener("livewire:load", () => {
                    this.on("success", function(file, responseText) {
                        console.log('neh')
                    })
                });
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

        };

        document.addEventListener('livewire:load', function(){
            @this.on('modalOpen', function(){
                // Livewire.emit('crearPlano');
            })

            // $('#photo').on('success', function() {
            //     alert('dxvfidchvgjnk')
            //     var args = Array.prototype.slice.call(arguments);

            //     // Look at the output in you browser console, if there is something interesting
            //     console.log(args);
            // })

            if(localStorage.getItem('valSuccess')){
                alert('ao');
            }

       })


    </script>
@endpush
