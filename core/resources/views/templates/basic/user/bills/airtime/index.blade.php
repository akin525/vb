@extends($activeTemplate . 'layouts.app')
@section('panel')
    <!-- File export -->
    <div class="row">
        <form id="dataForm" >
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <br>
                    <br>
                    <div id="AirtimePanel">
                        <div class="subscribe">
                            <p>AIRTIME PURCHASE</p>
                            {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                            <br/>
                            <div id="div_id_network" class="form-group">
                                <label for="network" class=" requiredField">
                                    Network<span class="asteriskField">*</span>
                                </label>
                                <div class="">
                                    <select name="operator" class="text-success form-control" required="">

                                        <option value="MTN">MTN</option>
                                        <option value="GLO">GLO</option>
                                        <option value="AIRTEL">AIRTEL</option>
                                        <option value="9MOBILE">9MOBILE</option>

                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div id="div_id_network" >
                                <label for="network" class=" requiredField">
                                    Enter Amount<span class="asteriskField">*</span>
                                </label>
                                <div class="">
                                    <input type="number" id="amount" name="amount" min="100" max="4000" oninput="calc()" class="text-success form-control" required>
                                </div>
                            </div>
                            <br/>
                            <div id="div_id_network" class="form-group">
                                <label for="network" class=" requiredField">
                                    Enter Phone Number<span class="asteriskField">*</span>
                                </label>
                                <div class="">
                                    <input type="number" id="anyme" name="phone" minlength="11" class="text-success form-control" required>
                                </div>
                            </div>
                            <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                            <button type="submit" class="submit-btn">PURCHASE<span class="load loading"></span></button>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="small mb-1" for="amount" style="color: #000000"><b>Amount to Pay (<span>₦</span>)</b></label>
                                    <br>
                                    <span class="text-danger">2% Discount:</span> <b class="text-success">₦<span id="shownow1"></span></b>
                                </div>
                            </div>
                            <script>
                                function calc(){
                                    var value = document.getElementById("amount").value;
                                    var percent = 2/100 * value;
                                    var reducedvalue = value - percent;
                                    document.getElementById("shownow1").innerHTML = reducedvalue;

                                }
                            </script>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 ">
                    <br>
                    <div class="card-body">
                        <a href="#">
                            <div class="center">
                                <img    src="{{ asset('assets/assets/dist/images/backgrounds/airtime.png') }}" alt="#" />
                            </div>
                        </a>
                        {{--                    <video width="320" height="240" controls autoplay loop>--}}
                        {{--                        <source src="{{asset('ads/ads.mp4')}}" type="video/mp4">--}}
                        {{--                        Your browser does not support the video tag.--}}
                        {{--                    </video>--}}
                    </div>

                    {{--                <a href="{{route('advertisement')}}" class="btn btn-success">Advertise here</a>--}}


                    {{--                <p><b>You can use the codes below to check your Airtime Balance!  </b> </p>--}}


                                    <h6>
                                        <ul class="list-group">
                                            <b><li class="list-group-item list-group-item-primary bold"> MTN *310#</li></b>
{{--                                            <b><li class="list-group-item list-group-item-success">MTN [CG] *131*4# or *460*260#</li></b>--}}
                                            <b><li class="list-group-item list-group-item-action">9mobile  *310#</li></b>
                                            <b><li class="list-group-item list-group-item-info">Airtel *310#</li></b>
                                            <b><li class="list-group-item list-group-item-secondary">Glo *310#</li></b>
                                        </ul>
                                    </h6>
                    <br>
                    <style>
                        img {
                            max-width: 100%;
                            height: auto;
                        }
                    </style>
                    <div class="card-body">
                        <div class="center">
                            {{--                        <img    src="{{asset('images/tp.jpeg')}}" alt="#" />--}}
                        </div>
                    </div>

                    <br>




                </div>
            </div>

        </form>


    @endsection

    @push('breadcrumb-plugins')
        <a class="btn btn-sm btn-primary" href="{{ route('user.airtime.history') }}"> <i class="ti ti-printer"></i> @lang('Airtime Log')</a>
    @endpush
    @push('script')
            <script>
                $(document).ready(function() {


                    // Send the AJAX request
                    $('#dataForm').submit(function(e) {
                        e.preventDefault(); // Prevent the form from submitting traditionally

                        // Get the form data
                        var formData = $(this).serialize();
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'Do you want to buy airtime of ₦' + document.getElementById("amount").value + ' on ' + document.getElementById("anyme").value +' ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $('#loadingSpinner').show();
                                // web2app.advert.showinterstitial(myCallback)


                                $.ajax({
                                    url: "{{ route('user.buy.airtime') }}",
                                    type: 'POST',
                                    data: formData,
                                    success: function(response) {
                                        // Handle the success response here
                                        $('#loadingSpinner').hide();

                                        console.log(response);
                                        // Update the page or perform any other actions based on the response

                                        if (response.status == 'success') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: response.message
                                            }).then(() => {
                                                location.reload(); // Reload the page
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'info',
                                                title: 'Pending',
                                                text: response.message
                                            });
                                            // Handle any other response status
                                        }

                                    },
                                    error: function(xhr) {
                                        $('#loadingSpinner').hide();
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'fail',
                                            text: xhr.responseText
                                        });
                                        // Handle any errors
                                        console.log(xhr.responseText);

                                    }
                                });

                            }
                        });
                    });
                });

            </script>

    @endpush
