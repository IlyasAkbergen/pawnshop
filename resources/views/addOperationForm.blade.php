@extends('layouts.layout')

@section('style')

<link rel="stylesheet" href="{{asset('css/addOperation.css')}}">

@endsection

@section('content')

	<div class="wrp">
	    <div class="form_gen_wrapper ">    
	    	<h1 class="form_gen_header">Провести кассовую операцию</h1>    
	    	<form enctype="multipart/form-data" name="addOperation" method="POST" id="" action="{{route('addOperation')}}">
	    		{{ csrf_field() }}   
	    		<div class="form_row cf ">
                    <div class="field_label row_header required">
                        Вид
                    </div>

                    <div class="field_input">
                        <select id="raskhod_incash_sel" data-require="1" name="type_operation">
                            <option value="" selected="" disabled="">Выбор</option>
                            <option value="0">Приход</option>
                            <option value="1">Расход</option>
                        </select>
                		<div class="field_example"></div>
                        <div class="message_box error_message"></div>
                        <div class="message_box field_message">Выберите вид кассовой операции.</div>
                    </div>
                </div>
                <div class="form_row cf" style="display: block;">
                    <div class="field_label row_header "></div>

                	<div class="field_input valid">
                        <input type="checkbox" name="incash" value="on" id="incash">
                        <label id="incash-description" for="incash"></label>
                       <!--  <script type="text/javascript">
                            $("#raskhod_incash_sel").change(function() {
                                $("#incash").closest(".form_row").show();
                                $("#incash-description").show();

                                if($(this).find(":selected").val() == 50) {
                                    $("#incash").attr("checked","checked");
                                    $("#incash-description").text("Записать в затраты");
                                } else {
                                    $("#incash").removeAttr("checked");
                                    $("#incash-description").text("Записать в доход");
                                }
                            })
                        </script>
                     -->
	                    <div class="field_example"></div>
	                    <div class="message_box error_message"></div>
                    </div>
                </div>
            	<div class="form_row cf hidden">
					<div class="field_label row_header "></div>
                    <div class="field_input valid">
                        <input type="checkbox" name="incash" value="incash" id="incash">
                        <label id="incash-description" for="incash">записать в доход</label>
                        <script type="text/javascript">
                            $("#raskhod_incash_sel").change(function() {
                                $("#incash").closest(".form_row").show();
                                $("#incash-description").show();

                                if($(this).find(":selected").val() == 50) {
                                    $("#incash").attr("checked","checked");
                                    $("#incash-description").text("Записать в затраты");
                                } else {
                                    $("#incash").removeAttr("checked");
                                    $("#incash-description").text("Записать в доход");
                                }
                            })
                        </script>
	                                
                        <div class="field_example"></div>
                        <div class="message_box error_message"></div>
                    </div>
                </div>
        	    <input type="hidden" value="1" name="entity_id">
                <div class="form_row cf ">
	                <div class="field_label row_header required">
                        Сумма, тг.
                    </div>
                	<div class="field_input">
	                    <input data-require="1" data-todot="" data-ucfirst="" type="text" value="" name="sum">
	                    <div class="field_example">
	                            Пример: 500
	                    </div>
	                    <div class="message_box error_message"></div>
	                    <div class="message_box field_message">Введите сумму кассовой операции.</div>
	            	</div>
		   		</div>
	            <div class="form_row cf ">
		 		    <div class="field_label row_header "></div>

					<div class="field_input">
		                                
		                <div class="field_example"></div>
	                    <div class="message_box error_message"></div>
	                </div>
	            </div>
                <div class="form_row cf ">
					<div class="field_label row_header required">
                        Описание
                    </div>

                    <div class="field_input">
	                    <input data-require="1" data-todot="" data-ucfirst="1" type="text" value="" name="description">
	                                
	                    <div class="field_example">
	                            Пример: Оплата интернета за май
	                    </div>
			            <div class="message_box error_message"></div>
	                    <div class="message_box field_message">Введите основание кассовой операции.</div>
	                </div>
                </div>
                <div class="form_row cf ">
                    <div class="field_label row_header ">
                        От кого/кому
                    </div>
                    <div class="field_input">
                        <input data-require="" data-todot="" data-ucfirst="1" type="text" value="" name="person">
                                
                        <div class="field_example">
                            Пример: Семенов Виктор Сергеевич
                        </div>
                        <div class="message_box error_message"></div>
                        <div class="message_box field_message">В случае проведения расхода укажите кому вы выдаете деньги. В случае проведения прихода укажите от кого вы получаете деньги. Данные из этого поля будут указаны в кассовых ордерах.</div>
                    </div>
                </div>
                <div class="form_row cf ">
                    <div class="field_label row_header "></div>
                    <div class="field_input">
                        <div class="field_example"></div>
                        <div class="message_box error_message"></div>
                    </div>
                </div>
                <div class="form_row cf ">
					<div class="field_label row_header "></div>
                    <div class="field_input">
                        <div class="field_example"></div>
                        <div class="message_box error_message"></div>
                    </div>
                </div>
                <div class="form_row cf ">
                    <div class="field_label row_header "></div>
                    <div class="field_input">
                        <div class="field_example"></div>
                        <div class="message_box error_message"></div>
                    </div>
		        </div>
	                                    
                <div class="form_row cf">
	                <button class="form_gen_button button_new" type="submit" >
	                    Сохранить
	                </button>
	            </div>
	        
	        	<div class="success_msg"></div>

       		</form>
	</div>

</div>

@endsection