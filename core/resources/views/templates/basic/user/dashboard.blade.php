@extends($activeTemplate . 'layouts.app')
@section('panel')
    <div class="row">
        @if ($general->login_bonus == 1)
            @if (Auth::user()->earn_at < DTnow() || Auth::user()->earn_at == null)
                <!--begin::Engage widget 4-->
                <div class="col-lg-12">
                    <div class="card border-transparent " data-bs-theme="light" style="background-color: #1C325E;">
                        <!--begin::Body-->
                        <div class="card-body d-flex ps-xl-15">
                            <!--begin::Wrapper-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                    <span class="me-2">
                                        @lang('Welcome') {{ auth::user()->username }} ! <br>
                                        <span class="position-relative d-inline-block text-danger">
                                            <a href="#"
                                                class="text-danger opacity-75-hover">{{ $general->cur_sym }}{{ showAmount($general->login_earn) }}</a>
                                            <!--begin::Separator-->
                                            <span
                                                class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                            <!--end::Separator-->
                                        </span>
                                    </span>
                                    @lang('daily bonus awaits you')
                                </div>
                                <!--end::Title-->

                                <!--begin::Action-->
                                <div class="mb-3">
                                    <a href='{{ route('user.login_earn') }}' class="btn btn-danger fw-semibold me-2">
                                        @lang('Get Reward')
                                    </a>
                                </div>
                                <!--begin::Action-->
                            </div>
                            <!--begin::Wrapper-->

                            <!--begin::Illustration-->
                            <img src="{{ asset('assets/assets/dist/images/backgrounds/gift.gif') }}"
                                class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
                            <!--end::Illustration-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            @endif
        @endif
        <!--end::Engage widget 4-->

        <!--begin::Notice-->
{{--        <div class="col-lg-12 mb-4 align-items-strech">--}}

{{--            <div class="notice d-flex @if(Auth::user()->nuban == null) bg-light-danger rounded border-danger @else bg-light-primary rounded border-primary @endif  border border-dashed min-w-lg-600px flex-shrink-0 p-6">--}}
{{--                <!--begin::Icon-->--}}

{{--                <i class="@if(Auth::user()->nuban == null) ti ti-alert-circle fs-2tx text-danger @else  ti ti-building-bank fs-2tx text-primary @endif me-4">--}}
{{--                    <span class="path1"></span>--}}
{{--                    <span class="path2"></span>--}}
{{--                    <span class="path3"></span>--}}
{{--                </i> <!--end::Icon-->--}}

