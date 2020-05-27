<div class="row">
    <div class="col-md-6 float-left no-border no-margin">
        <h4 class="text-primary pl-4 pt-4">Account Information</h4>
    </div>
    <div class="py-lg-4 pr-lg-5 col-md-6 text-right float-left">
        <button type="button" class="btn btn-submit">  EDIT</button>
        <button type="button" class="btn btn-reset payment_cancel_button"> CANCEL</button>
    </div>
</div>
<div class="row provider_profile_edit">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field">
            <input type="hidden" name="policy_id" value="{{ !empty($policy->id) ? $policy->id : '' }}">
            <input type="hidden" name="cpd_id">
            <input type="hidden" name="policy_amount" value="{{ !empty($policy->price_1) ? $policy->price_1 : '' }}">
            <label for="company_name" class="col-sm-2 col-form-label">Policy Holder</label>
            <div class="col-sm-10 input_f">
                <input type="text" class="in form-control-plaintext" id="policy_holder" value="{{ !empty($userdata->name) ? $userdata->name : '' }}" name="policy_holder" readonly="true">
            </div>
            <label for="city" class="col-sm-2 col-form-label">Policy Number</label>
            <div class="col-sm-10  input_f">
                <input type="text" class="in form-control-plaintext" id="policy_number" value="{{ !empty($policy->policy_number) ? $policy->policy_number : ''}}" name="policy_number" readonly="true">
            </div>
            <label for="state" class="col-sm-2 col-form-label">Policy Period </label>
            <div class="col-sm-10  input_f">
                <input type="text" class="in form-control-plaintext" id="policy_period" value="{{ !empty($policy->policy_period) ? $policy->policy_period : '' }}" name="policy_period">
                <span class="error-message">Please enter a valid policy period.</span>
            </div>
            <label for="state" class="col-sm-2 col-form-label">Total Premium</label>
            <div class="col-sm-10  input_f">
                <input type="text" class="in form-control-plaintext"  value="{{ !empty($policy->price_1) ? '$'.$policy->price_1.'/MO' : '' }}" name="total_premium" readonly="true">
                <span class="error-message">Please enter a valid total premium.</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 float-left no-border no-margin">
        <h4 class="text-primary pl-4">Payment Plan</h4>
    </div>
</div>

<div class="row provider_profile_edit">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field">
            <div class="col-md-4  input_f text-center input_radio">
                <input id="monthly" type="radio" name="payment_plan" value="monthly" checked>
                <label class="radio-label" for="monthly">Monthly</label>
            </div>
            <div class="col-md-4  input_f text-center input_radio">
                <input id="quarter" type="radio" name="payment_plan" value="quarter">
                <label class="radio-label" for="quarter">Quarter</label>
            </div>
            <div class="col-md-4  input_f text-center input_radio">
                <input id="annual" type="radio" name="payment_plan" value="annual">
                <label class="radio-label" for="annual">Annual</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 float-left no-border no-margin">
        <h4 class="text-primary pl-4">Payment Method</h4>
    </div>
</div>

<div class="row provider_profile_edit">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="company_name" class="col-sm-4 col-form-label">Card Name</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" id="card_name" value="" name="card_name">
                <span class="error-message">Please provide a valid card name.</span>
            </div>
            <label for="city" class="col-sm-4 col-form-label">Card Number</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" id="card_number" value="" name="card_number">
                <span class="error-message">Please provide a valid card number.</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field  pt-0 mt-0">
            <label for="company_name" class="col-sm-12 col-form-label"> Expire Date </label>
            <div class="col-sm-12  input_f">
                <input type="text" class="in form-control-plaintext" id="" value="" placeholder="MM/YY" name="expiry_date">
                <span class="error-message">Please provide a valid expiry date.</span>
            </div>
            <label for="city" class="col-sm-12 col-form-label">Country</label>
            <div class="col-sm-12  input_f">
                <select  class="form-control in" name="country">
                    <option value="USA" selected> United State Of America </option>
                </select>
                <span class="error-message">Please provide a valid country.</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field  pt-0 mt-0">
            <label for="company_name" class="col-sm-12 col-form-label text-center">Security Code ("CVC" OR "CVV")</label>
            <div class="col-sm-12  input_f">
                <input type="text" class="in form-control-plaintext" id="security_code" value="" name="security_code">
                <span class="error-message">Please provide a valid security code.</span>
            </div>
            <label for="city" class="col-sm-12 col-form-label text-center">Postal Code</label>
            <div class="col-sm-12  input_f">
                <input type="text" class="in form-control-plaintext" id="postal_code" value="" name="postal_code">
                <span class="error-message">Please provide a valid postal code.</span>
            </div>
        </div>
    </div>
    <div class="col-md-12 info_con profile_info_con">
        <p class="text-primary">By saving a credit card, you agree to our Terms of Service, and if you use to pay for a plan, you authorize your credit card to be changed on a recurring basis until you cancel, which you can do at anytime. You understand how your payment works and how to cancel.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center pt-lg-5 pb-lg-4">
        <button class="btn btn-submit" type="submit" id="payment_button">PAY</button>
        <button type="reset" class="btn btn-reset">CANCEL</button>
    </div>
</div>