@extends('layouts.layout')

@section('style')
  <link rel="stylesheet" href="{{asset('css/klientzalogs.css')}}">
@endsection

@section('content')


<div id="breadcrumbs" class="breadcrumbs">
   <span class="breadcrumb-crumb"><a href="/">Главная</a></span>
   <span class="breadcrumb-symbol">→</span>
   <span class="breadcrumb-crumb"><a href="/clients/">Клиенты</a></span>
   <span class="breadcrumb-symbol">→</span>
   <span class="breadcrumb-crumb"><a href="/clients/client/?client_id=1&amp;pawn_anchor_id=4">{{$klient->surname . ' ' . $klient->name . ' ' . $klient->patronymic}}</a></span>
   <span class="breadcrumb-symbol">→</span>
   <span class="breadcrumb-crumb">Выкуп</span>
</div>
<div class="wrp">
   <h1 class="form_gen_header" style="margin: 20px 0 15px;">Выкуп</h1>
   <div class="block-info-extra">
      <span class="head">{{$klient->surname . ' ' . $klient->name . ' ' . $klient->patronymic}}</span>
      <table class="karkas_table_info">
         <tbody>
            <tr>
               <td>Дата рождения:</td>
               <td class="date-birth-unique margin">{{$klient->date_of_birth}}</td>
            </tr>
            <tr>
               <td>Место жительства:</td>
               <td class="margin">{{$klient->location_of_fact . ', ' . $klient->street . ', ' . $klient->home}}</td>
            </tr>
            <tr>
               <td>Документ:</td>
               <td class="margin"><span class="link-action only-rmargin client-document-name edit-client-document" data-document-id="1130691">Паспорт 36 03 125488</span><span class="pick-client-document link-action only-rmargin" data-client-id="1">Выбрать другой документ</span></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td class="margin">&nbsp;</td>
            </tr>
            <tr>
               <td>Закрываемый залоговый билет:</td>
               <td class="margin"><span class="number_num"><span class="bold">{{$zalog->id}}</span></span></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td class="margin">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="2">
                  <div>Заложенное имущество:</div>
                  <?php $goods = App\Good::where('zalog_id', $zalog->id)->get();
                   $index = 0;?>   
                  @foreach($goods as $good)
                    <div class="bold">{{++$index . '. ' . $good->title}}<br></div>
                  @endforeach
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="form_gen_wrapper ">
      <form enctype="multipart/form-data" name="gen_form_operation_vykup" method="POST" id="gen_form_operation_vykup" action="{{route('vykup')}}">
          {{ csrf_field() }} 
         <div class="form_row cf ">
            <div class="field_label row_header required">
               Сумма к оплате, тг.
            </div>
            <div class="field_input valid">
               <input data-require="1" data-todot="" data-ucfirst="" id="price" autofocus="" type="text" value="{{$zalog->price}}" name="price">
               <div class="field_example">
                  Пример: 300
               </div>
               <div class="message_box error_message"></div>
               <div class="message_box field_message">В это поле подставляется сумма процентов, рассчитанная по выбранному ранее тарифу. Вы можете ее отредактировать, информация о редактировании будет записана в журнале. В настройках прав доступа вы можете запретить редактирование этого поля.</div>
            </div>
         </div>
         <div class="form_row_group cf   open" data-remember="1">
            <div class="group_row_header">Дополнительные параметры</div>
            <div class="group_row_container" style="display: block;">
               <div class="form_row cf ">
                  <div class="field_label row_header ">
                  </div>
                  <div class="field_input">
                     <div class="field_example">
                     </div>
                     <div class="message_box error_message"></div>
                  </div>
               </div>
               <div class="form_row cf ">
                  <div class="field_label row_header required">
                     Юр.лицо
                  </div>
                  <div class="field_input valid">
                     <select id="" data-require="1" data-ucfirst="" type="select" name="entity_id">
                        <option value="1" selected="">ООО Qwert</option>
                     </select>
                     <div class="field_example">
                        Пример: ООО "Ломбард Карат"
                     </div>
                     <div class="message_box error_message"></div>
                     <div class="message_box field_message">Юр. лицо подставляется автоматически. Привязка настраивается <a href="/admin2/settings/wokplaces/edit/?wp_id=1">здесь</a>.</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="form_row_group cf  ">
            <div class="group_row_header">Исходные данные и расчет</div>
            <div class="group_row_container">
               <div class="form_row cf ">
                  <div class="info_operation">
                     <h2>Исходные данные</h2>
                     Сумма займа: 12222 тг.<br>
                     Срок займа: 22 дней<br>
                     Тариф: Основной<br>
                     Дисконтная карта: нет<br>
                     Комментарий: adfs<br>
                  </div>
                  <div class="info_operation">
                     <h2>Расчет</h2>
                     Общий срок: 1 дней<br>
                     <div class="grey-background">
                        Основной срок: 1 дней<br>
                        Срок просрочки(льготного периода): 0 дней<br>
                     </div>
                     Общая сумма процентов: 50 тг. <span class="grey-background">(округлено до минимального значения)</span><br>
                     <div class="grey-background">
                        Сумма процентов по основному сроку: 48.89 тг.<br>
                        Сумма процентов по просрочке(льготному периоду): 0 тг.<br>
                        Сумма оплаты хранения: 0 тг.<br>
                        Сумма оценки: 0 тг.<br>
                        Сумма скидки по дисконтной карте: 0 тг.<br>
                     </div>
                     Годовая процентная ставка (ПСК): 149.321 % в год
                     <img src="/img/system_help.png" class="show-formula-button tooltip_target" title="Показать расчеты">
                     <div class="formula hidden">
                        <div>
                           <div>Данные</div>
                           <ul>
                              <li>Проценты к оплате: 50 тг.</li>
                              <li>Сумма залога: 12222 тг.</li>
                              <li>Фактическое количество дней в залоге: 1 дней</li>
                           </ul>
                        </div>
                        <div>
                           <div>Формула</div>
                           {ПСК} = 50 / 12222 * 100 / 1 * 365
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <input type="hidden" value="1" name="vykup_x">
         <input type="hidden" value="{{$klient->id}}" name="klient_id">
         <input type="hidden" value="{{$zalog->id}}" name="zalog_id">
         <input type="hidden" value="15" name="id_op">
         <input class="client-document-id" type="hidden" value="1130691" name="document_id">
         <div class="form_row cf">
            <button class="form_gen_button button_new" type="submit">
            Сохранить
            </button>
         </div>
         <div class="success_msg"></div>
      </form>
   </div>
   <script type="text/javascript">
      $(document).ready(function(){
          $(".fancybox_item").fancybox({
              ajax: {
                  type: "POST"
              },
              onComplete: function(){
                  // dem Делаем активным первое поле
                  $("#add_op_1_auto_form .field_input:first, #add_op_1_form .field_input:first, #add_op_1_jewelry .field_input:first")
                      .children(":first").focus();
              }
          });
          $(".numb_id").live("click", function () {
              var pn = $(this).data("pawn_number");
              var num = $(this).data("number");
              var o_nm = "Номер залогового билета: <span style=\"background:#E3DED2;\">"+pn+"</span> типографский бланк.";
              $("input[name='number_id']").val(num);
              $(".number_num").html(o_nm);
              $.fancybox.close();
          });
      
          $("#submit-error").live("submit", function(e) {
              e.preventDefault();
      
              $.ajax({
                  type: "POST",
                  url: $(this).attr("action"),
                  dataType: "text",
                  cache: false,
                  data: $(this).serialize(),
                  success: function (result) {
                      if (result == "ok") {
                          alert("Спасибо, мы приняли вашу заявку!");
                          $.fancybox.close();
                      } else if (result == "error") {
                          alert("Произошла ошибка при регистрации сообщения");
                      } else {
                          alert("Произошла неизвестная ошибка");
                          console.log("неизвестная ошибка: " + result);
                      }
                  },
                  error: function (xhr, str) {
                      console.log("Возникла ошибка: " + xhr.responseCode + "; Текст ошибки: " + str);
                  }
              });
          });
      })
   </script>
</div>


@endsection