{{--                <!--begin::Wrapper-->--}}
{{--                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">--}}
{{--                    <!--begin::Content-->--}}
{{--                    <div class="mb-3 mb-md-0 fw-semibold">--}}
{{--                        <h4 class="text-gray-900 fw-bold">@lang('Dedicated Account Number')</h4>--}}
{{--                        @if(Auth::user()->nuban == null)--}}
{{--                        <div class="fs-6 text-gray-700 pe-7">@lang('Please click the generate button to generate your dedicated account number')--}}
{{--                        </div>--}}
{{--                        @else--}}
{{--                            @if($general->nuban_provider == "MONNIFY")--}}
{{--                            @php--}}
{{--                            $nuban = json_decode(Auth::user()->nuban, true);--}}
{{--                            @endphp--}}
{{--                            @foreach($nuban as $data)--}}
{{--                             <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-3">--}}
{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-building-bank fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Bank Name')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$data['bankName']}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}

{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-user fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Account Name')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$data['accountName']}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}
{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-wallet fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Account Number')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$data['accountNumber']}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}
{{--                            </div>--}}
{{--                            @endforeach--}}

{{--                            @elseif($general->nuban_provider == "STROWALLET")--}}
{{--                            <div class="d-flex align-items-center flex-wrap d-grid gap-2 ">--}}
{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-building-bank fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Bank Name')</a>--}}
{{--                                        @php--}}
{{--                                        $bankdetails = json_decode(Auth::user()->nuban);--}}
{{--                                        @endphp--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$bankdetails->bank_name}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}

{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-user fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Account Name')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$bankdetails->account_name}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}
{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-wallet fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Account Number')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$bankdetails->account_number}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}
{{--                            </div>--}}
{{--                            @elseif($general->nuban_provider == "PAYLONY")--}}
{{--                            <div class="d-flex align-items-center flex-wrap d-grid gap-2 ">--}}
{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-building-bank fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Bank Name')</a>--}}
{{--                                        @php--}}
{{--                                        $bankdetails = json_decode(Auth::user()->nuban);--}}
{{--                                        @endphp--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$bankdetails->bank_name}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}

{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-user fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Account Name')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$bankdetails->account_name}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}
{{--                                <!--begin::Item-->--}}
{{--                                <div class="d-flex align-items-center me-5 me-xl-13">--}}
{{--                                    <!--begin::Symbol-->--}}
{{--                                    <div class="symbol symbol-30px symbol-circle me-3">--}}
{{--                                        <span class="symbol-label" style="background: #410a8fc1;">--}}
{{--                                            <i class="ti ti-wallet fs-4 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Symbol-->--}}

{{--                                    <!--begin::Info-->--}}
{{--                                    <div class="m-0">--}}
{{--                                        <a href="#" class="text-dark text-opacity-75 fs-8">@lang('Account Number')</a>--}}
{{--                                        <span class="fw-bold text-dark fs-7 d-block">{{@$bankdetails->account_number}}</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Info-->--}}
{{--                                </div>--}}
{{--                                <!--end::Item-->--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                        <!--end::Items-->--}}

{{--                        @endif--}}
{{--                        <div id="responsemessage"></div>--}}
{{--                    </div>--}}
{{--                    <!--end::Content-->--}}

{{--                    <!--begin::Action-->--}}
{{--                    @if(Auth::user()->nuban == null)--}}
{{--                    <a href="#" id="fundbutton" onclick="generatenuban()" class="btn btn-primary px-6 align-self-center text-nowrap">--}}
{{--                        @lang('Generate') </a>--}}
{{--                    <!--end::Action-->--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <!--end::Wrapper-->--}}
{{--            </div>--}}
{{--        </div>--}}
        <br><br>
        <br><br>

@push('script')
<script>
    function generatenuban() {
        // START GET DATA \\
        const loadingEl = document.createElement("div");
        document.body.prepend(loadingEl);
        loadingEl.classList.add("page-loader");
        loadingEl.classList.add("flex-column");
        loadingEl.classList.add("bg-dark");
        loadingEl.classList.add("bg-opacity-25");
        loadingEl.innerHTML = `
         <span class="spinner-border text-primary" role="status"></span>
         <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
        `;
        document.getElementById("fundbutton").disabled = true;
        $("#responsemessage").html('');
        // Show page loading
        KTApp.showPageLoading();
        var _token = $("input[name='_token']").val();
        var raw = JSON.stringify({
            _token: "{{ csrf_token() }}",
        });

        var requestOptions = {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: raw
        };
        fetch("{{ route('user.generate.nuban') }}", requestOptions)
            .then(response => response.text())
            .then(result => {
                resp = JSON.parse(result);
                document.getElementById("fundbutton").disabled = false;
                $("#responsemessage").html(
                    `<div class="alert alert-${resp.status}" role="alert"><strong>${resp.status} - </strong> ${resp.message}</div>`
                    );

                KTApp.hidePageLoading();
                loadingEl.remove();
                if(resp.status == 'success')
                {
                    location.reload();
                }
            })
            .catch(error => {
            console.info(error);
            });
        // END GET DATA \\


    }
</script>
@endpush


        <div class="col-lg-4 d-flex align-items-strech">
            <div class="card bg-info border-0 w-100">
                <div class="card-body pb-0">
                    <h5 class="fw-semibold mb-1 text-white card-title"> @lang('Wallet Balance') </h5>
                    <div class="text-center mt-3">
                        <img src="{{ asset('assets/assets/dist/images/backgrounds/piggy.png') }}" class="img-fluid"
                            alt="" />
                    </div>
                </div>
                <div class="cards mx-2 mb-2 mt-n2">
                    <div class="card-body">
                        <div class="mb-7 pb-1">
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold text-white">@lang('Main Wallet')</h6>
                                    <p class="fs-3 mb-0"></p>
                                </div>
                                <div>
                                    <span
                                        class="badge bg-light-primary text-primary fw-semibold fs-3">{{ $general->cur_sym }}{{ showAmount($widget['balance']) }}</span>
                                </div>
                            </div>
                            <div class="progress bg-light-primary" style="height: 4px;">
                                <div class="progress-bar w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold text-white">@lang('Referral Wallet')</h6>
                                    <p class="fs-3 mb-0"></p>
                                </div>
                                <div>
                                    <span
                                        class="badge bg-light-secondary text-secondary fw-bold fs-3">{{ $general->cur_sym }}{{ showAmount($widget['ref_balance']) }}</span>
                                </div>
                            </div>
                            <form class="mt-3">
                                <div class="input-group">
                                    <input type="text" id="referralURL"
                                        value="{{ route('user.register', Auth::user()->username) }}" readonly
                                        class="form-control" placeholder="Right Side" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <button onclick="myFunction()"  class="btn btn-light-secondary text-secondary font-medium" type="button"><a
                                            class="ti ti-copy"></a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">@lang('Transaction Overview')</h5>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!--begin::Wrapper-->
            <div class="card card-body d-flex flex-stack flex-grow-1 ">
                <!--begin::Content-->
                <div class=" fw-semibold">
                    <h4 class="text-gray-900 fw-bold">@lang('Trade Crypto')</h4>

                    <div class="fs-6 text-gray-700 ">@lang('Welcome to our crypto trade portal where you can buy and sell crypto digital assets from over 70 currencies available on the platform. <br>
                                   <b> You can click on the Trade Log button at the top right corner of your screen to view your trade log</b>
                                    ')
                        <br> <br>

                        <!--begin::Action-->
                        <a href="{{ route('user.crypto.sell') }}" class="btn btn-primary er fs-6 px-8 py-4 mb-4">
                            @lang('Sell Crypto Now') </a>

                        <a href="{{ route('user.crypto.buy') }}" class="btn btn-secondary er fs-6 px-8 py-4 mb-4">
                            @lang('Buy Crypto Now') </a>
                        <br> <br>



                        <a href="{{ route('user.crypto.rates') }}" class="btn btn-info fs-6 px-8 py-4 mb-4">
                            @lang('View Our Rates') </a>
                        <!--end::Action-->
                    </div>
                </div>
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->

            <div class="card-body ">
                <div class="row ">

                    <div class="col-4 col-sm-3 col-lg-3">
                        <a href="{{url('user/internet/sme')}}">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://play-lh.googleusercontent.com/Vse_HvYw4_KZsvVf0NXXWBNnwEq0GVsihLw5z9yzc14MY8vuBet4Vl_shjP0EGg0WuU">
                             </span>
                                    {{--                            <div class="h6  text-dark">Data</div>--}}
                                    <small>Data</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 col-sm-3 col-lg-3">
                        <a href="{{url('user/airtime')}}">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://cloud.bekonta.com/public/user_dashboard/icons/airtime.svg">
                             </span>
                                    <small>Airtime</small>
                                    {{--                            <div class="h6  text-dark">Airtime</div>--}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 col-sm-3 col-lg-3">
                        <a href="#">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw-WmPyjVF6CMyYO61o15KbQdyMRR5b9X18w&usqp=CAU">
                             </span>
                                    <h6>Tv</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 col-sm-3 col-lg-3">
                        <a href="#">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="data:image/png;base64,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">
                             </span>
                                    <small>Electricity</small>
                                    {{--                            <div class="h6 m-2 text-dark">Electricity</div>--}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 col-sm-3 col-lg-3">
                        <a href="#">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://www.pngkit.com/png/detail/174-1749798_money-transfer-icon-png.png">
                             </span>
                                    <small>Withdraw Commission</small>
                                    {{--                            <div class="h6 m-2 text-dark">Electricity</div>--}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 col-sm-3 col-lg-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#newspends">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="data:image/jpeg;base64,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">
                             </span>
                                    {{--                            <div class="h6 m-2 text-dark">Fund Wallet</div>--}}
                                    <small>Fund Wallet</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>



    </div>



<!--begin::Row-->
<div class="row gy-5 g-xl-10">
  <!--begin::Col-->
  <div class="col-xl-4 mb-xl-10">

<!--begin::List widget 16-->
<div class="card card-flush h-xl-100">
  <!--begin::Header-->
  <div class="card-header pt-7">
      <!--begin::Title-->
      <h3 class="card-title align-items-start flex-column">
    <span class="card-label fw-bold text-gray-800">@lang('Recent Transaction')</span>
    <span class="text-gray-400 mt-1 fw-semibold fs-6">@lang('Recent transactions log')</span>
  </h3>
      <!--end::Title-->

      <!--begin::Toolbar-->
      <div class="card-toolbar">
          <a href="{{ route('user.transactions') }}" class="btn btn-sm btn-light" data-bs-toggle='tooltip' data-bs-dismiss='click' title="@lang('View all transactions on your account')">@lang('View All')</a>
      </div>
      <!--end::Toolbar-->
  </div>
  <!--end::Header-->

  <!--begin::Body-->
  <div class="card-body pt-4 px-0">
      <!--begin::Nav-->
      <ul class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
          <!--begin::Item-->
          <li class="nav-item col-6 mx-0 p-0">
              <!--begin::Link-->
              <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="delivery.html#kt_list_widget_16_tab_1">
                  <!--begin::Subtitle-->
                  <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                     @lang('Credit')
                  </span>
                  <!--end::Subtitle-->

                  <!--begin::Bullet-->
                  <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                  <!--end::Bullet-->
              </a>
              <!--end::Link-->
          </li>
          <!--end::Item-->

          <!--begin::Item-->
          <li class="nav-item col-6 mx-0 px-0">
              <!--begin::Link-->
              <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="delivery.html#kt_list_widget_16_tab_2">
                  <!--begin::Subtitle-->
                  <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                      @lang('Debit')
                  </span>
                  <!--end::Subtitle-->

                  <!--begin::Bullet-->
                  <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                  <!--end::Bullet-->
              </a>
              <!--end::Link-->
          </li>
          <!--end::Item-->

          <!--begin::Bullet-->
          <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
          <!--end::Bullet-->
      </ul>
      <!--end::Nav-->

      <!--begin::Tab Content-->
      <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="height: 454px">

              <!--begin::Tap pane-->
              <div class="tab-pane fade show active" id="kt_list_widget_16_tab_1">

                      <!--begin::Item-->
                      @forelse($credit as $data)
                      <div class="m-0">
                          <!--begin::Timeline-->
                          <div class="timeline ms-n1">
                                <!--begin::Timeline item-->
                              <div class="timeline-item align-items-center">
                                  <!--begin::Timeline line-->
                                  <div class="timeline-line w-20px"></div>
                                  <!--end::Timeline line-->

                                  <!--begin::Timeline icon-->
                                  <div class="timeline-icon pt-1" style="margin-left: 0.5px">
                                      <i class="ti ti-wallet fs-2 text-success"><span class="path1"></span><span class="path2"></span></i>
                                  </div>
                                  <!--end::Timeline icon-->

                                  <!--begin::Timeline content-->
                                  <div class="timeline-content m-0">
                                      <!--begin::Label-->
                                      <span class="fs-8 fw-bolder text-success text-uppercase">{{$data->remark}}</span>
                                      <!--begin::Label-->

                                      <!--begin::Title-->
                                      <a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary">{{ __($general->cur_sym) }}{{ showAmount($data->amount) }}</a>
                                      <!--end::Title-->

                                      <!--begin::Title-->
                                      <span class="fw-semibold text-gray-400">{{ diffForHumans($data->created_at) }}</span>
                                      <!--end::Title-->
                                  </div>
                                  <!--end::Timeline content-->
                              </div>
                              <!--end::Timeline item-->
                          </div>
                          <!--end::Timeline-->
                         </div>
                      <!--end::Item-->

                      <!--begin::Separator-->
                      <div class="separator separator-dashed mt-5 mb-4"></div>
                      <!--end::Separator-->
                      @empty
                       {!! emptyData() !!}
                      @endforelse
                      <!--begin::Item-->
              </div>
              <!--end::Tap pane-->

              <!--begin::Tap pane-->
              <div class="tab-pane fade " id="kt_list_widget_16_tab_2">

              <!--begin::Item-->
              @forelse($debit as $data)
              <div class="m-0">
                  <!--begin::Timeline-->
                  <div class="timeline ms-n1">
                        <!--begin::Timeline item-->
                      <div class="timeline-item align-items-center">
                          <!--begin::Timeline line-->
                          <div class="timeline-line w-20px"></div>
                          <!--end::Timeline line-->

                          <!--begin::Timeline icon-->
                          <div class="timeline-icon pt-1" style="margin-left: 0.5px">
                              <i class="ti ti-wallet-off fs-2 text-danger"><span class="path1"></span><span class="path2"></span></i>
                          </div>
                          <!--end::Timeline icon-->

                          <!--begin::Timeline content-->
                          <div class="timeline-content m-0">
                              <!--begin::Label-->
                              <span class="fs-8 fw-bolder text-danger text-uppercase">{{$data->remark}}</span>
                              <!--begin::Label-->

                              <!--begin::Title-->
                              <a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary">{{ __($general->cur_sym) }}{{ showAmount($data->amount) }}</a>
                              <!--end::Title-->

                              <!--begin::Title-->
                              <span class="fw-semibold text-gray-400">{{ diffForHumans($data->created_at) }}</span>
                              <!--end::Title-->
                          </div>
                          <!--end::Timeline content-->
                      </div>
                      <!--end::Timeline item-->
                  </div>
                  <!--end::Timeline-->
                 </div>
              <!--end::Item-->

              <!--begin::Separator-->
              <div class="separator separator-dashed mt-5 mb-4"></div>
              <!--end::Separator-->
              @empty
               {!! emptyData() !!}
              @endforelse
              <!--begin::Item-->
              </div>
              <!--end::Tap pane-->

      </div>
      <!--end::Tab Content-->
  </div>
  <!--end: Card Body-->
</div>
<!--end::List widget 16-->     </div>
  <!--end::Col-->

  <!--begin::Col-->
  <div class="col-xl-8 mb-5 mb-xl-10">

<!--begin::Chart widget 32-->
<div class="card card-flush h-xl-100">
  <!--begin::Header-->
  <div class="card-header pt-7 mb-3">
      <!--begin::Title-->
      <h3 class="card-title align-items-start flex-column">
    <span class="card-label fw-bold text-gray-800">@lang('Bills Payment Chart')</span>
    <span class="text-gray-400 mt-1 fw-semibold fs-6">@lang('An overview showing your bills payment histroy')</span>
  </h3>
      <!--end::Title-->
  </div>
  <!--end::Header-->

  <!--begin::Body-->
  <div class="card-body d-flex flex-column justify-content-between pb-5 px-0">
      <!--begin::Nav-->
      <ul class="nav nav-pills nav-pills-custom mb-3 mx-9">

            <!--begin::Item-->
            <li class="nav-item mb-3 me-3 me-lg-6">
              <!--begin::Link-->
              <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active
                  " data-bs-toggle="pill" id=""
                  href="#totalbills">
                  <!--begin::Icon-->
                  <div class="nav-icon mb-3">
                      <i class="ti ti-printer fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                  </div>
                  <!--end::Icon-->

                  <!--begin::Title-->
                  <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                      @lang('All')
                  </span>
                  <!--end::Title-->

                  <!--begin::Bullet-->
                  <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                  <!--end::Bullet-->
              </a>
              <!--end::Link-->
          </li>
          <!--end::Item-->
              <!--begin::Item-->
              <li class="nav-item mb-3 me-3 me-lg-6">
                  <!--begin::Link-->
                  <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                      " data-bs-toggle="pill" id=""
                      href="#airtime">
                      <!--begin::Icon-->
                      <div class="nav-icon mb-3">
                          <i class="ti ti-device-mobile fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                      </div>
                      <!--end::Icon-->

                      <!--begin::Title-->
                      <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                          @lang('Airtime')
                      </span>
                      <!--end::Title-->

                      <!--begin::Bullet-->
                      <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                      <!--end::Bullet-->
                  </a>
                  <!--end::Link-->
              </li>
              <!--end::Item-->
              <!--begin::Item-->
              <li class="nav-item mb-3 me-3 me-lg-6">
                  <!--begin::Link-->
                  <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                      " data-bs-toggle="pill" id=""
                      href="#internet">
                      <!--begin::Icon-->
                      <div class="nav-icon mb-3">
                          <i class="ti ti-wifi fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                      </div>
                      <!--end::Icon-->

                      <!--begin::Title-->
                      <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                          @lang('Internet')
                      </span>
                      <!--end::Title-->

                      <!--begin::Bullet-->
                      <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                      <!--end::Bullet-->
                  </a>
                  <!--end::Link-->
              </li>
              <!--end::Item-->
              <!--begin::Item-->
              <li class="nav-item mb-3 me-3 me-lg-6">
                  <!--begin::Link-->
                  <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                      " data-bs-toggle="pill" id=""
                      href="#cabletv">
                      <!--begin::Icon-->
                      <div class="nav-icon mb-3">
                          <i class="ti ti-video fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                      </div>
                      <!--end::Icon-->

                      <!--begin::Title-->
                      <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                          @lang('TV')
                      </span>
                      <!--end::Title-->

                      <!--begin::Bullet-->
                      <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                      <!--end::Bullet-->
                  </a>
                  <!--end::Link-->
              </li>
              <!--end::Item-->
              <!--begin::Item-->
              <li class="nav-item mb-3 me-3 me-lg-6">
                <!--begin::Link-->
                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                    " data-bs-toggle="pill" id=""
                    href="#utility">
                    <!--begin::Icon-->
                    <div class="nav-icon mb-3">
                        <i class="ti ti-bolt fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                    </div>
                    <!--end::Icon-->

                    <!--begin::Title-->
                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                        @lang('Utility')
                    </span>
                    <!--end::Title-->

                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    <!--end::Bullet-->
                </a>
                <!--end::Link-->
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="nav-item mb-3 me-3 me-lg-6">
                <!--begin::Link-->
                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2
                    " data-bs-toggle="pill" id=""
                    href="#insurance">
                    <!--begin::Icon-->
                    <div class="nav-icon mb-3">
                        <i class="ti ti-shield fs-1 p-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                    </div>
                    <!--end::Icon-->

                    <!--begin::Title-->
                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">
                        @lang('Insurance')
                    </span>
                    <!--end::Title-->

                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    <!--end::Bullet-->
                </a>
                <!--end::Link-->
            </li>
            <!--end::Item-->

      </ul>
      <!--end::Nav-->

      <!--begin::Tab Content-->
      <div class="tab-content ps-4 pe-6">
              <!--begin::Tap pane-->

              <!--begin::Tap pane-->
              <div class="tab-pane fade active show" id="totalbills">
                <!--begin::Chart-->
                <div id="yearBill" class="min-h-auto" style="height: 375px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Tap pane-->
              <div class="tab-pane fade " id="airtime">
                  <!--begin::Chart-->
                  <div id="yearAirtime" class="min-h-auto" style="height: 375px"></div>
                  <!--end::Chart-->
              </div>
              <!--end::Tap pane-->
              <!--begin::Tap pane-->
              <div class="tab-pane fade " id="internet">
                  <!--begin::Chart-->
                  <div id="yearInternet" class="min-h-auto" style="height: 375px"></div>
                  <!--end::Chart-->
              </div>
              <!--end::Tap pane-->
              <!--begin::Tap pane-->
              <div class="tab-pane fade " id="cabletv">
                <!--begin::Chart-->
                <div id="yearCabletv" class="min-h-auto" style="height: 375px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Tap pane-->
              <!--begin::Tap pane-->
              <div class="tab-pane fade " id="utility">
                <!--begin::Chart-->
                <div id="yearUtility" class="min-h-auto" style="height: 375px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Tap pane-->
             <!--begin::Tap pane-->
              <div class="tab-pane fade " id="insurance">
                <!--begin::Chart-->
                <div id="yearInsurance" class="min-h-auto" style="height: 375px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Tap pane-->
      </div>
      <!--end::Tab Content-->
  </div>
  <!--end: Card Body-->
</div>
<!--end::Chart widget 32-->    </div>
  <!--end::Col-->
</div>
<!--end::Row-->



    <div class="row">

        <div class="col-xl-12 mb-xl-10">
            <!--begin::Slider Widget 1-->
            <div id="kt_sliders_widget_1_slider"
                class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel"
                data-bs-interval="5000">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h4 class="card-title d-flex align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">@lang('Login Session')</span>
                        <span class="text-gray-400 mt-1 fw-bold fs-7">@lang('Your current and last login activity')</span>
                    </h4>
                    <!--end::Title-->

                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Carousel Indicators-->
                        <ol
                            class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="0" class="active ms-1"></li>
                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="1" class=" ms-1"></li>
                        </ol>
                        <!--end::Carousel Indicators-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body py-6">
                    <!--begin::Carousel-->
                    <div class="carousel-inner mt-n5">
                        <!--begin::Item-->
                        <div class="carousel-item active show">
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Symbol-->
                                  <div class="symbol symbol-70px symbol-circle me-5">
                                    <span class="symbol-label bg-light-info">
                                        <i class="ti ti-clock fs-3x text-info"><span class="path1"></span><span class="path2"></span></i>
                                    </span>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Subtitle-->
                                    <h5 class="fw-bold text-gray-800 mb-3">@lang('Current Session')</h5>
                                    <!--end::Subtitle-->

                                    <!--begin::Items-->
                                    <div class="d-flex d-grid gap-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                <i class="ti ti-map fs-6 text-gray-600 me-2"><span
                                                        class="path1"></span><span class="path2"></span></i> {{ __(@$current_login->user_ip) }}
                                            </span>
                                            <!--end::Section-->

                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                <i class="ti ti-clock fs-6 text-gray-600 me-2"><span
                                                        class="path1"></span><span class="path2"></span></i> {{ @diffForHumans($current_login->created_at) }}
                                            </span>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-column flex-shrink-0">
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                <i class="ti ti-browser fs-6 text-gray-600 me-2"><span
                                                        class="path1"></span><span class="path2"></span></i> {{ __(@$current_login->browser) }}
                                            </span>
                                            <!--end::Section-->

                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                <i class="ti ti-device-mobile fs-6 text-gray-600 me-2"><span
                                                        class="path1"></span><span class="path2"></span></i> {{ __(@$current_login->os) }}
                                            </span>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Action-->
                            <div class="m-0">
                                <a href="{{route('user.logout')}}" class="btn btn-sm btn-light me-2 mb-2">@lang('Logout')</a>
                                <a href="#" class="btn btn-sm btn-primary mb-2">@lang('View Session')</a>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="carousel-item ">
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center mb-5">
                               <!--begin::Symbol-->
                               <div class="symbol symbol-70px symbol-circle me-5">
                                <span class="symbol-label bg-light-info">
                                    <i class="ti ti-calendar fs-3x text-info"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                            <!--end::Symbol-->

                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Subtitle-->
                                    <h5 class="fw-bold text-gray-800 mb-3">@lang('Last Login')</h5>
                                    <!--end::Subtitle-->

                                    <!--begin::Items-->
                                    <div class="d-flex d-grid gap-5">
                                      <!--begin::Item-->
                                      <div class="d-flex flex-column flex-shrink-0 me-4">
                                          <!--begin::Section-->
                                          <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                              <i class="ti ti-map fs-6 text-gray-600 me-2"><span
                                                      class="path1"></span><span class="path2"></span></i> {{ __(@$last_login->user_ip) }}
                                          </span>
                                          <!--end::Section-->

                                          <!--begin::Section-->
                                          <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                              <i class="ti ti-clock fs-6 text-gray-600 me-2"><span
                                                      class="path1"></span><span class="path2"></span></i> {{ @diffForHumans($last_login->created_at) }}
                                          </span>
                                          <!--end::Section-->
                                      </div>
                                      <!--end::Item-->

                                      <!--begin::Item-->
                                      <div class="d-flex flex-column flex-shrink-0">
                                          <!--begin::Section-->
                                          <span class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                              <i class="ti ti-browser fs-6 text-gray-600 me-2"><span
                                                      class="path1"></span><span class="path2"></span></i> {{ __(@$last_login->browser) }}
                                          </span>
                                          <!--end::Section-->

                                          <!--begin::Section-->
                                          <span class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                              <i class="ti ti-device-mobile fs-6 text-gray-600 me-2"><span
                                                      class="path1"></span><span class="path2"></span></i> {{ __(@$last_login->os) }}
                                          </span>
                                          <!--end::Section-->
                                      </div>
                                      <!--end::Item-->
                                  </div>
                                  <!--end::Items-->
                              </div>
                              <!--end::Info-->
                          </div>
                          <!--end::Wrapper-->

                          <!--begin::Action-->
                          <div class="m-0">
                              <a href="{{route('user.logout')}}" class="btn btn-sm btn-light me-2 mb-2">@lang('Logout')</a>
                              <a href="#" class="btn btn-sm btn-primary mb-2">@lang('View Session')</a>
                          </div>
                          <!--end::Action-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Carousel-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Slider Widget 1-->


        </div>
        <!--end::Col-->



    </div>
@endsection

@push('script')
    <script>
        // =====================================
        // Revenue Updates
        // =====================================
        var options = {
            color: "#adb5bd",
            series: @json($user_login_counter->flatten()),
            labels: @json($user_login_counter->keys()),
            chart: {
                type: "donut",
                fontFamily: "Plus Jakarta Sans', sans-serif",
                foreColor: "#adb0bb",
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '88%',
                        background: 'transparent',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                offsetY: 7,
                            },
                            value: {
                                show: false,
                            },
                            total: {
                                show: true,
                                color: '#7C8FAC',
                                fontSize: '20px',
                                fontWeight: "600",
                                label: 'Logins',
                            },
                        },
                    },
                },
            },
            stroke: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: true,
            },

            legend: {
                show: false,
            },
            colors: ["var(--bs-primary)", "#EAEFF4", "var(--bs-secondary)"],

            tooltip: {
                theme: "dark",
                fillSeriesColor: false,
            },
        };

        var chart = new ApexCharts(document.querySelector("#sales-overview"), options);
        chart.render();



        function myFunction() {
            var copyText = document.getElementById("referralURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/
            document.execCommand("copy");
            iziToast.success({
                message: 'Link Copied',
                position: "topRight"
            });

        }
    </script>
    <script>
        // =====================================
        // Profit
        // =====================================
        var chart = {
            series: [{
                    name: "Total Credit",
                    data: {!! json_encode($yearDeposit) !!},
                },
                {
                    name: "Total Debit",
                    data: {!! json_encode($yearPayout) !!},
                },
            ],
            chart: {
                toolbar: {
                    show: false,
                },
                type: "bar",
                fontFamily: "Plus Jakarta Sans', sans-serif",
                foreColor: "#adb0bb",
                height: 320,
                stacked: true,
            },
            colors: ["var(--bs-primary)", "var(--bs-danger)"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    barHeight: "60%",
                    columnWidth: "20%",
                    borderRadius: [6],
                    borderRadiusApplication: 'end',
                    borderRadiusWhenStacked: 'all'
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            grid: {
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            yaxis: {
                min: -5,
                max: 5,
                title: {
                    // text: 'Age',
                },
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                categories: {!! json_encode($yearLabels) !!},

            },
            yaxis: {
                tickAmount: 4,
            },
            tooltip: {
                theme: "dark",
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), chart);
        chart.render();
    </script>
    <script>
      // =====================================
      // Airtime
      // =====================================
      var chart = {
          series: [{
                  name: "Total Airtime",
                  data: {!! json_encode($yearAirtime) !!},
              }
          ],
          chart: {
              toolbar: {
                  show: false,
              },
              type: "bar",
              fontFamily: "Plus Jakarta Sans', sans-serif",
              foreColor: "#adb0bb",
              height: 320,
              stacked: true,
          },
          colors: ["var(--bs-primary)", "var(--bs-danger)"],
          plotOptions: {
              bar: {
                  horizontal: false,
                  barHeight: "60%",
                  columnWidth: "20%",
                  borderRadius: [6],
                  borderRadiusApplication: 'end',
                  borderRadiusWhenStacked: 'all'
              },
          },
          dataLabels: {
              enabled: false,
          },
          legend: {
              show: false,
          },
          grid: {
              borderColor: "rgba(0,0,0,0.1)",
              strokeDashArray: 3,
              xaxis: {
                  lines: {
                      show: false,
                  },
              },
          },
          yaxis: {
              min: -5,
              max: 5,
              title: {
                  // text: 'Age',
              },
          },
          xaxis: {
              axisBorder: {
                  show: false,
              },
              categories: {!! json_encode($yearLabels) !!},

          },
          yaxis: {
              tickAmount: 4,
          },
          tooltip: {
              theme: "dark",
          },
      };

      var chart = new ApexCharts(document.querySelector("#yearAirtime"), chart);
      chart.render();
  </script>
  <script>
    // =====================================
    // Internet
    // =====================================
    var chart = {
        series: [{
                name: "Total Internet",
                data: {!! json_encode($yearInternet) !!},
            }
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
            height: 320,
            stacked: true,
        },
        colors: ["var(--bs-primary)", "var(--bs-danger)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "60%",
                columnWidth: "20%",
                borderRadius: [6],
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'all'
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },
        yaxis: {
            min: -5,
            max: 5,
            title: {
                // text: 'Age',
            },
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            categories: {!! json_encode($yearLabels) !!},

        },
        yaxis: {
            tickAmount: 4,
        },
        tooltip: {
            theme: "dark",
        },
    };

    var chart = new ApexCharts(document.querySelector("#yearInternet"), chart);
    chart.render();
</script>
<script>
  // =====================================
  // Cabletv
  // =====================================
  var chart = {
      series: [{
              name: "Total Cable TV",
              data: {!! json_encode($yearCabletv) !!},
          }
      ],
      chart: {
          toolbar: {
              show: false,
          },
          type: "bar",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb",
          height: 320,
          stacked: true,
      },
      colors: ["var(--bs-primary)", "var(--bs-danger)"],
      plotOptions: {
          bar: {
              horizontal: false,
              barHeight: "60%",
              columnWidth: "20%",
              borderRadius: [6],
              borderRadiusApplication: 'end',
              borderRadiusWhenStacked: 'all'
          },
      },
      dataLabels: {
          enabled: false,
      },
      legend: {
          show: false,
      },
      grid: {
          borderColor: "rgba(0,0,0,0.1)",
          strokeDashArray: 3,
          xaxis: {
              lines: {
                  show: false,
              },
          },
      },
      yaxis: {
          min: -5,
          max: 5,
          title: {
              // text: 'Age',
          },
      },
      xaxis: {
          axisBorder: {
              show: false,
          },
          categories: {!! json_encode($yearLabels) !!},

      },
      yaxis: {
          tickAmount: 4,
      },
      tooltip: {
          theme: "dark",
      },
  };

  var chart = new ApexCharts(document.querySelector("#yearCabletv"), chart);
  chart.render();
</script>

<script>
  // =====================================
  // Utility
  // =====================================
  var chart = {
      series: [{
              name: "Total Utility",
              data: {!! json_encode($yearUtility) !!},
          }
      ],
      chart: {
          toolbar: {
              show: false,
          },
          type: "bar",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb",
          height: 320,
          stacked: true,
      },
      colors: ["var(--bs-primary)", "var(--bs-danger)"],
      plotOptions: {
          bar: {
              horizontal: false,
              barHeight: "60%",
              columnWidth: "20%",
              borderRadius: [6],
              borderRadiusApplication: 'end',
              borderRadiusWhenStacked: 'all'
          },
      },
      dataLabels: {
          enabled: false,
      },
      legend: {
          show: false,
      },
      grid: {
          borderColor: "rgba(0,0,0,0.1)",
          strokeDashArray: 3,
          xaxis: {
              lines: {
                  show: false,
              },
          },
      },
      yaxis: {
          min: -5,
          max: 5,
          title: {
              // text: 'Age',
          },
      },
      xaxis: {
          axisBorder: {
              show: false,
          },
          categories: {!! json_encode($yearLabels) !!},

      },
      yaxis: {
          tickAmount: 4,
      },
      tooltip: {
          theme: "dark",
      },
  };

  var chart = new ApexCharts(document.querySelector("#yearUtility"), chart);
  chart.render();
</script>
<script>
    // =====================================
    // Insurance
    // =====================================
    var chart = {
        series: [{
                name: "Total Insurance",
                data: {!! json_encode($yearInsurance) !!},
            }
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
            height: 320,
            stacked: true,
        },
        colors: ["var(--bs-primary)", "var(--bs-danger)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "60%",
                columnWidth: "20%",
                borderRadius: [6],
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'all'
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },
        yaxis: {
            min: -5,
            max: 5,
            title: {
                // text: 'Age',
            },
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            categories: {!! json_encode($yearLabels) !!},

        },
        yaxis: {
            tickAmount: 4,
        },
        tooltip: {
            theme: "dark",
        },
    };

    var chart = new ApexCharts(document.querySelector("#yearInsurance"), chart);
    chart.render();
  </script>
<script>
  // =====================================
  // OVERALL BILLS
  // =====================================
  var chart = {
      series: [{
              name: "Total Airtime",
              data: {!! json_encode($yearAirtime) !!},
          },{
              name: "Total Internet",
              data: {!! json_encode($yearInternet) !!},
          },{
              name: "Total Cable TV",
              data: {!! json_encode($yearCabletv) !!},
          },{
              name: "Total Utility",
              data: {!! json_encode($yearUtility) !!},
          },{
              name: "Total Insurance",
              data: {!! json_encode($yearInsurance) !!},
          },
      ],
      chart: {
          toolbar: {
              show: false,
          },
          type: "area",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb",
          height: 320,
          stacked: false,
      },
      colors: ["var(--bs-primary)","var(--bs-info)","var(--bs-warning)","var(--bs-success)", "var(--bs-danger)"],
      plotOptions: {
          bar: {
              horizontal: false,
              barHeight: "60%",
              columnWidth: "20%",
              borderRadius: [6],
              borderRadiusApplication: 'end',
              borderRadiusWhenStacked: 'all'
          },
      },
      dataLabels: {
          enabled: false,
      },
      legend: {
          show: true,
      },
      grid: {
          borderColor: "rgba(0,0,0,0.1)",
          strokeDashArray: 3,
          xaxis: {
              lines: {
                  show: false,
              },
          },
      },
      yaxis: {
          min: -5,
          max: 5,
          title: {
              // text: 'Age',
          },
      },
      xaxis: {
          axisBorder: {
              show: false,
          },
          categories: {!! json_encode($yearLabels) !!},

      },
      yaxis: {
          tickAmount: 4,
      },
      tooltip: {
          theme: "dark",
      },
  };

  var chart = new ApexCharts(document.querySelector("#yearBill"), chart);
  chart.render();
</script>
    <script>
        const priceElement = document.querySelectorAll(".price")
        const percentElement = document.querySelectorAll(".percent")

        let btcBalance = document.querySelector("#btc-balance")
        let ethBalance = document.querySelector("#eth-balance")
        let bchBalance = document.querySelector("#bch-balance")
        let ltcBalance = document.querySelector("#ltc-balance")
        let usdcBalance = document.querySelector("#usdc-balance")
        let xrpBalance = document.querySelector("#xrp-balance")

        const coins = async () => {
            await fetch('https://data.messari.io/api/v1/assets')
                .then(data => data.json())
                .then(res => {
                    res.data.map(coin => {
                        let coinPrice = coin.metrics.market_data.price_usd
                        let coinPercent = coin.metrics.market_data.percent_change_usd_last_24_hours
                        var newBalance
                        switch (coin.symbol) {
                            case "BTC":
                                document.getElementById("BTC").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("BTCpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("BTCpercent").style.color = "green"
                                }
                                document.getElementById("BTCpercent").innerHTML = `${coinPercent.toFixed(2)}%`
                                break;
                            case "ETH":
                                document.getElementById("ETH").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("ETHpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("ETHpercent").style.color = "green"
                                }
                                document.getElementById("ETHpercent").innerHTML = `${coinPercent.toFixed(2)}%`

                                break;

                            case "USDT":
                                document.getElementById("USDTERC20").innerHTML = `$${coinPrice.toFixed(0) } `
                                document.getElementById("TCN").innerHTML = `$${coinPrice.toFixed(0) } `

                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("USDTERC20percent").style.color = "red"
                                    document.getElementById("TCNpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("USDTERC20percent").style.color = "green"
                                    document.getElementById("TCNpercent").style.color = "green"
                                }
                                document.getElementById("USDTERC20percent").innerHTML = `${coinPercent.toFixed(2)}%`
                                document.getElementById("TCNpercent").innerHTML = `${coinPercent.toFixed(2)}%`

                                break;

                            case "BCH":
                                document.getElementById("BCH").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("BCHpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("BCHpercent").style.color = "green"
                                }
                                document.getElementById("BCHpercent").innerHTML = `${coinPercent.toFixed(2)}%`

                                break;

                            case "LTC":
                                document.getElementById("LTC").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("LTCpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("LTCpercent").style.color = "green"
                                }
                                document.getElementById("LTCpercent").innerHTML = `${coinPercent.toFixed(2)}%`
                                break;

                            case "BNB":
                                document.getElementById("BNB").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("BNBpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("BNBpercent").style.color = "green"
                                }
                                document.getElementById("BNBpercent").innerHTML = `${coinPercent.toFixed(2)}%`

                                break;

                            case "XRP":
                                document.getElementById("DASH").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("DASHpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("DASHpercent").style.color = "green"
                                }
                                document.getElementById("DASHpercent").innerHTML = `${coinPercent.toFixed(2)}%`

                                break;

                            case "DOGE":
                                document.getElementById("DOGE").innerHTML = `$${coinPrice.toFixed(0) } `
                                //newBalance = Number(btcBalance.innerHTML) / Number(coinPrice)
                                //btcBalance.innerHTML = newBalance.toFixed(4)
                                if(coinPercent < 0){
                                    document.getElementById("DOGEpercent").style.color = "red"
                                }
                                else{
                                    document.getElementById("DOGEpercent").style.color = "green"
                                }
                                document.getElementById("DOGEpercent").innerHTML = `${coinPercent.toFixed(2)}%`

                                break;


                            default:
                                break;
                        }
                    })
                })
        }

        coins()
    </script>

@endpush
