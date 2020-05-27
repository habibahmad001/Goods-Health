<!-- Show policies list -->
<div class="modal fade" id="product_management_benefit_add_field" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="benefit_options_div modal-body">
                <div class="row">
                    <form id="form_addQuestionField" action="#">
                        <input type="hidden" name="benefit_question_section_id">
                        <input type="hidden" name="product_id">
                        <input type="hidden" name="category_id">
                        <div class="col-md-12 benefit_options mt-3">
                            <input type="text" class="option_control m-0 w-100" name="question_text" placeholder="Question Text">
                        </div>
                        <div class="col-md-12 input_radio mt-5">
                            <p class="modal-title text-primary">Layout Type</p>
                        </div>
                        <div class="col-md-12 input_radio mt-4">
                            <input id="text" type="radio" name="input_field" value="text">
                            <label class="radio-label mr-4" for="text">Text</label>

                            <input id="calendar" type="radio" name="input_field" value="calendar">
                            <label class="radio-label mr-4" for="calendar">Calendar</label>

                            <input id="number" type="radio" name="input_field" value="number">
                            <label class="radio-label mr-4" for="number">Number</label>

                            <input id="range" type="radio" name="input_field" value="range">
                            <label class="radio-label mr-4" for="range">Range</label>

                            <input id="radio" type="radio" name="input_field" value="radio">
                            <label class="radio-label mr-4" for="radio">Radio</label>

                            <input id="checkbox" type="radio" name="input_field" value="checkbox">
                            <label class="radio-label mr-4" for="checkbox">Checkbox</label>
                            
                            <input id="select" type="radio" name="input_field" value="select">
                            <label class="radio-label mr-4" for="select">Select</label>

                            <input id="multi-select" type="radio" name="input_field" value="multi-select">
                            <label class="radio-label mr-4" for="multi-select">Multi-Select</label>
                        </div>

                        <div class="col-md-12 benefit_options add_field_options"></div>
                        <div class="col-md-12 benefit_options add_field_option_button" style="display: none;">
                            <button type="button" class="text-danger mt-3 addOption" data-option_count="0"> <i class="fa fa-plus-circle"></i> Add Option</button>
                        </div>
                        

                        <div class="col-md-12 text-center pt-5 pb-5">
                            <button class="btn btn-submit" type="submit">{{ __('SAVE') }}</button>
                            <button type="reset" class="btn btn-reset">{{ __('CANCEL') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>