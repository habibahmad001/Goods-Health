<div class="col-lg-3 no-margin col-sm-12 profile_tab_list">
    <div class="nav flex-column nav-pills profile_tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
            Profile
        </a>

        <a id="v-pills-detailed-info-tab" data-toggle="pill" href="#v-detailed-info-tab" role="tab" aria-controls="v-detailed-info-tab" aria-selected="true">
            Detailed Info
        </a>

        @if($role_id == 4 || $role_id == 1)
            <a id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="true">
            Customers
            </a>

            <a id="v-pills-business-tab" data-toggle="pill" href="#v-pills-business" role="tab" aria-controls="v-pills-business" aria-selected="true">
            Business
            </a>
            @if($role_id == 1)
                <a id="v-pills-provider-tab" data-toggle="pill" href="#v-pills-provider" role="tab" aria-controls="v-pills-provider" aria-selected="true">
                Provider
                </a>
            @endif
        @elseif($role_id == 3)
            <a id="v-pills-employee-tab" data-toggle="pill" href="#v-pills-employee" role="tab" aria-controls="v-pills-employee" aria-selected="true">
            Employee
            </a>
        @endif

        <a id="v-pills-quotes-tab" data-toggle="pill" href="#v-quotes-tab" role="tab" aria-controls="v-quotes-tab" aria-selected="true">
            Quotes
        </a>

        <a id="v-pills-benefitinfo-tab" data-toggle="pill" href="#v-pills-benefitinfo" role="tab" aria-controls="v-pills-benefitinfo" aria-selected="true">
            Benefit Info
        </a>

        <a id="v-pills-files-tab" data-toggle="pill" href="#v-pills-files" role="tab" aria-controls="v-pills-files" aria-selected="true">
            Files
        </a>

        <a id="v-pills-insurance-option-tab" data-toggle="pill" href="#v-pills-insurance-option" role="tab" aria-controls="v-pills-insurance-option" aria-selected="true">
            Insurance Options
        </a>

        <a id="v-report-claim-tab" data-toggle="pill" href="#v-report-claim" role="tab" aria-controls="v-report-claim-tab" aria-selected="true">
            Report Claim
        </a>

        <a id="v-payment-tab" data-toggle="pill" href="#v-payment" role="tab" aria-controls="v-payment-tab-tab" aria-selected="true">
            Payment
        </a>

        @if($role_id == 4 || $role_id == 1)
        <a id="v-pills-employee-tab" data-toggle="pill" href="#v-pills-employee" role="tab" aria-controls="v-directory-tab-tab" aria-selected="true">
            Directory
        </a>
        @endif

        <a id="v-pills-activity-tab" data-toggle="pill" href="#v-pills-activity" role="tab" aria-controls="v-pills-activity" aria-selected="true">
            Activity
        </a>

        <a id="v-pills-carrier-tab" data-toggle="pill" href="#v-pills-carrier" role="tab" aria-controls="v-pills-carrier" aria-selected="true">
            Carrier
        </a>

        <a id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="true">
            History
        </a>
    </div>
</div>