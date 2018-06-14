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
   <span class="breadcrumb-crumb">{{$klient->surname . ' ' . $klient->name . ' ' . $klient->patronymic}}</span>
</div>
<div id="client-component" class="wrp client-area">
   <div class="info">
      <a class="name" href="javascript:void(0)" data-id="1">{{$klient->surname . ' ' . $klient->name . ' ' . $klient->patronymic}}</a>
      <a class="custom-btn" href="/workplace/{{$klient->id}}">Добавить операцию</a>
      <a class="custom-btn gray" title="Удалить клиента" href="javascript:swal('Удаление невозможно', 'Удаление клиента возможно только если у него нет ни одной совершенной операции. Если вы хотите удалить клиента то удалите сначала все совершенные с ним операции.', 'error')">✖</a>
      <div class="character-info">
         Рейтинг клиента:
         <a data-id="1" href="/clients/rating/popup" class="rating_points_balance_popup balance_plus_color">2.5</a>
      </div>
      <div class="full-info closed" style="display: none;">
         <div class="fixer"></div>
         <div class="info-item">
            <span class="headline">Личные данные</span>
            <a href="/edit_client/?id=1">
            <img src="/img/edit_profile_btn_n.png" alt="Раскрыть" id="edit_profile_btn">
            </a>
            <table class="about">
               <tbody>
                  <tr>
                     <td class="gray">Характеристика</td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="info-item">
            <table class="about">
               <tbody>
                  <tr>
                     <td class="gray">Дата рождения</td>
                     <td>08.01.1992</td>
                  </tr>
                  <tr>
                     <td class="gray">Место жительства</td>
                     <td>Санкт-Петербург, ул. Ленина, д. 23, кв. 12</td>
                  </tr>
                  <tr>
                     <td class="gray">Место рождения</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td class="gray">Фактический адрес проживания</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td class="gray">ID клиента</td>
                     <td>1</td>
                  </tr>
                  <tr>
                     <td class="gray">Контактный телефон</td>
                     <td>1234567</td>
                  </tr>
                  <tr>
                     <td class="gray">Дата добавления клиента</td>
                     <td>08.06.2018</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="info-item">
            <span class="headline">Документы</span>
            <img src="/img/add_black_btn_n.png" alt="Добавить" class="add_black_btn add-client-document" data-client-id="1" style="cursor: pointer;">
            <table class="about">
               <tbody>
                  <tr>
                     <td style="line-height: normal;"><span class="link-action edit-client-document" data-document-id="1130691">Паспорт 36 03 125488</span></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="info-item">
            <span class="headline files">Фотографии и файлы</span>
            <div class="fileupload initialized" data-type="client" data-id="1" data-multiple="5">
               <div class="images cf"></div>
               <button class="button-upload">Загрузить фотографии и файлы</button><span class="help hyper-active" title="Загружаемый файл не может быть пустым.
                  Количество файлов должно быть не больше (5) шт
                  Размер каждого файла не может превышать 2mb (2048kb).
                  Все форматы файлов разрешены."></span>
               <div class="drop-file-here">(перетащите сюда файл(ы))</div>
               <div><button class="webcam-uploader-button">Сделать фото с веб камеры</button></div>
               <input type="file" name="files[]" multiple="multiple"><input type="hidden" name="fileupload_ids" class="fileupload_ids">
               <div class="webcam-uploader-container"></div>
            </div>
         </div>
         <div class="info-item">
            <span class="headline">Карта постоянного клиента</span>
            <div class="no-card">Нет карты</div>
         </div>
         <div class="info-item">
            <span class="headline">Отчет (по всем филиалам)</span>
            <table class="about">
               <tbody>
                  <tr>
                     <td class="gray">Сделок</td>
                     <td>3</td>
                  </tr>
                  <tr>
                     <td class="gray">Невыкупленных залогов</td>
                     <td>0</td>
                  </tr>
                  <tr>
                     <td class="gray">Доход с клиента</td>
                     <td>100 тг.</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div>
            <a href="/client/1/anketa/" target="_blank">Анкета в Росфинмониторинг (заполненная стандартными данными)</a><br>
            <a href="/download/anketaempty.docx" target="_blank">Анкета клиента для Росфинмониторинга</a>
         </div>
      </div>
   </div>
   <ul class="tabs cf">
      <li class="active" data-section="0">
         Залоги
      </li>
   </ul>
   <div class="filters aftertabs cf">
      <div id="buy_filter" style="display:none;">
         <label class="radio-label">
         <input id="good_list_type" type="radio" name="good_list_type" value="standart" checked=""> Скупленное и принятое на реализацию
         </label>
         <label class="radio-label">
         <input id="good_list_type" type="radio" name="good_list_type" value="buy"> Проданное клиенту
         </label>
      </div>
   </div>
   <div class="things-list">
      <div class="things-list">

         
         @foreach($zalogs as $zalog)

         <div class="one-thing" data-chain-id="1" data-operation-id="7" data-toggle="collapse" href="#content{{$zalog->id}}">
            <div class="one-thing-hidden one-thing-head" title="Раскрыть">
               <h3>
                  Залоговый билет
                  <a class="fancybox_client_pawn dashed-underline" href="#id={{$zalog->id}}">
                  {{$zalog->id}}
                  </a>
                  @if($zalog->status == 1)
                  <i class="status green">открыт</i>
                  @else
                  <i class="status gray">закрыт</i>
                  @endif
                  <a class="print_button_img" href="/blanks/?oid=7">
                  <img src="/img/print_icon.png" title="Печать документов последнего действия Залогового билета">
                  </a>
               </h3>
               <div class="info-line cf">
                  <span class="first1">
                  <span class="gray">Сумма займа:</span>&nbsp;{{$zalog->price}} тг.
                  </span>
                  <span class="first">
                  <span class="gray">
                  Сумма процентов на
                  <input type="text" name="datepicker_date_hidden" class="datepicker_date_hidden datepicker hasDatepicker" value="13.06.2018" data-type="percent" data-pawn-id="2" id="dp1528888524895">
                  <a class="datepicker_date_btn link-action" data-pawn-id="2">сегодня</a> составляет:&nbsp; // надо будет узнать процент
                  </span>
                  <span id="datepicker_percent_2">фыв тг.</span>
                  </span>
                  <span class="first">
                  <span class="gray">Тариф:</span>&nbsp;
                  Основной
                  </span>
               </div>
               <div class="info-line cf">
                  <span class="first1">
                  <span class="gray">Заложено до:</span>&nbsp; {{$zalog->created_at->addDays($zalog->time)}}
                  </span>
                  <span class="first">
                  <span class="gray">
                  Сумма выкупа на
                  <input type="text" name="datepicker_date_hidden" class="datepicker_date_hidden datepicker hasDatepicker" value="13.06.2018" data-type="buyout" data-pawn-id="2" id="dp1528888524896">
                  <a class="datepicker_date_btn link-action" data-pawn-id="2">сегодня</a> составляет:&nbsp;
                  </span>
                  <span id="datepicker_buyout_2">1050 тг.</span>
                  </span>
               </div>
               <div class="info-margin">
                  <span class="gray">Заложенное имущество:</span>
               </div>
               <ul class="items-list">
                 
                  <?php $goods = App\Good::where('zalog_id', $zalog->id)->get(); ?>   
                  @foreach($goods as $good)
                  <li class="cf">
                     <span class="first">
                     <a class="fancybox_client_good dashed-underline pawn_good_name_link" href="/clients/edit_collateral/?good_id=2&amp;id_op=13" title="Ghf">
                     {{$good->title}}
                     </a>
                     </span>
                     <span class="five">
                     <i>id:</i> {{$good->id}}
                     </span>
                  </li>
                  @endforeach
               
               </ul>
               <div class="action-buttons"></div>
               <div class="expand-button"></div>
            </div>
            <div class="one-thing-content collapse" id="content{{$zalog->id}}" style="padding: 30px">
               <div class="vertical-spacer"></div>
               <div class="row">
               <div class="col-sm-10 col-md-6 col-md-offset-3">
                  <a class="btn btn-info">Перезалог</a>
                  <a class="btn btn-info">Добор</a>
                  <a class="btn btn-info">Частичный выкуп</a>
                  <a class="btn btn-info" href="/vykup/{{$zalog->id}}">Выкуп</a>
                  <a class="btn btn-info">Вывод из залога</a>
               </div>
               </div>
               <br>
               <div class="pawn_chain_history">
                  <div class="head">История:</div>
                  <table id="hron_table">
                     <tbody>
                        <tr>
                           <td style="width: 200px;">Залог</td>
                           <td style="width: 200px;">{{$zalog->created_at}}</td>
                           <td style="width: 100px;"><span style="color:red;display:block">{{$zalog->price}} тг.</span></td>
                           <td style="width: 150px;">{{ App\Employee::find(App\User::find(App\Smena::where('id', $zalog->smena_id)->first()->user_id)->id)->surname . ' ' . App\Employee::find(App\User::find(App\Smena::where('id', $zalog->smena_id)->first()->user_id)->id)->name }}</td>
                           <td style="width: 150px;"></td>
                           <td style="border-color: transparent !important; width: 50px;"><img src="{{asset('img/system_help.png')}}" class="pawn_history_message tooltip_target" title="Филиал: Qwert (Адрес не указан)
                              Срок залога: 22 дней
                              Тариф: Основной
                              Юр.лицо: ООО Qwert"></td>
                           <td style="border-color: transparent !important;"><a data-id="15" class="print_button_img blank_print_link" href="/blanks/?oid=15"><img src="/img/print_icon.png" title="Печать документов"></a></td>
                        </tr>
                     </tbody>
                  </table>
                  <p class="new-over-all">Общее количество дней в залоге: <i>0</i><br>Общая сумма оплаченных процентов: <i>0 тг.</i></p>
               </div>
               <a href="#" class="pawn-chainer-controller">Подробно</a>
               <div class="pawn-chainer">
                  <div class="vertical-spacer"></div>
                  <table class="pawn_info_sub_table ">
                     <colgroup>
                        <col width="180px">
                        <col width="98px">
                        <col width="98px">
                        <col width="106px">
                        <col>
                        <col width="205px">
                        <col width="206px">
                     </colgroup>
                     <tbody>
                        <tr class="pawn_info_row_1">
                           <th>Серия и номер билета</th>
                           <th>Дата займа</th>
                           <th>Заложено до</th>
                           <th>Срок займа</th>
                           <th>Сумма займа</th>
                           <th>Сумма процентов к оплате<br>(на текущий момент)</th>
                           <th>Состояние</th>
                        </tr>
                        <tr class="pawn_info_row_2">
                           <td>
                              <a href="/clients/edit_pawn/?pawn_id=4" class="fancybox_client_pawn dashed_underline pawn_number_row_2"> АА000004</a>
                           </td>
                           <td>14.06.2018</td>
                           <td>06.07.2018</td>
                           <td>22</td>
                           <td>12222 тг.</td>
                           <td>50 тг.</td>
                           <td>
                              Открыт
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" style="padding: 5px 0;">
                              <table class="pawn_goods_list_table">
                                 <tbody>
                                    <tr>
                                       <th class="col1">Заложенное имущество</th>
                                       <th class="col2">ID</th>
                                       <th class="col2">Оценочная стоимость</th>
                                       <th class="col2">Серийный номер</th>
                                       <th class="col2">Состояние</th>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="good_list_txt_node">
                                             <a href="/clients/edit_collateral/?good_id=3&amp;id_op=15" class="fancybox_client_good dashed_underline" title="Adsad">Adsad</a>
                                          </div>
                                       </td>
                                       <td>И3</td>
                                       <td>4563.00 тг.</td>
                                       <td>123123</td>
                                       <td>заложен</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7">
                              <span class="pawn_info_color_gray">Тариф:</span> Основной<br>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7">
                              <span class="pawn_info_color_gray">Комментарий:</span> adfs<br>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="vertical-spacer"></div>
            </div>
         </div>

         @endforeach

         <br>
         <br>
         <br>
         <h1 class="text-center">Образец закрытого залога, динамичным будет позже</h1>
         <div class="one-thing" data-chain-id="3" data-operation-id="13">
            <div class="one-thing-head closed one-thing-expanded" title="">
               <h3>
                  Залоговый билет
                  <a class="fancybox_client_pawn dashed-underline" href="/clients/edit_pawn/?pawn_id=3">
                  АА000003
                  </a>
                  <i class="status gray">закрыт</i>
                  <a class="print_button_img" href="/blanks/?oid=13">
                  <img src="/img/print_icon.png" title="Печать документов последнего действия Залогового билета">
                  </a>
               </h3>
               <div class="info-line cf">
                  <span class="first1">
                  <span class="gray">Сумма займа:</span>&nbsp;788 тг.
                  </span>
                  <span class="first">
                  <span class="gray">Тариф:</span>&nbsp;
                  Основной
                  </span>
               </div>
               <div class="info-margin">
                  <span class="gray">Заложенное имущество:</span>
               </div>
               <ul class="items-list">
                  

               </ul>
               <div class="action-buttons"></div>
               <div class="expand-button"></div>
            </div>
            <div class="one-thing-content active" style="display: block;">
               <div class="vertical-spacer"></div>
               <div class="pawn_chain_history">
                  <div class="head">История:</div>
                  <table id="hron_table">
                     <tbody>
                        <tr>
                           <td style="width: 200px;">Выкуп</td>
                           <td style="width: 200px;">13 июня 2018 - 20:15</td>
                           <td style="width: 100px;"><span style="color:green;display:block">838 тг.</span></td>
                           <td style="width: 150px;">Сотрудников С. С.</td>
                           <td style="width: 150px;"></td>
                           <td style="border-color: transparent !important; width: 50px;"><img src="/img/system_help.png" class="pawn_history_message tooltip_target" title="Юр.лицо: ООО Qwert"></td>
                           <td style="border-color: transparent !important;"><a data-id="13" class="print_button_img blank_print_link" href="/blanks/?oid=13"><img src="/img/print_icon.png" title="Печать документов"></a></td>
                        </tr>
                        <tr>
                           <td style="width: 200px;">Залог</td>
                           <td style="width: 200px;">12 июня 2018 - 17:52</td>
                           <td style="width: 100px;"><span style="color:red;display:block">788 тг.</span></td>
                           <td style="width: 150px;">Сотрудников С. С.</td>
                           <td style="width: 150px;"></td>
                           <td style="border-color: transparent !important; width: 50px;"><img src="/img/system_help.png" class="pawn_history_message tooltip_target" title="Филиал: Qwert (Адрес не указан)
                              Срок залога: 30 дней
                              Тариф: Основной
                              Юр.лицо: ООО Qwert"></td>
                           <td style="border-color: transparent !important;"><a data-id="12" class="print_button_img blank_print_link" href="/blanks/?oid=12"><img src="/img/print_icon.png" title="Печать документов"></a></td>
                        </tr>
                     </tbody>
                  </table>
                  <p class="new-over-all">Общее количество дней в залоге: <i>1</i><br>Общая сумма оплаченных процентов: <i>50 тг.</i></p>
               </div>
               <a href="#" class="pawn-chainer-controller">Подробно</a>
               <div class="pawn-chainer">
                  <div class="vertical-spacer"></div>
                  <table class="pawn_info_sub_table close_pawn_style">
                     <colgroup>
                        <col width="180px">
                        <col width="98px">
                        <col width="98px">
                        <col width="106px">
                        <col>
                        <col width="205px">
                        <col width="206px">
                     </colgroup>
                     <tbody>
                        <tr class="pawn_info_row_1">
                           <th>Серия и номер билета</th>
                           <th>Дата займа</th>
                           <th>Дата закрытия</th>
                           <th>Срок займа</th>
                           <th>Сумма займа</th>
                           <th>Сумма оплаченных процентов</th>
                           <th>Состояние</th>
                        </tr>
                        <tr class="pawn_info_row_2">
                           <td>
                              <a href="/clients/edit_pawn/?pawn_id=3" class="fancybox_client_pawn dashed_underline pawn_number_row_2"> АА000003</a>
                           </td>
                           <td>12.06.2018</td>
                           <td>13.06.2018</td>
                           <td>30</td>
                           <td>788 тг.</td>
                           <td>50 тг.</td>
                           <td>
                              Закрыт
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" style="padding: 5px 0;">
                              <table class="pawn_goods_list_table">
                                 <tbody>
                                    <tr>
                                       <th class="col1">Заложенное имущество</th>
                                       <th class="col2">ID</th>
                                       <th class="col2">Оценочная стоимость</th>
                                       <th class="col2">Серийный номер</th>
                                       <th class="col2">Состояние</th>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="good_list_txt_node">
                                             <a href="/clients/edit_collateral/?good_id=2&amp;id_op=13" class="fancybox_client_good dashed_underline" title="Ghf">Ghf</a>
                                          </div>
                                       </td>
                                       <td>И2</td>
                                       <td>12312.00 тг.</td>
                                       <td></td>
                                       <td>выкуплен</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7">
                              <span class="pawn_info_color_gray">Тариф:</span> Основной<br>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="vertical-spacer"></div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('script')


<script src="{{asset('js/zalogs.js')}}"></script>
<script src="{{asset('js/watch.js')}}"></script>

@endsection