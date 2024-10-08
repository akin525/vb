@extends($activeTemplate . 'layouts.app')
@section('panel')
    <div class="row">
        <div class="col-12">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class=" container-xxl ">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10"
                        id="kt_create_account_stepper">
                        <!--begin::Aside-->
{{--                        <div--}}
{{--                            class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">--}}
{{--                            <!--begin::Wrapper-->--}}
{{--                            <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">--}}
{{--                                <!--begin::Nav-->--}}
{{--                                <div class="stepper-nav">--}}
{{--                                    <!--begin::Step 1-->--}}
{{--                                    <div class="stepper-item current" data-kt-stepper-element="nav">--}}
{{--                                        <!--begin::Wrapper-->--}}
{{--                                        <div class="stepper-wrapper">--}}
{{--                                            <!--begin::Icon-->--}}
{{--                                            <div class="stepper-icon w-40px h-40px">--}}
{{--                                                <i class="ti ti-check fs-2 stepper-check"></i>--}}
{{--                                                <span class="stepper-number">1</span>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Icon-->--}}

{{--                                            <!--begin::Label-->--}}
{{--                                            <div class="stepper-label">--}}
{{--                                                <h3 class="stepper-title">--}}
{{--                                                    @lang('Step 1')--}}
{{--                                                </h3>--}}

{{--                                                <div class="stepper-desc fw-semibold">--}}
{{--                                                    @lang('Select Wallet')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Label-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Wrapper-->--}}

{{--                                        <!--begin::Line-->--}}
{{--                                        <div class="stepper-line h-40px"></div>--}}
{{--                                        <!--end::Line-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Step 1-->--}}

{{--                                    <!--begin::Step 2-->--}}
{{--                                    <div class="stepper-item" data-kt-stepper-element="nav">--}}
{{--                                        <!--begin::Wrapper-->--}}
{{--                                        <div class="stepper-wrapper">--}}
{{--                                            <!--begin::Icon-->--}}
{{--                                            <div class="stepper-icon w-40px h-40px">--}}
{{--                                                <i class="ti ti-check fs-2 stepper-check"></i> <span--}}
{{--                                                    class="stepper-number">2</span>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Icon-->--}}

{{--                                            <!--begin::Label-->--}}
{{--                                            <div class="stepper-label">--}}
{{--                                                <h3 class="stepper-title">--}}
{{--                                                    @lang('Step 2')--}}
{{--                                                </h3>--}}
{{--                                                <div class="stepper-desc fw-semibold">--}}
{{--                                                    @lang('Select Currency')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Label-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Wrapper-->--}}

{{--                                        <!--begin::Line-->--}}
{{--                                        <div class="stepper-line h-40px"></div>--}}
{{--                                        <!--end::Line-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Step 2-->--}}

{{--                                    <!--begin::Step 3-->--}}
{{--                                    <div class="stepper-item" data-kt-stepper-element="nav">--}}
{{--                                        <!--begin::Wrapper-->--}}
{{--                                        <div class="stepper-wrapper">--}}
{{--                                            <!--begin::Icon-->--}}
{{--                                            <div class="stepper-icon w-40px h-40px">--}}
{{--                                                <i class="ti ti-check fs-2 stepper-check"></i> <span--}}
{{--                                                    class="stepper-number">3</span>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Icon-->--}}

{{--                                            <!--begin::Label-->--}}
{{--                                            <div class="stepper-label">--}}
{{--                                                <h3 class="stepper-title">--}}
{{--                                                    @lang('Step 3')--}}
{{--                                                </h3>--}}
{{--                                                <div class="stepper-desc fw-semibold">--}}
{{--                                                    @lang('Enter Amount')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Label-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Wrapper-->--}}

{{--                                        <!--begin::Line-->--}}
{{--                                        <div class="stepper-line h-40px"></div>--}}
{{--                                        <!--end::Line-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Step 3-->--}}

{{--                                    <!--begin::Step 4-->--}}
{{--                                    <div class="stepper-item" data-kt-stepper-element="nav">--}}
{{--                                        <!--begin::Wrapper-->--}}
{{--                                        <div class="stepper-wrapper">--}}
{{--                                            <!--begin::Icon-->--}}
{{--                                            <div class="stepper-icon w-40px h-40px">--}}
{{--                                                <i class="ti ti-check fs-2 stepper-check"></i> <span--}}
{{--                                                    class="stepper-number">4</span>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Icon-->--}}

{{--                                            <!--begin::Label-->--}}
{{--                                            <div class="stepper-label">--}}
{{--                                                <h3 class="stepper-title">--}}
{{--                                                    @lang('Step 4')--}}
{{--                                                </h3>--}}
{{--                                                <div class="stepper-desc fw-semibold">--}}
{{--                                                    @lang('Preview Transaction')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Label-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Wrapper-->--}}

{{--                                        <!--begin::Line-->--}}
{{--                                        <div class="stepper-line h-40px"></div>--}}
{{--                                        <!--end::Line-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Step 4-->--}}

{{--                                    <!--begin::Step 5-->--}}
{{--                                    <div class="stepper-item mark-completed" data-kt-stepper-element="nav">--}}
{{--                                        <!--begin::Wrapper-->--}}
{{--                                        <div class="stepper-wrapper">--}}
{{--                                            <!--begin::Icon-->--}}
{{--                                            <div class="stepper-icon w-40px h-40px">--}}
{{--                                                <i class="ti ti-check fs-2 stepper-check"></i> <span--}}
{{--                                                    class="stepper-number">5</span>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Icon-->--}}

{{--                                            <!--begin::Label-->--}}
{{--                                            <div class="stepper-label">--}}
{{--                                                <h3 class="stepper-title">--}}
{{--                                                    @lang('Completed')--}}
{{--                                                </h3>--}}
{{--                                                <div class="stepper-desc fw-semibold">--}}
{{--                                                    @lang('Woah, we are here')--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Label-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Wrapper-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Step 5-->--}}
{{--                                </div>--}}
{{--                                <!--end::Nav-->--}}
{{--                            </div>--}}
{{--                            <!--end::Wrapper-->--}}
{{--                        </div>--}}
                        <!--begin::Aside-->

                        <!--begin::Content-->
                        <div class="card d-flex flex-row-fluid flex-center">
                            <!--begin::Form-->
                            <form class="card-body py-20 w-100 mw-xl-700px px-9 subscribe" novalidate="novalidate"
                                id="kt_create_account_form">
                                <!--begin::Step 1-->
                                <div class="current" >
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
{{--                                        <div class="pb-10 pb-lg-15">--}}
{{--                                            <!--begin::Title-->--}}
{{--                                            <h2 class="fw-bold d-flex align-items-center text-dark">--}}
{{--                                                @lang('Select Wallet')--}}


{{--                                                <span class="ms-1" data-bs-toggle="tooltip"--}}
{{--                                                    title="Payment is processed based on your selected account type">--}}
{{--                                                    <i class="ti ti-alert-circle text-gray-500 fs-6"><span--}}
{{--                                                            class="path1"></span><span class="path2"></span><span--}}
{{--                                                            class="path3"></span></i></span>--}}
{{--                                            </h2>--}}
{{--                                            <!--end::Title-->--}}

{{--                                            <!--begin::Notice-->--}}
{{--                                            <div class="text-muted fw-semibold fs-6">--}}
{{--                                                @lang('If you need more info, please check out ')'--}}
{{--                                                <a href="#" class="link-primary fw-bold">@lang('Help Page')</a>.--}}
{{--                                            </div>--}}
{{--                                            <!--end::Notice-->--}}
{{--                                        </div>--}}
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
{{--                                                <div class="col-lg-6">--}}
                                                    <!--begin::Option-->
                                                    <input type="hidden" class="btn-check" name="account_type" value="main" onchange="selectwallet('main')" id="mainwallet" checked />
{{--                                                    <label--}}
{{--                                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10"--}}
{{--                                                        for="mainwallet">--}}
{{--                                                        <i class="ti ti-wallet fs-3x me-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>--}}
{{--                                                        <!--begin::Info-->--}}
{{--                                                        <span class="d-block fw-semibold text-start">--}}
{{--            <span class="text-dark fw-bold d-block fs-4 mb-2">--}}
{{--                @lang('Main Wallet')--}}
{{--            </span>--}}
{{--            <span class="text-muted fw-semibold fs-6">{{ $general->cur_sym }}{{ showAmount(Auth::user()->balance) }}</span>--}}
{{--        </span>--}}
{{--                                                        <!--end::Info-->--}}
{{--                                                    </label>--}}
                                                    <!--end::Option-->
{{--                                                </div>--}}
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("mainwallet").checked = true;
                                                    });
                                                </script>
                                                <!--end::Col-->

                                                <!--begin::Col-->
{{--                                                <div class="col-lg-6">--}}
{{--                                                    <!--begin::Option-->--}}
{{--                                                    <input type="radio" class="btn-check" name="account_type"--}}
{{--                                                        onchange="selectwallet('ref')" id="refwallet" />--}}
{{--                                                    <label--}}
{{--                                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"--}}
{{--                                                        for="refwallet">--}}
{{--                                                        <i class="ti ti-wallet fs-3x me-5"><span--}}
{{--                                                                class="path1"></span><span class="path2"></span></i>--}}
{{--                                                        <!--begin::Info-->--}}
{{--                                                        <span class="d-block fw-semibold text-start">--}}
{{--                                                            <span--}}
{{--                                                                class="text-dark fw-bold d-block fs-4 mb-2">@lang('Referral Wallet')</span>--}}
{{--                                                            <span--}}
{{--                                                                class="text-muted fw-semibold fs-6">{{ $general->cur_sym }}{{ showAmount(Auth::user()->ref_balance) }}</span>--}}
{{--                                                        </span>--}}
{{--                                                        <!--end::Info-->--}}
{{--                                                    </label>--}}
{{--                                                    <!--end::Option-->--}}
{{--                                                </div>--}}
                                                <!--end::Col-->
                                                @push('script')
                                                    <script>
                                                        function selectwallet(wallet) {
                                                            localStorage.setItem('wallet', wallet);
                                                        }
                                                    </script>
                                                @endpush
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 1-->

                                <!--begin::Step 2-->
                                <div >
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15 alert alert-info">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-dark">@lang('Trade Currency')</h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                                @lang('Please select base currency and trade currency below and click on the continue button to proceed to the next page').
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label mb-3">@lang('Select Base Currency')</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <select name="country" class="form-select form-select-solid"
                                                data-control="select2" id="youSendCurrency" data-hide-search="false"
                                                onchange="populate()" data-placeholder="@lang('Select Base Currency')">
                                                <option selected disableds>@lang('Select a base currency')...</option>
                                                <option data-callingCode="USD" data-countrycurrency="USD"
                                                    data-isoName="USD" data-countrycontinent="USD"
                                                    data-currencies="{{ $currencies }}" value="USD"
                                                    data-icon="currency-flag currency-flag-usd me-1">USD</option>
                                            </select> <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        @push('script')
                                            <script>
                                                function populate() {
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

                                                    // Show page loading
                                                    KTApp.showPageLoading();
                                                    document.getElementById('providers').innerHTML = '';
                                                    var currencies = $("#youSendCurrency option:selected").attr('data-currencies');
                                                    document.getElementById("amountlist").innerHTML = ``;

                                                    assets = JSON.parse(currencies);
                                                    let html = '';
                                                    assets.map(plan => {
                                                        let htmlSegment =
                                                            `<label class="d-flex flex-stack cursor-pointer mb-5" for="${plan['id']}" >
                                                                        <span class="d-flex align-items-center me-2">
                                                                            <span class="symbol symbol-50px me-6">
                                                                                <span class="symbol-label bg-light-primary">
                                                                                    <i class="ti ti-image fs-2x text-warning"><img src="{{ url('/') }}/assets/images/coins/${plan['image']}" width="30" class="path1"/></i>
                                                                                </span>

                                                                            </span>
                                                                            <span class="d-flex flex-column">
                                                                                <span class="fw-bold fs-6">${plan['name']}</span>
                                                                                <span class="fs-7 text-muted">${plan['symbol']}</span>
                                                                            </span>
                                                                        </span>

                                                                        <span class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="radio" onchange="networkprovider('${plan['id']}','${plan['image']}','${plan['name']}','${plan['id']}')"
                                                                                name="asset" id="${plan['id']}" value="${plan['id']}" />
                                                                        </span>
                                                                    </label>
                                                                    `;
                                                        html += htmlSegment;
                                                    });

                                                    document.getElementById('providers').innerHTML =
                                                        ` <div class="mb-0"> <label class="d-flex align-items-center form-label mb-5">
                                                                        @lang('Select Asset Currency')
                                                                        <span class="ms-1"  data-bs-toggle="tooltip" title="Please select asset currency" >
                                                                        <i class="ti ti-alert-circle text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
                                                                        </label> ${html} </div>
                                                                    `;
                                                    KTApp.hidePageLoading();
                                                    loadingEl.remove();
                                                }
                                                // END GET DATA \\
                                            </script>
                                            <script>
                                                function networkprovider(operatorId, image, name, coin) {
                                                    document.getElementById("networkprovider").innerHTML = name;
                                                    document.getElementById("coin").value = null;
                                                    document.getElementById("ourrate").innerHTML = null;
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
                                                    KTApp.showPageLoading();
                                                    var raw = JSON.stringify({
                                                        _token: "{{ csrf_token() }}",
                                                        coin: operatorId,
                                                        amount: 1,
                                                    });

                                                    var requestOptions = {
                                                        method: 'POST',
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        },
                                                        body: raw
                                                    };
                                                    fetch("{{ route('user.crypto.buy.coin.details') }}", requestOptions)
                                                        .then(response => response.text())
                                                        .then(result => {
                                                            let html = '';
                                                            KTApp.hidePageLoading();
                                                            loadingEl.remove();
                                                            const resp = JSON.parse(result);
                                                            SlimNotifierJs.notification(resp.status, resp.status, resp.message, 3000);
                                                            if (resp.ok != false) {
                                                                document.getElementById("coin").value = coin;

                                                                // Set the rate variable here
                                                                rate = parseFloat(resp.ourrate);

                                                                document.getElementById("ourrate").innerHTML = "1 USD&nbsp;=&nbsp;" + rate + "{{$general->cur_text}}";
                                                                document.getElementById("globalrate").innerHTML = "1 " + resp.currency + "&nbsp;=&nbsp;" + resp.rate.crypto_amount + resp.currency;

                                                            }

                                                            calc(); // Update the calculation

                                                        })

                                                        .catch(error => {
                                                                console.log(error);
                                                            }

                                                        );
                                                }
                                                // END GET OPERATORS
                                            </script>
                                        @endpush


                                        <!--begin::Input group-->
                                        <div class="mb-0 fv-row">

                                            <!--begin::Options-->
                                            <div id="providers"></div>
                                            <input id="coin" hidden>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 2-->

                                <!--begin::Step 3-->
                                <div >
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-12">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-dark">@lang('Trade Amount')</h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                                @lang('Please enter trade amount below')</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label required">@lang('Enter Amount')</label>
                                            <!--end::Label-->
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">USD</span>
                                                <input name="amount" id="amount" oninput="calc()"
                                                    class="form-control form-control-lg form-control-solid"
                                                    value="" />
                                            </div>
{{--                                            <span class="text-danger">Total Amount</span> <b class="text-success">₦<span id="shownow1"></span></b>--}}

                                        </div>
                                        <!--end::Input group-->



                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Fixed Amount-->
                                            <div id="amountlist"></div>
                                            <!--end::Fixed Amount-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Wrapper-->

                                </div>
                                <!--end::Step 3-->

                                <!--begin::Step 4-->
                                <div >
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-dark">@lang('Preview Transaction')</h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                                @lang('If you need more info, please check out ')
                                                <a href="#" class="text-primary fw-bold">@lang('Help Page')</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->


                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">


                                            <!--begin::Documents-->
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <tbody class="fw-semibold text-gray-600">

                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-wifi fs-2 me-2"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span><span
                                                                    class="path4"></span><span
                                                                    class="path5"></span></i> @lang('Asset')


                                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                                  title="This is the selected asset to sell.">
                                                                    <i class="ti ti-alert-circle  text-gray-500 fs-6"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span></i></span>
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end"><a href="#"
                                                                                    class="text-gray-600 text-hover-primary"
                                                                                    id="networkprovider"></a>
                                                    </td>
                                                </tr>
                                                @if($general->crypto_auto)
                                                    <tr>
                                                        <td class="text-muted">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ti ti-globe fs-2 me-2"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i> @lang('Total Amount')


                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                      title="This is the global price of your asset">
                                                                    <i class="ti ti-alert-circle  text-gray-500 fs-6"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span></i></span>
                                                            </div>
                                                        </td>
                                                        <td class="fw-bold text-end" id="">
                                                            <b class="text-success">₦ <span id="shownow1"></span></b>

                                                        </td>
                                                    </tr>
                                                @endif

                                                <script>
                                                    function calc() {
                                                        let amount = parseFloat(document.getElementById("amount").value);
                                                        if (!isNaN(amount) && rate) {
                                                            let nairaAmount = amount * rate;
                                                            document.getElementById("shownow1").innerText = nairaAmount.toFixed(2);
                                                        }
                                                    }

                                                </script>
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-exchange fs-2 me-2"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span></i> @lang('Our Rate')

                                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                                  title="This is the rate at which we buy your asset">
                                                                    <i class="ti ti-alert-circle  text-gray-500 fs-6"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span></i></span>
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end" id="ourrate"></td>
                                                </tr>
                                                <tr></tr>
                                                </tbody>
                                            </table>

                                            <br><br><br>


{{--                                            <label class="fs-6 fw-semibold mb-2">--}}
{{--                                                @lang('Enter Transaction Password')--}}
{{--                                                <span class="ms-1" data-bs-toggle="tooltip"--}}
{{--                                                      title="Please enter your transaction password to authenticate the wallet debit">--}}
{{--                                                    <i class="ti ti-alert-circle text-gray-500 fs-6"><span--}}
{{--                                                            class="path1"></span><span class="path2"></span><span--}}
{{--                                                            class="path3"></span></i></span> </label>--}}
                                            <!--End::Label-->

                                            <!--begin::Input-->
{{--                                            <input type="password" onkeyup="verifypassword(this)" id="password"--}}
{{--                                                   class="form-control form-control-lg form-control-solid" name="password"--}}
{{--                                                   placeholder="" value="" autocomplete="off" />--}}
                                            <!--end::Input-->
                                            <div id="passmessage"></div>
                                        </div>
                                        <!--end::Input group-->
{{--                                        @push('script')--}}
{{--                                            <script>--}}
{{--                                                function verifypassword(e) {--}}

{{--                                                    var password = e.value;--}}
{{--                                                    if (password.length < 4) {--}}
{{--                                                        return;--}}
{{--                                                    }--}}
{{--                                                    $("#passmessage").html(`<button class="btn btn-primary" type="button" disabled>--}}
{{--                                                    <span--}}
{{--                                                      class="spinner-border spinner-border-sm"--}}
{{--                                                      role="status"--}}
{{--                                                      aria-hidden="true"></span>--}}
{{--                                                    <span class="visually-hidden">Loading...</span>--}}
{{--                                                    </button>`);--}}

{{--                                                    var raw = JSON.stringify({--}}
{{--                                                        _token: "{{ csrf_token() }}",--}}
{{--                                                        password: e.value,--}}
{{--                                                    });--}}

{{--                                                    var requestOptions = {--}}
{{--                                                        method: 'POST',--}}
{{--                                                        headers: {--}}
{{--                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                                                        },--}}
{{--                                                        body: raw--}}
{{--                                                    };--}}
{{--                                                    fetch("{{ route('user.trxpass') }}", requestOptions)--}}
{{--                                                        .then(response => response.text())--}}
{{--                                                        .then(result => {--}}
{{--                                                            resp = JSON.parse(result);--}}
{{--                                                            if (resp.ok != true) {--}}
{{--                                                                document.getElementById("submit").disabled = true;--}}
{{--                                                            }--}}
{{--                                                            if (resp.ok != false) {--}}
{{--                                                                document.getElementById("submit").disabled = false;--}}
{{--                                                            }--}}
{{--                                                            $("#passmessage").html(--}}
{{--                                                                `<div class="alert alert-${resp.status}" role="alert"><strong>${resp.status} - </strong> ${resp.message}</div>`--}}
{{--                                                            );--}}
{{--                                                        })--}}
{{--                                                        .catch(error => {--}}

{{--                                                        });--}}
{{--                                                    // END GET DATA \\--}}
{{--                                                }--}}
{{--                                            </script>--}}
{{--                                        @endpush--}}

                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 4-->

                                <!--begin::Step 5-->
                                <div >
                                    <div id="invoicedetails"></div>
                                </div>
                                <!--end::Step 5-->

                                <!--begin::Actions-->
                                <div class="d-flex flex-stack pt-10">
                                    <!--begin::Wrapper-->
                                    <div class="mr-2">
                                        <button type="button" id="back" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <i class="ti ti-arrow-left fs-4 me-1"><span class="path1"></span><span
                                                    class="path2"></span></i> Back
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Wrapper-->
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary me-3 submit-btn"
                                                data-kt-stepper-action="submit"  id="submit">
                                            <span class="indicator-label">
                                                Submit
                                                <i class="ti ti-arrow-right fs-3 ms-2 me-0"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>

{{--                                        <button type="button" class="btn btn-lg btn-primary"--}}
{{--                                            data-kt-stepper-action="next">--}}
{{--                                            Continue--}}
{{--                                            <i class="ti ti-arrow-right fs-4 ms-1 me-0"><span class="path1"></span><span--}}
{{--                                                    class="path2"></span></i> </button>--}}
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                        <div class="">
                            <br>
                            <div class="card-body">
                                <div class="text-center ">
                                    <img src="{{ asset('assets/assets/dist/images/backgrounds/2.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Container-->

            </div>
        </div>
    @endsection

    @push('script')
        <script></script>
            <script>
                "use strict";
                var KTCreateAccount = function() {
                    var e, t, i, o, a, r, s = [];
                    return {
                        init: function() {
                            (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e);
                            (t = document.querySelector("#kt_create_account_stepper")) && (
                                i = t.querySelector("#kt_create_account_form"),
                                    o = t.querySelector('[data-kt-stepper-action="submit"]'),
                                    a = t.querySelector('[data-kt-stepper-action="next"]'),
                                    r = new KTStepper(t)
                            );

                            r.on("kt.stepper.changed", function(e) {
                                if (r.getCurrentStepIndex() === 4) {
                                    o.classList.remove("d-none");
                                    o.classList.add("d-inline-block");
                                    a.classList.add("d-none");
                                } else if (r.getCurrentStepIndex() === 5) {
                                    o.classList.add("d-none");
                                    a.classList.add("d-none");
                                } else {
                                    o.classList.remove("d-inline-block");
                                    o.classList.remove("d-none");
                                    a.classList.remove("d-none");
                                }
                            });

                            r.on("kt.stepper.next", function(e) {
                                console.log("stepper.next");
                                var t = s[e.getCurrentStepIndex() - 1];
                                t ? t.validate().then(function(t) {
                                    console.log("validated!");
                                    if (t === "Valid") {
                                        e.goNext();
                                        KTUtil.scrollTop();
                                    } else {
                                        Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-light"
                                            }
                                        }).then(function() {
                                            KTUtil.scrollTop();
                                        });
                                    }
                                }) : (e.goNext(), KTUtil.scrollTop());
                            });

                            r.on("kt.stepper.previous", function(e) {
                                console.log("stepper.previous");
                                e.goPrevious();
                                KTUtil.scrollTop();
                            });

                            s.push(FormValidation.formValidation(i, {
                                fields: {
                                    account_type: {
                                        validators: {
                                            notEmpty: {
                                                message: "Account type is required"
                                            }
                                        }
                                    }
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: ""
                                    })
                                }
                            }));

                            s.push(FormValidation.formValidation(i, {
                                fields: {
                                    country: {
                                        validators: {
                                            notEmpty: {
                                                message: "Please Select Currency"
                                            }
                                        }
                                    },
                                    coin: {
                                        validators: {
                                            notEmpty: {
                                                message: "Please Select Asset"
                                            }
                                        }
                                    }
                                }
                            }));

                            s.push(FormValidation.formValidation(i, {
                                fields: {
                                    amount: {
                                        validators: {
                                            notEmpty: {
                                                message: "Amount is required"
                                            }
                                        }
                                    }
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: ""
                                    })
                                }
                            }));

                            // Removed password validation
                            // s.push(FormValidation.formValidation(i, {
                            //     fields: {
                            //         password: {
                            //             validators: {
                            //                 notEmpty: {
                            //                     message: "Please enter account password"
                            //                 }
                            //             }
                            //         }
                            //     },
                            //     plugins: {
                            //         trigger: new FormValidation.plugins.Trigger(),
                            //         bootstrap: new FormValidation.plugins.Bootstrap5({
                            //             rowSelector: ".fv-row",
                            //             eleInvalidClass: "",
                            //             eleValidClass: ""
                            //         })
                            //     }
                            // }));

                            o.addEventListener("click", function(e) {
                                s[2].validate().then(function(t) {
                                    console.log("SUBMITTED", t);
                                    if (t === "Valid") {
                                        e.preventDefault();
                                        o.disabled = true;
                                        o.setAttribute("data-kt-indicator", "on");

                                        setTimeout(function() {
                                            submitForm();
                                            function submitForm() {
                                                var raw = JSON.stringify({
                                                    _token: "{{ csrf_token() }}",
                                                    amount: document.getElementById('amount').value,
                                                    coin: document.getElementById('coin').value,
                                                    wallet: localStorage.getItem('wallet')
                                                });

                                                var requestOptions = {
                                                    method: 'POST',
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                    body: raw
                                                };

                                                fetch("{{ route('user.crypto.buy.coin') }}", requestOptions)
                                                    .then(response => response.text())
                                                    .then(result => {
                                                        var resp = JSON.parse(result);
                                                        if (resp.ok === false) {
                                                            console.log('Stopping spinner');
                                                            o.removeAttribute("data-kt-indicator");
                                                            o.disabled = false;
                                                            SlimNotifierJs.notification(resp.status, resp.status, resp.message, 3000);
                                                        } else if (resp.ok === true) {
                                                            console.info(resp);
                                                            o.removeAttribute("data-kt-indicator");
                                                            o.disabled = false;
                                                            document.getElementById("back").hidden = true;
                                                            document.getElementById("invoicedetails").innerHTML = `
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                        <div class=" ">
                                                            <section class="text-center">
                                                                <h5 class="fw-semibold fs-5 text-info">@lang('Payment received and transaction completed')</h5>
                                                                <h5 class="fw-semibold fs-5text-danger ">@lang('PLEASE, DO NOT REFRESH YOUR BROWSER')</h5>
                                                                <img src="{{ asset('assets/assets/dist/images/backgrounds/paymentcomplete.jpeg') }}" alt="" class="img-fluid mb-4" width="300">
                                                                <br>
                                                                <h6 class="fw-semibold text-danger mb-7">@lang('Please click the view order button below to view the transaction log'): </h6>
                                                                <div class="order-summary border rounded p-4 my-4">
                                                                    <div class="p-3">
                                                                        <h5 class="fs-5 fw-semibold mb-4">@lang('Payment Summary')</h5>
                                                                        <div class="d-flex justify-content-between mb-4">
                                                                            <p class="mb-0 fs-4"><b>Payment Value</b></p>
                                                                            <h6 class="mb-0 fs-4 fw-semibold text-primary"><b>${resp.fiat}{{$general->cur_text}}</b></h6>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mb-4">
                                                                            <p class="mb-0 fs-4"><b>Crypto Value</b></p>
                                                                            <h6 class="mb-0 fs-4 fw-semibold text-primary"><b>${resp.coin}</b></h6>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mb-4">
                                                                            <p class="mb-0 fs-4"><b>USD Value</b></p>
                                                                            <h6 class="mb-0 fs-4 fw-semibold text-primary"><b>${resp.usd}USD</b></h6>
                                                                        </div>
                                                                        <a href="{{route('user.crypto.buy.log')}}" class="btn btn-primary">
                                                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                            View Order
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                    <!--end::Wrapper-->
                                                `;
                                                            SlimNotifierJs.notification(resp.status, resp.status, resp.message, 3000);
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error('Error:', error);
                                                        o.removeAttribute("data-kt-indicator");
                                                        o.disabled = false;
                                                    });
                                            }
                                        }, 2000);
                                    } else {
                                        Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-light"
                                            }
                                        }).then(function() {
                                            KTUtil.scrollTop();
                                        });
                                    }
                                });
                            });
                        }
                    }
                }();

                KTUtil.onDOMContentLoaded(function() {
                    KTCreateAccount.init();
                });
            </script>
        <script>
            function confirmPayment(entry) {
                id = entry.split('|')[0]
                coin = entry.split('|')[1]
                var raw = JSON.stringify({
                    _token: "{{ csrf_token() }}",
                    invoice: id,
                    coin: coin,
                });
                var requestOptions = {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: raw
                };
                fetch("{{ route('user.crypto.sell.confirm') }}", requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        const resp = JSON.parse(result);
                        SlimNotifierJs.notification(resp.status, resp.status, resp.message, 3000);
                        if (resp.ok != false) {
                            window.location.href = "{{route('user.crypto.sell.log')}}";
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
            // END GET INVOICE
        </script>
        <script>
        function CopyWalletAddress() {
            var copyText = document.getElementById("WalletAddress");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/
            document.execCommand("copy");
            SlimNotifierJs.notification('success', 'Copied', 'Wallet Address Copied Successfuly', 3000);


        }
        </script>
    @endpush

    @push('breadcrumb-plugins')
        <a class="btn btn-sm btn-primary" href="{{ route('user.crypto.buy.log') }}"> <i class="ti ti-printer"></i> @lang('Trade Log')</a>
    @endpush
