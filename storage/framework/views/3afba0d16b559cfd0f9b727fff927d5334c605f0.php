<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:51 AM
 */

$data = [
    'compare_title' => "Homeowners"
]
?>



<?php $__env->startSection('content'); ?>
    <div class="main">
        <div class="container home_banner page_header_banner">
            <div class="banner_title">
                <h3> HOMEOWNERS</h3><h3> INSURANCE</h3>
            </div>
            <div class="banner_tag">
                <h3> Existing policyholder?</h3>
                <h3> <a href="#"> Access your account.</a></h3>
            </div>
        </div>



        <?php echo $__env->make('home.common.quote-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="health_body">
            <div class="col-md-12 health_title">
                <div class="col-md-5">
                    <img src="<?php echo e(asset('landing/goodinsured/img/site/icon3.png')); ?>" alt="" style="width: 85px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        Homeowners Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p>  Home is where your heart is—along with a healthy chunk of your net worth. The GEICO Insurance Agency can help you get the affordable home insurance coverage you need and the peace of mind you desire. You could also save when you combine your home and auto insurance policies. If you currently carry homeowners insurance, shopping early may qualify you for even more savings.
                </p>

            </div>

        </div>

        <div class="container-fluid home_type">
            <div class="home-tag">
                <p>Your policy is the best place to review your coverages, but a few common items covered by homeowners insurance are:</p>
            </div>

            <div class="col-md-4 desc condo homeowners_feature">
                <h3> Property Damage </h3>
                <p> Most policies provide coverage for damage to your house and any permanent structures on your property for: </p>
                <div class="ul_list">
                    <ul>
                        <li>Fire</li>
                        <li>Hail </li>
                    </ul>
                </div>
                <div  class="ul_list">
                    <ul>

                        <li>Wind	 </li>
                        <li>Water damage (unless excluded by your policy)	 </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 desc condo homeowners_feature">
                <h3>Personal Property</h3>
                <p> Coverage for damage to or theft of your stuff, like: </p>
                <ul>
                    <li> Furniture </li>
                    <li> Appliances </li>
                    <li> Clothing </li>
                    <li> Even dishes (in some cases)  </li>
                </ul>

            </div>

            <div class="col-md-4 desc condo homeowners_feature">
                <h3>Jewelry</h3>
                <p> Limited coverage, (usually $500 - $2,000), for jewelry stolen from your home. If your collection is worth more, let us help you with a jewelry policy to cover your valuables. </p>
            </div>
        </div>

        <div class="health_body container-fluid">

            <div class="home-tag">
                <h3>How much does renters insurance cost?</h3>
            </div>

            <div class="col-md-4 desc condo homeowners_feature">
                <img src="<?php echo e(asset('landing/goodinsured/img/site/home3.png')); ?>" alt=""  style="width: 135px !important;"/>
                <h3> Personal Liability </h3>
                <p>Could help cover medical expenses or property damage to others caused by you or members of your household, including pets. It could also help with legal expenses in the case of a law suit.</p>

            </div>

            <div class="col-md-4 desc condo homeowners_feature">
                <img src="<?php echo e(asset('landing/goodinsured/img/site/home-2.png')); ?>" alt="" style="width: 62px !important;" />
                <h3>Medical Bills</h3>
                <p>Medical payments coverage for minor injuries to people who don't live with you but are injured on your property.</p>
            </div>

            <div class="col-md-4 desc condo homeowners_feature">
                <img src="<?php echo e(asset('landing/goodinsured/img/site/renter1.png')); ?>" alt=""  style="width: 73px !important;" />
                <h3>Additional Expenses</h3>
                <p> Coverage for extra costs you might have to pay when experiencing a covered loss. </p>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <img src="<?php echo e(asset('landing/goodinsured/img/banner/home1.png')); ?>" alt="" />
            </div>
        </div>

        <div class="health_body treatment">
            <div class="col-md-12">
                <h3>
                    Check out more of our insurance products:
                </h3>
            </div>
            <div class="col-md-12 products ">

                <a href="#" >
                    <div class="renters">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/z1.png')); ?>" alt="" />
                        <h4>Renters</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="condo_item">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/icon2.png')); ?>" alt="" />
                        <h4>CONDO</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="pet">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/icon4.png')); ?>" alt="" />
                        <h4>PET</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="flood">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/flood.png')); ?>" alt="" />
                        <h4>FLOOD</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="trailer">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/trailer.png')); ?>" alt="" />
                        <h4>Trailer</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="mobile_home">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/mobile_home.png')); ?>" alt="" />
                        <h4>Mobile Home</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="rv">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/rv.png')); ?>" alt="" />
                        <h4>RV</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="auto">
                        <img src="<?php echo e(asset('landing/goodinsured/img/site/icon1.png')); ?>" alt="" />
                        <h4>Auto</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.goodinsured.layouts.master', $data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ssss\project\resources\views/home/goodinsured/pages/homeowners.blade.php ENDPATH**/ ?>