<x-app-layout>

    @section('css')
    <link rel="stylesheet" href={{ asset('assets-admin/css/admin.css') }}>
    @endsection

    <div class="">
        {{-- <section class="section">
            <div class="container">
                <div class="wrapper">
                    <img src=https://cdn.forbes.com.mx/2021/09/Mario-bros.jpeg>
                    <img src=https://cdn.forbes.com.mx/2021/09/Mario-bros.jpeg>
                    <img src=https://cdn.forbes.com.mx/2021/09/Mario-bros.jpeg>
                    <img src=https://cdn.forbes.com.mx/2021/09/Mario-bros.jpeg>
                </div>
            </div>
        </section> --}}
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
                                            <h2 class="mb-3 font-18">41</h2>
                                            <p class="mb-0"><span class="col-green">10%</span> Incremento</p>
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
                                            <h5 class="font-15 titleInfo">Clientes</h5>
                                            <h2 class="mb-3 font-18">84</h2>
                                            <p class="mb-0"><span class="col-orange">06%</span> Decremento</p>
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
                                            <h2 class="mb-3 font-18">54</h2>
                                            <p class="mb-0"><span class="col-green">18%</span>
                                                Incremento</p>
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
                                            <h2 class="mb-3 font-18">26</h2>
                                            <p class="mb-0"><span class="col-green">22%</span>Incremento</p>
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
            <div class="container testimonials mb-5" data-aos="fade-up">
                <h2 class="mt-1">Obras Registradas Recientemente</h2>
                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    {{-- <div class="testimonial-img"> --}}
                                    <div class="testimonial-img">
                                        <i class="bi bi-cash-coin icon"></i>
                                    </div>

                                    {{-- </div> --}}

                                    <h3>Obra parque fontanar</h3>

                                    <p>
                                        <i class=""></i>
                                        *Informacion*

                                        <i class=""></i>

                                    </p><button type="button" class="btn btn-success">Ver detalles</button>

                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="testimonial-img">
                                        <i class="bi bi-lightning-charge-fill icon"></i>
                                    </div>
                                    <h3> Parque Cristal </h3>
                                    <p>
                                        <i class=""></i>
                                        *informacion*
                                        <i class=""></i>
                                    </p><button type="button" class="btn btn-success">Ver detalles</button>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">

                                    <div class="testimonial-img">
                                        <i class="bi bi-shield-shaded icon"></i>
                                    </div>
                                    <h3>Parque verde</h3>
                                    <p>
                                        <i class=""></i>
                                        *informacion*
                                        <i class=""></i>
                                    </p><button type="button" class="btn btn-success">Ver detalles</button>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="testimonial-img">
                                        <i class="bi bi-clipboard-check icon"></i>
                                    </div>

                                    <h3>Gimnacio don musculos </h3>
                                    <p>
                                        <i class=""></i>
                                        *Informacion*
                                        <i class=""></i>
                                    </p><button type="button" class="btn btn-success">Ver detalles</button>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Gráfico de Actividades</h4>
                            <div class="card-header-action">
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown"
                                        class="btn btn-primary dropdown-toggle">Opciones</a>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> Ver</a>
                                        <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item has-icon text-danger"><i
                                                class="far fa-trash-alt"></i>
                                            Eliminar</a>
                                    </div>
                                </div>
                                {{-- <a href="#" class="btn btn-primary">()</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div id="chart1"></div>
                                    <div class="row mb-0">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="list-inline text-center">
                                                <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                                        class="col-green"></i>
                                                    <h5 class="m-b-0">204</h5>
                                                    <p class="text-muted font-14 m-b-0">Actividades En Proceso</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="list-inline text-center">
                                                <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                                                        class="col-orange"></i>
                                                    <h5 class="m-b-0">93</h5>
                                                    <p class="text-muted font-14 m-b-0">Actividades Atrasadas</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="list-inline text-center">
                                                <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                                        class="col-green"></i>
                                                    <h5 class="mb-0 m-b-0">366</h5>
                                                    <p class="text-muted font-14 m-b-0">Actividades Terminadas</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row mt-5">
                                        <div class="col-7 col-xl-7 mb-3">Total Actividades</div>
                                        <div class="col-5 col-xl-5 mb-3">
                                            <span class="text-big">673</span>
                                            <sup class="col-green">+09%</sup>
                                        </div>
                                        <div class="col-7 col-xl-7 mb-3">Total Novedades</div>
                                        <div class="col-5 col-xl-5 mb-3">
                                            <span class="text-big">212</span>
                                            <sup class="text-danger">+11%</sup>
                                        </div>
                                        <div class="col-7 col-xl-7 mb-3">Proyectos Completados</div>
                                        <div class="col-5 col-xl-5 mb-3">
                                            <span class="text-big">127</span>
                                            <sup class="col-green">+0.4%</sup>
                                        </div>
                                        <div class="col-7 col-xl-7 mb-3">Total expense</div>
                                        <div class="col-5 col-xl-5 mb-3">
                                            <span class="text-big">$6,287</span>
                                            <sup class="col-green">+09%</sup>
                                        </div>
                                        <div class="col-7 col-xl-7 mb-3">Nuevos Clientes</div>
                                        <div class="col-5 col-xl-5 mb-3">
                                            <span class="text-big">19</span>
                                            <sup class="col-green">-1%</sup>
                                        </div>
                                    </div>
                                </div>
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
                            <div class="support-ticket media pb-1 mb-3">
                                <img src="assets/img/users/user-1.png" class="user-img mr-2" alt="">
                                <div class="media-body ml-3">
                                    <div class="badge badge-pill badge-warning mb-1 float-right">Cliente</div>
                                    <span class="font-weight-bold">#89754</span>
                                    <a href="javascript:void(0)">Please add advance table</a>
                                    <p class="my-1">Hi, can you please add new table for advan...</p>
                                    <small class="text-muted">Reportado por <span class="font-weight-bold font-13">John
                                            Deo</span>
                                        &nbsp;&nbsp; - 1 día antes</small>
                                </div>
                            </div>
                            <div class="support-ticket media pb-1 mb-3">
                                <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                                <div class="media-body ml-3">
                                    <div class="badge badge-pill badge-warning mb-1 float-right">Cliente</div>
                                    <span class="font-weight-bold">#57854</span>
                                    <a href="javascript:void(0)">Select item not working</a>
                                    <p class="my-1">please check select item in advance form not work...</p>
                                    <small class="text-muted">Reportado por <span class="font-weight-bold font-13">Sarah
                                            Smith</span>
                                        &nbsp;&nbsp; - 2 día antes</small>
                                </div>
                            </div>
                            <div class="support-ticket media pb-1 mb-3">
                                <img src="assets/img/users/user-3.png" class="user-img mr-2" alt="">
                                <div class="media-body ml-3">
                                    <div class="badge badge-pill badge-primary mb-1 float-right">Empleado</div>
                                    <span class="font-weight-bold">#85784</span>
                                    <a href="javascript:void(0)">Are you provide template in Angular?</a>
                                    <p class="my-1">can you provide template in latest angular 8.</p>
                                    <small class="text-muted">Reportado por <span class="font-weight-bold font-13">Ashton
                                            Cox</span>
                                        &nbsp;&nbsp; -2 día antes</small>
                                </div>
                            </div>
                            <div class="support-ticket media pb-1 mb-3">
                                <img src="assets/img/users/user-6.png" class="user-img mr-2" alt="">
                                <div class="media-body ml-3">
                                    <div class="badge badge-pill badge-primary mb-1 float-right">Empleado</div>
                                    <span class="font-weight-bold">#25874</span>
                                    <a href="javascript:void(0)">About template page load speed</a>
                                    <p class="my-1">Hi, John, can you work on increase page speed of template...</p>
                                    <small class="text-muted">Reportado por <span class="font-weight-bold font-13">Hasan
                                            Basri</span>
                                        &nbsp;&nbsp; -3 día antes</small>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="card-footer card-link text-center small ">
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
                                            <th>#</th>
                                            <th>Nombre Obra</th>
                                            <th>Empleados</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fase Actual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin/img/users/user-8.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-9.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                                </ul>
                                            </td>
                                            <td>01-09-2021</td>
                                            <td>Espera</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Cara Stevens
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin/img/users/user-8.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-9.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span></li>
                                                </ul>
                                            </td>
                                            <td>15-07-2021</td>
                                            <td>En proceso</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                Airi Satou
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin/img/users/user-8.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-9.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span></li>
                                                </ul>
                                            </td>
                                            <td>25-08-2021</td>
                                            <td>Atrazada</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                Angelica Ramos
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-9.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                                                </ul>
                                            </td>
                                            <td>01-05-2021</td>
                                            <td>Terminada</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                Ashton Cox
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin/img/users/user-8.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                                </ul>
                                            </td>
                                            <td>18-04-2021</td>
                                            <td>Terminada</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                John Deo
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin/img/users/user-8.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span></li>
                                                </ul>
                                            </td>
                                            <td>22-09-2021</td>
                                            <td>Sin Iniciar</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                Hasan Basri
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-9.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                                  <li class="team-member team-member-sm"><img class="rounded-circle" src="assets-admin//img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                                  <li class="avatar avatar-sm"><span class="badge badge-primary">+5</span></li>
                                                </ul>
                                            </td>
                                            <td>07-09-2021</td>
                                            <td>Cancelada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </section>

        @section('js')
        <link rel="stylesheet" href={{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}>
        @endsection

        @push('modals')

        @endpush

</x-app-layout>
