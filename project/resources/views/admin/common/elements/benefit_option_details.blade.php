<div class="benefit_option_section_div">
@php $count = 'A'; @endphp

@foreach($get_benefit_questions as $benefit_question)
    @if(empty($benefit_question->section_ids))
        <div class="profile_card">
            <div class="row question_title benefit_options_div">
                <h6 class="text-primary">{{ $count }}. {{ $benefit_question->question_text }}<input type="text" class="option_control" name="product_name"></h6>
            </div>
        </div>
        @php $count++; @endphp
    @endif
@endforeach

@foreach($get_benefit_option_sections as $benefit_option_section)

<div class="profile_card">
    <div class="row question_title">
        <h6 class="text-primary">{{ $count }}. {{ $benefit_option_section->section_name}}</h6>
        <div class="pull-left-mob">
            <a data-toggle="collapse" href=".clps-benefit_question_{{ $benefit_option_section->id }}" role="button" aria-expanded="true" aria-controls="benefit_question_{{ $benefit_option_section->id }}">
                <i class="fa fa-sort-down"></i>
            </a>
        </div>
    </div>

    <div class="benefit_options_div collapse show clps-benefit_question_{{ $benefit_option_section->id }}" id="benefit_question_{{ $benefit_option_section->id }}">
        <div class="row">
            @foreach($get_benefit_questions as $benefit_question)
                @if(!empty($benefit_question->section_ids) && in_array($benefit_option_section->id, json_decode($benefit_question->section_ids, true)))
                    @php
                    if(!empty($benefit_question->option_text)){
                        $options = explode('@-@', $benefit_question->option_text);
                    }else{
                        $options = [];
                    }
                    
                    @endphp
                <div class="col-md-6 benefit_options">
                    <label for="{{ $benefit_question->t_id }}" class="col-form-label">{{ $benefit_question->question_text }}*</label>
                    @if($benefit_question->question_input_type == 'range' && count($options) > 0)
                        <input type="range" class="option_control" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" id="{{ $benefit_question->t_id }}" min="{{ $options[0] }}" max="{{ $options[1] }}">
                    @elseif($benefit_question->question_input_type == 'number')
                        <input type="number" class="option_control" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" id="{{ $benefit_question->t_id }}">
                    @elseif($benefit_question->question_input_type == 'select' && count($options) > 0)
                        <select class="option_control" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" id="{{ $benefit_question->t_id }}">
                            <option value="">Select an option</option>
                            {{ print_r($options) }}
                            @foreach($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    @elseif($benefit_question->question_input_type == 'multi-select' && count($options) > 0)
                        <select class="option_control" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" id="{{ $benefit_question->t_id }}" multiple="multiple">
                            <option value="">Select an option</option>
                            @foreach($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    @elseif($benefit_question->question_input_type == 'checkbox' && count($options) > 0)
                        @foreach($options as $option)
                        <label class="container_checkbox">{{ $option }}
                            <input type="checkbox" class="checkbox" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}[]" value="{{ $option }}">
                            <span class="checkmark"></span>
                        </label>
                        @endforeach
                    @elseif($benefit_question->question_input_type == 'radio')
                        <div class="input_radio">
                            @foreach($options as $option)
                            <input id="{{ $option }}" type="radio" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" value="{{ $option }}">
                            <label class="radio-label mr-4" for="{{ $option }}">{{ $option }}</label>
                            @endforeach
                        </div>
                    @elseif($benefit_question->question_input_type == 'calendar')
                        <input type="text" class="option_control common_calendar" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" id="{{ $benefit_question->t_id }}">
                    @else
                        <input type="text" class="option_control" name="{{ str_replace(' ', '_', $benefit_question->question_text) }}" id="{{ $benefit_question->t_id }}">
                    @endif
                    
                </div>
                @endif
            @endforeach
            <div class="col-md-12">
                <button type="button" class="text-danger mt-3 addField" data-section_id="{{ $benefit_option_section->id }}" data-category_id="{{ $carrier_product->category_id }}"> <i class="fa fa-plus-circle"></i> Add Field</button>
            </div>
        </div>

        
    </div>
</div>

@php $count++; @endphp
@endforeach
</div>