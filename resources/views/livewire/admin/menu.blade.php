<div>
    @section('css')
    <link rel="stylesheet" href={{ asset('assets-admin/css/admin.css') }}>
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <style>
        .testimonial-item p {
            /* box-sizing: border-box; */
            overflow: hidden;
            height: 60px;
        }
    </style>
    @endsection

    <div class="">
        <div class="position-absolute">
            @include('components.message-general')
        </div>
        <section class="section">
            <div class="row ">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-2 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15 titleInfo">Nuevos Proyectos</h5>
                                            <h2 class="mb-3 font-18">{{ $newObras[0] }}</h2>
                                            <p class="mb-0">
                                                <span class="{{ $newObras[1]< 0 ? "col-orange":"col-green" }}">{{ $newObras[1]< 0 ? $newObras[1]*-1: $newObras[1] }} %</span><br>
                                                {{ $newObras[1]< 0 ? 'Decremento': 'Incremento' }}
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets-admin/img/banner/i2.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-2 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15 titleInfo">Clientes nuevos </h5>
                                            <h2 class="mb-3 font-18">{{$newClientes[0]}}</h2>
                                            <p class="mb-0">
                                                <span class="{{ $newClientes[1]< 0 ? "col-orange":"col-green" }}">{{ $newClientes[1]< 0 ? $newClientes[1]*-1: $newClientes[1] }} %</span><br>
                                                {{ $newClientes[1]< 0 ? 'Decremento': 'Incremento' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets-admin/img/banner/2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pl-2 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15 titleInfo">Nuevas Novedades </h5>
                                            <h2 class="mb-3 font-18">{{ $newNovedad[0]}}</h2>
                                            <p class="mb-0">
                                                <span class="{{ $newNovedad[1]< 0 ? "col-orange":"col-green" }}">{{ $newNovedad[1]< 0 ? $newNovedad[1]*-1: $newNovedad[1] }} %</span><br>
                                                {{ $newNovedad[1]< 0 ? 'Decremento': 'Incremento' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets-admin/img/banner/i4.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-2 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15 titleInfo">Empleados Disponibles</h5>
                                            <h2 class="mb-3 font-18">{{ $newUsuario[0]}}</h2>
                                            <p class="mb-0">
                                                <span class="{{ $newUsuario[1]< 0 ? "col-orange":"col-green" }}">{{ $newUsuario[1]< 0 ? $newUsuario[1]*-1: $newUsuario[1] }} %</span><br>
                                                {{ $newUsuario[1]< 0 ? 'Decremento': 'Incremento' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="assets-admin/img/banner/i3.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card testimonials" data-aos="fade-up">
                        <div class="card-header">
                            <span class="text-2xl text-gray-900 font-semibold mt-1">Obras Registradas Recientemente</span>
                        </div>
                        <div class="pr-3 pl-1">
                            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                                <div class="swiper-wrapper">

                                   @foreach ($obrasUlt as $obra)
                                    <div class="swiper-slide">
                                        <div class="testimonial-wrap">
                                            <div class="testimonial-item equalizer" style="height: auto !important; box-shadow: -8px -4px 15px rgb(0 0 0 / 8%) !important;">
                                                <div class="testimonial-img justify-center text-center" style="float:none !important;">
                                                    @if ($obra->Images()->first())
                                                        @if (Storage::disk('public')->exists($obra->Images()->first()->archivo))
                                                            <img class="max-h-28 " src="{{ '/storage/'. $obra->Images()->first()->archivo }}" alt="img">
                                                        @else
                                                            <img src="https://images.unsplash.com/photo-1547517023-7ca0c162f816" alt="">
                                                        @endif
                                                    @else
                                                            <img src="https://images.unsplash.com/photo-1547517023-7ca0c162f816" alt="">
                                                    @endif
                                                </div>
                                                <h3 class="mt-6">{{ $obra->NombreObra }}</h3>
                                                <p>
                                                    {{-- *Informacion* <br> --}}
                                                    {{ Carbon\Carbon::parse($obra->created_at)->locale('es')->isoFormat('h:mm a dddd d \d\e MMMM');  }}

                                                    <i class=""></i>
                                                </p><button type="button" class="btn btn-success" wire:click="openObraModal({{ $obra->id }})">Ver detalles</button>

                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->
                                   @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-12 col-xl-6">
                    <!-- Support tickets -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Novedades Recientes</h4>
                            <form class="card-header-form">
                                <input type="text" name="search" class="form-control" placeholder="Buscar">
                            </form>
                        </div>
                        <div class="card-body">
                            @foreach ($novedadesUlt as $novedad)

                                <div class="support-ticket media pb-1 mb-3">
                                    <img src="assets/img/users/user-1.png" class="user-img mr-2" alt="">
                                    <div class="media-body ml-3">
                                        @if ($novedad->reportadoPor->user->getRoleNames()[0] == 'Cliente')
                                            <div class="badge badge-pill badge-warning mb-1 float-right">Cliente</div>
                                        @else
                                            <div class="badge badge-pill badge-primary mb-1 float-right">Empleado</div>
                                        @endif
                                        <span class="font-weight-bold">#{{$novedad->id}}</span>
                                        <a href="javascript:void(0)">{{ $novedad->AsuntoNovedad }}</a>
                                        <p class="my-1">{{ $novedad->DescripcionN }}</p>
                                        <small class="text-muted">Reportado por <span class="font-weight-bold font-13">
                                            {{$novedad->reportadoPor->user->name}}
                                        </span>
                                            &nbsp;&nbsp; {{ $novedad->created_at? $novedad->created_at->diffForHumans():'-' }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('novedad') }}" class="card-footer card-link text-center small ">
                            Ver todo
                        </a>
                    </div>
                    <!-- Support tickets -->
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Empleados asignados por obra</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle">Nombre Obra</th>
                                            <th class="align-middle">Empleados</th>
                                            <th class="align-middle">Cantidad Actividades</th>
                                            <th class="align-middle">Fase Actual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($empleadosUlt as $empleado)
                                       {{-- {{ dd($empleadosUlt) }} --}}
                                            <tr>
                                                <td>{{ $empleado->id }}</td>
                                                <td>{{ $empleado->NombreObra }}</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                        @if ($empleado->Usuarios()->orderBy('NombreCompleto','asc')->get()->count() > 0)
                                                            @foreach ($empleado->Usuarios()->orderBy('NombreCompleto','asc')->get()->take(3) as $user)
                                                                @php
                                                                    $usuarioE = $user->User()->get()->first()
                                                                @endphp
                                                                @php
                                                                    $photo = str_replace('/storage/', '', $usuarioE->profile_photo_url )
                                                                @endphp
                                                                @if (Storage::disk('public')->exists($photo))
                                                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="{{ '/storage/'. $photo }}" alt="#" data-toggle="tooltip" title="" data-original-title="{{ $usuarioE->name }}"></li>
                                                                @else
                                                                    <li class="team-member team-member-sm"><img src="https://ui-avatars.com/api/?name={{ $usuarioE->name }}&color=7F9CF5&background=EBF4FF" alt="#" data-toggle="tooltip" title="" data-original-title="{{ $usuarioE->name }}"></li>
                                                                @endif
                                                            @endforeach
                                                            <li class="avatar avatar-sm"><span class="badge badge-primary">+{{ $empleado->Usuarios()->get()->count() }}</span></li>
                                                        @else
                                                            <li>NO HAY ASIGNADOS</li>
                                                        @endif

                                                    </ul>
                                                </td>
                                                <td class="text-center">{{ $empleado->Actividades()->get()->count() }}</td>
                                                <td>{{ $empleado->EstadoObra }}</td>
                                            </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
    @section('js')
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets-admin/js/dashboard.js')}}"></script>
    @endsection
</div>

@push('jss')
    <script>
        document.addEventListener("livewire:load", () => {
            console.log(@this.newUsuario)
            chartMenu();
        });
        function chartMenu() {
            var options = {
                chart: { // ajustes de estilos grafico
                    height: 230,  //altura del grafico
                    type: "line",
                    shadow: {
                        enabled: true,
                        color: "#000",
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 1
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ["#786BED", "#999b9c"],
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: "smooth"
                },
                series: [{
                    name: "High - 2019",
                    data: [5, 15, 14, 36, 32, 32]
                },
                {
                    name: "Low - 2019",
                    data: [7, 11, 30, 18, 25, 13]
                }
                ],
                grid: {
                    borderColor: "#e7e7e7",
                    row: {
                        colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                        opacity: 0.0
                    }
                },
                markers: {
                    size: 6
                },
                xaxis: {
                    categories: ["Ene", "Mar", "May", "Jul", "Sep", "Nov"],

                    labels: {
                        style: {
                            colors: "#9aa0ac"
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: "Actividad"
                    },
                    labels: {
                        style: {
                            color: "#9aa0ac"
                        }
                    },
                    min: 5,
                    max: 40
                },
                legend: {
                    position: "top",
                    horizontalAlign: "right",
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();
        }


    </script>
@endpush
