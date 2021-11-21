@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container">
    <div class="text-justify">
        <section id="repair-section" class="mb-5">
            <div class="row">
                <div class="col-9 offset-1">
                    <h2 class="mb-5 --poppins --bold">We repair</h2>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-4 mt-0">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h4 class="--poppins --bold">Desktops</h4>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-4 mt-0">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h4 class="--poppins --bold">Laptops</h4>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-4 mt-0">
                        <i class="fas fa-tv"></i>
                    </div>
                    <h4 class="--poppins --bold">TVs</h4>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-4 mt-0">
                        <i class="fas fa-tablet-alt"></i>
                    </div>
                    <h4 class="--poppins --bold">Tablets</h4>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-4 mt-0">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4 class="--poppins --bold">Mobile Phones</h4>
                </div>

                <div class="col-md-4 col-sm-12 text-center mb-5">
                    <div class="display-4 mt-0">
                        <i class="fas fa-print"></i>
                    </div>
                    <h4 class="--poppins --bold">Printer</h4>
                </div>
            </div>
        </section>

        <section id="upgrade-section" class="mt-5 mb-5">
            <div class="row">
                <div class="col-10 offset-1">
                    <h2 class="--roboto-condensed --bold">On upgrades...</h2>
                    <p class="--poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid illum autem magnam distinctio ipsum minima eaque saepe nemo aliquam incidunt?</p>
                </div>
            </div>
        </section>

        {{-- SET PAGINATION HERE --}}
        <section id="print-section" class="mt-5 mb-5">
            <div class="row">
                <div class="col-10 offset-1">
                    <h2 class="--roboto-condensed --bold">Print, Scan, and Photocopy</h2>
                    <p class="--poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis beatae animi totam placeat voluptatem dolores similique cupiditate rem mollitia repellat?</p>
                    <div class="table-responsive">
                        <table class="table table-striped shadow">
                            <thead class="--roboto-condensed text-center">
                                <th scope="row">Size</th>
                                <th>Color</th>
                                <th>Image size</th>
                                <th>Price</th>
                            </thead>

                            <tbody class="--poppins">
                                <tr>
                                    <td rowspan="6">
                                        <p class="text-center">Letter Size/Short (8.5 in by 11 in)</p>
                                    </td>
                                    <td>Black and white</td>
                                    <td>---</td>
                                    <td>&#8369; 2.00</td>
                                </tr>

                                <tr>
                                    <td>Black and white</td>
                                    <td>Any size</td>
                                    <td>&#8369; 2.00</td>
                                </tr>

                                <tr>
                                    <td>Colored (text only)</td>
                                    <td>---</td>
                                    <td>&#8369; 3.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>less than or equal to &frac14; of paper</td>
                                    <td>&#8369; 6.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>greater than &frac14; - less than or equal to  &frac12; of paper</td>
                                    <td>&#8369; 8.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>greater than &frac12; of paper</td>
                                    <td>&#8369; 10.00</td>
                                </tr>
                                {{-- PAGE 2 --}}
                                <tr>
                                    <td rowspan="6">
                                        <p class="text-center">Long (8.5 in by 13 in)</p>
                                    </td>
                                    <td>Black and white</td>
                                    <td>---</td>
                                    <td>&#8369; 3.00</td>
                                </tr>

                                <tr>
                                    <td>Black and white</td>
                                    <td>Any size</td>
                                    <td>&#8369; 3.00</td>
                                </tr>

                                <tr>
                                    <td>Colored (text only)</td>
                                    <td>---</td>
                                    <td>&#8369; 5.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>less than or equal to &frac14; of paper</td>
                                    <td>&#8369; 7.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>greater than &frac14; - less than or equal to  &frac12; of paper</td>
                                    <td>&#8369; 9.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>greater than &frac12; of paper</td>
                                    <td>&#8369; 15.00</td>
                                </tr>
                                {{-- PAGE 3 --}}
                                <tr>
                                    <td rowspan="6">
                                        <p class="text-center">A4 ()</p>
                                    </td>
                                    <td>Black and white</td>
                                    <td>---</td>
                                    <td>&#8369; 3.00</td>
                                </tr>

                                <tr>
                                    <td>Black and white</td>
                                    <td>Any size</td>
                                    <td>&#8369; 3.00</td>
                                </tr>

                                <tr>
                                    <td>Colored (text only)</td>
                                    <td>---</td>
                                    <td>&#8369; 5.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>less than or equal to &frac14; of paper</td>
                                    <td>&#8369; 7.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>greater than &frac14; - less than or equal to  &frac12; of paper</td>
                                    <td>&#8369; 9.00</td>
                                </tr>

                                <tr>
                                    <td>Colored</td>
                                    <td>greater than &frac12; of paper</td>
                                    <td>&#8369; 15.00</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection