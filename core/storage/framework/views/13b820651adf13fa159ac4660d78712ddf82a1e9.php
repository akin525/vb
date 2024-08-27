<?php $__env->startSection('panel'); ?>
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
                                        <div class="pb-10 pb-lg-15">

                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="hidden" class="btn-check" name="account_type" onchange="selectwallet('main')" value="main" id="mainwallet" checked />













                                                    <!--end::Option-->

                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("mainwallet").checked = true;
                                                    });
                                                </script>
                                                <!--end::Col-->

                                                <!--begin::Col-->




















                                                <!--end::Col-->
                                                <?php $__env->startPush('script'); ?>
                                                    <script>
                                                        function selectwallet(wallet) {
                                                            localStorage.setItem('wallet', wallet);
                                                        }
                                                    </script>
                                                <?php $__env->stopPush(); ?>
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
                                            <h2 class="fw-bold text-dark"><?php echo app('translator')->get('Trade Currency'); ?></h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                                <?php echo app('translator')->get('Please select base currency and trade currency below and click on the continue button to proceed to the next page'); ?>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label mb-3"><?php echo app('translator')->get('Select Base Currency'); ?></label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="country" class="form-select form-select-solid"
                                                    data-control="select2" id="youSendCurrency" data-hide-search="false"
                                                    onchange="populate()" data-placeholder="<?php echo app('translator')->get('Select Base Currency'); ?>">
                                                <option selected disabled><?php echo app('translator')->get('Select a base currency'); ?>...</option>
                                                <option data-callingCode="USD" data-countrycurrency="USD"
                                                        data-isoName="USD" data-countrycontinent="USD"
                                                        data-currencies="<?php echo e($currencies); ?>" value="USD"
                                                        data-icon="currency-flag currency-flag-usd me-1">USD</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <?php $__env->startPush('script'); ?>
                                            <script>
                                                function populate() {
                                                    // START GET DATA
                                                    const loadingEl = document.createElement("div");
                                                    document.body.prepend(loadingEl);
                                                    loadingEl.classList.add("page-loader", "flex-column", "bg-dark", "bg-opacity-25");
                                                    loadingEl.innerHTML = `
            <span class="spinner-border text-primary" role="status"></span>
            <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
        `;

                                                    // Show page loading
                                                    KTApp.showPageLoading();
                                                    document.getElementById('providers').innerHTML = '';
                                                    var currencies = $("#youSendCurrency option:selected").attr('data-currencies');
                                                    document.getElementById("amountlist").innerHTML = '';

                                                    assets = JSON.parse(currencies);
                                                    let html = '';
                                                    assets.map(plan => {
                                                        let htmlSegment = `
                <label class="d-flex flex-stack cursor-pointer mb-5" for="${plan['id']}" >
                    <span class="d-flex align-items-center me-2">
                        <span class="symbol symbol-50px me-6">
                            <span class="symbol-label bg-light-primary">
                                <img src="<?php echo e(url('/')); ?>/assets/images/coins/${plan['image']}" width="30" class="path1"/>
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

                                                    document.getElementById('providers').innerHTML = `
            <div class="mb-0">
                <label class="d-flex align-items-center form-label mb-5">
                    <?php echo app('translator')->get('Select Asset Currency'); ?>
                                                    <span class="ms-1" data-bs-toggle="tooltip" title="Please select asset currency">
                                                        <i class="ti ti-alert-circle text-gray-500 fs-6"></i>
                                                    </span>
                                                </label>
${html}
            </div>
        `;
                                                    KTApp.hidePageLoading();
                                                    loadingEl.remove();
                                                }
                                                // END GET DATA

                                                function networkprovider(operatorId, image, name, coin) {
                                                    document.getElementById("networkprovider").innerHTML = name;
                                                    document.getElementById("coin").value = null;
                                                    document.getElementById("ourrate").innerHTML = null;

                                                    const loadingEl = document.createElement("div");
                                                    document.body.prepend(loadingEl);
                                                    loadingEl.classList.add("page-loader", "flex-column", "bg-dark", "bg-opacity-25");
                                                    loadingEl.innerHTML = `
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
    `;
                                                    KTApp.showPageLoading();

                                                    var raw = JSON.stringify({
                                                        _token: "<?php echo e(csrf_token()); ?>",
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

                                                    fetch("<?php echo e(route('user.crypto.sell.coin.details')); ?>", requestOptions)
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

                                                                document.getElementById("ourrate").innerHTML = "1 USD&nbsp;=&nbsp;" + rate + "<?php echo e($general->cur_text); ?>";
                                                                document.getElementById("globalrate").innerHTML = "1 " + resp.currency + "&nbsp;=&nbsp;" + resp.rate.crypto_amount + resp.currency;

                                                                calc(); // Update the calculation
                                                            }
                                                        })
                                                        .catch(error => {
                                                            console.log(error);
                                                        });
                                                }


                                            </script>
                                        <?php $__env->stopPush(); ?>

                                        <!--begin::Input group-->
                                        <div class="mb-0 fv-row">
                                            <!--begin::Options-->
                                            <div id="providers"></div>
                                            <input id="coin" hidden>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Step 3-->
                                        <div>
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-12">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold text-dark"><?php echo app('translator')->get('Trade Amount'); ?></h2>
                                                    <!--end::Title-->

                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">
                                                        <?php echo app('translator')->get('Please enter trade amount below'); ?>.
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label required"><?php echo app('translator')->get('Enter Amount'); ?></label>
                                                    <!--end::Label-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">USD</span>
                                                        <input name="amount" id="amount" type="number" oninput="calc()"
                                                               class="form-control form-control-lg form-control-solid" value="" />
                                                    </div>

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
                                        <div>
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-15">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold text-dark"><?php echo app('translator')->get('Preview Transaction'); ?></h2>
                                                    <!--end::Title-->

                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">
                                                        <?php echo app('translator')->get('If you need more info, please check out '); ?>
                                                        <a href="#" class="text-primary fw-bold"><?php echo app('translator')->get('Help Page'); ?></a>.
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Documents-->
                                                    <!--begin::Table-->
                                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                        <tbody class="fw-semibold text-gray-600">
                                                        <tr>
                                                            <td class="text-muted">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="ti ti-wifi fs-2 me-2"></i> <?php echo app('translator')->get('Asset'); ?>
                                                                    <span class="ms-1" data-bs-toggle="tooltip" title="This is the selected asset to sell.">
                                    <i class="ti ti-alert-circle text-gray-500 fs-6"></i></span>
                                                                </div>
                                                            </td>
                                                            <td class="fw-bold text-end"><a href="#" class="text-gray-600 text-hover-primary" id="networkprovider"></a></td>
                                                        </tr>
                                                        <?php if($general->crypto_auto): ?>
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="ti ti-globe fs-2 me-2"></i> <?php echo app('translator')->get('Total Amount To Receive'); ?>
                                                                        <span class="ms-1" data-bs-toggle="tooltip" title="This is the real-time global price.">
                                    <i class="ti ti-alert-circle text-gray-500 fs-6"></i></span>
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    <span id="shownow1"></span>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
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
                                                                    <i class="ti ti-exchange fs-2 me-2"></i> <?php echo app('translator')->get('Our Price'); ?>
                                                                    <span class="ms-1" data-bs-toggle="tooltip" title="This is the price we are offering for this transaction.">
                                    <i class="ti ti-alert-circle text-gray-500 fs-6"></i></span>
                                                                </div>
                                                            </td>
                                                            <td class="fw-bold text-end">
                                                                <span id="ourrate"></span>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <!--end::Table-->
                                                    <!--end::Documents-->
                                                </div>
                                                <!--end::Input group-->

                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 4-->

                                            <br><br><br>









                                            <!--End::Label-->

                                            <!--begin::Input-->



                                            <!--end::Input-->
                                            <div id="passmessage"></div>
                                        </div>

                                        <!--end::Input group-->


















































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
                                                data-kt-stepper-action="submit" >
                                            <span class="indicator-label">
                                                Submit
                                                <i class="ti ti-arrow-right fs-3 ms-2 me-0"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>






                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                            <div class="">
                                <br>
                                <div class="card-body">
                                    <div class="text-center pb-15 px-5">
                                        <img src="<?php echo e(asset('assets/assets/dist/images/backgrounds/2.png')); ?>" alt="" class="mw-100 h-200px h-sm-325px" />
                                    </div>
                            </div>
                        </div>

                        <!--end::Content-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Container-->

            </div>
        </div>


        <div id="confirmPayment-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <form class="ps-3 pr-3" action="<?php echo e(route('user.crypto.sell.confirm.manual')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                    <label for="trxhash">TRX Number</label>
                    <input class="form-control" type="text" name="trxhash" id="trxhash" required="" placeholder="Please Enter Transaction Ref Number" />
                    </div>
                    <input id="trxnumber" name="trx" hidden>
                    <div class="mb-3">
                    <label for="proof">Proof Of Payment</label>
                    <input class="form-control" type="file" name="proof" id="proof" required="" />
                    </div>

                    <div class="mb-3 text-center">
                    <button class="btn btn-light-info text-info font-medium" type="submit" >
                        Complete Payment
                    </button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            </div>
            <!-- /.modal-dialog -->

    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('script'); ?>
        <script></script>
            <script>
                "use strict";
                var KTCreateAccount = function() {
                    var e, t, i, o, a, r, s = [];
                    return {
                        init: function() {
                            // Initialize modal and stepper
                            (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e);
                            (t = document.querySelector("#kt_create_account_stepper")) && (i = t.querySelector("#kt_create_account_form"),
                                o = t.querySelector('[data-kt-stepper-action="submit"]'),
                                a = t.querySelector('[data-kt-stepper-action="next"]'),
                                (r = new KTStepper(t)).on("kt.stepper.changed", function(e) {
                                    // Handle stepper UI changes
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
                                }),

                                r.on("kt.stepper.next", function(e) {
                                    console.log("stepper.next");
                                    var t = s[e.getCurrentStepIndex() - 1];
                                    // Validate current step
                                    if (t) {
                                        t.validate().then(function(result) {
                                            console.log("validated!", result);
                                            if (result === "Valid") {
                                                e.goNext();
                                                KTUtil.scrollTop();
                                            } else {
                                                Swal.fire({
                                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                                    icon: "error",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: {
                                                        confirmButton: "btn btn-light"
                                                    }
                                                }).then(function() {
                                                    KTUtil.scrollTop();
                                                });
                                            }
                                        });
                                    } else {
                                        e.goNext();
                                        KTUtil.scrollTop();
                                    }
                                }),

                                r.on("kt.stepper.previous", function(e) {
                                    console.log("stepper.previous");
                                    e.goPrevious();
                                    KTUtil.scrollTop();
                                }),

                                // Initialize form validation for each step
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
                                })),

                                s.push(FormValidation.formValidation(i, {
                                    fields: {
                                        country: {
                                            validators: {
                                                notEmpty: {
                                                    message: "Please Select Country"
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
                                })),

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
                                })),

                                s.push(FormValidation.formValidation(i, {
                                    fields: {},
                                    plugins: {
                                        trigger: new FormValidation.plugins.Trigger(),
                                        bootstrap: new FormValidation.plugins.Bootstrap5({
                                            rowSelector: ".fv-row",
                                            eleInvalidClass: "",
                                            eleValidClass: ""
                                        })
                                    }
                                })),

                                // Handle form submission
                                o.addEventListener("click", function(e) {
                                    s[3].validate().then(function(result) {
                                        console.log("SUBMITTED", result);
                                        if (result === "Valid") {
                                            e.preventDefault();
                                            o.disabled = true;
                                            o.setAttribute("data-kt-indicator", "on");

                                            setTimeout(function() {
                                                submitform();
                                                function submitform() {
                                                    var raw = JSON.stringify({
                                                        _token: "<?php echo e(csrf_token()); ?>",
                                                        amount: document.getElementById('amount').value,
                                                        coin: document.getElementById('coin').value,
                                                        wallet: localStorage.getItem('wallet'),
                                                    });

                                                    var requestOptions = {
                                                        method: 'POST',
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        },
                                                        body: raw
                                                    };

                                                    fetch("<?php echo e(route('user.crypto.sell.coin')); ?>", requestOptions)
                                                        .then(response => response.text())
                                                        .then(result => {
                                                            var resp = JSON.parse(result);
                                                            console.info(resp);

                                                            if (resp.ok === false) {
                                                                o.removeAttribute("data-kt-indicator");
                                                                o.disabled = false;
                                                            }

                                                            if (resp.ok !== false && resp.auto !== false) {
                                                                var qrcode = "https://quickchart.io/qr?text=" + encodeURIComponent(resp.data.address) + "&size=300";
                                                                let coinvalue = resp.data.total_amount;
                                                                console.info(coinvalue);

                                                                o.removeAttribute("data-kt-indicator");
                                                                o.disabled = false;

                                                                document.getElementById("back").hidden = true;
                                                                document.getElementById("invoicedetails").innerHTML = `
                                                        <div class="w-100">
                                                            <div class="pb-8 pb-lg-10">
                                                                <div id="finaldiv"></div>
                                                                <section class="payment-method text-center">
                                                                    <h5 class="fw-semibold fs-5 text-info">Please make payment to the wallet address below</h5>
                                                                    <h5 class="fw-semibold fs-5 text-danger">PLEASE, DO NOT REFRESH YOUR BROWSER</h5>
                                                                    <img src="${qrcode}" alt="" class="img-fluid mb-4" width="300">
                                                                    <div class="input-group rounded">
                                                                        <input type="text" id="WalletAddress" readonly class="form-control border-end-0" aria-label="Text input with dropdown button" value="${resp.data.address}" />
                                                                        <button onclick="CopyWalletAddress()" class="btn p-0 border-top border-bottom border-end border-0" type="button">
                                                                            <span class="btn btn-primary m-1 rounded">Copy <i class="ti ti-copy fs-4"></i></span>
                                                                        </button>
                                                                    </div>
                                                                    <br>
                                                                    <h6 class="fw-semibold text-danger mb-7">We will not be liable to any loss arising from you sending coin to a wallet other than the one specified on this page.</h6>
                                                                    <div class="order-summary border rounded p-4 my-4">
                                                                        <div class="p-3">
                                                                            <h5 class="fs-5 fw-semibold mb-4">Payment Summary</h5>
                                                                            <div class="d-flex justify-content-between mb-4">
                                                                                <p class="mb-0 fs-4"><b>Fiat Value</b></p>
                                                                                <h6 class="mb-0 fs-4 fw-semibold text-primary"><b>${Object.values(coinvalue)[1]}${Object.keys(coinvalue)[1]}</b></h6>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between mb-4">
                                                                                <p class="mb-0 fs-4"><b>Crypto Value</b></p>
                                                                                <h6 class="mb-0 fs-4 fw-semibold text-primary"><b>${Object.values(coinvalue)[0]}${Object.keys(coinvalue)[0]}</b></h6>
                                                                            </div> <div class="d-flex justify-content-between mb-4">
                                                                                <p class="mb-0 fs-4"><b>TRX Number</b></p>
                                                                                <h6 class="mb-0 fs-4 fw-semibold text-primary"><b>${resp.data.invoice_id}</b></h6>
                                                                            </div>
                                                                            <button class="btn btn-primary confirmPayment" type="button" disabled onClick="confirmPayment('${resp.data.invoice_id}|${resp.data.coin}')">
                                                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                                Waiting For Payment...
                                                                            </button>
                                                                            <br>
                                                                            <a href="#" onClick="confirmPayment('${resp.data.invoice_id}|${resp.data.coin}')">Click Here To Verify Payment</a>
                                                                        </div>
                                                                        <a href="javascript:void(0)" onClick="confirmPaymentManual('${resp.data.trx}')" data-bs-toggle="modal" data-bs-target="#confirmPayment-modal" class="btn btn-primary">I Have Paid</a>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    `;
                                                            }

                                                            SlimNotifierJs.notification(resp.status, resp.status, resp.message, 3000);
                                                            r.goNext();
                                                        })
                                                        .catch(error => {
                                                            console.error('Error:', error);
                                                            o.removeAttribute("data-kt-indicator");
                                                            o.disabled = false;
                                                        });
                                                }

                                                // o.removeAttribute("data-kt-indicator");
                                                // o.disabled = false;
                                                r.goNext();
                                            }, 2000);
                                        } else {
                                            Swal.fire({
                                                text: "Sorry, looks like there are some errors detected, please try again.",
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn btn-light"

                                                }
                                            }).then(function() {
                                                KTUtil.scrollTop();
                                            });
                                        }
                                    });
                                })
                            );
                        }
                    }
                }();

                KTUtil.onDOMContentLoaded(function() {
                    KTCreateAccount.init();
                });
            </script>
            <script>
            function confirmPaymentManual(entry) {
                document.getElementById("trxnumber").value = entry;
            }
            // END GET INVOICE
            function confirmPayment(entry) {
                id = entry.split('|')[0]
                coin = entry.split('|')[1]
                var raw = JSON.stringify({
                    _token: "<?php echo e(csrf_token()); ?>",
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
                fetch("<?php echo e(route('user.crypto.sell.confirm')); ?>", requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        const resp = JSON.parse(result);
                        SlimNotifierJs.notification(resp.status, resp.status, resp.message, 3000);
                        if (resp.ok != false) {
                            window.location.href = "<?php echo e(route('user.crypto.sell.log')); ?>";
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
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('breadcrumb-plugins'); ?>
        <a class="btn btn-sm btn-primary" href="<?php echo e(route('user.crypto.sell.log')); ?>"> <i class="ti ti-printer"></i> <?php echo app('translator')->get('Trade Log'); ?></a>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vb\core\resources\views/templates/basic/user/assets/crypto/sellcrypto/sell.blade.php ENDPATH**/ ?>