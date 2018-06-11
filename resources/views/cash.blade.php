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

   <!-- cash div -->
   
   <div>
   <div id="cash_div" class="cf" style="position: relative;">
      <div class="clear_it">
         <h2 style="text-align: center; font-weight:normal; font-size:23px;">Кассовый отчет</h2>
         <h3 style="text-align: center; font-size:18px; font-weight:normal;">Qwert (Адрес не указан)</h3>
         <div>Сформирован: 16:38 / 11.06.2018 (Сотрудников С. С.)</div>
         <div>Открытие смены: 16:37 / 11.06.2018 (Сотрудников С. С.)</div>
         <div>В кассе: 82 505 тг.</div>
         <div>В начале смены: 47 505 тг.</div>
      </div>
      <div class="cash_block_in">
         <div class="cash_text_in">Приход {{$plus}} тг.</div>
         <div id="table_result">
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
                  <?php 
                     $types = array("приход","расход","приход (доход)","расход (затраты)");
                   ?>
                  @if(count($ins) == 0)
                  <tr style="text-align:center">
                     <td colspan="4">
                        <div>Данные отсутствуют.</div>
                     </td>
                  </tr>
                  @else
                     @foreach($ins as $in)
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">{{$in->created_at}}</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>{{ $types[$in->type] }}</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span>{{ $in->description }}</span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>{{ $in->sum }}</span></div>
                        </td>
                        <td class="column_profit">
                           <div class="txt_node table_number_format"><span>{{ $in->type === 2 ? $in->sum : "0" }}</span></div>
                        </td>
                     </tr>
                     @endforeach
                  @endif
               </tbody>
            </table>
         </div>
         <div class="print_cash_text_in">Приход  тг.</div>
      </div>
      <div class="cash_block_out">
         <div class="cash_text_out">Расход {{$minus}} тг.</div>
         <div id="table_result">
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
                  @if(count($outs) == 0)
                  <tr style="text-align:center">
                     <td colspan="4">
                        <div>Данные отсутствуют.</div>
                     </td>
                  </tr>
                  @else
                     @foreach($outs as $out)
                     <tr class="operation_row">
                        <td class="column_date">
                           <div class="txt_node"><span><span class="cash_date_text">{{$out->created_at}}</span></span></div>
                        </td>
                        <td class="column_type_op">
                           <div class="txt_node"><span>{{ $types[$out->type] }}</span></div>
                        </td>
                        <td class="column_good_name">
                           <div class="txt_node"><span>{{ $out->description }}</span></div>
                        </td>
                        <td class="column_price">
                           <div class="txt_node table_number_format"><span>{{ $out->sum }}</span></div>
                        </td>
                     </tr>
                     @endforeach
                  @endif
               </tbody>
               </tbody>
            </table>
         </div>
         <div class="print_cash_text_out">Расход 0 тг.</div>
      </div>
      <div class="print_cash_info" style="display: none;">
         <div id="crazy-shit0" style="clear:both; height:20px; padding-top:30px;"></div>
         <table style="font-size: 17px;">
            <tbody>
               <tr>
                  <td>
                     <div><b style="font-size: 20px;">В кассе: 82 505 тг.</b></div>
                     <div>В начале смены: 47 505 тг.</div>
                  </td>
                  <td>
                     <div>Доход: 14000 тг.</div>
                     <div>Прибыль: <b style="font-size: 19px;">14000</b> тг.</div>
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
               <td title="Включает доходы: ломбарда, комиссионного магазина, аксессуаров и ремонта, а также сумму всех приходов у которых стоит галочка 'учитывать в расчете дохода' за смену">{{$dohod}}</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
            </tr>
            <tr>
               <td><b>Затраты за смену, тг.</b></td>
               <td>
                  <span title="Суммируются все расходы за смену, у которых стоит галочка 'учитывать в расчете дохода'">
                  {{$zatraty}}
                  </span>
               </td>
            </tr>
            <tr>
               <td><b>Прибыль за смену, тг.</b></td>
               <td>пока хз че тут выводить</td>
            </tr>
         </tbody>
      </table>
   </div>
</div>

   <!-- cash div -->
   <div id="block_print_btm" class="print-cash" style="margin-bottom:40px; display: inline-block;"><a>Напечатать кассовый отчет</a></div>
   @endif
</div>

@endsection