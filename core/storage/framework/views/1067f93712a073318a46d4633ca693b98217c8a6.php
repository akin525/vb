<?php $__env->startSection('panel'); ?>
    <div class="row">
      <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-sm-6 col-xl-6">
        <div class="card bg-light-info shadow-none">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <h6 class="mb-0 ms-3"><?php echo e($data->symbol); ?></h6>
              <div class="ms-auto text-primary d-flex align-items-center"> 
                <span class="fs-2 fw-bold" id="<?php echo e($data->symbol); ?>percent"><i class="fa fa-spinner fa-spin"></i></span>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4">
              <a href="<?php echo e(route('user.crypto.wallet',encrypt($data->id))); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->get('View Wallet'); ?></a>
              <span class="fw-bold"><?php echo app('translator')->get('Price'); ?>: <span id="<?php echo e($data->symbol); ?>"><i class="fa fa-spinner fa-spin"></i></span> </span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vb\core\resources\views/templates/basic/user/wallet/index.blade.php ENDPATH**/ ?>