<div wire:ignore>
    <form action="{{ route('dropzone') }}" method="post" class="dropzone" {{ $attributes }}>
    @csrf
    <input type="hidden" value="{{ $attributes['model'] }}" name="model">
    </form>
</div>

@push('jss')
   <script>
        var form = document.getElementById('photo');
        // @this.on('modalOpen', function(){
        //         $('{{ $attributes['id'] }}').removeAllFiles();
        // })

        Dropzone.options.{{ $attributes['id'] }} = {
            maxFilesize: {{ $attributes['max-file-size'] ?? 3 }},
            maxFiles: {{ $attributes['max-files'] ?? 'null' }},
            dictDefaultMessage: "Arrastre o seleccione las imagenes",
            paramName: "{{ $attributes['paramName'] }}",
            acceptedFiles: "{{ $attributes['acceptedFiles'] }}",
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
                var valfile = {nameFile:response};
                let fileupload = {
                    ...file.upload,
                    ...valfile
                };
                console.log(fileupload)
                // valfile = fileupload.push(response);
                var val = JSON.parse(localStorage.getItem('upload'));
                localStorage.setItem('upload', JSON.stringify(val.concat(fileupload) ))  ;
                @this.imagesUpdate();
            },
            removedfile: function (file) {
                file.previewElement.remove()
                console.log(file)
                var val = JSON.parse(localStorage.getItem('upload'));
                console.log(val)
                for(var i = 0; i < val.length; i++){
                    if(val[i].uuid == file.upload.uuid){
                        @this.removeFile(val[i].nameFile);
                        val.splice(i, 1);
                    }
                }
                localStorage.setItem('upload', JSON.stringify(val));
                @this.imagesUpdate();

            },
            error: function (file, response) {
                console.log(response)
                file.previewElement.classList.add('dz-error')
                let message = $.type(response) === 'string' ? response : response.errors.file
                return _.map(file.previewElement.querySelectorAll('[data-dz-errormessage]'), r => r.textContent = message)
            },

            init: function() {
                localStorage.setItem('upload',JSON.stringify([]) );

                // $("#dropzon").click(function () {
                //     photo.removeAllFiles();
                // });

                // this.on("complete", function(file) {
                //     this.removeAllFiles(true);
                // })
                // let files = @this.mediaCollections["{{ $attributes['collection-name'] ?? 'default' }}"]
                // if (files !== undefined && files.length) {
                //     files.forEach(file => {
                //         let fileClone = JSON.parse(JSON.stringify(file))
                //         this.files.push(fileClone)
                //         this.emit("addedfile", fileClone)

                //         if (fileClone.preview_thumbnail !== undefined) {
                //             this.emit("thumbnail", fileClone, fileClone.preview_thumbnail)
                //         } else {
                //             this.emit("thumbnail", fileClone, fileClone.url)
                //         }

                //         this.emit("complete", fileClone)
                //         if (this.options.maxFiles !== null) {
                //             this.options.maxFiles--
                //         }
                //     })
                // }
            },

        };


    </script>
@endpush
