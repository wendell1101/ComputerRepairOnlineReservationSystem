@extends('layouts.app')

@section('content')
<div class="--background-img">
    <div class="--dark-overlay"></div>
</div>

<div class="container">
    <div class="text-justify">
        <div class="row">
            {{-- MAIN SECTION --}}
            <div id="services-fees-main" class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1 offset-sm-0">
                {{-- REPAIR SECTION --}}
                <section id="repair-section" class="">
                    <div class="row">
                        <h2 class="mb-3 --roboto-condensed --bold col-md-12"> We repair these devices...</h2>
                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="my-0 --repair-icons" >
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <h4 class="--poppins --bold mt-0">Desktops</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">&#8369;800.00 for desktop reformat</p>
                                </div>
                            </div>    
                        </div>
        
                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="--repair-icons mt-0">
                                    <i class="fas fa-laptop"></i>
                                </div>
                                <h4 class="--poppins --bold">Laptops</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">&#8369;600.00 for laptop reformat</p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="--repair-icons mt-0">
                                    <i class="fas fa-tv"></i>
                                </div>
                                <h4 class="--poppins --bold">TVs</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">Lorem ipsum</p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4 col-sm-12 text-center mb-5 --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="--repair-icons mt-0">
                                    <i class="fas fa-tablet-alt"></i>
                                </div>
                                <h4 class="--poppins --bold">Tablets</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">Lorem ipsum</p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="--repair-icons mt-0">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h4 class="--poppins --bold">Mobile Phones</h4>
                                <div class="--repair-info" style="display: none;">
                                    <p class="--body-16">Lorem ipsum</p>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4 col-sm-12 text-center mb-5  --repair-card-col">
                            <div class="--repair-cards p-4">
                                <div class="--repair-icons mt-0">
                                    <i class="fas fa-print"></i>
                                </div>
                                <h4 class="--poppins --bold">Printer</h4>
                                <div class="--repair-info mt-3" style="display: none;">
                                    <p class="--body-16">Lorem ipsum</p>
                                </div>
                            </div>
                        </div>

                        {{-- CUSTOM INFO CARD --}}
                        <div class="col-md-12 col-sm-12">
                            <div class="row no-gutters shadow ">
                                <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center">
                                    <h1 class="text-center --text-green mb-0">
                                        <i class="fas fa-info-circle"></i>
                                    </h1>    
                                </div>

                                <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                                    <ul class="fa-ul --poppins --body-16">
                                        <li>
                                            <i class="fa-li fas fa-cog"></i>
                                            Checkup/Diagnosis is <strong>FREE</strong>
                                        </li>

                                        <li>
                                            <i class="fa-li fas fa-cog"></i>
                                            The repair fee depends on the damage  on your device, so we can only give you the specific price <strong>AFTER</strong> we check your device.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
        
                {{-- UPGRADE SECTION --}}
                <section id="upgrade-section" class="">
                    <div class="">
                        <h2 class="--roboto-condensed --bold">On upgrades...</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 --repair-card-col text-center mb-5">
                                <div class="--repair-cards p-4">
                                    <div class="--repair-icons mt-0">
                                        <i class="fas fa-hdd"></i>
                                    </div>
                                    <h4 class="--poppins --bold">Storage</h4>
                                    <div class="--repair-info mt-3 --poppins" style="display: none;">
                                        <p class="--body-16">Expand your computer's storage by ordering an HDD (hard disk drive) or an SSD (solid state drive) from us. </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-12 --repair-card-col text-center mb-5">
                                <div class="--repair-cards p-4">
                                    <div class="--repair-icons mt-0">
                                        <i class="fas fa-memory"></i>  
                                    </div>

                                    <h4 class="--poppins --bold">Memory</h4>
                                    <div class="--repair-info mt-3" style="display: none;">
                                        <p class="--body-16">Improve your computer's speed by ordering a RAM (random access memory) from us.</p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- CUSTOM INFO CARD --}}
                        <div class="col-md-12 col-sm-12 mb-5">
                            <div class="row no-gutters shadow ">
                                <div class="--bg-gray-800 col-md-2 col-sm-12 d-flex justify-content-center align-items-center">
                                    <h1 class="text-center --text-green mb-0">
                                        <i class="fas fa-info-circle"></i>
                                    </h1>    
                                </div>

                                <div class="--bg-gray-50 col-md-10 col-sm-12 p-4">
                                    <ul class="fa-ul --poppins --body-16">
                                        <li>
                                            <i class="fa-li fas fa-cog"></i>
                                            Fun fact: A computer boots faster if it both has an SSD and HDD.
                                        </li>

                                        <li>
                                            <i class="fa-li fas fa-cog"></i>
                                            Improve your computer's speed by ordering a RAM (random access memory) from us.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        
                {{-- SET PAGINATION HERE --}}
                <section id="print-section">
                    <div class="">
                        <h2 class="--roboto-condensed --bold">Print, scan, and photocopy...</h2>
                        <p class="--poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis beatae animi totam placeat voluptatem dolores similique cupiditate rem mollitia repellat?</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                </section>
            </div>
        </div>
    </div>
</div>
@endsection