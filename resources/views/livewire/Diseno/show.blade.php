@if ($openShow)
<div wire:ignore.self class="modal fade overflow-scroll" id="ShowDiseno" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 890px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="float-left" style="flex: auto;margin-right: 34px;">
                    <p class="modal-title display-6 ml-2 max-w-md text-3xl" id="exampleModalLabel">Obra: {{ $diseno?$diseno->Obra->NombreObra:'-' }}</p>
                </div>
                <div class="float-right w-72 text-right" style="flex: auto;margin-right: 2px;">
                    <p><strong>Información actualizada en: </strong><br>{{ $diseno?date('d-m-Y h:i A', strtotime($diseno->updated_at )) :'-' }}</p>
                </div>

                <div class="position-relative" style="width: 40px;">
                    <button type="button" class="close position-absolute" wire:click.prevent="cerrarmodal('#ShowDiseno')" aria-label="Close">
                        <span aria-hidden="true close-btn">X</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row mt-2 mx-4">
                        <div class="col-md-6">
                            <p><strong>Cantidad de Imagenes adjuntas: </strong>{{ $diseno->ImagenPlano }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="float-right"><strong>Información actualizada </strong>{{ $diseno->updated_at }}</p>
                        </div>
                        <div class="col-md-12">
                            <strong>Observacion de diseno:</strong><br>
                            <p>{{ $diseno->ObservacionDiseno?$diseno->ObservacionDiseno:'Sin observación' }}</p>
                        </div>
                    </div>
                </div>
                <div class="mx-4 py-3">
                    <div class="slider-diseno swiper-container" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper" style="text-align: center;">
                            @foreach ($diseno->Images as $image)
                            <div class="swiper-slide mb-4">
                                <div class="testimonial-wrap">
                                    @if (Storage::disk('public')->exists($image->archivo))
                                        <img src="{{ '/storage/'.$image->archivo }}" width="80%" alt="{{ $image->archivo }}"><br>
                                    @else
                                        {{-- <img src="{{ '/storage/'.$image->archivo }}" width="80%" alt="{{ $image->archivo }}"><br> --}}
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#ShowDiseno')">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@push('jss')
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.slider-diseno', {
                speed: 600,
                loop: false,
                autoplay: false,
                // {
                //     delay: 5000,
                //     disableOnInteraction: false
                // },
                slidesPerView: 'auto',
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true
                },
                // breakpoints: {
                //     320: {
                //         slidesPerView: 2,
                //         spaceBetween: 20
                //     },

                //     1200: {
                //         slidesPerView: 3,
                //         spaceBetween: 22
                //     }
                // }
            });

        });

    </script>
@endpush

