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
                        <div
                            class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                            <!--begin::Wrapper-->
                            <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                                <!--begin::Nav-->
                                <div class="stepper-nav">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item current" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="ti ti-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    <?php echo app('translator')->get('Step 1'); ?>
                                                </h3>

                                                <div class="stepper-desc fw-semibold">
                                                    <?php echo app('translator')->get('Select Wallet'); ?>
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 1-->

                                    <!--begin::Step 2-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="ti ti-check fs-2 stepper-check"></i> <span
                                                    class="stepper-number">2</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    <?php echo app('translator')->get('Step 2'); ?>
                                                </h3>
                                                <div class="stepper-desc fw-semibold">
                                                    <?php echo app('translator')->get('Select Operator'); ?>
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 2-->

                                    <!--begin::Step 3-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="ti ti-check fs-2 stepper-check"></i> <span
                                                    class="stepper-number">3</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    <?php echo app('translator')->get('Step 3'); ?>
                                                </h3>
                                                <div class="stepper-desc fw-semibold">
                                                    <?php echo app('translator')->get('Beneficiar\'s Details'); ?>
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 3-->

                                    <!--begin::Step 4-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="ti ti-check fs-2 stepper-check"></i> <span
                                                    class="stepper-number">4</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    <?php echo app('translator')->get('Step 4'); ?>
                                                </h3>
                                                <div class="stepper-desc fw-semibold">
                                                    <?php echo app('translator')->get('Preview Transaction'); ?>
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 4-->

                                    <!--begin::Step 5-->
                                    <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="ti ti-check fs-2 stepper-check"></i> <span
                                                    class="stepper-number">5</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    <?php echo app('translator')->get('Completed'); ?>
                                                </h3>
                                                <div class="stepper-desc fw-semibold">
                                                    <?php echo app('translator')->get('Woah, we are here'); ?>
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 5-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--begin::Aside-->

                        <!--begin::Content-->
                        <div class="card d-flex flex-row-fluid flex-center">
                            <!--begin::Form-->
                            <form class="card-body py-20 w-100 mw-xl-700px px-9" novalidate="novalidate"
                                id="kt_create_account_form">
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold d-flex align-items-center text-dark">
                                                <?php echo app('translator')->get('Select Wallet'); ?>


                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Payment is processed based on your selected account type">
                                                    <i class="ti ti-alert-circle text-gray-500 fs-6"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></i></span>
                                            </h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                                <?php echo app('translator')->get('If you need more info, please check out '); ?>'
                                                <a href="#" class="link-primary fw-bold"><?php echo app('translator')->get('Help Page'); ?></a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="account_type" onchange="selectwallet('main')" id="mainwallet" />
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10"
                                                        for="mainwallet">
                                                        <i class="ti ti-wallet fs-3x me-5"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span></i>
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-semibold text-start">
                                                            <span class="text-dark fw-bold d-block fs-4 mb-2">
                                                                <?php echo app('translator')->get('Main Wallet'); ?>
                                                            </span>
                                                            <span class="text-muted fw-semibold fs-6"><?php echo e($general->cur_sym); ?><?php echo e(showAmount(Auth::user()->balance)); ?></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="account_type"  onchange="selectwallet('ref')" id="refwallet" />
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                        for="refwallet">
                                                        <i class="ti ti-wallet fs-3x me-5"><span class="path1"></span><span class="path2"></span></i>
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-semibold text-start">
                                                            <span class="text-dark fw-bold d-block fs-4 mb-2"><?php echo app('translator')->get('Referral Wallet'); ?></span>
                                                            <span class="text-muted fw-semibold fs-6"><?php echo e($general->cur_sym); ?><?php echo e(showAmount(Auth::user()->ref_balance)); ?></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
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
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-dark"><?php echo app('translator')->get('Country & Provider'); ?></h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                               <?php echo app('translator')->get('Please select country and your prefered service provider below'); ?>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label mb-3"><?php echo app('translator')->get('Select Country'); ?></label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <select name="country" class="form-select form-select-solid"
                                                data-control="select2" id="youSendCurrency" data-hide-search="false"
                                                onchange="populate()" data-placeholder="<?php echo app('translator')->get('Select Country'); ?>">
                                                <option value=""><?php echo app('translator')->get('Select a Country'); ?>...</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-countryname="<?php echo e($data['name']); ?>"
                                                        data-callingCode="<?php echo e($data['callingCodes'][0]); ?>"
                                                        data-countrycurrency="<?php echo e($data['currencyCode']); ?>"
                                                        data-isoName="<?php echo e($data['isoName']); ?>"
                                                        data-countrycontinent="<?php echo e($data['continent']); ?>"
                                                        value="<?php echo e($data['isoName']); ?>"
                                                        data-icon="currency-flag currency-flag-<?php echo e(strtoLower($data['currencyCode'])); ?> me-1">
                                                        <?php echo e($data['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select> <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <?php $__env->startPush('script'); ?>
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
                                                    var isocode = $("#youSendCurrency option:selected").attr('data-isoName');
                                                    var countryname = $("#youSendCurrency option:selected").attr('data-countryname');
                                                    var countrycurrency = $("#youSendCurrency option:selected").attr('data-countrycurrency');
                                                    var countrycontinent = $("#youSendCurrency option:selected").attr('data-countrycontinent');
                                                    var callingCode = $("#youSendCurrency option:selected").attr('data-callingCode');
                                                    document.getElementById("countrycurrency").innerHTML = countrycurrency;
                                                   // document.getElementsByClassName("currency").innerHTML = countrycurrency;
                                                   // document.getElementsByClassName("callingCode").innerHTML = callingCode;
                                                    document.getElementById("countryname").innerHTML = countryname;
                                                    //document.getElementById("countrycontinent").value = countrycontinent;

                                                    var _token = $("input[name='_token']").val();
                                                    $.ajax({
                                                        url: "<?php echo e(route('user.airtime.operators')); ?>",
                                                        type: 'GET',
                                                        async: true,
                                                        data: {
                                                            _token: _token,
                                                            isocode: isocode,
                                                            includeBundles: false,
                                                            includeData: false
                                                        },
                                                        cache: false,
                                                        dataType: "json",
                                                        success: function(data) {
                                                            if (data.status == 'true') {
                                                                var plans = data.content.response;
                                                                let html = '';
                                                                let filteredUsers = [];
                                                                for (let i= 0; i<plans.length; i++) {
                                                                    if (plans[i].data = false ) {
                                                                        filteredUsers = [...filteredUsers, plans[i]];
                                                                    }
                                                                }
                                                                console.info(filteredUsers.length);
                                                                plans.map(plan => {  
                                                                    let provider = plan['name'];
                                                                    let operatorId = plan['operatorId'];
                                                                    let min = plan['minAmount'];
                                                                    let max = plan['maxAmount'];
                                                                    let fixedAmounts = plan['fixedAmounts'];
                                                                    let countryCode = plan['country']['isoName'];
                                                                    let rate = plan['fx']['rate'];
                                                                    let currency = plan['fx']['currencyCode'];
                                                                    let htmlSegment = 
                                                                    `<label class="d-flex flex-stack cursor-pointer mb-5" for="${plan['operatorId']}" >
                                                                        <span class="d-flex align-items-center me-2">
                                                                            <span class="symbol symbol-50px me-6">
                                                                                <span class="symbol-label bg-light-primary">
                                                                                    <i class="ti ti-image fs-2x text-warning"><img src="${plan['logoUrls'][0]}" width="30" class="path1"/></i>
                                                                                </span>
                                                                            </span> 
                                                                            <span class="d-flex flex-column">
                                                                                <span class="fw-bold fs-6">${plan['name']}</span>
                                                                                <span class="fs-7 text-muted">${plan['country']['name']}</span>
                                                                            </span>
                                                                        </span>
                            
                                                                        <span class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="radio" onchange="networkprovider('${JSON.stringify(fixedAmounts)}','${countryCode}','${operatorId}','${provider}','${rate}','${currency}','${min}','${max}')"
                                                                                name="operator" id="${plan['operatorId']}" value="${plan['operatorId']}" />
                                                                        </span>
                                                                    </label>
                                                                    `;
                                                                    html += htmlSegment; 
                                                                });



                                                                document.getElementById('providers').innerHTML =
                                                                    ` <div class="mb-0"> <label class="d-flex align-items-center form-label mb-5">
                                                                        <?php echo app('translator')->get('Select Operator Plan'); ?>
                                                                        <span class="ms-1"  data-bs-toggle="tooltip" title="Please select network service provider" >
                                                                        <i class="ti ti-alert-circle text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>        
                                                                        </label> ${html} </div>
                                                                    `;

                                                                //  $("#loadered").html('');
                                                            } else {
                                                                // $("#loadered").html('');
                                                            }

                                                            KTApp.hidePageLoading();
                                                            loadingEl.remove();
                                                        }
                                                    });
                                                    // END GET DATA \\
                                                }
                                            </script>
                                            <script>
                                              function networkprovider(arrayamounts,countryCode,operatorId,network,rate,currency,minAmount,maxAmount) {
                                                        localStorage.setItem('networkrate', rate);  
                                                        localStorage.setItem('operatorId', operatorId);  
                                                        localStorage.setItem('minAmount', minAmount);  
                                                        localStorage.setItem('maxAmount', maxAmount);  
                                                        localStorage.setItem('networkcurrency', currency);
                                                        localStorage.setItem('countryCode', countryCode);   
                                                        localStorage.getItem('operatorName',network); 
                                                        document.getElementById("networkprovider").innerHTML = network;
                                                        document.getElementById("range").innerHTML = '';

                                                        let html = '';
                                                        const arrayamount = JSON.parse(arrayamounts);
                                                        arrayamount.forEach(myFunction);
                                                        function myFunction(item) {
                                                        let htmlSegment = `
                                                        <div class="col">
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                        <input type="radio" class="btn-check" onclick="setamount(${item})" name="customamount" value="${item}" />
                                                        <span class="fw-bold fs-3">${item}<small><b></b></small><a class="countrycurrency"></a></span>
                                                        </label>
                                                        </div>
                                                        `;
                                                        html += htmlSegment;
                                                        } 
                                                        if(arrayamount.length > 0)
                                                        {
                                                        document.getElementById("amountlist").innerHTML = ` <label class="d-flex align-items-center form-label mb-3">
                                                                <?php echo app('translator')->get('Select Amount'); ?>
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Select amount or enter custom amount below">
                                                                    <i class="ti ti-alert-circle text-gray-500 fs-6"><span
                                                                            class="path1"></span><span class="path2"></span><span
                                                                            class="path3"></span></i></span> </label><div class="row mb-2" data-kt-buttons="true">`+html+`</div><div class="form-text">
                                                                <?php echo app('translator')->get('Please select default amount above or enter custom amount below'); ?>
                                                            </div>`;
                                                        }
                                                       
                                                        
                                                        if(minAmount != 'null')
                                                        {
                                                          document.getElementById("range").innerHTML = '<span class="badge bg-primary">Min: '+minAmount+' - Max: '+maxAmount+"</span>";
                                                        }
                                                    }
                                            </script>
                                        <?php $__env->stopPush(); ?>


                                        <!--begin::Input group-->
                                        <div class="mb-0 fv-row">

                                            <!--begin::Options-->
                                            <div id="providers"></div>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 2-->

                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-12">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-dark"><?php echo app('translator')->get('Beneficiary\'s Details'); ?></h2>
                                            <!--end::Title-->

                                            <!--begin::Notice-->
                                            <div class="text-muted fw-semibold fs-6">
                                                <?php echo app('translator')->get('Please enter beneficiary\'s phone number and amount below'); ?></a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label required"><?php echo app('translator')->get('Phone Number'); ?></label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input name="phone" id="phone" class="form-control form-control-lg form-control-solid"
                                                value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->



                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row"> 
                                            <!--begin::Fixed Amount-->
                                            <div id="amountlist"></div>
                                            <!--end::Fixed Amount-->  
                                        </div>
                                        <!--end::Input group-->


                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label required"><?php echo app('translator')->get('Enter Amount'); ?></label><br>
                                            <div id="range"></div>

                                            
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <?php $__env->startPush('script'); ?>
                                                <script>
                                                    function setamount(input) {
                                                        var amount = input;
                                                        if(input.value)
                                                        {
                                                          amount = input.value;
                                                        }
                                                        document.getElementById("amount").value = amount;
                                                        var rate = localStorage.getItem('networkrate');
                                                        var currency = localStorage.getItem('networkcurrency');
                                                        var total = amount/rate;
                                                        document.getElementById("subtotalamount").innerHTML = amount+currency;
                                                        document.getElementById("totalamount").innerHTML = total.toFixed(2)+'<?php echo e($general->cur_text); ?>';
                                                        document.getElementById("rate").innerHTML = '1<?php echo e($general->cur_text); ?> = '+rate+currency;
                                                    }
                                                </script>
                                            <?php $__env->stopPush(); ?>
                                            <div class="input-group mb-3">
                                              <input name="amount" id="amount" type="number"
                                              class="form-control form-control-lg form-control-solid" onkeyup="setamount(this)" />
                                              <span class="input-group-text">
                                                <small id="countrycurrency"></small>
                                              </span>
                                          </div>
                                           
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Wrapper-->

                                </div>
                                <!--end::Step 3-->

                                <!--begin::Step 4-->
                                <div data-kt-stepper-element="content">
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
                                                  <table
                                                      class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                      <tbody class="fw-semibold text-gray-600">
                                                          <tr>
                                                              <td class="text-muted">
                                                                  <div class="d-flex align-items-center">
                                                                      <i class="ti ti-globe fs-2 me-2"><span
                                                                              class="path1"></span><span
                                                                              class="path2"></span><span
                                                                              class="path3"></span><span
                                                                              class="path4"></span><span
                                                                              class="path5"></span></i>
                                                                      <?php echo app('translator')->get('Country'); ?>


                                                                      <span class="ms-1" data-bs-toggle="tooltip"
                                                                          title="This is the beneficiary country.">
                                                                          <i
                                                                              class="ti ti-alert-circle  text-gray-500 fs-6"><span
                                                                                  class="path1"></span><span
                                                                                  class="path2"></span><span
                                                                                  class="path3"></span></i></span>
                                                                  </div>
                                                              </td>
                                                              <td class="fw-bold text-end"><a href="#"
                                                                      class="text-gray-600 text-hover-primary"
                                                                      id="countryname"></a></td>
                                                          </tr>
                                                          <tr>
                                                              <td class="text-muted">
                                                                  <div class="d-flex align-items-center">
                                                                      <i class="ti ti-wifi fs-2 me-2"><span
                                                                              class="path1"></span><span
                                                                              class="path2"></span><span
                                                                              class="path3"></span><span
                                                                              class="path4"></span><span
                                                                              class="path5"></span></i> <?php echo app('translator')->get('Operator'); ?>


                                                                      <span class="ms-1" data-bs-toggle="tooltip"
                                                                          title="This is the network service provider.">
                                                                          <i
                                                                              class="ti ti-alert-circle  text-gray-500 fs-6"><span
                                                                                  class="path1"></span><span
                                                                                  class="path2"></span><span
                                                                                  class="path3"></span></i></span>
                                                                  </div>
                                                              </td>
                                                              <td class="fw-bold text-end"><a href="#"
                                                                      class="text-gray-600 text-hover-primary" id="networkprovider"></a>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td class="text-muted">
                                                                  <div class="d-flex align-items-center">
                                                                      <i class="ti ti-exchange fs-2 me-2"><span
                                                                              class="path1"></span><span
                                                                              class="path2"></span></i> <?php echo app('translator')->get('Rate'); ?>


                                                                      <span class="ms-1" data-bs-toggle="tooltip"
                                                                          title="This is the ">
                                                                          <i
                                                                              class="ti ti-alert-circle  text-gray-500 fs-6"><span
                                                                                  class="path1"></span><span
                                                                                  class="path2"></span><span
                                                                                  class="path3"></span></i></span>
                                                                  </div>
                                                              </td>
                                                              <td class="fw-bold text-end" id="rate"></td>
                                                          </tr>

                                                          <tr>
                                                            <td class="text-muted">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="ti ti-report-money fs-2 me-2"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i> <?php echo app('translator')->get('Sub Total'); ?> 
                                                                </div>
                                                            </td>
                                                            <td class="fw-bold text-end" id="subtotalamount"></td>
                                                        </tr>

                                                          <tr>
                                                              <td class="text-muted">
                                                                  <div class="d-flex align-items-center">
                                                                      <i class="ti ti-building-bank fs-2 me-2"><span
                                                                              class="path1"></span><span
                                                                              class="path2"></span></i> <?php echo app('translator')->get('Total'); ?> 
                                                                  </div>
                                                              </td>
                                                              <td class="fw-bold text-end" id="totalamount"></td>
                                                          </tr>
                                                          <tr></tr>
                                                      </tbody>
                                                  </table> 
                                                  
                                                  <br><br><br>
                                      
                                            
                                            <label class="fs-6 fw-semibold mb-2">
                                                <?php echo app('translator')->get('Enter Transaction Password'); ?> 
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Please enter your transaction password to authenticate the wallet debit">
                                                    <i class="ti ti-alert-circle text-gray-500 fs-6"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></i></span> </label>
                                            <!--End::Label-->

                                            <!--begin::Input-->
                                            <input type="password" onkeyup="verifypassword(this)" id="password" class="form-control form-control-lg form-control-solid"
                                                name="password" placeholder="" value="" autocomplete="off" />
                                            <!--end::Input-->
                                            <div id="passmessage"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <?php $__env->startPush('script'); ?>
                                        <script>
                                          function verifypassword(e)
                                          {
                                                    $("#passmessage").html(`<button class="btn btn-primary" type="button" disabled>
                                                    <span
                                                      class="spinner-border spinner-border-sm"
                                                      role="status"
                                                      aria-hidden="true"></span>
                                                    <span class="visually-hidden">Loading...</span>
                                                    </button>`);
 
                                                var raw = JSON.stringify({
                                                  _token: "<?php echo e(csrf_token()); ?>", 
                                                  password : e.value, 
                                                });

                                                var requestOptions = {
                                                  method: 'POST',
                                                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                  body: raw
                                                };
                                                fetch("<?php echo e(route('user.trxpass')); ?>", requestOptions)
                                                  .then(response => response.text())
                                                  .then(result => 
                                                  {
                                                    resp = JSON.parse(result);
                                                    if(resp.ok != true)
                                                    {
                                                      document.getElementById("submit").disabled = true;
                                                    }
                                                    if(resp.ok != false)
                                                    {
                                                      document.getElementById("submit").disabled = false;
                                                    }
                                                    $("#passmessage").html(`<div class="alert alert-${resp.status}" role="alert"><strong>${resp.status} - </strong> ${resp.message}</div>`);
                                                  }
                                                  )
                                                  .catch(error => 
                                                  {

                                                  }
                                                  ); 
                                                  // END GET DATA \\
                                               }
                                        </script>
                                        <?php $__env->stopPush(); ?>

                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 4-->

                                <!--begin::Step 5-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-8 pb-lg-10">
                                            <!--begin::Title-->
                                            <div id="finaldiv"></div>
                                            <section class="payment-method text-center">
                                              <h5 class="fw-semibold fs-5"><?php echo app('translator')->get('Payment Successful'); ?>!</h5>
                                              <h6 class="fw-semibold text-primary mb-7"></h6>
                                              <img src="<?php echo e(asset('assets/assets/dist/images/backgrounds/payment-complete.gif')); ?>" alt="" class="img-fluid mb-4" width="300">
                                              <p class="mb-0 fs-2"><?php echo app('translator')->get('We will send you a notification email containing your transaction details'); ?>.</p>
                                              <div class="d-sm-flex align-items-center justify-content-between my-4">
                                               <center>  <a href="<?php echo e(route('user.airtime.history')); ?>" class="btn btn-primary d-block"><?php echo app('translator')->get('View Order'); ?></a> </center>
                                              </div>
                                            </section>
                                        </div> 
                                    </div>
                                    <!--end::Wrapper-->
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
                                        <button type="button" class="btn btn-lg btn-primary me-3"
                                            data-kt-stepper-action="submit" id="submit">
                                            <span class="indicator-label">
                                                Submit
                                                <i class="ti ti-arrow-right fs-3 ms-2 me-0"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>

                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">
                                            Continue
                                            <i class="ti ti-arrow-right fs-4 ms-1 me-0"><span class="path1"></span><span
                                                    class="path2"></span></i> </button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Container-->

            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('script'); ?>
    <script>
        
    </script>
        <script>
            "use strict";
            var KTCreateAccount = function() {
                var e, t, i, o, a, r, s = [];
                return {
                    init: function() {
                        (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e), (t =
                            document.querySelector("#kt_create_account_stepper")) && (i = t.querySelector("#kt_create_account_form"), 
                                o = t.querySelector('[data-kt-stepper-action="submit"]'), 
                                a = t.querySelector('[data-kt-stepper-action="next"]'), (r = new KTStepper(t)).on("kt.stepper.changed",
                                (function(e) {
                                    4 === r.getCurrentStepIndex() ? (o.classList.remove("d-none"), o.classList
                                            .add("d-inline-block"), a.classList.add("d-none")) : 5 === r
                                        .getCurrentStepIndex() ? (o.classList.add("d-none"), 
                                            a.classList.add("d-none")) : (o.classList.remove("d-inline-block"), 
                                            o.classList.remove("d-none"), 
                                            a.classList.remove("d-none"))
                                })), r.on("kt.stepper.next", (function(e) {
                                console.log("stepper.next");
                                var t = s[e.getCurrentStepIndex() - 1];
                                t ? t.validate().then((function(t) {
                                    console.log("validated!"), "Valid" == t ? (e.goNext(),
                                        KTUtil.scrollTop()) : Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-light"
                                        }
                                    }).then((function() {
                                        KTUtil.scrollTop()
                                    }))
                                })) : (e.goNext(), KTUtil.scrollTop())
                            })), r.on("kt.stepper.previous", (function(e) {
                                console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop()
                            })), s.push(FormValidation.formValidation(i, {
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
                                    trigger: new FormValidation.plugins.Trigger,
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: ""
                                    })
                                }
                            })), s.push(FormValidation.formValidation(i, {
                                fields: {

                                    country: {
                                        validators: {
                                            notEmpty: {
                                                message: "Please Select Country name is required"
                                            }
                                        }
                                    },
                                    operator: {
                                        validators: {
                                            notEmpty: {
                                                message: "Please Select Operator"
                                            }
                                        }
                                    }
                                }

                            })), s.push(FormValidation.formValidation(i, {
                                fields: {
                                    amount: {
                                        validators: {
                                            notEmpty: {
                                                message: "Amount is required"
                                            }
                                        }
                                    },
                                    phone: {
                                        validators: {
                                            notEmpty: {
                                                message: "Beneficiary phone numnber is required"
                                            }
                                        }
                                    }
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger,
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: ""
                                    })
                                }
                            })), s.push(FormValidation.formValidation(i, {
                                fields: {
                                    password: {
                                        validators: {
                                            notEmpty: {
                                                message: "Please enter account password"
                                            }
                                        }
                                    }
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger,
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: ""
                                    })
                                }
                            })), o.addEventListener("click", (function(e) {
                                s[3].validate().then((function(t) {
                                    console.log("SUBMITED",t), "Valid" == t ? (e
                                    .preventDefault(), o.disabled = !0, o.setAttribute(
                                        "data-kt-indicator", "on"), setTimeout((
                                        function() {
                                            submitform();
                                             // START BUY AIRTEL \\
                                            function submitform()
                                            {
                                              $("#passmessage").html(``);
                                              var raw = JSON.stringify({
                                                  _token: "<?php echo e(csrf_token()); ?>", 
                                                  password : document.getElementById('password').value, 
                                                  amount : document.getElementById('amount').value, 
                                                  phone : document.getElementById('phone').value,  
                                                  operator :localStorage.getItem('operatorId'), 
                                                  wallet :localStorage.getItem('wallet'), 
                                                });

                                                var requestOptions = {
                                                  method: 'POST',
                                                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                  body: raw
                                                };
                                                fetch("<?php echo e(route('user.buy.airtime')); ?>", requestOptions)
                                                  .then(response => response.text())
                                                  .then(result => 
                                                  {
                                                    resp = JSON.parse(result);
                                                    if(resp.ok == false)
                                                    {
                                                      o.removeAttribute("data-kt-indicator");
                                                      o.disabled = !1;
                                                    }
                                                    if(resp.ok == true)
                                                    {
                                                      o.removeAttribute("data-kt-indicator");
                                                      o.disabled = !1;
                                                      document.getElementById("back").hidden = true;
                                                      r.goNext();
                                                    }
                                                   $("#passmessage").html(`<div class="alert alert-${resp.status}" role="alert"><strong>${resp.status} - </strong> ${resp.message}</div>`);
                                                  }
                                                  )
                                                  .catch(error => 
                                                  {
                                                    
                                                  }
                                                  ); 
                                            }
                                            // END BUY AIRTEL \\
                                           // o.removeAttribute("data-kt-indicator"),
                                           // o.disabled = !1, r.goNext()
                                        }), 2e3)) : Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-light"
                                        }
                                    }).then((function() {
                                        KTUtil.scrollTop()
                                    }))
                                }))
                            })))
                    }
                }
            }();
            KTUtil.onDOMContentLoaded((function() {
                KTCreateAccount.init()
            })); 
        </script>
        <script>
            
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/billxgiftbills/public_html/core/resources/views/templates/basic/user/bills/airtime/airtime_buy.blade.php ENDPATH**/ ?>