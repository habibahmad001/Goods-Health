<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:57 AM
 */
?>
<div class="quote_rate quote_call">
    <div class="col-md-12">
        <h3>Compare <?php echo e(isset($data['compare_title']) ? $data['compare_title'] : ""); ?> Insurance Rates</h3>
        <p>Learn more about the factors that dictate your car insurance rates, compare top insurers, and save.</p>
    </div>
    <div class="col-md-12">
        <input class="font-quote" placeholder="&#xF041; 33175" style="font-family:Arial, FontAwesome"/>
        <p class="input-zipcode">Zipcode</p>
        <button> View Quotes <i class="fa fa-angle-right"></i></button>
    </div>
    <div class="col-md-12">
        <p><img src="<?php echo e(asset('landing/goodinsured/img/site/secure.png')); ?>" width="17px"/> Your information is secure.</p>
    </div>
</div>
<?php /**PATH C:\wamp64\www\ssss\project\resources\views/home/common/quote-search.blade.php ENDPATH**/ ?>