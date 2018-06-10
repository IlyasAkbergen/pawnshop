@extends('layouts.layout')

@section('style')

<link rel="stylesheet" href="{{asset('css/cash.css')}}">

@endsection

@section('content')

<div class="cash_wrapper wrp">
   <h1 style="padding-top: 10px; padding-bottom: 20px;">Касса</h1>
   
   @if($operations == "empty")
   <div id="lombard_filters" class="cf cash-filter-wrp">
      <div>
         <div class="top_cash_text cf">
            <div class="top_cash_left">
               <div class="top_cash_left_values">
                  Смена закрыта                        
               </div>
               <div class="top_cash_left_op_cl">
                  <a id="button-open-cash" class="open_close_cash btn btn-primary btn-xs" href="{{route('openSmena')}}">Открыть смену</a>
               </div>
            </div>
            <div class="top_cash_right">
               <form name="chooseDateForm" id="chooseDateForm" action="">
                  <fieldset>
                     <legend>Поиск по сменам</legend>
                     <input name="date" id="date" class="date-pick search_input hasDatepicker sdate_holder" data-sdate="">
                     <input class="search_submit" type="submit" value="Найти">
                     <div class="cash_search_navigator cf">
                        <a class="btn btn-primary btn-xs prev" title="Предыдущая смена" href="/cash/?id=472406">← Предыдущая</a>
                        <a class="btn btn-primary btn-xs next" title="Следующая смена" style="opacity: 0.5; cursor:default;">Следующая →</a>
                     </div>
                  </fieldset>
               </form>
            </div>
            <div class="cash_type_box cf">
            </div>
         </div>
      </div>
   </div>
   @else
   <div id="lombard_filters" class="cf cash-filter-wrp">
      <div>
         <div class="top_cash_text cf">
            <div class="top_cash_left">
               <div class="top_cash_left_values">
                  В кассе: {{ $bank }} тг.
                  <div class="top_cash_text_onstart">В начале смены: {{$currentSmena->before_cash}} тг.</div>
                  <div class="cash_get_info_small">Открытие {{$currentSmena->started_at}}</div>
               </div>
               <div class="top_cash_left_op_cl">
                  <div class="close_cash_button">
                     <a id="button-close-cash" data-cash-id="472406" class="open_close_cash btn btn-primary btn-xs" href="{{route('closeSmena')}}">Закрыть смену</a>
                  </div>
                  <div class="add_own_need_btn">
                     <div>
                        <a href="{{route('addOperationForm')}}" class="btn btn-primary btn-xs">Провести кассовую операцию</a>
                     </div>
                     <div>
                        <a class="cash_ops_link btn btn-primary btn-xs" href="/cash/own_needs/">Кассовые операции</a>
                     </div>
                     <div>
                        <a class="btn btn-primary btn-xs" href="/cash/closed_cashes/">Закрытые смены</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="top_cash_right">
               <form name="chooseDateForm" id="chooseDateForm" action="">
                  <fieldset>
                     <legend>Поиск по сменам</legend>
                     <input name="date" id="date" class="date-pick search_input hasDatepicker sdate_holder" data-sdate="">
                     <input class="search_submit" type="submit" value="Найти">
                     <div class="cash_search_navigator cf">
                        <a class="btn btn-primary btn-xs prev" title="Предыдущая смена" style="opacity: 0.5; cursor:default;">← Предыдущая</a>
                        <a class="btn btn-primary btn-xs next" title="Следующая смена" style="opacity: 0.5; cursor:default;">Следующая →</a>
                     </div>
                  </fieldset>
               </form>
            </div>
            <div class="cash_type_box cf">
               <div>Режим работы кассы</div>
               <label class="top_cash_left_label_top">
               <input class="cash_type_change" type="radio" name="cash_type" value="0" checked="">
               упрощенный
               </label>
               <label class="top_cash_left_label_mid">
               <input class="hide_zalog_vivod_change" type="checkbox" name="hide_zalog_vivod" value="1">
               Скрыть вывод из залога
               </label>
               <label class="top_cash_left_label_bottom">
               <input class="cash_type_change" type="radio" name="cash_type" value="1">
               бухгалтерский
               </label>
            </div>
         </div>
      </div>
   </div>
   <div>
      <div id="cash_div" class="cf" style="position: relative;">
         <div class="clear_it">
            <h2 style="text-align: center; font-weight:normal; font-size:23px;">Кассовый отчет</h2>
            <h3 style="text-align: center; font-size:18px; font-weight:normal;">Qwert (Адрес не указан)</h3>
            <div>Сформирован: 02:38 / 11.06.2018 (Сотрудников С. С.)</div>
            <div>Открытие смены: 18:01 / 08.06.2018 (Ильяс . .)</div>
            <div>В кассе: 47 505 тг.</div>
            <div>В начале смены: 0 тг.</div>
         </div>
         <div class="cash_block_in">
            <div class="cash_text_in">Приход {{$plus}} тг.</div>
            <div id="table_result">
               <div class="JCLRgrips" style="width: 579px;">
                  <div class="JCLRgrip" style="left: 112px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRgrip" style="left: 228px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRgrip" style="left: 344px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRgrip" style="left: 459px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRLastGrip" style="left: 580px; height: 30px;"></div>
               </div>
               <table class="MainTable  squashed-rows squashed-headers JColResizer" id="operations_block_left_arr" width="100%">
                  <thead>
                     <tr>
                        <th title="Время" style="width: 19%;">
                           <div class="txt_node dash_none"><span>Время</span></div>
                        </th>
                        <th title="Действие" style="width: 20%;">
                           <div class="txt_node dash_none"><span>Действие</span></div>
                        </th>
                        <th title="Описание" style="width: 20%;">
                           <div class="txt_node dash_none"><span>Описание</span></div>
                        </th>
                        <th title="Сумма" style="width: 20%;">
                           <div class="txt_node dash_none"><span>Сумма</span></div>
                        </th>
                        <th title="Доход" style="width: 21%;">
                           <div class="txt_node dash_none"><span>Доход</span></div>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">18:01 08.06</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>перезалог</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span><a href="/clients/client/?client_id=1&amp;pawn_anchor_id=1" title="Nokia 6700 (AA000002)">Nokia 6700 (AA000002)</a></span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>50</span></div>
                        </td>
                        <td class="column_profit">
                           <div class="txt_node table_number_format"><span>50</span></div>
                        </td>
                     </tr>
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">18:01 08.06</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>к/о приход</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span>Пополнение кассы</span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>50 000</span></div>
                        </td>
                        <td class="column_profit">
                           <div class="txt_node table_number_format"><span>0</span></div>
                        </td>
                     </tr>
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">18:01 08.06</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>продажа аксессуаров</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span><a href="/catalog/accessories/stranica_accesories/?id=69656" title="Зарядные устройства/Samsung/D800/D820 AMT">Зарядные устройства/Samsung/D800/D820 AMT</a><span class="operations_goods_counter"> (3 шт.)</span> </span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>300</span></div>
                        </td>
                        <td class="column_profit">
                           <div class="txt_node table_number_format"><span>231</span></div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="print_cash_text_in">Приход 2 {{$plus}} тг.</div>
         </div>
         <div class="cash_block_out">
            <div class="cash_text_out">Расход {{$minus}} тг.</div>
            <div id="table_result">
               <div class="JCLRgrips" style="width: 579px;">
                  <div class="JCLRgrip" style="left: 140px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRgrip" style="left: 285px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRgrip" style="left: 430px; height: 30px;">
                     <div class="JColResizer" style="cursor:col-resize"></div>
                  </div>
                  <div class="JCLRLastGrip" style="left: 580px; height: 30px;"></div>
               </div>
               <table class="MainTable  squashed-rows squashed-headers JColResizer" id="operations_block_right_arr" width="100%">
                  <thead>
                     <tr>
                        <th title="Время" style="width: 24%;">
                           <div class="txt_node dash_none"><span>Время</span></div>
                        </th>
                        <th title="Действие" style="width: 25%;">
                           <div class="txt_node dash_none"><span>Действие</span></div>
                        </th>
                        <th title="Описание" style="width: 25%;">
                           <div class="txt_node dash_none"><span>Описание</span></div>
                        </th>
                        <th title="Сумма" style="width: 26%;">
                           <div class="txt_node dash_none"><span>Сумма</span></div>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">18:01 08.06</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>скупка</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span><a href="/clients/client/?client_id=1&amp;anchor_id=1" title="Samsung D880">Samsung D880</a></span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>1 500</span></div>
                        </td>
                     </tr>
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">18:01 08.06</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>покупка аксессуаров</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span><a href="/catalog/accessories/stranica_accesories/?id=69656" title="Зарядные устройства/Samsung/D800/D820 AMT">Зарядные устройства/Samsung/D800/D820 AMT</a><span class="operations_goods_counter"> (15 шт.)</span> </span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>345</span></div>
                        </td>
                     </tr>
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">18:01 08.06</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>залог</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span><a href="/clients/client/?client_id=1&amp;pawn_anchor_id=1" title="Nokia 6700 (AA000001)">Nokia 6700 (AA000001)</a></span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>1 000</span></div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="print_cash_text_out">Расход {{$minus}} тг.</div>
         </div>
         <div class="print_cash_info" style="display: none;">
            <div id="crazy-shit0" style="clear:both; height:20px; padding-top:30px;"></div>
            <table style="font-size: 17px;">
               <tbody>
                  <tr>
                     <td>
                        <div><b style="font-size: 20px;">В кассе: 47 505 тг.</b></div>
                        <div>В начале смены: 0 тг.</div>
                     </td>
                     <td>
                        <div>Доход: 281 тг.</div>
                        <div>Прибыль: <b style="font-size: 19px;">281</b> тг.</div>
                     </td>
                  </tr>
               </tbody>
            </table>
            <div style="clear:both; height:20px; padding-top:20px;"></div>
         </div>
         <div class="clear_it">
            <div>
               <table style="width: 850px; font-weight: bold; table-layout: fixed; margin-bottom: 70px;">
                  <tbody>
                     <tr>
                        <td>Фактическая сумма:</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td style="width: 60px;">тг.</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td>тиын</td>
                     </tr>
                     <tr style="height: 30px;">
                        <td colspan="5"></td>
                     </tr>
                     <tr>
                        <td>Излишки:</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td style="width: 60px;">тг.</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td>тиын</td>
                     </tr>
                     <tr style="height: 30px;">
                        <td colspan="5"></td>
                     </tr>
                     <tr>
                        <td>Недостача:</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td style="width: 60px;">тг.</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td>тиын</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div>
               <table style="width: 500px; font-weight: bold; table-layout: fixed;">
                  <tbody>
                     <tr>
                        <td>Сдал смену:</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td style="width: 35px;"></td>
                        <td style="border-bottom: 1px black solid;"></td>
                     </tr>
                     <tr style="font-size: 8px; text-align: center;">
                        <td></td>
                        <td>(ФИО сотрудника)</td>
                        <td style="width: 35px;"></td>
                        <td>(подпись)</td>
                     </tr>
                     <tr style="height: 30px;">
                        <td colspan="4"></td>
                     </tr>
                     <tr>
                        <td>Принял смену:</td>
                        <td style="border-bottom: 1px black solid;"></td>
                        <td style="width: 35px;"></td>
                        <td style="border-bottom: 1px black solid;"></td>
                     </tr>
                     <tr style="font-size: 8px; text-align: center;">
                        <td></td>
                        <td>(ФИО сотрудника)</td>
                        <td style="width: 35px;"></td>
                        <td>(подпись)</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div style="clear:both; height:20px; padding-top:30px;"></div>
      <div class="active_cash_tbl_wrap">
         <table class="active_cash_table">
            <thead class="active_cash_table_head">
               <tr>
                  <td></td>
                  <td>Общие данные</td>
                  <td>Ломбард</td>
                  <td>Комиссионный магазин</td>
                  <td>Аксессуары</td>
                  <td>Ремонт</td>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td><b>Доход за смену, тг.</b></td>
                  <td title="Включает доходы: ломбарда, комиссионного магазина, аксессуаров и ремонта, а также сумму всех приходов у которых стоит галочка 'учитывать в расчете дохода' за смену">281</td>
                  <td>50</td>
                  <td>0</td>
                  <td>231</td>
                  <td>0</td>
               </tr>
               <tr>
                  <td><b>Затраты за смену, тг.</b></td>
                  <td>
                     <span title="Суммируются все расходы за смену, у которых стоит галочка 'учитывать в расчете дохода'">
                     0
                     </span>
                  </td>
               </tr>
               <tr>
                  <td><b>Прибыль за смену, тг.</b></td>
                  <td>281</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div id="block_print_btm" class="print-cash" style="margin-bottom:40px; display: inline-block;"><a>Напечатать кассовый отчет</a></div>
   @endif
</div>

@endsection